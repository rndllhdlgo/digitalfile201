var position_orig;
$('#positionTable').on('click', 'tbody tr', function(){
    var data = positionTable.row(this).data();

    $('#position_id').val(data.id);
    $('#job_position_name').val(data.job_position_name);
    position_orig = data.job_position_name;
    $('#job_description').val(data.job_description);
    $('#job_requirements').val(data.job_requirements);

    $('#positionSave').hide();
    $('#positionUpdate').show();

    $('#positionModal').modal('show');
});
