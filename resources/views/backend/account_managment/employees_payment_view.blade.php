@extends('backend.layout.master')

@section('title', 'Salary List')
@section('content')


    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Employee Salary List</h3>
                    <a href="{{route('employees.payment.add')}}" class="btn btn-success float-right">Add New</a>
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


                                    <th>Designation</th>

                                    <th>Amount</th>
                                    <th>Date</th>


                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($employees as $key => $salary)
                                    <tr>
                                        <td>{{ $key+1  }}</td>
                                        <td>{{ $salary['user']['id_no'] }}</td>
                                        <td>{{ $salary['user']['name'] }}</td>
                                        <td>{{ $salary['user']['designation']['name'] }}</td>

                                        <td>{{ $salary->amount }}</td>

                                        <td>{{date("M-Y", strtotime($salary->date))}} </td>



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

