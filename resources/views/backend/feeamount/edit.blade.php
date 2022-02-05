@extends('backend.layout.master')

@section('title', 'Edit Fee amount')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Fees Amount</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('feeamount.update',$feeAmountInfo->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label>Fees Category</label>

                            <select name="fee_category_id" id="" class="form-control">



                                @foreach ($feeCateInfo as $feeCateInfo)
                                    <option value="{{ $feeCateInfo->id }}" {{$feeCateInfo->id == $feeAmountInfo->fee_category_id ? 'setected' : ''}} >{{ $feeCateInfo->fee_cata_name }}</option>
                                @endforeach


                            </select>


                            @error('fee_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- text input -->

                        <div class="form-group">
                            <label>Fees For Class</label>

                            <select name="class_id" id="" class="form-control">



                                @foreach ($allClass as $allClass)
                                    <option value="{{ $allClass->id }}" {{$allClass->id == $feeAmountInfo->class_id ? 'setected' : ''}} >{{ $allClass->class_name }}</option>
                                @endforeach


                            </select>


                            @error('class_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="form-group">
                            <label>Fee Amount</label>
                            <input type="text" class="form-control" name="fee_amount" value="{{$feeAmountInfo->fee_amount}}">

                            @error('fee_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='update'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
