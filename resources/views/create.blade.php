<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Create client</h1>
  <form action="{{ Route('klients.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="name..."><br>
    <input type="text" name="surname" placeholder="surname..."><br>
    <input type="text" name="phone" placeholder="phone..."><br>
    <br>
    <select name="filtr" id="">
      @foreach ($filtr as $v)
        <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
      @endforeach
    </select>

    <br><br>
    <input type="submit" value="Create">
  </form>
</body>
</html>