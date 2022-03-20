@extends ('layouts.normalPage')
@section('content')

    <body>

        <title> Create </title>
        <div class="container">
            <div class="row ">
                <div class="col-md-3 ">

                </div>
                <div class="col-md-1">
                    <button type="button" class="btn"> <a href="/stock">
                            <i class="fas fa-arrow-circle-left fa-3x"></i></a></button>
                </div>
                <div class="col-md-4 text-center pt-2">
                    <h1>Add Item</h1>

                </div>
                <div class="col-md-1  pt-2">

                </div>
                <div class="col-md-3  pt-2">

                </div>

            </div>
            <form action="/stock" method="post">
                @csrf
                <div class="row py-4">

                    <div class="col-md-3"> </div>

                    <div class="col-md-6 border rounded">

                        <table class="table table-borderless table">
                            <tbody>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <input name="item_name" type="text" class="form-control form-control-sm"
                                            id="item_name" placeholder="Enter Item Name" required></input>
                                    </td>
                                    <td>
                                        <input name="item_qty" type="number" class="form-control form-control-sm"
                                            id="item_qty" placeholder="Enter Item Quantity" required></input>
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th>Vendor ID</th>
                                        <th>Price (RM)</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <select id="vendor_id" name="vendor_id" required>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->vendor_id }}">
                                                    {{ $vendor->vendor_id }}-{{ $vendor->vendor_name }}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>
                                        <input name="item_price" type="text" class="form-control form-control-sm"
                                            id="item_price" placeholder="Enter Item Price" required></input>
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Item ID</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <input name="item_brand" type="text" class="form-control form-control-sm"
                                            id="item_brand" placeholder="Enter Item Brand" required></input>
                                    </td>
                                    <td>
                                        <input name="item_id" type="text" class="form-control form-control-sm" id="item_id"
                                            placeholder="Enter Item ID" value="{{ $itemid }}" readonly></input>
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row border">
                    <div class="col-md-3 "></div>
                    <div class="col-md-6 ">

                        <button type="submit" style="width:100%" class="btn-block btn-primary">Save</button>
                    </div>

                    <div class="col-md-3 "></div>
                </div>
            </form>
        </div>


    @endsection
