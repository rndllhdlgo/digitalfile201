@extends('layouts.app')

@section('content')
<div class="d-flex vw-100 vh-100 justify-content-center align-items-center">
    <img src="storage/{{$savedfile->filename}}" alt="">
</div>
@endsection