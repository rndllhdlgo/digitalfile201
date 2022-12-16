<form action="/insertcheckbox" method="POST">
    @csrf
    Apple  <input type="checkbox" name="fruit[]" value="Apple"><br>
    Banana <input type="checkbox" name="fruit[]" value="Banana"><br>
    Mango  <input type="checkbox" name="fruit[]" value="Mango">

    {{-- <textarea name="fruit[]" id="fruits" cols="30" rows="10"></textarea> --}}
    <br><br>
    <input type="submit">
</form>