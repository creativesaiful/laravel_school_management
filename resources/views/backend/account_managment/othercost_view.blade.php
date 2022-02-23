@extends('backend.layout.master')

@section('title', 'Cost List')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Other Cost List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>

                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($otherCost as $key=> $cost)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ date('d-M-y', strtotime($cost->date)) }}</td>
                                        <td>{{ $cost->description }}</td>
                                        <td>{{ $cost->amount }}</td>
                                        <td><img style="width: 80px"
                                            src="{{ url('storage/' . $cost->image) }}" alt=""> </td>



                                        <td>

                                            <a href="{{ route('othercost.edit', $cost->id) }}">Edit</a>


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
                    <h4 class="box-title">Add New Cost</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('othercost.store') }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" required>

                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" required>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" required>

                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Vouchure</label>
                            <input type="file" class="form-control" name="image" required>

                            @error('image')
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

