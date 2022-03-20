@extends ('layouts.normalPage')
@section('content')

    {{-- <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 9px;
            text-align: left;
        }

        .center {
            margin: 0;
            position: absolute;
            top: 74%;
            left: 40%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

    </style> --}}

    <div class="container  pt-3">
        <div class="row">
            <div class="col-md-1">

                <a href="/auditreport">
                    <i class="fas fa-arrow-circle-left fa-3x d-inline"></i>
                </a>


            </div>
            <div class="col-md-10">
                <h2 class="text-center">Audit Report Details</h2>
            </div>
            <div class="col-md-1">

            </div>

        </div>


        <div class="row pt-3">
            <div class="col-md-12">
                <table class="table table-bordered" style="width:70%">
                    <tr>

                        <th>Audit Id</th>
                        <th>staff Id </th>
                        <th>Order Id</th>

                    </tr>

                    <tr>
                        @foreach ($auditDetails as $Audit_details)
                            <td>{{ $Audit_details->audit_id }}</td>
                            <td>{{ $Audit_details->staff_id }}</td>
                            <td>{{ $Audit_details->order_id }}</td>
                        @endforeach
                    </tr>


                </table>
            </div>
        </div>

        <div class="row pt-2">

            <div class="col-md-12">

                <tr>
                    <td>
                        <table class="table table-bordered" style="width:100%">
                            <tr>
                                <th>No</th>
                                <th>order_qty</th>
                                <th>item_id</th>
                                <th>item_price</th>
                                <th>total_price</th>
                                <th>vendor_company</th>
                            </tr>
                            @foreach ($detaa as $deta)
                                <tr>
                                    <td>{{ $a++ }}</td>
                                    <td>{{ $deta->order_qty }}</td>
                                    <td>{{ $deta->item_id }}</td>
                                    <td>{{ $deta->item_price }}</td>
                                    <td>{{ $deta->item_total_price }}</td>
                                    <td>{{ $deta->vendor_company }}</td>

                                </tr>
                            @endforeach
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <div class="center">
                    <button class="btn btn-primary" onclick="window.print()">Print This Page</button>

                    <a href="/auditreport"><i class="btn btn-primary">Save</i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>







@endsection
