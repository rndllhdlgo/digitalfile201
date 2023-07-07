@extends('layouts.app')
@section('content')
<br>
    <table class="table table-striped table-hover table-bordered" id="dynamicTable" style="width:100%">
        <thead class="thead-design"></thead>
    </table>

<script>
    $('#loading').hide();
    for (var i = 1; i <= 3; i++) {
        for (var j = 1; j <= 3; j++) {
            console.log("i:", i, "j:", j);
        }
    }

    // return false;
    $(document).ready(function() {
        $.ajax({
            url: '/dynamicColumns',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var columns = [];
                $.each(response, function(index, value) {
                    columns.push({ title: value });
                });

                $('#dynamicTable').DataTable({
                    columns: columns
                });
            }
        });
    });
</script>
@endsection