@extends('backend.layout.master')

@section('title', 'Salary View')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Salary List</h3>

                </div>




                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Employee name</th>
                                    <th>Designation</th>
                                    <th>ID No</th>
                                    <th>Mobile</th>


                                    <th>Gender</th>

                                    <th>Salary</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($allEmployee as $key => $emplyInfo)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $emplyInfo->name }}</td>

                                        <td>{{ $emplyInfo['designation']['name'] }}</td>
                                        <td>{{ $emplyInfo->id_no }}</td>
                                        <td>{{ $emplyInfo->phone }}</td>

                                        <td>{{ucwords( $emplyInfo->gender)}}</td>

                                        <td>{{ $emplyInfo->salary}}</td>


                                        <td>
                                         <a href="{{ route('employee.salary.increment',$emplyInfo->id) }}" class="btn btn-warning " title="Increment">
                                            <i class="fa fa-plus-circle"></i> </a>


                                         <a href="{{route('salary.details',$emplyInfo->id)}}" class="btn btn-info " title="view"><i class="fa fa-eye-slash"></i></a>





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
