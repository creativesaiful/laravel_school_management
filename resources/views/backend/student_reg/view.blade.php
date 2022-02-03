@extends('backend.layout.master')

@section('title', 'Student list')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student List</h3>
                    <a href="{{ route('student.create') }}" class="btn btn-success float-right">Regiater New Student</a>
                </div>




                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Student name</th>
                                    <th>ID No</th>


                                    <th>Class</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($stuInfo as $key => $stuInfo)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $stuInfo['student']['name'] }}</td>
                                        <td>{{ $stuInfo['student']['id_no'] }}</td>
                                        <td>{{ $stuInfo['student_class']['class_name'] }}</td>
                                        <td>{{ $stuInfo->roll }}</td>
                                        <td>{{ $stuInfo['student_year']['year'] }}</td>






                                        <td><img style="width: 80px"
                                                src="{{ url('storage/' . $stuInfo['student']['image']) }}" alt=""> </td>

                                        <td>

                                         <a href="{{ route('student.edit',$stuInfo->id) }}" class="btn btn-warning btn-sm">Edit</a>


                                         <a href="{{route('student.promotion',$stuInfo->id)}}" class="btn btn-success btn-sm">Promotion</a>

                                         <a target="_blank" href="{{route('student.details.pdf',$stuInfo->student_id)}}" class="btn btn-info btn-sm">Details</a>




                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>


    </div>




@endsection
