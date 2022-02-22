@extends('backend.layout.master')

@section('title', 'Payment Add')
@section('content')

<div class="">
    <h4 class="box-title">Payment Add</h4>
</div>

<form action="{{route("student.fees.store")}}" method="post">
    @csrf
    <div class="row">



        <div class="col-md-6">
            <div class="form-group">
                <label>Date <span class="text-danger">*</span> </label>


                <input type="date" class="form-control" name="date" id="date" >

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

                    <th>Basic </th>
                    <th>Absent(Days)</th>
                    <th>Salary This Month</th>
                    <th>Pay Amount</th>

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

                    console.log(data);

                        $('<tr>').html(

                             "<td> " +item.totalAttend[i].user_data.id_no + "</td>"+
                             "<td>" + item.totalAttend[i].user_data.name + "</td>"+
                        "<td>  " + item.totalAttend[i].user_data.salary + " </td>"+

                          "<td>  " +  item.absentCount + " </td>"
                    //    "<td>  " + 1 + " </td>"+
                    //  "<td> "+
                    // "<input type='text' name='student_id[]' value='"+data.totalAttend.user_data.id+"'>"+
                    // "<input type='text' name='amount"+data.totalAttend.user_data.id+"' value='"+(data.totalAttend.user_data.salary)+"'>"+

                    //          "</td>"
                        ).appendTo('#tbody');
                        });

                        $("#add_mark").removeClass('d-none');

             }else{
                 alert ("Please select year,class, group and shift");
             }
          }

    });


    })
});
</script>

@endsection
