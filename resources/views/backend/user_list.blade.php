@extends('backend.layout.master')

@section('title', 'user list')
@section('content')

    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All User List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alluser as $alluser)
                                    <tr>
                                        <td>{{ $alluser->id }}</td>
                                        <td>{{ $alluser->name }}</td>
                                        <td>{{ $alluser->email }}</td>
          <td><img style="width: 80px; height:80px" src="{{url($alluser->profile_photo_url)}}" alt=""></td>
                                        <td>{{ $alluser->phone }}</td>




                                        <td>

                                            <form action="{{ route('role.update') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $alluser->id }}" name="id">

                                                <select name="role">
                                                    <option value="admin" {{ $alluser->role == 'admin' ? 'selected' : '' }}>
                                                        Admin</option>
                                                    <option value="operator" {{ $alluser->role == 'operator' ? 'selected' : '' }}>
                                                        Operator</option>
                                                    <option value="user"
                                                        {{ $alluser->role == 'user' ? 'selected' : '' }}>User
                                                    </option>

                                                </select>

                                                <input type="submit" value="update" class="btn btn-sm btn-info">





                                            </form>

                                        </td>
                                        <td>


                                            <a href="{{route('delete.user',$alluser->id )}}" class="delete">Delete</a>
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
    <!-- /.box -->



@endsection
