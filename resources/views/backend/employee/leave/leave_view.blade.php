@extends('backend.layout.master')

@section('title', 'Leave list')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Leave List</h3>
                    <a href="{{ route('employee.leave.add') }}" class="btn btn-success float-right">Add New Leave</a>
                </div>




                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Leave name</th>

                                    <th>ID No</th>
                                    <th>Purpose</th>

                                    <th>Start </th>
                                    <th>End</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($AllLive as $key => $leave)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $leave['UserInfo']['name']}}</td>

                                        <td>{{ $leave['UserInfo']['id_no'] }}</td>

                                        <td>{{ $leave->leave_purpose  }}</td>
                                        <td>{{ date('d M Y', strtotime($leave->start_date))}}</td>

                                        <td>{{ date('d M Y', strtotime($leave->end_date))}}</td>



                                        <td>
                                         <a href="{{ route('employee.leave.edit', $leave->id) }}" class="btn btn-warning btn-sm">Edit</a>


                                         <a href="{{route('employee.leave.delete',$leave->id)}}" class="btn btn-info btn-sm delete" >Delete</a>





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
