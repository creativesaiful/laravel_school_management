@extends('backend.layout.master')

@section('title', 'Fees list')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Fees List</h3>
                    <a href="{{route('student.fees.add')}}" class="btn btn-success float-right">Add New Fee</a>
                </div>




                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width='5%'>SL</th>
                                    <th>ID No</th>
                                    <th>Name</th>


                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Fee Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>


                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($feeInfo as $key => $fee)
                                    <tr>
                                        <td>{{ $key+1  }}</td>
                                        <td>{{ $fee['student']['id_no'] }}</td>
                                        <td>{{  $fee['student']['name'] }}</td>
                                        <td>{{  $fee['year']['year'] }}</td>
                                        <td>{{  $fee['class']['class_name'] }}</td>
                                        <td>{{  $fee['feeCate']['fee_cata_name'] }}</td>
                                        <td>{{  $fee->amount }}</td>

                                        <td>{{date("M-Y", strtotime($fee->date))}} </td>



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

