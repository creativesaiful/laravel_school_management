@extends('backend.layout.master')

@section('title', 'Increment History')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Salary Increment History</h3>

                </div>




                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Present Salary</th>
                                    <th>Increment amount</th>
                                    <th>Previous Salary</th>
                                    <th>Increment Date</th>




                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($increment_info as $key => $increment_info)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $increment_info->present_salary }}</td>

                                        <td>{{ $increment_info->increment_salary }}</td>
                                        <td>{{ $increment_info->previous_salary }}</td>
                                        <td>{{  date('d M Y', strtotime($increment_info->effected_salary)) }}</td>






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




@endsection
