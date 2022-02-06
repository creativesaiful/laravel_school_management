<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

</head>

<body>

            <h1>Instute Name</h1>




    <table id="customers">
        <tr>

            <th>Employee Details</th>
            <th>Data</th>
        </tr>

        <tr>

            <td>ID</td>
            <td>{{$details->id_no}}</td>

        </tr>


        <tr>

            <td>Name</td>
            <td>{{$details->name}}</td>

        </tr>

        <tr>

            <td>Designation</td>
            <td>{{$details['designation']['name']}}</td>

        </tr>

        {{-- <tr>
            <td>Image</td>
            <td><img  src="{{ url('storage/'. $details['student']['image']) }}" alt=""></td>

        </tr> --}}

        <tr>

            <td>Father's Name</td>
            <td>{{$details->fname}}</td>

        </tr>

        <tr>

            <td>Mother's Name</td>
            <td>{{$details->mname}}</td>

        </tr>

        <tr>

            <td>Phone</td>
            <td>{{$details->phone}}</td>

        </tr>
        <tr>

            <td>Email</td>
            <td>{{$details->email}}</td>

        </tr>

        <tr>

            <td>Address</td>
            <td>{{$details->address}}</td>

        </tr>

        <tr>

            <td>Gender</td>
            <td>{{$details->gender}}</td>

        </tr>



        <tr>

            <td>Religious</td>
            <td>{{$details->religion}}</td>

        </tr>

        <tr>

            <td>Date of Birth</td>
            <td>{{$details->dob}}</td>

        </tr>

        <tr>

            <td>Joining Date</td>
            <td>{{$details->join_date}}</td>

        </tr>












    </table>

    <i> Print Date: {{date('d M Y')}} </i>

</body>

</html>
