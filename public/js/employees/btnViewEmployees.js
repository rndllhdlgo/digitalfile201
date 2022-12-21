$(document).on('click','table.employeesTable tbody tr',function(){
    if(!employeesTable.data().any()){ return false; }
    var data = employeesTable.row(this).data();
    var id = data.id;
    console.log(id);

    $.ajax({
        url: '/employees/fetch',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: 'GET',
        data:{
            id: id,
        },
        success: function(data){
            var employee_data = $.map(data.data, function(value, index){
                return [value];
            });
            employee_data.forEach(value => {

                $('#hidden_id').val(value.id);
                //Personal Information
                if(value.employee_image){
                    $('#filename').val(value.employee_image);
                    $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_preview').show();
                    $('#image_user').hide();
                    $('#image_button').hide();
                    $('#image_close').show();
                }
                else{
                    $('#filename').val('');
                }
                
                $('#filename_delete').val('');

                $('#first_name').val(value.first_name);
                $('#middle_name').val(value.middle_name);
                $('#last_name').val(value.last_name);
                $('#suffix').val(value.suffix);
                $('#nickname').val(value.nickname);
                $('#birthday').val(value.birthday);
                setInterval(() => {
                    $('#birthday').change();
                }, app_timeout);
                $('#gender').val(value.gender);
                $('#civil_status').val(value.civil_status);
                $('#street').val(value.street);

                $('.region').each(function(){
                    if($(this).html() == value.region){
                        $(this).prop('selected', true);
                    }
                });
                setTimeout(() => {
                    $('#region').change();
                    setTimeout(() => {
                        $('.province').each(function(){
                            if($(this).html() == value.province){
                                $(this).prop('selected', true);
                            }
                        });
                        setTimeout(() => {
                            $('#province').change();  
                            setTimeout(() => {
                                $('.city').each(function(){
                                    if($(this).html() == value.city){
                                        $(this).prop('selected', true);
                                    }
                                });
                                setTimeout(() => {
                                    $('#city').change();
                                }, app_timeout);
                            }, app_timeout);
                        }, app_timeout);
                    }, app_timeout);
                }, app_timeout);

                $('#height').val(decodeHtml(value.height));
                $('#weight').val(value.weight);
                $('#religion').val(value.religion);
                $('#email_address').val(value.email_address);
                $('#telephone_number').val(value.telephone_number);
                $('#cellphone_number').val(value.cellphone_number);
                $('#spouse_name').val(value.spouse_name);
                $('#spouse_contact_number').val(value.spouse_contact_number);
                $('#spouse_profession').val(value.spouse_profession);
                $('#father_name').val(value.father_name);
                $('#father_contact_number').val(value.father_contact_number);
                $('#father_profession').val(value.father_profession);
                $('#mother_name').val(value.mother_name);
                $('#mother_contact_number').val(value.mother_contact_number);
                $('#mother_profession').val(value.mother_profession);
                $('#emergency_contact_name').val(value.emergency_contact_name);
                $('#emergency_contact_relationship').val(value.emergency_contact_relationship);
                $('#emergency_contact_number').val(value.emergency_contact_number);

                $('#employee_number').val(value.employee_number);
                $('#employee_company').val(value.employee_company);
                $('#employee_department').val(value.employee_department);
                $('#employee_branch').val(value.employee_branch);
                $('#employee_status').val(value.employee_status);
                setInterval(() => {
                    $('#employee_status').change();
                }, app_timeout);
                $('#employment_origin').val(value.employment_origin);
                $('#employee_shift').val(value.employee_shift);
                $('#employee_supervisor').val(value.employee_supervisor);
                $('#employee_position').val(value.employee_position);
                $('#date_hired').val(value.date_hired);
                $('#company_email_address').val(value.company_email_address);
                $('#company_contact_number').val(value.company_contact_number);
                $('#sss_number').val(value.sss_number);
                $('#pag_ibig_number').val(value.pag_ibig_number);
                $('#philhealth_number').val(value.philhealth_number);
                $('#tin_number').val(value.tin_number);
                $('#account_number').val(value.account_number);

                $('#employee_salary').val(value.employee_salary);
                $('#employee_incentives').val(value.employee_incentives);
                $('#employee_overtime_pay').val(value.employee_overtime_pay);
                $('#employee_bonus').val(value.employee_bonus);
                $('#employee_insurance').val(value.employee_insurance);

                $('#secondary_school_name').val(value.secondary_school_name);
                $('#secondary_school_address').val(value.secondary_school_address);
                $('#secondary_school_inclusive_years').val(value.secondary_school_inclusive_years);
                $('#primary_school_name').val(value.primary_school_name);
                $('#primary_school_address').val(value.primary_school_address);
                $('#primary_school_inclusive_years').val(value.primary_school_inclusive_years);

                $('#past_medical_condition').val(value.past_medical_condition);
                $('#allergies').val(value.allergies);
                $('#medication').val(value.medication);
                $('#psychological_history').val(value.psychological_history);
                
                $('#employee_information').show();
                $('#addEmployeeBtn').hide();
                $('#employees_list').hide();
                $('#tab1').click();
                $('#btnClear').hide();
                $('#btnSave').hide();
                $('#note_required').hide();
                $('#note_information').show();
            });
        }
    });
});