@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Class List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Class name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($classList as $classList)
                                    <tr>
                                        <td>{{ $classList->id }}</td>
                                        <td>{{ $classList->class_name }}</td>

                                        <td>

                                            <a href="{{ route('edit.class', $classList->id) }}">Edit</a> ||

                                            <a href="{{ route('delete.class', $classList->id) }}"
                                                class="delete">Delete</a>
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
                    <h4 class="box-title">Add New Class</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('store.class') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Class Name</label>
                            <input type="text" class="form-control" name="class_name" placeholder="Enter ...">

                            @error('class_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='add class'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
