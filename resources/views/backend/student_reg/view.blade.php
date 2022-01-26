@extends('backend.layout.master')

@section('title', 'Student list')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student List</h3>
                    <a href="{{route('student.create')}}" class="btn btn-success float-right">Regiater New Student</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Student name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($stuInfo as $stuInfo)
                                    <tr>
                                        <td>{{ $stuInfo->id }}</td>
                                        <td>{{ $stuInfo->name }}</td>

                                        <td>

                                            <a href="{{ route('shift.edit', $stuInfo->id) }}">Edit</a> ||

                                            <form method="post" action="{{ route('shift.destroy', $stuInfo->id) }}">

                                                @csrf
                                                @method('DELETE')

                                                <input type="submit" value="delete" class="del_data">

                                            </form>


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
