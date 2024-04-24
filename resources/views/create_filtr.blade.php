<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Filtr create</h1>
  <a href="{{ Route('klients.index') }}">Back</a><br><br>
  <form action="{{ Route('filtrs.store') }}" method="post">
      @csrf
      <input type="text" placeholder="name..." name="name">
      <input type="text" placeholder="month..." name="month">
      <input type="text" placeholder="price..." name="price">
      <input type="submit" value="Create Filtr">
  </form>
  <hr>
  <table border="">
    <tr>
      <th>№</th>
      <th>Name</th>
      <th>Month</th>
      <th>Price</th>
      <th>Date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @php
      $i = 1;
    @endphp
      @foreach ($filtrs as $v)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $v['name'] }}</td>
          <td>{{ $v['month'] }}</td>
          <td>{{ $v['price'] }}</td>
          <td>{{ $v['created_at'] }}</td>
          <td><a href="">Edit</a></td>
          <td><form action="{{ Route('filtrs.destroy', ['filtr' => $v['id']]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">  
          </form></td>
        </tr>      
      @endforeach
    </table>

</body>
</html>