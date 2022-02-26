<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee Attendence Details</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <table class="table table-bordered">
                <tr>
                    <th width="50%">
                        <h1>Your School logo</h1>
                    </th>
                    <td>
                        <h1>Your School</h1>
                        <h3>School Address</h3>
                        <p>Phone: 01454658878</p>
                        <p>Email: yourschoolemail@gmail.com</p>
                        <p>Employee Attendance</p>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table table-bordered">
                <tr>
                    <th width="20%">
                        <h1>Employee Name</h1>
                    </th>
                    <td>
                        <h1>{{$allData['0']['userData']['name']}}</h1>
                    </td>
                </tr>
                <tr>
                    <th width="20%">
                        <h1>Employee ID</h1>
                    </th>
                    <td>
                        <h1>{{$allData['0']['userData']['id_no']}}</h1>
                    </td>
                </tr>
                <tr>
                    <th width="20%">
                        <h1>Month</h1>
                    </th>
                    <td>
                        <h1>{{$month}}</h1>
                    </td>
                </tr>
            </table>
        </div>
        <div class="employee-details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bd-example">
                        <table class="table table-bordered table-striped styled-table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                    <td>{{ $item->attend_status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Absent</th>
                                    <td>{{$absents}}</td>
                                </tr>
                                <tr>
                                    <th>Total Present</th>
                                    <td>{{$presents}}</td>
                                </tr>
                                <tr>
                                    <th>Total Leave</th>
                                    <td>{{$leaves}}</td>
                                </tr>
                            </tfoot>

                        </table>
                        <p style="font-size: 10px;" class="text-end"><i>Print date: {{ date("d M Y") }}</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

