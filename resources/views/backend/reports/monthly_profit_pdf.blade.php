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

            <th>Monthly Name</th>
            <th>{{$month}}</th>
        </tr>

        <tr>

            <td>Student Fees Collection</td>
            <td>{{$stuFees}}</td>

        </tr>


        <tr>

            <td>Employee Salary</td>
            <td>{{$empSalary}}</td>

        </tr>

        <tr>

            <td>Other Cost</td>
            <td>{{$otherCost}}</td>
        </tr>


        <tr>

            <td>Total Cost</td>
            <td>{{$totalCost}}</td>
        </tr>

        <tr>

            <td>Total Profit/Loss</td>
            <td>{{$totalProfit}}</td>

    </table>

    <i> Print Date: {{date('d M Y')}} </i>

</body>

</html>
