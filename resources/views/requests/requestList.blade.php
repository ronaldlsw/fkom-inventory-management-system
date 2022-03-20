@extends ('layouts.normalPage')
@section('content')
    <div class="container pt-4">

        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <h1>Request List</h1>

                </div>
                <div class="col-md-1 d-inline">
                    <button type="buttton" class="btn-lg btn-primary text-light">
                        <a style="text-decoration:none;" class="text-light" href="/request"><i
                                class="fas fa-plus-circle fa-lg"></i></a>
                    </button>

                </div>
            </div>
        </div>
        <hr>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center">
                <table class="table table-striped">
                    <tr>
                        <td>REQUEST ID</td>
                        <td>STAFF ID</td>
                        <td>REQUEST DATE</td>
                        <td>REQUEST STATUS</td>
                        <td>ACTION</td>
                    </tr>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->req_id }}</td>
                            <td>{{ $request->staff_id }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>{{ $request->req_status }}</td>
                            <td><a href="/request/list/{{ $request->req_id }}"><button type="button"
                                        class="btn btn-outline-primary"> <i class="far fa-eye"></i>
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>


@endsection
