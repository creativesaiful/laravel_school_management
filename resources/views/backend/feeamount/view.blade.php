@extends('backend.layout.master')

@section('title', 'Fee Amount')
@section('content')


    <div class="row">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Fees Amount List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fee Category Id</th>
                                    <th>Fee Class</th>
                                    <th>Fees Amount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($feeInfo as $feeInfo)
                                    <tr>
                                        <td>{{ $feeInfo->id }}</td>


                                        <td>{{ $feeInfo['feeCate']['fee_cata_name'] }}</td>


                                        <td>{{ $feeInfo['classId']['class_name'] }}</td>
                                        <td>{{ $feeInfo->fee_amount }}</td>
                                        <td>

                                            <a href="{{ route('feeamount.edit', $feeInfo->id) }}">Edit</a> ||

                                            <form method="post" action="{{ route('feeamount.destroy', $feeInfo->id) }}">

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
                    <h4 class="box-title">Add New Fees Amount</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('feeamount.store') }}">
                        @csrf
                        <!-- text input -->

                        <div class="form-group">
                            <label>Fees Category</label>

                            <select name="fee_category_id" id="" class="form-control">
                                <option selected disabled>Select</option>


                                @foreach ($feeCateInfo as $feeCateInfo)
                                    <option value="{{ $feeCateInfo->id }}">{{ $feeCateInfo->fee_cata_name }}</option>
                                @endforeach


                            </select>


                            @error('fee_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Fees For Class</label>

                            <select name="class_id" id="" class="form-control">
                                <option selected disabled>Select</option>


                                @foreach ($allClass as $allClass)
                                    <option value="{{ $allClass->id }}">{{ $allClass->class_name }}</option>
                                @endforeach


                            </select>


                            @error('class_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="form-group">
                            <label>Fees Amount</label>
                            <input type="number" class="form-control" name="fee_amount" placeholder="Enter ...">

                            @error('fee_amount')
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
