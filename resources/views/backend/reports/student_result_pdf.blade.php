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
                        <h1> {{ $allData[0]['classinfo']['class_name'] }} </h1>
                    </td>
                </tr>

                <tr>
                    <th width="20%">
                        <h1>Year</h1>
                    </th>
                    <td>
                        <h1>{{ $allData[0]['yearinfo']['year'] }} </h1>
                    </td>
                </tr>


                <tr>
                    <th width="20%">
                        <h1>Exam Name</h1>
                    </th>
                    <td>
                        <h1>{{ $allData[0]['examinfo']['exam_name'] }}</h1>
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
                                    <th width='40px'>Sl</th>
                                    <th scope="col">Id_no</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Mark</th>
                                    <th scope="col">Grade Point</th>
                                    <th scope="col">Grade Name</th>

                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($allData as $stu => $data)
                                    <tr>

                                        <td>{{ $stu+ 1 }}</td>
                                        <td>{{ $data->studentInfo['id_no'] }}</td>
                                        <td>{{ $data->studentInfo['name'] }}</td>

                                        @php

                                            $id_no = $data->studentInfo['id_no'];
                                            $year_id = $data->year_id;
                                            $class_id = $data->class_id;
                                            $exam_id = $data->exam_id;

                                            $fail_count = \App\Models\StudentMarks::where('year_id', $year_id)
                                                ->where('class_id', $class_id)
                                                ->where('exam_id', $exam_id)
                                                ->where('id_no', $id_no)
                                                ->where('marks', '<', 33)
                                                ->get()
                                                ->count();

                                            $totalNumber = \App\Models\StudentMarks::where('year_id', $year_id)
                                                ->where('class_id', $class_id)
                                                ->where('exam_id', $exam_id)
                                                ->where('id_no', $id_no)
                                                ->sum('marks');

                                            $allMarks = \App\Models\StudentMarks::with(['studentInfo', 'classinfo', 'assignstu', 'subjectinfo', 'yearinfo', 'examinfo'])
                                                ->where('year_id', $year_id)
                                                ->where('class_id', $class_id)
                                                ->where('exam_id', $exam_id)
                                                ->where('id_no', $id_no)
                                                ->get();

                                            $allGrade = \App\Models\GradeSystem::all();

                                            $total_marks = 0;
                                            $total_grade_point = 0;
                                            $subNo = 0;

                                            foreach ($allMarks as $key => $SingleMark) {
                                                $total_marks += $SingleMark->marks;

                                                $subNo = $subNo + 1;

                                                $gradeRow = App\Models\GradeSystem::where([['start_mark', '<=', (int) $SingleMark->marks], ['end_mark', '>=', (int) $SingleMark->marks]])->first();

                                                $total_grade_point = $total_grade_point + $gradeRow->grade_point;
                                            }

                                            $gpa = (float) $total_grade_point / $subNo;

                                            $pointRow = App\Models\GradeSystem::where([['start_point', '<=', (int) $gpa], ['end_point', '>=', (int) $gpa]])->first();

                                        @endphp
                                        <td>{{ $total_marks }}</td>
                                        <td >

                                            @if ($fail_count > 0)
                                                Fail
                                            @else
                                                {{ number_format($gpa, 2, '.', '') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($fail_count > 0)
                                                Fail
                                            @else
                                                {{ $pointRow->grade_name }}
                                            @endif
                                        </td>
                                        <td class="status">
                                            @if ($fail_count > 0)
                                                Fail
                                            @else
                                                Pass
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>Total Examinee</th>
                                    <td id="total_examinee"></td>
                                </tr>
                                <tr>
                                    <th>Total Pass</th>
                                    <td id="total_pass"></td>
                                </tr>
                                <tr>
                                    <th>Total Fail</th>
                                    <td id="total_fail"></td>
                                </tr>
                            </tfoot> --}}

                        </table>
                        <p style="font-size: 10px;" class="text-end"><i>Print date: {{ date('d M Y') }}</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

{{-- <script>
    $(document).ready(function () {
       var status = $('.status').text();
         var total_examinee = $('.status').length;

         $("#total_examinee").text(total_examinee);
         $fail = $('.status:contains("Fail")').length;
         $pass = $('.status:contains("Pass")').length;

            $("#total_fail").text($fail);
            $("#total_pass").text($pass);
    });
</script> --}}

</html>
