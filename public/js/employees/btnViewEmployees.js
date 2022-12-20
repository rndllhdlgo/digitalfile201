//Fetch Employee Data
// $(document).on('dblclick','table.employeesTable tbody tr',function(){//View employee information on tr double click
//     var data = employeesTable.row(this).data();
//     var id = data.id; 
//     console.log(id);
//     return false;
    // $('#tab1').click();
    // $('#btnClear').hide();
    // $('#btnEnableEdit').show();
    // $('#btnSave').hide();
    // $('#title_details').html('<i class="fas fa-info"></i> <b>VIEW DETAILS</b>');
    
    // $.ajax({
    //     url: "/employees/fetch",
    //     method: 'get',
    //     data:{
    //         id:id
    //     },
    //     dataType:'json',
    //     success:function(data){
    //     // Personal Information Tab
    //         // $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+data.employee_image);//Returns base URL/to get the current url (window.location.origin)
    //         // $('#image_preview').css('height','240px');
    //         // $('#first_name').val(data.first_name);
    //         // $('#middle_name').val(data.middle_name);
    //         // $('#last_name').val(data.last_name);
    //         // $('#suffix').val(data.suffix);
    //         // $('#nickname').val(data.nickname);
    //         // $('#birthday').val(data.birthday);
    //         // $('#birthday').change();
    //         // $('#gender').val(data.gender);
    //         // $('#civil_status').val(data.civil_status);
    //         // $('#street').val(data.street);
    //         // $("#region option:selected").text(data.region);
    //         // $("#province option:selected").text(data.province);
    //         // $("#city option:selected").text(data.city);
    //         // $('#height').val(data.height);
    //         // $('#weight').val(data.weight);
    //         // $('#religion').val(data.religion);
    //         // $('#email_address').val(data.email_address);
    //         // $('#telephone_number').val(data.telephone_number);
    //         // $('#cellphone_number').val(data.cellphone_number);
    //         // $('#spouse_name').val(data.spouse_name);
    //         // $('#spouse_contact_number').val(data.spouse_contact_number);
    //         // $('#spouse_profession').val(data.spouse_profession);
    //         // $('#father_name').val(data.father_name);
    //         // $('#father_contact_number').val(data.father_contact_number);
    //         // $('#father_profession').val(data.father_profession);
    //         // $('#mother_name').val(data.mother_name);
    //         // $('#mother_contact_number').val(data.mother_contact_number);
    //         // $('#mother_profession').val(data.mother_profession);
    //         // $('#emergency_contact_name').val(data.emergency_contact_name);
    //         // $('#emergency_contact_relationship').val(data.emergency_contact_relationship);
    //         // $('#emergency_contact_number').val(data.emergency_contact_number);

    //     // //Work Information Tab
    //         // $('#employee_number').val(data.employee_number);

    //     // //Hide (Required,Optional) text
    //     //     $('.span_all').hide();

    //     //     //Disable Edit
    //     //     $('.required_field').css('cursor','not-allowed');
    //     //     $('.optional_field').css('cursor','not-allowed');
    //     //     $('#sss_number').css('cursor','not-allowed');
    //     //     $('#pag_ibig_number').css('cursor','not-allowed');
    //     //     $('#philhealth_number').css('cursor','not-allowed');
    //     //     $('#tin_number').css('cursor','not-allowed');
    //     //     $('#account_number').css('cursor','not-allowed');
    //     //     $('#first_name').prop("disabled",true);
    //     //     $('#last_name').prop("disabled",true);
    //     //     $('#middle_name').prop("disabled",true);
    //     //     $('#suffix').prop("disabled",true);
    //     //     $('#birthday').prop("disabled",true);
    //     //     $('#gender').prop("disabled",true);
    //     //     $('#civil_status').change();
    //     //     $('#civil_status').prop("disabled",true);
    //     //     $('#street').prop("disabled",true);
    //     //     $('#region').prop("disabled",true);
    //     //     $('#region').css('border','1px solid #0d1a80');
    //     //     $('#province').prop("disabled",true);
    //     //     $('#province').css('border','1px solid #0d1a80');
    //     //     $('#city').prop("disabled",true);
    //     //     $('#city').css('border','1px solid #0d1a80');
    //     //     $('#email_address').prop("disabled",true);
    //     //     $('#telephone_number').prop("disabled",true);
    //     //     $('#cellphone_number').prop("disabled",true);
    //     //     $('#spouse_name').prop("disabled",true);
    //     //     $('#spouse_contact_number').prop("disabled",true);
    //     //     $('#spouse_profession').prop("disabled",true);
    //     //     $('#father_name').prop("disabled",true);
    //     //     $('#father_contact_number').prop("disabled",true);
    //     //     $('#father_profession').prop("disabled",true);
    //     //     $('#mother_name').prop("disabled",true);
    //     //     $('#mother_contact_number').prop("disabled",true);
    //     //     $('#mother_profession').prop("disabled",true);
    //     //     $('#emergency_contact_name').prop("disabled",true);
    //     //     $('#emergency_contact_relationship').prop("disabled",true);
    //     //     $('#emergency_contact_number').prop("disabled",true);
    //     //     $('#employee_number').prop("disabled",true);
    //     //     $('#employee_company').prop("disabled",true);
    //     //     $('#employee_branch').prop("disabled",true);
    //     //     $('#employee_status').prop("disabled",true);
    //     //     $('#employee_shift').prop("disabled",true);
    //     //     $('#employee_position').prop("disabled",true);
    //     //     $('#employee_supervisor').prop("disabled",true);
    //     //     $('#date_hired').prop("disabled",true);
    //     //     $('#company_email_address').prop("disabled",true);
    //     //     $('#company_contact_number').prop("disabled",true);
    //     //     $('#sss_number').prop("disabled",true);
    //     //     $('#pag_ibig_number').prop("disabled",true);
    //     //     $('#philhealth_number').prop("disabled",true);
    //     //     $('#tin_number').prop("disabled",true);
    //     //     $('#account_number').prop("disabled",true);
    //     //     $('#college_name').prop("disabled",true);
    //     //     $('#college_degree').prop("disabled",true);
    //     //     $('#college_inclusive_years').prop("disabled",true);
    //     //     $('#training_name').prop("disabled",true);
    //     //     $('#training_title').prop("disabled",true);
    //     //     $('#training_inclusive_years').prop("disabled",true);
    //     //     $('#vocational_name').prop("disabled",true);
    //     //     $('#vocational_course').prop("disabled",true);
    //     //     $('#vocational_inclusive_years').prop("disabled",true);
    //     //     $('#secondary_school_name').prop("disabled",true);
    //     //     $('#secondary_school_address').prop("disabled",true);
    //     //     $('#secondary_school_inclusive_years').prop("disabled",true);
    //     //     $('#primary_school_name').prop("disabled",true);
    //     //     $('#primary_school_address').prop("disabled",true);
    //     //     $('#primary_school_inclusive_years').prop("disabled",true);

    //         $('#hidden_id').val(id);
    //         $('#employee_information').show();
    //         $('#employees_list').hide();
    //         $('#addEmployeeBtn').hide();
    //         $('#image_button').hide();
    //         $('.image_icon').hide();
    //         $('#image_preview').show();
    //     }
    // });
