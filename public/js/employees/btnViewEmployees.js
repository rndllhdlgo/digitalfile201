var children_id,
    college_id,
    secondary_id,
    primary_id,
    training_id,
    vocational_id,
    job_history_id,
    memo_id,
    evaluation_id,
    contracts_id,
    resignation_id,
    termination_id = [];

var data_error = 0;
var viewCounter = 0;

$(document).on('click','table.employeesTable tbody tr',function(){
    $('#loading').hide();

    children_id    = [];
    college_id     = [];
    secondary_id   = [];
    primary_id     = [];
    training_id    = [];
    vocational_id  = [];
    job_history_id = [];
    memo_id        = [];
    evaluation_id  = [];
    contracts_id   = [];
    resignation_id = [];
    termination_id = [];

    if(!employeesTable.data().any()){ return false; }
    var data = employeesTable.row(this).data();
    var id = data.id;

    $('#loading').show();

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
        "dataType": "json",
        "error": function(xhr, error, thrown){
            if(xhr.status == 500){
                data_error++;
                $('#loading').hide();
                Swal.fire({
                    title: 'DATA PROBLEM!',
                    html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                    confirmButtonText: "REFRESH",
                    icon: 'error',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    width: 700
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                });
            }
        },
        success: function(data){
            var employee_data = $.map(data.data, function(value, index){
                return [value];
            });
            employee_data.forEach(value => {
                $('#hidden_id').val(value.id);
                // Personal Info
                if(value.employee_image){
                    viewCounter++;
                    $('#filename').val(value.employee_image);
                    $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_preview').show();
                    $('#image_preview_summary').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_close').show();
                    $('#image_user').hide();
                    $('#image_button').hide();
                    $('#image_instruction').hide();
                    $('#employee_image').removeClass('required_field');
                    $('.bottom-container').show();
                }
                else{
                    $('.bottom-container').hide();
                    $('#image_preview_summary').prop('src',window.location.origin+'/storage/employee_images/no_image.png');
                    $('#filename').val('');
                }

                $('#filename_delete').val('');

                $('#first_name').val(value.first_name);
                $('#middle_name').val(value.middle_name);
                $('#last_name').val(value.last_name);
                $('#suffix').val(value.suffix);
                $('#nickname').val(value.nickname);

                $('#birthday').val(value.birthday);
                setTimeout(() => {
                    $('#birthday').change();
                }, 500);

                $('#gender').val(value.gender);
                $('#address').val(value.address);
                $('#ownership').val(value.ownership);

                $('#province_summary').val(value.province);
                $('#province_content').html(value.province);
                $('#city_summary').val(value.city);
                $('#city_content').html(value.city);

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
                        }, 500);
                    }, 500);
                }, 500);

                $('#region').val(value.region);
                $('#region_summary').val(value.region);
                $('#region_content').html(value.region);
                $('#blood_type').val(value.blood_type);
                $('#height').val(value.height);
                $('#weight').val(value.weight);
                $('#religion').val(value.religion);

                $('#civil_status').val(value.civil_status);
                setTimeout(() => {
                    $('#civil_status').change();
                }, 500);

                if(value.civil_status == 'MARRIED'){
                    $('#spouse_div').show();
                }
                else{
                    $('#spouse_div').hide();
                }

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

                // Work Info
                if(value.employee_number){
                    $('#employee_number').val(value.employee_number);
                    $('#employee_number').attr('readonly',true);
                    $('#employee_number').css('cursor','not-allowed');
                }
                $('#date_hired').val(value.date_hired);
                $('#employee_shift').val(value.desc);
                $('#employee_company').val(value.employee_company);
                $('#employee_branch').val(value.employee_branch);
                $('#employee_department').val(value.employee_department);
                $('#employee_position').val(value.employee_position);

                if(value.employment_status){
                    $('#employment_status').val(value.employment_status);
                    var rank = $('#employment_status option[value='+value.employment_status+"]").attr('rank');
                    if(rank != 5){
                        $("#employment_status option").filter(function(){
                            return $(this).attr("rank") < rank;
                        }).remove();
                    }
                }

                setTimeout(() => {
                    $('#employment_status').change();
                }, 500);

                $('#employment_origin').val(value.employment_origin);
                $('#company_email_address').val(value.company_email_address);
                $('#company_contact_number').val(value.company_contact_number);
                $('#hmo_number').val(value.hmo_number);
                $('#sss_number').val(value.sss_number);
                $('#pag_ibig_number').val(value.pag_ibig_number);
                $('#philhealth_number').val(value.philhealth_number);
                $('#tin_number').val(value.tin_number);
                $('#account_number').val(value.account_number);

                if(value.past_medical_condition){
                    $('#past_medical_condition').val(value.past_medical_condition);
                    $('.past_med_div').show();
                }
                else{
                    $('.past_med_div').hide();
                }
                if(value.allergies){
                    $('.allergies_div').show();
                    $('#allergies').val(value.allergies);
                }
                else{
                    $('.allergies_div').hide();
                }
                if(value.medication){
                    $('.medication_div').show();
                    $('#medication').val(value.medication);
                }
                else{
                    $('.medication_div').hide();
                }
                if(value.psychological_history){
                    $('.psych_div').show();
                    $('#psychological_history').val(value.psychological_history);
                }
                else{
                    $('.psych_div').hide();
                }

                if(!value.past_medical_condition && !value.allergies && !value.medication && !value.psychological_history){
                    $('#checkbox7').prop('disabled', true).addClass('btnDisabled');
                }
                else{
                    $('#checkbox7').prop('disabled', false).removeClass('btnDisabled');
                }

                hmo_table(value.id);
                leave_table(value.empno);
                children_table(value.id);
                college_table(value.id);
                secondary_table(value.id);
                primary_table(value.id);
                training_table(value.id);
                vocational_table(value.id);
                job_history_table(value.id);
                memo_table(value.id, value.employee_number, value.last_name, value.first_name);
                evaluation_table(value.id, value.employee_number, value.last_name, value.first_name);
                contracts_table(value.id, value.employee_number, value.last_name, value.first_name);
                resignation_table(value.id, value.employee_number, value.last_name, value.first_name);
                termination_table(value.id, value.employee_number, value.last_name, value.first_name);

                if(!$('.college_table_orig').DataTable().data().any()
                && !$('.secondary_table_orig').DataTable().data().any()
                && !$('.primary_table_orig').DataTable().data().any()){
                    $('#checkbox4').prop('disabled', true).addClass('btnDisabled');
                }
                else{
                    $('#checkbox4').prop('disabled', false).removeClass('btnDisabled');
                }

                if(!$('.training_table_orig').DataTable().data().any()
                && !$('.vocational_table_orig').DataTable().data().any()){
                    $('#checkbox5').prop('disabled', true).addClass('btnDisabled');
                }
                else{
                    $('#checkbox5').prop('disabled', false).removeClass('btnDisabled');
                }

                var employee_history_table;
                $('.employee_history_table').dataTable().fnDestroy();
                employee_history_table = $('.employee_history_table').DataTable({
                    dom:'l<"breakspace">trip',
                    autoWidth: false,
                    language:{
                        info: "\"Showing _START_ to _END_ of _TOTAL_ User Activities\"",
                        lengthMenu:"Show _MENU_ User Activities",
                        emptyTable:"No User Activities Data Found!",
                        loadingRecords: "Loading User Activities Records...",
                    },
                    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    processing:true,
                    serverSide:false,
                    ajax: {
                        url: '/employees/history_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    order: [],
                    columnDefs: [
                        {
                            "targets": [0],
                            "visible": false,
                            "searchable": true
                        },
                    ],
                    columns: [
                        { data: 'datetime' },
                        {
                            data: 'date',
                            width: '15%',
                            "render": function(data, type, row){
                                return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
                            }
                        },
                        { data: 'username', width: '15%'},
                        { data: 'role', width: '15%'},
                        {
                            data: 'activity',
                            width: '55%',
                            "render":function(data,type,row){
                                return activity = row.activity.replaceAll(" [", "<br>[");
                            }
                        }
                    ]
                });
                $('div.breakspace').html('<br><br>');

                $('.filter-input').on('keyup search', function(){
                    employee_history_table.column($(this).data('column')).search($(this).val()).draw();
                });

                // setInterval(function(){
                //     if($('#loading').is(':hidden') && standby == false){
                //         $.ajax({
                //             url: "/employee_history_reload",
                //             success: function(data){
                //                 if(data != data_update){
                //                     data_update = data;
                //                     $('.employee_history_table').DataTable().ajax.reload(null, false);
                //                 }
                //             }
                //         });
                //     }
                // }, 1000);

                var logs_table_data;
                $('.logs_table_data').dataTable().fnDestroy();
                logs_table_data = $('.logs_table_data').DataTable({
                    dom:'l<"breakspace">trip',
                    autoWidth: false,
                    language:{
                        info: "\"Showing _START_ to _END_ of _TOTAL_ User Activities\"",
                        lengthMenu:"Show _MENU_ User Activities",
                        emptyTable:"No User Activities Data Found!",
                        loadingRecords: "Loading User Activities Records...",
                    },
                    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    processing:true,
                    serverSide:false,
                    ajax: {
                        url: '/employees/logs_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    order: [],
                    columnDefs: [
                        {
                            "targets": [0],
                            "visible": false,
                            "searchable": true
                        },
                    ],
                    columns: [
                        { data: 'datetime' },
                        {
                            data: 'date',
                            width: '15%',
                            "render": function(data, type, row){
                                return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
                            }
                        },
                        { data: 'username', width: '15%'},
                        { data: 'role', width: '15%'},
                        {
                            data: 'activity',
                            width: '55%',
                            "render":function(data,type,row){
                                return activity = row.activity.replaceAll(" [", "<br>[");
                            }
                        }
                    ]
                });
                $('div.breakspace').html('<br><br>');

                $('.filter-input').on('keyup search', function(){
                    logs_table_data.column($(this).data('column')).search($(this).val()).draw();
                });

                // setInterval(function(){
                //     if($('#loading').is(':hidden') && standby == false){
                //         $.ajax({
                //             url: "/logs_reload",
                //             success: function(data){
                //                 if(data != data_update){
                //                     data_update = data;
                //                     $('.logs_table_data').DataTable().ajax.reload(null, false);
                //                 }
                //             }
                //         });
                //     }
                // }, 1000);

                $('th').removeClass("sorting_asc");

                if(value.barangay_clearance_file){
                    $('#barangay_clearance_filename').val(value.barangay_clearance_file);
                    $('.barangay_clearance_div').hide();
                    $('.barangay_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.barangay_clearance_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.barangay_clearance_file}" title="DOWNLOAD FILE" download>${value.barangay_clearance_file}</a>`);
                    }
                    else{
                        $('.barangay_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.barangay_clearance_file}" title="DOWNLOAD FILE" download>${value.barangay_clearance_file}</a>`);
                    }
                    $('#barangay_clearance_view').hide();
                    $('#barangay_clearance_delete_button').show();
                    $('#barangay_clearance_file').removeClass('required_field');
                }

                if(value.birthcertificate_file){
                    $('#birthcertificate_filename').val(value.birthcertificate_file);
                    $('.birthcertificate_div').hide();
                    $('.birthcertificate_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.birthcertificate_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.birthcertificate_file}" title="DOWNLOAD FILE" download> ${value.birthcertificate_file}</a>`);
                    }
                    else{
                        $('.birthcertificate_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.birthcertificate_file}" title="DOWNLOAD FILE" download> ${value.birthcertificate_file}</a>`);
                    }
                    $('#birthcertificate_view').hide();
                    $('#birthcertificate_delete_button').show();
                    $('#birthcertificate_file').removeClass('required_field');
                }

                if(value.diploma_file){
                    $('#diploma_filename').val(value.diploma_file);
                    $('.diploma_div').hide();
                    $('.diploma_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.diploma_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.diploma_file}" title="DOWNLOAD FILE" download> ${value.diploma_file}</a>`);
                    }
                    else{
                        $('.diploma_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.diploma_file}" title="DOWNLOAD FILE" download> ${value.diploma_file}</a>`);
                    }
                    $('#diploma_view').hide();
                    $('#diploma_delete_button').show();
                }

                if(value.medical_certificate_file){
                    $('#medical_certificate_filename').val(value.medical_certificate_file);
                    $('.medical_certificate_div').hide();
                    $('.medical_certificate_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.medical_certificate_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.medical_certificate_file}" title="DOWNLOAD FILE" download> ${value.medical_certificate_file}</a>`);
                    }
                    else{
                        $('.medical_certificate_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.medical_certificate_file}" title="DOWNLOAD FILE" download> ${value.medical_certificate_file}</a>`);
                    }
                    $('#medical_certificate_view').hide();
                    $('#medical_certificate_delete_button').show();
                    $('#medical_certificate_file').removeClass('required_field');

                }
                if(value.nbi_clearance_file){
                    $('#nbi_clearance_filename').val(value.nbi_clearance_file);
                    $('.nbi_clearance_div').hide();
                    $('.nbi_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.nbi_clearance_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.nbi_clearance_file}" title="DOWNLOAD FILE" download> ${value.nbi_clearance_file}</a>`);
                    }
                    else{
                        $('.nbi_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.nbi_clearance_file}" title="DOWNLOAD FILE" download> ${value.nbi_clearance_file}</a>`);
                    }
                    $('#nbi_clearance_view').hide();
                    $('#nbi_clearance_delete_button').show();
                }

                if(value.pag_ibig_file){
                    $('#pag_ibig_filename').val(value.pag_ibig_file);
                    $('.pag_ibig_div').hide();
                    $('.pag_ibig_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.pag_ibig_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.pag_ibig_file}" title="DOWNLOAD FILE" download> ${value.pag_ibig_file}</a>`);
                    }
                    else{
                        $('.pag_ibig_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.pag_ibig_file}" title="DOWNLOAD FILE" download> ${value.pag_ibig_file}</a>`);
                    }
                    $('#pag_ibig_view').hide();
                    $('#pag_ibig_delete_button').show();
                    $('#pag_ibig_file').removeClass('required_field');
                }

                if(value.philhealth_file){
                    $('#philhealth_filename').val(value.philhealth_file);
                    $('.philhealth_div').hide();
                    $('.philhealth_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.philhealth_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.philhealth_file}" title="DOWNLOAD FILE" download> ${value.philhealth_file}</a>`);
                    }
                    else{
                        $('.philhealth_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.philhealth_file}" title="DOWNLOAD FILE" download> ${value.philhealth_file}</a>`);
                    }
                    $('#philhealth_view').hide();
                    $('#philhealth_delete_button').show();
                    $('#philhealth_file').removeClass('required_field');
                }

                if(value.police_clearance_file){
                    $('#police_clearance_filename').val(value.police_clearance_file);
                    $('.police_clearance_div').hide();
                    $('.police_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.police_clearance_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.police_clearance_file}" title="DOWNLOAD FILE" download> ${value.police_clearance_file}</a>`);
                    }
                    else{
                        $('.police_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.police_clearance_file}" title="DOWNLOAD FILE" download> ${value.police_clearance_file}</a>`);
                    }
                    $('#police_clearance_view').hide();
                    $('#police_clearance_delete_button').show();
                    $('#police_clearance_file').removeClass('required_field');
                }

                if(value.resume_file){
                    $('#resume_filename').val(value.resume_file);
                    $('.resume_div').hide();
                    $('.resume_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.resume_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.resume_file}" title="DOWNLOAD FILE" download> ${value.resume_file}</a>`);
                    }
                    else{
                        $('.resume_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.resume_file}" title="DOWNLOAD FILE" download> ${value.resume_file}</a>`);
                    }
                    $('#resume_view').hide();
                    $('#resume_delete_button').show();
                    $('#resume_file').removeClass('required_field');
                }

                if(value.sss_file){
                    $('#sss_filename').val(value.sss_file);
                    $('.sss_div').hide();
                    $('.sss_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.sss_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.sss_file}" title="DOWNLOAD FILE" download> ${value.sss_file}</a>`);
                    }
                    else{
                        $('.sss_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.sss_file}" title="DOWNLOAD FILE" download> ${value.sss_file}</a>`);
                    }
                    $('#sss_view').hide();
                    $('#sss_delete_button').show();
                    $('#sss_file').removeClass('required_field');
                }

                if(value.transcript_of_records_file){
                    $('#transcript_of_records_filename').val(value.transcript_of_records_file);
                    $('.transcript_of_records_div').hide();
                    $('.transcript_of_records_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.transcript_of_records_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.transcript_of_records_file}" title="DOWNLOAD FILE" download> ${value.transcript_of_records_file}</a>`);
                    }
                    else{
                        $('.transcript_of_records_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.transcript_of_records_file}" title="DOWNLOAD FILE" download> ${value.transcript_of_records_file}</a>`);
                    }
                    $('#tor_view').hide();
                    $('#tor_delete_button').show();
                }
                $('#btnUpdate').prop('disabled', true);
                $('#loading').hide();
                if(data_error == 0){
                    $('#employee_information').show();
                    $('#employees_list').hide();
                    $('#tab1').click();
                }
                else{
                    $('#employee_information').hide();
                }
            });
        }
    });
});

$(document).on('click', '.btnEditHmo',function(){
    $('#hmoId').val($(this).attr('hmo_id'));
    $('#hmoName').val($(this).attr('hmo_name'));
    $('#hmoCoverage').val($(this).attr('hmo_coverage'));
    $('#hmoParticulars').val($(this).attr('hmo_particulars'));
    $('#hmoRoom').val($(this).attr('hmo_room'));
    $('#hmoEffecitivityDate').val($(this).attr('hmo_effectivity_date'));
    $('#hmoExpirationDate').val($(this).attr('hmo_expiration_date'));
    $('#hmoStatus').val($(this).attr('hmo_status'));

    $('#editHmoModal').modal('show');
});