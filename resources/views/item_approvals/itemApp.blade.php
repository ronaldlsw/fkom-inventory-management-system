@extends('layouts.normalPage')
@section('content')

    <?php $b = 0; ?>
    <script></script>

    <style>
        /*body*/
        .center {
            margin: auto;
            width: auto;
            padding: 10px;
        }

        /*css for staff info*/
        body {
            overflow: scroll;
            /* Show scrollbars */
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: left;
            background-color: #f1f1f1;
        }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>


    <body>
        <div class="container pt-5">
            <div class="center">
                @foreach ($request as $data)
                    <form action="/item_approvals/userList/{{ $data->req_id }}" method="POST">
                @endforeach
                @csrf
                <h5>Staff Information:</h5>
                <div class="row">
                    <div class="column">
                        <div class="card">
                            @foreach ($request as $data)
                                Your name is : {{ $data->name }}
                                <br>

                                Your ID : {{ $data->staff_id }}
                                <br>

                                Request date :{{ $data->created_at }}
                                <br>

                                Request time :{{ $data->created_at }}
                                <br>
                                Request Status : {{ $data->req_status }}
                            @endforeach
                            <br>
                        </div>
                    </div>
                </div>
                <br>
                <h5>Cart:</h5>
                <table class="table table-hover" id="item_list">
                    <tr>
                        <th>No</th>
                        <th>Request item</th>
                        <th>Item id</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $a }}</td>
                            <td>{{ $data->item_name }}</td>
                            <td>{{ $data->item_id }} <input type="hidden" name="item_id[]" value="{{ $data->item_id }}">
                                <input type="hidden" name="req_id" value="{{ $data->req_id }}">
                            </td>
                            <td><input type="number" id="req_qty[{{ $a }}]" name="req_qty[]"
                                    value="{{ $data->req_qty }}" name="black" min="0" max="5"
                                    onchange="updateValue({{ $a++ }})"></td>
                            <td><a href="/item_approvals/req/{{ $data->req_id }}/{{ $data->item_id }}"><button
                                        type="button" class="btn btn-outline-danger"
                                        onclick="return confirm('Do you really want to delete?');">Delete</button></a></td>
                            <?php $b = $b + $data->req_qty; ?>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3">
                            <center><b>Total Quantity:</b></center>
                        </td>
                        <td>
                            <p id="total" name="total"><?php echo $b; ?></p>
                        </td>
                        <td></td>
                    </tr>
                </table>

                <br>
                <input type="submit" class="btn btn-success col-md-12 text-center" value="SAVE">
                <br><br><br>
                </form>
            </div>
        </div>
    @endsection
