<h1>OK</h1>
<a href="{{ Route('clients.edit',['client' => 3]) }}">Edit</a>
<form action="http://127.0.0.1:8000/api/clients" method="POST">
    @csrf
    <input type="text" name="name" value="Max" id="">
    <input type="text" name="surname" value="Max" id="">
    <input type="text" name="phone" value="Max" id="">
    <input type="submit" value="ADD">
</form>