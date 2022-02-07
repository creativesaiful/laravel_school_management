@extends('backend.layout.master')

@section('title', 'Employee Salary Increment')
@section('content')


    <div class="">
        <h4 class="box-title">Increment Salary</h4>
    </div>


    <form method="post" enctype="multipart/form-data" action="{{ route('update.salary', $emplyDetails->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h2>{{ $emplyDetails->name }}</h2>
                </div>
            </div>

        </div>

        {{-- First Row End --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-light">Increment Amount<span class="text-danger">*</span> </label>
                    <input type="number" class="form-control" name="increment_salary" required>

                    @error('increment_salary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-light">Effected Date<span class="text-danger">*</span> </label>
                    <input type="date" class="form-control" name="effected_salary" required>

                    @error('effected_salary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>







        {{-- Fourth Row End --}}




        {{-- Fifth Row End --}}

        <div class="form-group">

            <input type="submit" class="btn btn-success" value='Update'>
        </div>

    </form>








@endsection
