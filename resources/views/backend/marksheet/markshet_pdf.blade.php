@extends('backend.layout.master')

@section('title', 'Marksheet Generate')

@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
@section('content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Marksheet</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            Your School Logo
                        </div>
                        <div class="col-md-6">
                            <h4>Your School</h4>
                            <p>
                                <strong>Address:</strong>
                                <br>
                                <strong>Phone:</strong>
                                <br>
                                <strong>Email:</strong>
                                <br>
                                <strong>Academic Transcript</strong>
                                <br>
                                <strong></strong>
                                <br>
                            </p>
                            <h5></h5>
                        </div>
                    </div>
                    <hr>
                    <p style="text-align: right;"><i>Print Date: </i>{{ date('d M Y') }}</p>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">

                                <tr>
                                    <td>Exam Name</td>
                                    <td>{{$allMarks[0]['examinfo']['exam_name']}}</td>
                                </tr>

                                <tr>
                                    <td>Student ID</td>
                                    <td>{{$allMarks[0]['id_no']}}</td>
                                </tr>
                                <tr>
                                    <td>Student Name</td>
                                    <td>{{$allMarks[0]['studentInfo']['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Class</td>
                                    <td>{{$allMarks[0]['classinfo']['class_name']}}</td>
                                </tr>
                                <tr>
                                    <td>Roll</td>
                                    <td>{{$allMarks[0]['assignstu']['roll']}}</td>
                                </tr>
                                <tr>
                                    <td>Session</td>
                                    <td>{{$allMarks[0]['yearinfo']['year']}}-{{$allMarks[0]['yearinfo']['year']+1}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <thead>

                                    <th>Letter Grade</th>
                                    <th>Marks Interval</th>
                                    <th>Grade Point</th>

                                </thead>
                                <tbody>

                                    @foreach ($allGrade as $grade)
                                    <tr>
                                        <td>{{$grade->grade_name}}</td>
                                        <td>{{$grade->start_mark}}-{{$grade->end_mark}}</td>
                                        <td>{{$grade->start_point}}-{{$grade->end_point}}</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Sl</th>
                                    <th>Subject</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
                                    <th>Obtained Marks</th>
                                    <th>Grade</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>


                                    @foreach ($allMarks as $key=> $subject)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$subject['subjectinfo']['subject']}}</td>
                                        <td>{{$subject['subjectinfo']['full_mark']}}</td>
                                        <td>{{$subject['subjectinfo']['pass_mark']}}</td>
                                        <td>{{$subject->marks}}</td>



                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right;">Total Marks</td>
                                        <td></td>
                                        <td colspan="" style="text-align: right;">Total Grade Point</td>
                                        <td></td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table">

                                <tr>
                                    <td>Result</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>GPA</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Letter Grade</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Total Marks</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <hr style="border: solid 1px; margin-bottom: -2px">
                            <div class="text-center">Teacher</div>
                        </div>
                        <div class="col-md-4">
                            <hr style="border: solid 1px; margin-bottom: -2px">
                            <div class="text-center">Parents</div>
                        </div>
                        <div class="col-md-4">
                            <hr style="border: solid 1px; margin-bottom: -2px">
                            <div class="text-center">Principal</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
