<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Exam wise Resutl</title>
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
                        <p>Result</p>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table table-bordered">

                <tr>
                    <th width="20%">
                        <h1>Class</h1>
                    </th>
                    <td>
                        <h1></h1>
                    </td>
                </tr>

                <tr>
                    <th width="20%">
                        <h1>Year</h1>
                    </th>
                    <td>
                        <h1></h1>
                    </td>
                </tr>


                <tr>
                    <th width="20%">
                        <h1>Exam Name</h1>
                    </th>
                    <td>
                        <h1></h1>
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
                                    <th scope="col">Id_no</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Mark</th>
                                    <th scope="col">Grade Point</th>
                                    <th scope="col">Grade Name</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Absent</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Total Present</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Total Leave</th>
                                    <td></td>
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

