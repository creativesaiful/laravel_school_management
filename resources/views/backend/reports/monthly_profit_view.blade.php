@extends('backend.layout.master')

@section('title', 'Profit Report')
@section('content')

<div class="">
    <h4 class="box-title">Fee Add</h4>
</div>

<form method="post">
    @csrf
    <div class="row">







        <div class="col-md-3">
            <div class="form-group">
                <label class="text-light">Start Date <span class="text-danger">*</span> </label>


                <input type="date" class="form-control" name="start_date" id="start_date" >

                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror



            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label class="text-light">End Date <span class="text-danger">*</span> </label>


                <input type="date" class="form-control" name="end_date" id="end_date" >

                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror



            </div>
        </div>









        <div class="col-md-3">
            <div class="form-group">

                <br>
                <h4 class="btn btn-primary btn-sm btn-rounded mt-2" id="search">Search</h4>





            </div>
        </div>



    </div>
<hr>
    <h2>Student List</h2>

    <div class="table-responsive">
        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Collected Stu Fees</th>
                    <th>Employee Salary</th>
                    <th>Other Cost</th>

                    <th>Total Cost</th>
                    <th>Profit/Loss</th>
                    <th>Details</th>


                </tr>
            </thead>
            <tbody id="tbody">



            </tbody>

        </table>

        <input type="submit" value="Submit" id="add_mark" class="btn btn-primary d-none">
    </div>

</form>


<script>
    $(document).ready(function () {
    $('#search').on('click', function () {

        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();

    $.ajax({
       method: 'get',
           url: "{{ url('profit/datewise/search') }}",
           dataType: 'json',
           data: {
            startDate: startDate,
            endDate: endDate


               },

            success: function(data){
             if(data){



// empty service table befor load
                $('#tbody').empty();


                $.each(data, function (i, item) {

                    var fees = item.stuFees;
                    var salary = item.empSalary;
                    var others = item.otherCost;
                    var totalCost = (salary+others);
                    var profit_loss =(fees-totalCost);

                    var url = "{{url('profit/details/pdf')}}/"+startDate+"/"+endDate;

                        $('<tr>').html(

                             "<td> " + fees + "</td>" +
                             "<td>" + salary+ "</td>"+
                        "<td>  " + others + " </td>" +
                        "<td>  " + totalCost + " </td>"+

                          "<td>  " +  profit_loss + " </td>"+

                        "<td>  <a href='"+url+"' target='_blank'> Details </a> </td>").appendTo('#tbody');
                        });



             }else{
                 alert ("Please select year,class, group and shift");
             }
          }

    });


    })
});
</script>

@endsection


