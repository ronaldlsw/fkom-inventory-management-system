@extends('layouts.withDatatable')

@section('content')
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            var table = $('#orderRec').DataTable({
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

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <a href="/mngNewStck/"><i class="fas fa-arrow-circle-left fa-3x left"></i></a>
                <h3 class="center pt-1 pr-2">Order Record</h3>
                <hr class="hr">
            </div>
        </div>

    </div>
    <div class="container" style="margin-top:10px;border: 1px solid transparent;">
        <table style="width:100%; border: 0px solid white;">

            <tr>
                <table id="orderRec" class="display" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Order ID</th>
                            <th>Staff ID</th>
                            <th>Staff Name</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Ordered At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td> {{ $data->id }} </td>
                                <td> {{ $data->order_id }} </td>
                                <td> {{ $data->staff_id }} </td>
                                <td> {{ $data->name }} </td>
                                <td> {{ $data->total_price }} </td>
                                <td> {{ $data->order_status }} </td>
                                <td> {{ $data->created_at }} </td>
                                <td> {{ $data->updated_at }} </td>
                                <td class="px-2">
                                    <div class="text-center"> <a
                                            href="/mngNewStck/orderRec/{{ $data->order_id }}"><button
                                                class="btn btn-outline-primary d-inline" type="button"
                                                style="width:40px;"><i class="far fa-eye"></i></button></a>
                                        <a href="/mngNewStck/orderRec/{{ $data->order_id }}/update/"><button
                                                class="btn btn-outline-success d-inline" type="button"
                                                style="width:40px;"><i class="far fa-check-circle"></i></button></a>
                                    </div>
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
                        </tr>
                    </tfoot>
                </table>
            </tr>
        </table>
    </div>
    <div class="container">
        <a href="/mngNewStck/"><button class="btn btn-success" type="button"
                style="width:100%; height:30px; margin-top:20px;">OK</button></a>
    </div>

@endsection
