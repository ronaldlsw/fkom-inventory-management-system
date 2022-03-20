@extends ('layouts.normalPage')
@section('content')

    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">

    <div class="container pt-4">
        <h1>Admin Menu</h1>
        <hr>
        <div class="row pt-2">


            <div class="col-md-4">
                <div class="card " style="width: 18rem;">
                    <div><a class="bg-image hover-zoom" href="/stock"><img class="card-img-top"
                                src="https://www.unleashedsoftware.com/assets/uploads/2018/09/manufacturing-inventory.jpg"
                                alt="Card image cap"></img></a></div>

                    <div class="card-body text-center">
                        <b>Manage Stock Inventory</b>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center" style="width: 18rem;">
                    <a style="background-color:black;" href=" /mngNewStck">
                        <img style="width:180px; height:180px;" class="p-1 card-img-top"
                            src="https://booster.io/wp-content/uploads/custom-order-numbers-e1438361586475.png"
                            alt="Card image cap"></img></a>
                    <div class="card-body text-center">
                        <b class="font-weight-bold">Order New Stock</b>
                    </div>
                </div>
            </div>
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
        </div>
    </div>

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <a href="/item_approvals/userList"><img class="card-img-top"
                            src="https://www.travelweek.ca/wp-content/uploads/2015/11/11.02_news_TravelBrands-creditors-approve-plan.jpg"
                            alt="Card image cap"></img></a>
                    <div class="card-body text-center">
                        <b>Approve Items Requests</b>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card  text-center" style="width: 18rem;">
                    <a style="background-color:black;" href=" /auditreport"><img style="width:230px; height:auto;"
                            class="p-2 card-img-top" src="https://requirements.com/Portals/0/EasyDNNnews/34/img-report.png"
                            alt="Card image cap"></img></a>
                    <div class="card-body text-center">
                        <b class="font-weight-bold">Manage Audit Report</b>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection
