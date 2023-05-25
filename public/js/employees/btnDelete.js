$('#barangay_clearance_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.barangay_clearance_span').hide();
            $('.barangay_clearance_div').show();
            $('#barangay_clearance_delete_button').hide();
            $('#barangay_clearance_view').show();
            $('#barangay_clearance_file').addClass('required_field');
            $('#barangay_clearance_file').click();
            barangay_clearance_change = 'CHANGED';
        }
        else if(save.isDenied){

        }
    });
});

$('#birthcertificate_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.birthcertificate_span').hide();
            $('.birthcertificate_div').show();
            $('#birthcertificate_delete_button').hide();
            $('#birthcertificate_view').show();
            $('#birthcertificate_file').addClass('required_field');
            $('#birthcertificate_file').click();
            birthcertificate_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#diploma_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.diploma_span').hide();
            $('.diploma_div').show();
            $('#diploma_delete_button').hide();
            $('#diploma_view').show();
            $('#diploma_file').click();
            diploma_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#medical_certificate_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.medical_certificate_span').hide();
            $('.medical_certificate_div').show();
            $('#medical_certificate_delete_button').hide();
            $('#medical_certificate_view').show();
            $('#medical_certificate_file').addClass('required_field');
            $('#medical_certificate_file').click();
            medical_certificate_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#nbi_clearance_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.nbi_clearance_span').hide();
            $('.nbi_clearance_div').show();
            $('#nbi_clearance_delete_button').hide();
            $('#nbi_clearance_view').show();
            $('#nbi_clearance_file').click();
            nbi_clearance_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#pag_ibig_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.pag_ibig_span').hide();
            $('.pag_ibig_div').show();
            $('#pag_ibig_delete_button').hide();
            $('#pag_ibig_view').show();
            $('#pag_ibig_file').addClass('required_field');
            $('#pag_ibig_file').click();
            pag_ibig_file_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#philhealth_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.philhealth_span').hide();
            $('.philhealth_div').show();
            $('#philhealth_delete_button').hide();
            $('#philhealth_view').show();
            $('#philhealth_file').addClass('required_field');
            $('#philhealth_file').click();
            philhealth_file_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#police_clearance_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.police_clearance_span').hide();
            $('.police_clearance_div').show();
            $('#police_clearance_delete_button').hide();
            $('#police_clearance_view').show();
            $('#police_clearance_file').addClass('required_field');
            $('#police_clearance_file').click();
            police_clearance_file_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#resume_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.resume_span').hide();
            $('.resume_div').show();
            $('#resume_delete_button').hide();
            $('#resume_view').show();
            $('#resume_file').addClass('required_field');
            $('#resume_file').click();
            resume_file_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });

});

$('#sss_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.sss_span').hide();
            $('.sss_div').show();
            $('#sss_delete_button').hide();
            $('#sss_view').show();
            $('#sss_file').addClass('required_field');
            $('#sss_file').click();
            sss_file_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$('#tor_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('.transcript_of_records_span').hide();
            $('.transcript_of_records_div').show();
            $('#tor_delete_button').hide();
            $('#tor_view').show();
            $('#tor_file').click();
            tor_file_change = 'CHANGED';
        }
        else if(save.isDenied){
        }
    });
});

$(document).on('click','.btn_delete_children',function(){
    var id = $(this).attr("id");
    var data = $('.children_table_orig').DataTable().row(id).data();
    children_id.push(data.id);
    $(this).parent().parent().remove();
    children_change = 'CHANGED';
});

$(document).on('click','.btn_delete_college',function(){
    var id = $(this).attr("id");
    var data = $('.college_table_orig').DataTable().row(id).data();
    college_id.push(data.id);
    $(this).parent().parent().remove();
    college_change = 'CHANGED';
});

$(document).on('click','.btn_delete_training',function(){
    var id = $(this).attr("id");
    var data = $('.training_table_orig').DataTable().row(id).data();
    training_id.push(data.id);
    $(this).parent().parent().remove();
    training_change = 'CHANGED';
});

$(document).on('click','.btn_delete_vocational',function(){
    var id = $(this).attr("id");
    var data = $('.vocational_table_orig').DataTable().row(id).data();
    vocational_id.push(data.id);
    $(this).parent().parent().remove();
    vocational_change = 'CHANGED';
});

$(document).on('click','.btn_delete_job',function(){
    var id = $(this).attr("id");
    var data = $('.job_history_table_orig').DataTable().row(id).data();
    job_history_id.push(data.id);
    $(this).parent().parent().remove();
    job_history_change = 'CHANGED';
});

$(document).on('click','.btn_memo_delete',function(){
    var id = $(this).attr("id");
    var data = $('.memo_table_data').DataTable().row(id).data();
    memo_id.push(data.id);
    $(this).parent().parent().remove();
    memo_change = 'CHANGED';
});

$(document).on('click','.btn_evaluation_delete',function(){
    var id = $(this).attr("id");
    var data = $('.evaluation_table_data').DataTable().row(id).data();
    evaluation_id.push(data.id);
    $(this).parent().parent().remove();
    evaluation_change = 'CHANGED';
});

$(document).on('click','.btn_contracts_delete',function(){
    var id = $(this).attr("id");
    var data = $('.contracts_table_data').DataTable().row(id).data();
    contracts_id.push(data.id);
    $(this).parent().parent().remove();
    contracts_change = 'CHANGED';
});

$(document).on('click','.btn_resignation_delete',function(){
    var id = $(this).attr("id");
    var data = $('.resignation_table_data').DataTable().row(id).data();
    resignation_id.push(data.id);
    $(this).parent().parent().remove();
    resignation_change = 'CHANGED';
});

$(document).on('click','.btn_termination_delete',function(){
    var id = $(this).attr("id");
    var data = $('.termination_table_data').DataTable().row(id).data();
    termination_id.push(data.id);
    $(this).parent().parent().remove();
    termination_change = 'CHANGED';
});