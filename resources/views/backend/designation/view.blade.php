@extends('backend.layout.master')

@section('title', 'Exam list')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Designation</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Designation Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($desigInfo as $desigInfo)
                                    <tr>
                                        <td>{{ $desigInfo->id }}</td>
                                        <td>{{ $desigInfo->name }}</td>

                                        <td>

                                            <a href="{{ route('designation.edit', $desigInfo->id) }}">Edit</a> ||

                                            <form method="post" action="{{ route('designation.destroy', $desigInfo->id) }}">

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
                    <h4 class="box-title">Add New Designation</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('designation.store') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Designation Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter ...">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='Add'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
