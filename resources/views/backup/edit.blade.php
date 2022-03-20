@extends ('layouts.normalPage')
@section('content')
    <title>{{ $items->item_name }}</title>

    <body>
        <div class="container text-right m-auto mt-5 ">
            <div class="row ">
                <div class="col-md-3 border ">

                </div>
                <div class="col-md-1 border">
                    <a href="/stock"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                </div>
                <div class="col-md-4 border text-center pt-2">
                    <b>View / Edit</b>

                </div>
                <div class="col-md-1 border  pt-2">
                    <button type="button" class="btn btn-primary"><i class="fas fa-sliders-h"></i></button>
                </div>
                <div class="col-md-3 border  pt-2">

                </div>
            </div>



            <div class="row py-4    ">
                <div class="col-md-3"> </div>




                <div class="col-md-6 border rounded">
                    <form>

                        <table class="table">
                            <tbody>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity (pc)</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <input class="form-control form-control-sm"
                                            value="{{ $items->item_name }}"></input>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm"
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
                                        <input class="form-control form-control-sm" value="{{ $items->item_id }}"></input>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm"
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
                                        <input class="form-control form-control-sm"
                                            value="{{ $items->vendor_id }}"></input>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm"
                                            value="{{ $items->item_brand }}"></input>
                                    </td>
                                </tr>
                            </tbody>


                        </table>
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </form>

                </div>
                <div class="col-md-3">
                </div>

            </div>




        </div>
        </div>
    </body>


@endsection
