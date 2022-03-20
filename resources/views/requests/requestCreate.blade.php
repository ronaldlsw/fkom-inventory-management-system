@extends ('layouts.normalPage')
@section('content')

    <title>Item Request</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>


    <div class="container">
        <div class="row">
            <div class="col-md-1"> <button type="button" class="btn"> <a href="/request/list">
                        <i class="fas fa-arrow-circle-left fa-3x"></i></a></button></div>



        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>Item Request</h1>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-1">

            </div>
            <div class="col-md-3">
                <h3>Item ID Search</h3>
                <select class="js-example-basic-single" id="item_id[]" name="item_id[]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->item_id }}">
                            {{ $item->item_id }}-{{ $item->item_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <hr>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <form action="/request/submit" method="POST">
            @csrf
            <section>


                <div class="panel panel-footer">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Item ID / Name</th>
                                <th>Quantity</th>

                                <th><a href="#" class="addRow"><button class="btn btn-primary">+</button></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="item_id[]" placeholder="Enter Item ID" class="form-control"
                                        required="">
                                </td>
                                <!--
                                                                                                                                                                                                                                                                <td><input type="text" name="item_id[]" class="form-control" required=""></td> -->
                                <td><input type="number" name="req_qty[]" placeholder="Enter Item Quantity"
                                        class="form-control quantity" required="">
                                </td>
                                <td><a href="#" class="btn btn-danger remove">-</a>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"><input type="submit" name="" value="Submit"
                                        class="btn btn-success"></td>


                            </tr>
                        </tfoot>

                    </table>
                </div>
            </section>
        </form>
    </div>
    <script>
        $('.addRow').on('click', function() {
            addRow();
        });

    </script>

@endsection
