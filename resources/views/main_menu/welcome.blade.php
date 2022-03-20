@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row text-center">

            <div class="col-md-12 text-center align-center pb-5 pr-5 pl-5">
                <h1>FKOM Inventory Management System (FIMS)</h1>
                <hr>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="container pb-5 pr-5 pl-5">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block h-30 w-auto"
                                    src="https://news.ump.edu.my/sites/default/files/styles/large/public/articles/FKOM.jpg?itok=bFQwFSUt"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block h-30 w-auto"
                                    src="https://assets.nst.com.my/images/articles/UMP_Tvet-MS1611_NSTfield_image_socialmedia.var_1573879246.jpg"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block h-30 w-auto"
                                    src="https://assets.nst.com.my/images/articles/umpcovNA_NSTfield_image_socialmedia.var_1584354858.jpg"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
