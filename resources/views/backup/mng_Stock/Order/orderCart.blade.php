@extends('layouts.withDatatable')

@section('content')

    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#orderCartTable').DataTable();

        });

    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mng_Stock/mng_Stock.css') }}">
    <script type="text/javascript" src="{{ asset('js/mng_Stock/mng_Stock.js') }}"></script>

    <div class="container pt-5" style="width:85%;">
        <div class="container">
            <a href="/mngNewStck/"><i class="fas fa-arrow-circle-left fa-3x left"></i></a></a>
            <h3 class="center pt-1">Order Cart</h3>
            <hr class="hr">
        </div>

        <form name="order_form" id="order_form" action="/mngNewStck/orderRec" method="POST">
            @csrf
            <div class="container" style="width:100%; margin-top:10px; border: 1px solid transparent;">
                <table style="width:100%; border: 0px solid white;">

                    <tr>
                        <td>
                            <table id="orderCartTable" class="display" style="border-collapse:collapse;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Price Per Item</th>
                                        <th>Stock Quantity</th>
                                        <th>Order Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td> {{ $a }} </td>
                                            <td> {{ $data->item_id }} <input type="hidden" name="item_id[]"
                                                    value="{{ $data->item_id }}"> </td>
                                            <td> {{ $data->item_name }} </td>
                                            <td> {{ $data->vendor_id }} </td>
                                            <td> {{ $data->vendor_name }} </td>
                                            <td> {{ $data->item_price }} <input type="hidden"
                                                    id="item_price[{{ $a }}]" name="item_price[]"
                                                    value="{{ $data->item_price }}"></td>
                                            <td> {{ $data->item_stock_qty }} </td>
                                            <td> <input type="number" id="order_qty[{{ $a }}]"
                                                    name="order_qty[]" style="width:90px;"
                                                    onchange="calcPrice('{{ $a }}')" required> </td>
                                            <td> <input type="number" id="item_total_price[{{ $a++ }}]"
                                                    name="item_total_price[]" style="width:90px;" readonly> </td>
                                            <td> <a href="/mngNewStck/delCartItem/{{ $data->item_id }}"
                                                    method="post"><button type="button" class="btn btn-outline-danger"
                                                        onclick="return confirm('Do you really want to delete?');">Delete</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="display:none;">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container pt-3">
                <div class="container" style="">
                    <a href="/mngNewStck/itemList"><button class="left btn btn-primary" type="button"
                            style="height:40px; width:130px;font:16px black;">Add Item</button></a>
                </div>
                <div class="container col-md-6" style="float:right;;">
                    <div class="right" style=" margin-bottom:10px; font-size:15px;">
                        <label for="totalPrice">Overall Total Price: RM</label>
                        <input type="number" id="totalPrice" name="totalPrice" readonly>
                    </div>
                    <br><br><br>
                    <a href="/mngNewStck/"><button class="right btn btn-danger" type="button"
                            style="height:30px;margin-left:5px;">Cancel</button></a>
                    <input type="submit" id="form_submit" class="right btn btn-primary" value="Order"></input>
                </div>
            </div>
        </form>
    </div>




@endsection
