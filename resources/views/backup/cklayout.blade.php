<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/34ae9aae12.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://www.datatables.net/media/css/site-examples.css?_=0602f7ec58abe00302963423bf7a8d5a">

    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://www.datatables.net/examples/resources/demo.js"></script>
</head>
<body>
    <header>
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
    </header>
    <body>
    @yield('content')
    </body>
    <footer class="footer text-light bg-dark font-small fixed-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright Nova 2021. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>