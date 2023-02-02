<form action="/insertcheckbox" method="POST">
    @csrf
    Apple  <input type="checkbox" name="fruit[]" value="Apple"><br>
    Banana <input type="checkbox" name="fruit[]" value="Banana"><br>
    Mango  <input type="checkbox" name="fruit[]" value="Mango">
    <br><br>
    <input type="submit">
</form>