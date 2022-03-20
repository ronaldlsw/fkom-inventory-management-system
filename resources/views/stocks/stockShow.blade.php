@extends ('layouts.normalPage')
@section('content')
    <title>{{ $items->item_name }}</title>

    <body>
        <div class="container m-auto mt-5 ">
            <div class="row ">
                <div class="col-md-3  ">

                </div>
                <div class="col-md-1 ">
                    <a href="/stock"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                </div>
                <div class="col-md-4  text-center  h1">
                    <p>Edit
                    <p>

                </div>
                <div class="col-md-1   pt-2">

                </div>
                <div class="col-md-3   pt-2">

                </div>
            </div>



            <div class="row py-4    ">
                <div class="col-md-3"> </div>




                <div class="col-md-6 border rounded p-2">
                    @php
                        echo '<form action="/stock/show" method="post" onsubmit="return confirm(\'Confirm Edit To Existing Data?\');">';
                    @endphp
                    @csrf

                    <table class="table table-borderless">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity (pc)</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    <input name="item_name" id="item_name" class="form-control form-control-sm"
                                        value="{{ $items->item_name }}"></input>
                                </td>
                                <td>
                                    <input name="item_qty" id="item_qty" class="form-control form-control-sm"
                                        value="{{ $items->item_stock_qty }}"></input>
                                </td>
                            </tr>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Price (RM)</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    <input name="item_id" id="item_id" class="form-control form-control-sm"
                                        value="{{ $items->item_id }}" readonly></input>
                                </td>
                                <td>
                                    <input name="item_price" id="item_price" class="form-control form-control-sm"
                                        value="{{ $items->item_price }}"></input>
                                </td>
                            </tr>
                            <thead>
                                <tr>
                                    <th>Vendor ID</th>
                                    <th>Brand</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    <select style="width:100%" class="dropdown" id="vendor_id" name="vendor_id" required>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->vendor_id }}">
                                                {{ $vendor->vendor_id }}-{{ $vendor->vendor_name }}</option>
                                        @endforeach
                                    </select>
                                    <!--<input name="vendor_id" id="vendor_id" class="form-control form-control-sm"
                                                                                                value=""></input> -->
                                </td>
                                <td>
                                    <input name="item_brand" id="item_brand" class="form-control form-control-sm"
                                        value="{{ $items->item_brand }}"></input>
                                </td>
                            </tr>
                        </tbody>


                    </table>
                    <button type="submit" style="width:100%" class="btn btn-primary"> Update </button>
                    </form>

                </div>
                <div class="col-md-3">
                </div>

            </div>




        </div>
        </div>
    </body>


@endsection
