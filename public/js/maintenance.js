$('#company_tab').addClass('tabactive');

$('#company_tab').on('click',function(){
    $('#company_tab').addClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company').fadeIn();
    $('#branch').hide();
    $('#shift').hide();
    $('#position').hide();
    $('#supervisor').hide();

});

$('#branch_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').addClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company').hide();
    $('#branch').show();
    $('#shift').hide();
    $('#position').hide();
    $('#supervisor').hide();
});

$('#shift_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').addClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company').hide();
    $('#branch').hide();
    $('#shift').show();
    $('#position').hide();
    $('#supervisor').hide();
});

$('#position_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').addClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company').hide();
    $('#branch').hide();
    $('#shift').hide();
    $('#position').show();
    $('#supervisor').hide();
});

$('#supervisor_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').addClass('tabactive');
    $('#company').hide();
    $('#branch').hide();
    $('#shift').hide();
    $('#position').hide();
    $('#supervisor').show();
});