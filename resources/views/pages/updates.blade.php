@extends('layouts.app')

@section('content')
<br>
<div class="row">
    <div class="col">
        <h4 style="color: #0d1a80;" class="my-header">UPDATES</h4>
    </div>
</div>

    <table class="table table-striped table-hover w-100 updatesTable" id="updatesTable">
        <thead class="text-white" style="background-color:#0d1a80;">
            {{-- <tr style="background-color:#0d1a80;">
            </tr> --}}
        </thead>
    </table>
<hr class="hr-design">
@endsection