// });
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
            checker = false;
            var transitem = $.map(data.data, function(value, index){
                return [value];
            });
            transitem.forEach(value => {
                $('#hidden_id').val(value.id);
                // alert(value.id);
                $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                $('#image_preview').show();
                $('#image_user').hide();
                $('#image_button').hide();
                $('#image_close').show();
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
                $('#employment_origin').val(value.employment_origin);
                $('#employee_shift').val(value.employee_shift);
                $('#employee_position').val(value.employee_position);
                $('#employee_supervisor').val(value.employee_supervisor);
                $('#date_hired').val(value.date_hired);
                $('#company_email_address').val(value.company_email_address);
                $('#company_contact_number').val(value.company_contact_number);

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
                // $('#btnEnableEdit').hide();
                $('#btnSave').hide();
                $('#title_details').html('<i class="fas fa-info"></i> <b>EMPLOYEE INFORMATION</b>');
            });

            $(document).ready( function () { 
                $('#college_data_table').show();
                $('#college_data_table').dataTable().fnDestroy();//To destroy the data table
                  $('#college_data_table').DataTable({
                      dom:'rt',
                      processing:true,
                      serverSide:false,
                      ajax: {
                      url: '/employees/collegeDataTable', //route-name
                      data:{
                          employee_id: id
                      }
                      },
                      //data column name
                      columns: [
                          {data: 'college_name'},
                          {data: 'college_degree'},
                          {data: 'college_inclusive_years'}
                      ],
                  });    
            });
        }
    });
});