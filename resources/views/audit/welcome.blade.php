@extends ('layouts.normalPage')
@section('content')


    <!DOCTYPE html>
    <html>
    <style>
        table,

        td {
            padding: 8px;
            border: 1px solid black;
            border-collapse: collapse;
            style="border-collapse:collapse;">
        }

    </style>

    <body>
        <div class="container pt-5">
            <div class="row">
                <h1>Audit Report</h1>

                <hr style="width:97%">
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Audit Report Number</th>
                            <th>Months</th>
                            <th> Year</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditreport as $Audits)
                            <tr>
                                <th scope="col">{{ $a++ }}</th>
                                <td scope="col">{{ $Audits->audit_id }}</td>
                                <td scope="col">{{ $Audits->months }}</td>
                                <td scope="col">{{ $Audits->year }}</td>
                                <td scope="col">
                                    <a href="auditreport/view/{{ $Audits->audit_id }}"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tr>


                </table>

                </form>
            </div>
        </div>
    </body>

    </html>
@endsection
