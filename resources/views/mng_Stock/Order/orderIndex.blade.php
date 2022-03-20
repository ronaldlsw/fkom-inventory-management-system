@extends('layouts.withDatatable')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mng_Stock/mng_Stock.css') }}">
    <script type="text/javascript" src="{{ asset('js/mng_Stock/mng_Stock.js') }}"></script>

    <div class="container pt-4">
        <h2>Manage New Stock</h2>
        <hr>
        <div class="row center" style="margin-top:50px;">
            <div class="container col-md-2">
                <a href="/mngNewStck/orderCart"><button class="dt-button">Order Cart</button></a>
            </div>
            <div class="container col-md-2">
                <a href="/mngNewStck/orderRec"><button class="dt-button">Order Record</button></a>
            </div>
            <div class="container col-md-2">
                <a href="/mngNewStck/itemList"><button class="dt-button">View Item List</button></a>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row"></div>
    </div>


@endsection
