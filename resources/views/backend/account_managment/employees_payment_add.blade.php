@extends('backend.layout.master')

@section('title', 'Payment Add')
@section('content')

<div class="">
    <h4 class="box-title">Payment Add</h4>
</div>

<form action="{{route("employees.payment.store")}}" method="post">
    @csrf
    <div class="row">



        <div class="col-md-6">
            <div class="form-group">
                <label>Date <span class="text-danger">*</span> </label>


                <input type="date" class="form-control" name="date" id="date" required >

                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror



            </div>
        </div>









        <div class="col-md-2">
            <div class="form-group">

                <br>
                <h4 class="btn btn-primary btn-sm btn-rounded mt-2" id="search">Search</h4>





            </div>
        </div>



    </div>
<hr>
    <h2>Employee List</h2>

    <div class="table-responsive">
        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id No</th>
                    <th>Name</th>
                    <th>Designation</th>

                    <th>Basic </th>
                    <th>Absent(Days)</th>
                    <th>Minus</th>
                    <th>Salary This Month</th>


                </tr>
            </thead>
            <tbody id="tbody">



            </tbody>

        </table>

        <input type="submit" value="Payment Done" id="add_Payment" class="btn btn-primary d-none">
    </div>

    <input type="hidden" name="">

</form>


<script>
    $(document).ready(function () {
    $('#search').on('click', function () {


        var date = $('#date').val();

    $.ajax({
       method: 'get',
           url: "{{ url('employees/payment/search') }}",
           dataType: 'json',
           data: {
            date: date,

               },

            success: function(data){
             if(data){

        // empty service table befor load
                $('#tbody').empty();


                $.each(data, function (i, item) {

                    var disId = item.user_data.designation_id;
                    var empId = item.user_data.id;

                    $.ajax({
                        type: "get",
                        url: "{{ url('employees/payment/designation')}}" + '/' + disId,
                        dataType: "json",
                        data:{
                            empId:empId,
                            date:date
                        },
                        success: function (getdata) {
                           var designatio = getdata.designation.name;
                           var absent = getdata.absent;
                           var basicsalary = item.user_data.salary;
                           var perday = Math.round(basicsalary/30);
                           var minus = Math.round(perday*absent)

                           $('<tr>').html(
                             "<td> " +item.user_data.id_no + "</td>"+
                             "<td>" + item.user_data.name  + "</td>"+
                             "<td>  " +   designatio  + " </td>"+
                        "<td>  " + basicsalary  + " </td>"+

                       "<td>  " + absent + " </td>"+
                       "<td>  " + minus + " </td>"+
                     "<td> "+
                    "<input type='hidden' name='employee_id[]' value='"+item.user_data.id+"'>"+
                    "<input type='text' name='amount"+item.user_data.id+"' value='"+(basicsalary-minus)+"'>"+
                             "</td>"
                        ).appendTo('#tbody');

                        }
                    });


                        });
                        $("#add_Payment").removeClass('d-none');
             }
          }

    });


    })
});
</script>

@endsection
