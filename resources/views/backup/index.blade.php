@extends ('layouts.layout')
@section('content')

    <div class="container-md p-4 pb-5 pt-5">



        <div class="row p-2 pb-3 pr-2" style="border:1px solid black;border-radius:2%" ;>

            <div class="row pb-3 pt-1 ">
                <div class="col-md-11">
                    <i class="fas fa-arrow-circle-left"></i>
                </div>
                <div class="col-md-1 ">
                    <div class="dropdown ">
                        <button class="btn btn-secondary dropdown-toggle bg-light text-dark" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort By
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Name</a></li>
                            <li><a class="dropdown-item" href="#">Stock ID</a></li>
                            <li><a class="dropdown-item" href="#">Quantity</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <h2>Stock List</h2>
            </div>
            <div class="col-md-3">

                <form class="form-inline" action="/stock/show/search">

                    <input name="search" id="search" style="width:75%;display:inline;" class="form-control" type="search"
                        placeholder="Search" aria-label="Search">
                    <button href="" class="btn btn-link btn-xs pb-2" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

            </div>
            <div class="col-md-12">

                <table class="table text-center">
                    <th>
                        <tr>

                            <th scope="col">Item ID</th>
                            <th scope="col">Vendor ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Price (RM)</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </th>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="col">{{ $item->item_id }}</th>
                                <td scope="col">{{ $item->vendor_id }}</td>
                                <td scope="col">{{ $item->item_name }}</td>
                                <td scope="col">{{ $item->item_brand }}</th>
                                <td scope="col">{{ $item->item_price }}</td>
                                <td scope="col">{{ $item->item_stock_qty }}</td>
                                <td scope="col">
                                    <a href="/stock/show/{{ $item->item_id }}" class="btn btn-success">Edit</a>
                                </td>
                                <td scope="col">
                                    <a href="#">
                                        @php
                                            echo '<form action="/stock/{{ $item->item_id }}" method="POST" onsubmit="return confirm(\'Do you really want to delete?\');">';
                                        @endphp
                                        @csrf
                                        @method('DELETE')


                                        <button class="btn btn-danger" type="submit">Delete</button>

                                        </form>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <div class="row pt-3">
                    <div class="col-md-5">
                        <button type="buttton" class="btn btn-primary text-light"><a style="text-decoration:none;"
                                class="text-light" href="/stock/create">Add
                                Stock</a></button>
                    </div>
                    <div class="col-md-3">
                        <nav aria-label="Page navigation">
                            <button class="btn">{{ $items->links() }}</button>

                        </nav>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>


        </div>

        <div class="container-md p-2">
            <div class="row p-2">

                <div class="col-md-12">

                    <br>
                    <br>
                    <br>
                </div>

            </div>

        </div>
    </div>

    </body>

@endsection
