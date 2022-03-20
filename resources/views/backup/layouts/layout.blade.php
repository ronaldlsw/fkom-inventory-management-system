<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('js/request.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/34ae9aae12.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/b-1.7.0/datatables.min.css" />
    <!--<link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" /> -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/b-1.7.0/datatables.min.js">
    </script>

    <style>


    </style>
    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">



                    <div class="navbar">
                        <a class="navbar-brand" href="#"><i class="fas fa-box-open"></i> FIMS</a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Stock Inventory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Item Approval </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New Stocks </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Audit Report</a>
                            </li>
                        </ul>

                    </div>
            </div>
            <div class="col-md-3 pt-3 text-right">
            </div>
            <div class="col-md-1 pt-3 ">
                <button type="button" class="btn btn-danger">Logout</button>
            </div>
            </nav>
        </div>
    </div>

</head>

<body>
    @yield ('content')
</body>

<footer id="footer" class="footer text-light bg-dark font-small fixed-bottom">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright Nova 2021. All rights reserved.</p>



            </div>
        </div>

    </div>



</footer>

</html>
