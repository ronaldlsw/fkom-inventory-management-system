@extends('layouts.normalPage')
@section('content')
    <div class="container">
        <div class="row d-block">
            <div class="col-md-1"> <button type="button" class="btn"> <a href="/request/list">
                        <i class="fas fa-arrow-circle-left fa-3x"></i></a></button></div>
            <div class="col-md-12">
                <h1>{{ $reqid }} Item List</h1>
                <hr>
            </div>


        </div>

        <form action="/request/list/update/{{ $reqid }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="item_list">
                        <tr>

                            <th>Request item</th>
                            <th>Item id</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($requests as $request)

                            <tr>

                                <td>{{ $request->item_name }}</td>
                                <td>{{ $request->item_id }} <input type="hidden" name="item_id[]"
                                        value="{{ $request->item_id }}">
                                    <input type="hidden" name="req_id" value="{{ $request->req_id }}">
                                </td>
                                <td><input type="number" id="req_qty[{{ $a }}]" name="req_qty[]"
                                        value="{{ $request->req_qty }}" name="black" min="0" max="5"
                                        onchange="updateValue({{ $a++ }})"></td>
                                @if ($request->req_status == 'Approved')

                                    <td>Unable to Delete</td>

                                @else
                                    <td><a href="/request/list/delete/{{ $request->req_id }}/{{ $request->item_id }}"><button
                                                type="button" class="btn btn-danger"
                                                onclick="return confirm('Delete item?');">Delete</button></a></td>


                                @endif


                            </tr>

                        @endforeach


                    </table>

                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Quantity</button>
        </form>
        @foreach ($requests as $request)
            @if ($request->req_status == 'Approved')
            @break
        @else

        @break
        @endif
        @endforeach

    </div>

@endsection
