@extends('backend.layout.master')

@section('title', 'Grade list')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Grade List</h3>
                    <a href="{{route('grade.add')}}" class="btn btn-success float-right">Add New Grade</a>
                </div>




                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width='5%'>SL</th>
                                    <th>Grade name</th>
                                    <th>Grade Point</th>


                                    <th>Start Marks</th>
                                    <th>End Marks</th>
                                    <th>Point Range</th>
                                    <th>Remark</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($grade as $key => $grade)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $grade->grade_name }}</td>
                                        <td>{{ $grade->grade_point }}</td>
                                        <td>{{ $grade->start_mark }}</td>
                                        <td>{{ $grade->end_mark }}</td>
                                        <td>{{ $grade->start_point.'-'.$grade->end_point }}</td>






                                        <td>{{$grade->remark}} </td>

                                        <td>

                                         <a href="{{ route('grade.edit',$grade->id) }}" class="btn btn-warning btn-sm">Edit</a>


                                         <a href="{{route('grade.delete',$grade->id)}}" class="btn btn-success btn-sm delete">Delete</a>






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
