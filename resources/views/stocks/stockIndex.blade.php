@extends ('layouts.withDatatable')
@section('content')


    <title> Item List </title>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#itemList').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
        });

    </script>

    <div class="container center pt-5">



        <div class="row">
            <div class="col-md-10">
                <h1>Item List</h1>

            </div>

            <div class="col-md-2">
                <div class="d-flex justify-content-end">
                    <button class="btn-md btn-primary"><a style="text-decoration:none;" class="text-light"
                            href="/stock/report">
                            <i class="fas fa-file-alt fa-md"></i>
                        </a></button>
                    <div class="pl-2">
                        <button type="button" class="btn-md btn-primary text-light">
                            <a style="text-decoration:none;" class="text-light" href="/stock/create"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <table id="itemList" class="p-auto m-auto display table table-striped table-bordered text-center"
                    style="border-collapse:collapse;">
                    <thead>

                        <tr>
                            <th>Item ID</th>
                            <th>Vendor ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Price (RM)</th>
                            <th>Quantity</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th>{{ $item->item_id }}</th>
                                <td>{{ $item->vendor_id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_brand }}</th>
                                <td>{{ $item->item_price }}</td>
                                <td>{{ $item->item_stock_qty }}</td>
                                <td>
                                    <a href="/stock/show/{{ $item->item_id }}" class="btn"><button type="button"
                                            class="btn btn-outline-primary"><i class="fas fa-cog fa-sm"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <div class="pt-2">

                                        <form action="/stock/{{ $item->item_id }}" method="POST"
                                            onsubmit="return confirm('Do you really want to delete?');">

                                            @csrf
                                            @method('DELETE')


                                            <button class="btn btn-outline-danger" type="submit"><i
                                                    class="fas fa-trash"></i></button>

                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="display:none;">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>


                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>

        </div>
    </div>







@endsection
