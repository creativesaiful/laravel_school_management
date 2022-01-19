@extends('backend.layout.master')

@section('title', 'Group list')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Year List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Year</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($yearList as $yearList)
                                    <tr>
                                        <td>{{ $yearList->id }}</td>
                                        <td>{{ $yearList->year }}</td>

                                        <td>

                                            <a href="{{ route('edit.year', $yearList->id) }}">Edit</a> ||

                                            <a href="{{ route('delete.year', $yearList->id) }}"
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
                    <h4 class="box-title">Add New Year</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('store.year') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Year Name</label>
                            <input type="text" class="form-control" name="year" placeholder="Enter ...">

                            @error('year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='Add Year'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
