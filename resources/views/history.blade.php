<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>All Histories</h1>
  <a href="{{ Route('klients.index') }}">Back</a>
  <hr>
  <table border="">
    <tr>
      <th>№</th>
      <th>FIO</th>
      <th>Phone</th>
      <th>Filtr</th>
      <th>Month</th>
      <th>Price</th>
      <th>Date</th>
    </tr>
    @php
      $i = 1;
    @endphp
      @foreach ($history as $v)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $v['name'].' '.$v['surname'] }}</td>
          <td>{{ $v['phone'] }}</td>
          <td>{{ $v['filtr'] }}</td>
          <td>{{ $v['month'] }}</td>
          <td>{{ $v['price'] }}</td>
          <td>{{ $v['created_at'] }}</td>
        </tr>      
      @endforeach
    </table>
  </body>
</html>