<h1>Update page</h1>
<form action="http://127.0.0.1:8000/api/clients/{{ $id }}" method="POST">
    @csrf
    @method("PUT")
    <input type="text" name="name" value="Max" id="">
    <input type="text" name="surname" value="Max" id="">
    <input type="text" name="phone" value="Max" id="">
    <input type="submit" value="ADD">
</form>