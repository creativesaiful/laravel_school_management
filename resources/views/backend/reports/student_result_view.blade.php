@extends('backend.layout.master')

@section('title', 'Result Report')

@section('style')

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

@endsection
@section('content')



<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Reasult Search</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('exam.report.pdf')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>

                                @error('year_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-3">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>

                                @error('class_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                            </div>
                            <div class="form-group col-md-3">
                                <label for="exam_type_id">Exam</label>
                                <select id="exam_type_id" name="exam_id" class="form-control">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($exam_types as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                                    @endforeach
                                </select>

                                @error('exam_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <!-- <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a> -->


                                <input type="submit" value="Search" class="btn btn-primary mt-4">
                            </div>
                        </div>
                    </form>
                    <br>

                </div>

            </div>

        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
{{-- <script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var exam_id = $('#exam_id').val();
        $.ajax({
            url: "{{ route('exam.fee.classwise') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'exam_id': exam_id,
            },
            beforeSend: function() {},
            success: function(data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script> --}}

@endsection
