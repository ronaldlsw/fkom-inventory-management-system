@extends ('layouts.normalPage')
@section('content')




    <script type="text/javascript">
        // Load the Visualization API and the controls package.
        google.charts.load('current', {
            'packages': ['corechart', 'controls']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawDashboard);
        google.charts.setOnLoadCallback(drawLowChart);

        // Callback that creates and populates a data table,
        // instantiates a dashboard, a range slider and a pie chart,
        // passes in the data and draws it.
        function drawLowChart() {

            // Create the data table
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Item');
            data.addColumn('number', 'Quantity');
            data.addRows([
                @foreach ($items2 as $item2)
                    ['{{ $item2->item_name }}', {{ $item2->item_stock_qty }}],
                @endforeach
            ]);

            // Set options bar chart.
            var options = {
                title: 'Items Low in Stock',
                width: 400,
                height: 220
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.BarChart(document.getElementById('low_stock_chart'));
            chart.draw(data, options);
        }


        function drawDashboard() {

            // Create our data table.
            var data = google.visualization.arrayToDataTable([
                ['Brand', 'Amount'],
                @foreach ($items as $item)
                    ['{{ $item->item_brand }}', {{ $item->sum }}],
                @endforeach
            ]);

            // Create a dashboard.
            var dashboard = new google.visualization.Dashboard(
                document.getElementById('dashboard_div'));

            // Create a range slider, passing some options
            var donutRangeSlider = new google.visualization.ControlWrapper({
                'controlType': 'NumberRangeFilter',
                'containerId': 'filter_div',
                'options': {
                    'filterColumnLabel': 'Amount'
                }
            });

            // Create a pie chart, passing some options
            var pieChart = new google.visualization.ChartWrapper({
                'chartType': 'PieChart',
                'containerId': 'chart_div',
                'options': {
                    'width': 400,
                    'height': 200,
                    'pieSliceText': 'value',
                    'legend': 'right'
                }
            });



            // Establish dependencies, declaring that 'filter' drives 'pieChart',
            // so that the pie chart will only display entries that are let through
            // given the chosen slider range.
            dashboard.bind(donutRangeSlider, pieChart);

            // Draw the dashboard.
            dashboard.draw(data);
        }

    </script>


    <title> Create </title>
    <div class="container pt-3">
        <div class="row ">

            <div class="col-md-4 ">
                <button type="button" class="btn"> <a href="/stock">
                        <i class="fas fa-arrow-circle-left fa-3x"></i></a></button>
            </div>
            <div class="col-md-4 text-center pt-2">
                <h1>Report</h1>

            </div>
            <div class="col-md-1  pt-2">

            </div>
            <div class="col-md-3  pt-2">
            </div>
        </div>
        <hr>
    </div>
    <div class="container  pt-3">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card  h-100">
                    <div class="card-header">
                        <h3> Brands </h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center text-center">

                            {{-- Div for chart --}}
                            <div id="dashboard_div">
                                <div id="filter_div"></div>
                                <div id="chart_div"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 ">
                <div class="card  h-100">
                    <div class="card-header">
                        <h3> Low Stock </h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center text-center">
                            {{-- Div for low stock chart --}}
                            <div id="low_stock_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3 pb-5">

        <div class="row">
            <div class="col-md-12 ">
                <div class="card  h-100">
                    <div class="card-header">
                        @foreach ($items3 as $item3)
                            <h3>Latest Order (Restocks)</h3>
                        @break
                        @endforeach

                    </div>

                    <div class="card-body">

                        <div class="card d-inline-block text-light px-2"
                            style="width:40%;background-color:rgb(40, 171, 84);">

                            <table>
                                @foreach ($items3 as $item3)
                                    <tr>
                                        <td style="width:55%;"><b>Order ID</b> : {{ $item3->order_id }}</td>
                                        <td><b>Total Price</b> : RM {{ $item3->total_price }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Staff ID</b> : {{ $item3->staff_id }}</td>
                                        <td><b>Date</b> : {{ $item3->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b> : {{ $item3->order_status }}</td>
                                    </tr>
                                @break
                                @endforeach

                            </table>
                        </div>
                        <div class="d-flex justify-content-center text-center pt-2">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($items3 as $item3)
                                        <tr>
                                            <td>{{ $item3->item_id }}</td>
                                            <td>{{ $item3->item_name }}</td>
                                            <td>{{ $item3->item_price }}</td>
                                            <td>{{ $item3->order_qty }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>






@endsection
