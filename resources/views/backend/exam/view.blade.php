@extends('backend.layout.master')

@section('title', 'Exam list')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Exam List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Exam name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($examInfo as $examInfo)
                                    <tr>
                                        <td>{{ $examInfo->id }}</td>
                                        <td>{{ $examInfo->exam_name }}</td>

                                        <td>

                                            <a href="{{ route('exam.edit', $examInfo->id) }}">Edit</a> ||

                                            <form method="post" action="{{ route('exam.destroy', $examInfo->id) }}">

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

        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add New Exam</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('exam.store') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Exam Name</label>
                            <input type="text" class="form-control" name="exam_name" placeholder="Enter ...">

                            @error('exam_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='Add Exam'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
