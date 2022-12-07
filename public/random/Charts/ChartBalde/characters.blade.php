@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <input type="text" id="character_name">
    <br><br>
    <button type="button" id="btnCharacterSave">SAVE</button>
    <br><br>
    <div id="character_chart" style="width: 900px; height: 500px;"></div>
</div>

@endsection