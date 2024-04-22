<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>{{ $data['surname'].' '.$data['name'] }}</h1>
  <h3>{{ $data['phone'] }}</h3>
  <a href="{{ Route('klients.index') }}">Back</a>
  <hr>
  <table border="">
    <tr>
      <th>№</th>
      <th>Name</th>
      <th>Month</th>
      <th>Date</th>
    </tr>
    @php
      $i = 1;
    @endphp
      @foreach ($data['filtr'] as $v)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $v['name'] }}</td>
          <td>{{ $v['month'] }}</td>
          <td>{{ $v['created_at'] }}</td>
        </tr>      
      @endforeach
    </table>
</body>
</html>