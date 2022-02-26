@extends('backend.layout.master')

@section('title', 'Attendence Report')
@section('content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Employee Search</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('attendence.report.employee.search')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="employee_id"><strong>Employee</strong></label>
                                <select id="employee_id" name="employee_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date"><strong>Date</strong> </label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" class="btn btn-primary mt-4" value="Search" >


                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->


@endsection
