@extends('layouts.app')

@section('content')
<br>

<div class="row">
    <div class="col">
        <input class="forminput form-control" type="search" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11">
    </div>
    <div class="col">
        <input class="forminput form-control" type="search" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11">
    </div>
</div>

<script>
    $('#loading').hide();

    $(document).ready(function() {
        var cellphone_number = $('#cellphone_number');
        var emergency_contact_number = $('#emergency_contact_number');

        cellphone_number.add(emergency_contact_number).keyup(function() {
            if (cellphone_number.val() === emergency_contact_number.val()) {
            console.log('The two input fields have the same value.');
            } else {
            console.log('The two input fields have different values.');
            }
        });
    });
</script>
@endsection