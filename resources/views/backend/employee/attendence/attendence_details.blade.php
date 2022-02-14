@extends('backend.layout.master')

@section('title', 'Attendence list')
@section('content')


<div class="row">

    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Attendence List</h3>
                <a href="{{ route('employee.attendence.add') }}" class="btn btn-success float-right">Add New Attendence</a>
            </div>




            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>

                                <th>ID No</th>
                                <th>Date</th>

                                <th>Status </th>




                            </tr>
                        </thead>
                        <tbody id="tbody">

                            @php
                            $sl = 1;
                            @endphp

                            @foreach ($attendenceInfo as $key => $attendence)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $attendence['UserData']['name']}}</td>

                                <td>{{ $attendence['UserData']['id_no'] }}</td>
                                <td>{{ date('d M Y', strtotime($attendence->date))}}</td>
                                <td>{{ $attendence->attend_status }}</td>








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
