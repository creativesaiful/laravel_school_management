@extends('backend.layout.master')

@section('title', 'Group list')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Group List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Group name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($groupList as $groupList)
                                    <tr>
                                        <td>{{ $groupList->id }}</td>
                                        <td>{{ $groupList->group_name }}</td>

                                        <td>

                                            <a href="{{ route('edit.group', $groupList->id) }}">Edit</a> ||

                                            <a href="{{ route('delete.group', $groupList->id) }}"
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
                    <h4 class="box-title">Add New Group</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('store.group') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" class="form-control" name="group_name" placeholder="Enter ...">

                            @error('group_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='Add Group'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
