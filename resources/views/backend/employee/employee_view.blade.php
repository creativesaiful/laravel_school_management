@extends('backend.layout.master')

@section('title', 'Employee list')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Employee List</h3>
                    <a href="{{ route('add.employee') }}" class="btn btn-success float-right">Add New Employee</a>
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

                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Join Date</th>
                                    <th>Salary</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($employee as $key => $emplyInfo)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $emplyInfo->name }}</td>

                                        <td>{{ $emplyInfo['designation']['name'] }}</td>
                                        <td>{{ $emplyInfo->id_no }}</td>
                                        <td>{{ $emplyInfo->phone }}</td>
                                        <td>{{ $emplyInfo->email }}</td>
                                        <td>{{ $emplyInfo->gender}}</td>
                                        <td>{{ $emplyInfo->join_date}}</td>
                                        <td>{{ $emplyInfo->salary}}</td>


                                        <td>
                                         <a href="{{ route('edit.employee',$emplyInfo->id) }}" class="btn btn-warning btn-sm">Edit</a>


                                         <a target="_blank" href="{{route('employee.details.pdf',$emplyInfo->id)}}" class="btn btn-info btn-sm">Details</a>





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
