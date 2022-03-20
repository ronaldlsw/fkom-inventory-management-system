@extends('layouts.normalPage')

@section('content')


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('approve.js') }}"></script>
    <div class="container pt-5">
        <div class="center">
            <h1> Request List </h1>
            <hr>
            <form action="itemApprove.blade.php" method="POST">
                @csrf
                <table class="table table-hover">
                    <tr>
                        <th>REQUEST ID</th>
                        <th>STAFF ID</th>
                        <th>STAFF NAME</th>
                        <th>REQUEST DATE</th>
                        <th>VIEW</th>
                    </tr>
                    @foreach ($staffinfo as $staff)
                        <tr>
                            <td>{{ $staff->req_id }}</td>
                            <td>{{ $staff->staff_id }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->created_at }}</td>
                            <td><a href="/item_approvals/request/{{ $staff->req_id }}"><button
                                        class="btn btn-outline-primary" type="button">
                                        <i class="far fa-eye"></i>
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
@endsection
