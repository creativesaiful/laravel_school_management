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

            <th>Student Details</th>
            <th>Data</th>
        </tr>

        <tr>

            <td>ID</td>
            <td>{{$details['student']['id_no']}}</td>

        </tr>


        <tr>

            <td>Name</td>
            <td>{{$details['student']['name']}}</td>

        </tr>

        {{-- <tr>
            <td>Image</td>
            <td><img  src="{{ url('storage/'. $details['student']['image']) }}" alt=""></td>

        </tr> --}}

        <tr>

            <td>Class</td>
            <td>{{$details['student_class']['class_name']}}</td>

        </tr>

        <tr>

            <td>Class</td>
            <td>{{$details->role}}</td>

        </tr>

        <tr>

            <td>Group</td>
            <td>{{$details['student_group']['group_name']}}</td>

        </tr>

        <tr>

            <td>Shift</td>
            <td>{{$details['student_shift']['shift_name']}}</td>

        </tr>

        <tr>

            <td>Year</td>
            <td>{{$details['student_year']['year']}}</td>

        </tr>



        <tr>

            <td>Father's Name</td>
            <td>{{$details['student']['fname']}}</td>

        </tr>

        <tr>

            <td>Mothers Name</td>
            <td>{{$details['student']['mname']}}</td>

        </tr>

        <tr>

            <td>Phone</td>
            <td>{{$details['student']['phone']}}</td>

        </tr>

        <tr>

            <td>Gender</td>
            <td>{{$details['student']['gender']}}</td>

        </tr>

        <tr>

            <td>Date of Birth</td>
            <td>{{$details['student']['dob']}}</td>

        </tr>

        <tr>

            <td>Religion</td>
            <td>{{$details['student']['religion']}}</td>

        </tr>

        <tr>

            <td>Address</td>
            <td>{{$details['student']['address']}}</td>

        </tr>

    </table>

    <i> Print Date: {{date('d M Y')}} </i>

</body>

</html>
