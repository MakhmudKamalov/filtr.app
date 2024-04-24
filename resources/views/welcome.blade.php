<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Home page</h1>
<a href="{{ Route('klients.create') }}">Create client</a><br><br>
<a href="{{ Route('filtrs.create') }}">Create filtr</a><br><br>
<a href="{{ Route('histories.index') }}">Hisrory</a>
<br><br><hr>
<table border="">
  <tr>
    <th>№</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Phone</th>
    <th>Count</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Add</th>
  </tr>
  @php
    $i = 1;
  @endphp
    @foreach ($data as $v)
      <tr>
        <td>{{ $i++ }}</td>
        <td><a  href="@if ($v['count'] != 0)
          {{ Route('klients.show',['klient' => $v['id']]) }} 
        @else
          #
        @endif ">{{ $v['name'] }}</a></td>
        <td>{{ $v['surname'] }}</td>
        <td>{{ $v['phone'] }}</td>
        <td>{{ $v['count'] }}</td>
        <td><a href="">Edit</a></td>
        <td><form action="{{ Route('klients.destroy', ['klient' => $v['id']]) }}" method="post">
        @csrf  
        @method('DELETE')
          <input type="submit" value="Delete">
        </form></td>
        <td><a href="
          @if ($v['count'] == 5)
#
        @else
        {{ Route('klients.add',['klient' => $v['id']]) }}
        @endif
         ">Add</a></td>
      </tr>      
    @endforeach
  </table>
</body>
</html>