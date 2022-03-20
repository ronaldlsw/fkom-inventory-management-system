@extends ('layouts.layout')
@section('content')

    <title>Item Request</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>





    <div class="container pt-3">
        <h1>Item Request</h1>
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

                                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="js-example-basic-single" style="width:100%" id="item_id[]"
                                        name="item_id[]" required>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->item_id }}">
                                                {{ $item->item_id }}-{{ $item->item_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!--
                                                                                            <td><input type="text" name="item_id[]" class="form-control" required=""></td> -->
                                <td><input type="number" name="req_qty[]" class="form-control quantity" required="">
                                </td>
                                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a>
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
    <script type="text/javascript">
        $('.addRow').on('click', function() {
            addRow();
        });

        function addRow() {
            var tr = '<tr>' +
                ' <td><input type="text" name="item_id[]" class="form-control" required=""></td>' +
                '<td><input type="number" name="req_qty[]" class="form-control quantity" required=""></td>' +
                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>' +
                '</tr>'
            $('tbody').append(tr);
        };
        $('.remove').live('click', function() {
            var last = $('tbody tr').length;
            if (last == 1) {
                alert("Error ! Last row cannot be deleted.");
            } else {
                $(this).parent().parent().remove();
            }

        });

    </script>

@endsection
