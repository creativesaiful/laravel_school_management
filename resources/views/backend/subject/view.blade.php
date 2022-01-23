@extends('backend.layout.master')

@section('title', 'Subject list')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Subject List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Subject</th>
                                    <th>Full Mark</th>
                                    <th>Pass Mark</th>
                                    <th>Subjective Mark</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($subList as $subList)
                                    <tr>
                                        <td>{{ $subList->id }}</td>
                                        <td>{{ $subList->subject }}</td>
                                        <td>{{ $subList->full_mark }}</td>
                                        <td>{{ $subList->pass_mark }}</td>
                                        <td>{{ $subList->subjective_mark }}</td>

                                        <td>

                                            <a href="{{ route('subject.edit', $subList->id) }}">Edit</a> ||

                                            <form method="post" action="{{ route('subject.destroy',$subList->id) }}">

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
                    <h4 class="box-title">Add New Subject</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('subject.store') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Subject Name</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter ..." required>

                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Full Mark</label>
                            <input type="number" class="form-control" name="full_mark" placeholder="Number" required>

                            @error('full_mark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pass Mark</label>
                            <input type="number" class="form-control" name="pass_mark"  placeholder="Number" required >

                            @error('pass_mark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Subjective Mark</label>
                            <input type="number" class="form-control" name="subjective_mark"  placeholder="Number" required>

                            @error('subjective_mark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='Add Subject'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
