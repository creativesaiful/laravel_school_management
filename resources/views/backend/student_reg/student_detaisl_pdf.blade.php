<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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

<h1 class="text-center">Institute Name</h1>

<table id="customers">
  <tr>

    <th>Student Details</th>
    <th>Data</th>
  </tr>
  <tr>

    <td>Name</td>
    <td>{{$details['student']['name']}}</td>

  </tr>

  <tr>

    <td>Father's Name</td>
    <td>{{$details['student']['fname']}}</td>

  </tr>

  <tr>

    <td>Mothers Name</td>
    <td>{{$details['student']['mname']}}</td>

  </tr>

</table>

</body>
</html>



