$('#addPositionBtn').on('click',function(){
    $('#positionModal').modal('show');
    $('#job_position_name').val('');
    $('#job_description').val('');
    $('#job_requirements').val('');
    $('#positionSave').show();
    $('#positionUpdate').hide();
});

$('.btnCancel, .close').on('click',function(){
    $('.modal').modal('hide');
});

$('#job_position_name').on('keyup',function(){
    if(position_orig != $.trim($('#job_position_name').val()).toUpperCase()){
        $.ajax({
            url: "/position/checkDuplicate",
            data:{
                job_position_name : $.trim($('#job_position_name').val()).toUpperCase(),
            },
            success: function(data){
                if(data == 'true'){
                    $('.validation').show();
                    $('#positionSave').prop('disabled',true);
                    $('#positionUpdate').prop('disabled',true);
                }
                else{
                    $('.validation').hide();
                    $('#positionSave').prop('disabled',false);
                    $('#positionUpdate').prop('disabled',false);
                }
            }
        });
    }
});
