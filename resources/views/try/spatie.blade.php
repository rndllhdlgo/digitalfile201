@extends('layouts.app')

@section('content')
<br>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>

    <button type="button" class="btn btn-primary" id="add">ADD</button>

    <button type="button" class="btn btn-primary" id="update">UPDATE</button>

    <button type="button" class="btn btn-danger" id="delete">DELETE</button>

{{-- @role(['ADMIN','ENCODER'])
    <button type="button" class="btn btn-danger" id="delete">DELETE</button>
@endrole --}}

<script>
    $('#loading').hide();
    $('#add').on('click',function(){
        alert('ADD');
    });
    $('#delete').on('click',function(){
        alert('DELETE');
    });
    $('#update').on('click',function(){
        alert('UPDATE');
    });
</script>
@endsection