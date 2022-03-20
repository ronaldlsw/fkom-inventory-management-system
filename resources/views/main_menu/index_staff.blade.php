@extends ('layouts.normalPage')
@section('content')

    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">

    <div class="container mt-3">
        <h1>Staff Menu</h1>
        <hr>
        <div class="row mt-5 pt-5">

            <div class="col-md-4"></div>

            <div class="col-md-4">
                <div class="card text-center" style="width: 18rem;">
                    <a style="background-color:white;" href=" /request/list">
                        <img style="width:180px; height:180px;" class="p-1 card-img-top"
                            src="https://static.thenounproject.com/png/2021808-200.png" alt="Card image cap"></img></a>
                    <div class="card-body text-center border-top">
                        <b class="font-weight-bold">Request Items</b>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection
