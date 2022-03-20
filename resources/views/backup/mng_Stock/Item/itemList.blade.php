@extends('layouts.withDatatable')

@section('content')
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            var table = $('#itemList').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api().columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                }
            });

        });

    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mng_Stock/mng_Stock.css') }}">
    <script type="text/javascript" src="{{ asset('js/mng_Stock/mng_Stock.js') }}"></script>

    <div class="container center py-2">
        <a href="javascript:window.history.back();"><i class="fas fa-arrow-circle-left fa-3x left"></i></a>
        <h3 class="center">Item List</h3>
        <hr class="hr">
    </div>
    <form action="/mngNewStck/orderCart" method="POST">
        @csrf
        <div class="container center" style="width:85%; margin-top:10px;border: 1px solid transparent; margin-left:auto;">
            <table style="width:100%; border: 0px solid white;">
                <tr>
                    <td>
                        <table id="itemList" class="display" style="border-collapse:collapse;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Brand</th>
                                    <th>Inventory Stock</th>
                                    <th>Supplier ID</th>
                                    <th>Supplier Name</th>
                                    <th>Price per Item</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td> {{ $a++ }} </td>
                                        <td> {{ $data->item_id }} </th>
                                        <td> {{ $data->item_name }} </td>
                                        <td> {{ $data->item_brand }} </td>
                                        <td> {{ $data->item_stock_qty }} </td>
                                        <td> {{ $data->vendor_id }} </td>
                                        <td> {{ $data->vendor_name }} </td>
                                        <td> {{ $data->item_price }} </td>
                                        <td> <input type="checkbox" name="item_id[]" value="{{ $data->item_id }}"> <input
                                                type="hidden" name="id" value="{{ $a++ }}"></td>
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
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
            </table>
            <button class="right btn btn-danger" type="button" style="height:30px; margin-top:20px;margin-left:5px;"
                onClick="javascript:window.history.back();">Cancel</button>
            <input class="right btn btn-primary" style="margin-top:20px;margin-left:5px;" type="submit" value="Add to Cart">
        </div>
    </form>
@endsection
