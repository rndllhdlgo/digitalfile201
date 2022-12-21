// $('#btnUpdate').on('click',function(){
//     var id = $('#hidden_id').val();
//     sendFile();
//     var first_name = $('#first_name').val();
//     var last_name = $('#last_name').val();
//     var middle_name = $('#middle_name').val();
//     var suffix = $('#suffix').val();
//     var birthday = $('#birthday').val();
//     var gender = $('#gender').val();
//     var civil_status = $('#civil_status').val();
//     var street = $('#street').val();
//     var region = $("#region option:selected").text();
//     var province = $("#province option:selected").text();
//     var city = $("#city option:selected").text();
//     var email_address = $('#email_address').val();
//     var telephone_number = $('#telephone_number').val();
//     var cellphone_number = $('#cellphone_number').val();
//     var spouse_name = $('#spouse_name').val();
//     var spouse_contact_number = $('#spouse_contact_number').val();
//     var spouse_profession = $('#spouse_profession').val();
//     var father_name = $('#father_name').val();
//     var father_contact_number = $('#father_contact_number').val();
//     var father_profession = $('#father_profession').val();
//     var mother_name = $('#mother_name').val();
//     var mother_contact_number = $('#mother_contact_number').val();
//     var mother_profession = $('#mother_profession').val();
//     var emergency_contact_name = $('#emergency_contact_name').val();
//     var emergency_contact_relationship = $('#emergency_contact_relationship').val();
//     var emergency_contact_number = $('#emergency_contact_number').val();
//     var cover_image = $('#cover_image').prop('files')[0];
//     console.log(cover_image);
//     var employee_number = $('#employee_number').val();
//     var employee_company = $('#employee_company').val();
//     var employee_branch = $('#employee_branch').val();
//     var employee_status = $('#employee_status').val();
//     var employee_shift = $('#employee_shift').val();
//     var employee_position = $('#employee_position').val();
//     var employee_supervisor = $('#employee_supervisor').val();
//     var date_hired = $('#date_hired').val();
//     var company_email_address = $('#company_email_address').val();
//     var company_contact_number = $('#company_contact_number').val();
//     var sss_number = $('#sss_number').val();
//     var pag_ibig_number = $('#pag_ibig_number').val();
//     var philhealth_number = $('#philhealth_number').val();
//     var tin_number = $('#tin_number').val();
//     var account_number = $('#account_number').val();
//     var secondary_school_name = $('#secondary_school_name').val();
//     var secondary_school_address = $('#secondary_school_address').val();
//     var secondary_school_inclusive_years = $('#secondary_school_inclusive_years').val();
//     var primary_school_name = $('#primary_school_name').val();
//     var primary_school_address = $('#primary_school_address').val();
//     var primary_school_inclusive_years = $('#primary_school_inclusive_years').val();

//     Swal.fire({
//         title: 'Do you want to finish editing?',
//         allowOutsideClick: false,
//         allowEscapeKey: false,
//         showDenyButton: true,
//         confirmButtonText: 'Yes',
//         denyButtonText: 'No',
//         customClass: {
//         actions: 'my-actions',
//         confirmButton: 'order-2',
//         denyButton: 'order-3',
//         }
//     }).then((update) => {
//         if (update.isConfirmed) {
//             $.ajax({
//                 url:"/employees/update",
//                 type:"POST",
//                 headers:{
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
//                 },
//                 data:{
//                     id:id,
//                     fileName:fileName,
//                     first_name:first_name,
//                     last_name:last_name,
//                     middle_name:middle_name,
//                     suffix:suffix,
//                     birthday:birthday,
//                     gender:gender,
//                     civil_status:civil_status,
//                     street:street,
//                     region:region,
//                     province:province,
//                     city:city,
//                     email_address:email_address,
//                     telephone_number:telephone_number,
//                     cellphone_number:cellphone_number,
//                     spouse_name:spouse_name,
//                     spouse_contact_number:spouse_contact_number,
//                     spouse_profession:spouse_profession,
//                     father_name:father_name,
//                     father_contact_number:father_contact_number,
//                     father_profession:father_profession,
//                     mother_name:mother_name,
//                     mother_contact_number:mother_contact_number,
//                     mother_profession:mother_profession,
//                     emergency_contact_name:emergency_contact_name,
//                     emergency_contact_relationship:emergency_contact_relationship,
//                     emergency_contact_number:emergency_contact_number,
//                     employee_number: employee_number,
//                     employee_company:employee_company,
//                     employee_branch:employee_branch,
//                     employee_status:employee_status,
//                     employee_shift:employee_shift,
//                     employee_position:employee_position,
//                     employee_supervisor:employee_supervisor,
//                     date_hired:date_hired,
//                     company_email_address:company_email_address,
//                     company_contact_number:company_contact_number,
//                     sss_number:sss_number,
//                     pag_ibig_number:pag_ibig_number,
//                     philhealth_number:philhealth_number,
//                     tin_number:tin_number,
//                     account_number:account_number,
//                     secondary_school_name:secondary_school_name,
//                     secondary_school_address:secondary_school_address,
//                     secondary_school_inclusive_years:secondary_school_inclusive_years,
//                     primary_school_name:primary_school_name,
//                     primary_school_address:primary_school_address,
//                     primary_school_inclusive_years:primary_school_inclusive_years
//                 },
//                 success: function(data){
//                     if(data == 'true'){
//                         Swal.fire("EDIT SUCCESS"," ","success");
//                         setTimeout(function(){window.location.reload()}, 2000);
//                     }
//                     else{
//                         Swal.fire("EDIT FAILED"," ","error");
//                     }
//                 },
//                 error: function(data){
//                     if(data.status == 401){
//                         window.location.reload();
//                     }
//                     alert(data.responseText);
//                 }
//             });
//         } 
//         else if (update.isDenied) {
//             Swal.fire("EDIT CANCELLED"," ","error");
//         }
//     });
// });

$('#btnUpdate').on('click',function(){
    var id = $('#hidden_id').val();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var middle_name = $('#middle_name').val();
    var suffix = $('#suffix').val();
    var nickname = $('#nickname').val();
    var birthday = $('#birthday').val();
    var gender = $('#gender').val();
    var civil_status = $('#civil_status').val();
    var street = $('#street').val();
    var region = $("#region option:selected").text();
    var province = $("#province option:selected").text();
    var city = $("#city option:selected").text();
    var height = $("#height").val();
    var weight = $("#weight").val();
    var religion = $("#religion").val();
    var email_address = $('#email_address').val();
    var telephone_number = $('#telephone_number').val();
    var cellphone_number = $('#cellphone_number').val();
    var spouse_name = $('#spouse_name').val();
    var spouse_contact_number = $('#spouse_contact_number').val();
    var spouse_profession = $('#spouse_profession').val();
    var father_name = $('#father_name').val();
    var father_contact_number = $('#father_contact_number').val();
    var father_profession = $('#father_profession').val();
    var mother_name = $('#mother_name').val();
    var mother_contact_number = $('#mother_contact_number').val();
    var mother_profession = $('#mother_profession').val();
    var emergency_contact_name = $('#emergency_contact_name').val();
    var emergency_contact_relationship = $('#emergency_contact_relationship').val();
    var emergency_contact_number = $('#emergency_contact_number').val();

    if(!$('#filename').val() && $('#employee_image').val()){
        employee_image_save();
    }
    else if(!$('#filename').val() && !$('#employee_image').val()){
        employee_image = 'N/A';
    }
    else{
        employee_image = $('#filename').val();
    }

    $.ajax({
        url:"/employees/updatePersonalInformation",
        type:"POST",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            id:id,
            employee_image:employee_image,
            filename_delete: $('#filename_delete').val(),
            first_name:first_name,
            last_name:last_name,
            middle_name:middle_name,
            suffix:suffix,
            nickname:nickname,
            birthday:birthday,
            gender:gender,
            civil_status:civil_status,
            street:street,
            region:region,
            province:province,
            city:city,
            height:height,
            weight:weight,
            religion:religion,
            email_address:email_address,
            telephone_number:telephone_number,
            cellphone_number:cellphone_number,
            spouse_name:spouse_name,
            spouse_contact_number:spouse_contact_number,
            spouse_profession:spouse_profession,
            father_name:father_name,
            father_contact_number:father_contact_number,
            father_profession:father_profession,
            mother_name:mother_name,
            mother_contact_number:mother_contact_number,
            mother_profession:mother_profession,
            emergency_contact_name:emergency_contact_name,
            emergency_contact_relationship:emergency_contact_relationship,
            emergency_contact_number:emergency_contact_number
        },
        success:function(data){
            if(data.result == 'true'){
                $('#employee_id').val(data.id);
                var employee_number = $('#employee_number').val();
                var employee_company = $('#employee_company').val();
                var employee_department = $('#employee_department').val();
                var employee_branch = $('#employee_branch').val();
                var employee_status = $('#employee_status').val();
                var employment_origin = $('#employment_origin').val();
                var employee_salary = $('#employee_salary').val();
                var employee_shift = $('#employee_shift').val();
                var employee_position = $('#employee_position').val();
                var employee_supervisor = $('#employee_supervisor').val();
                var date_hired = $('#date_hired').val();
                var company_email_address = $('#company_email_address').val();
                var company_contact_number = $('#company_contact_number').val();
                var sss_number = $('#sss_number').val();
                var pag_ibig_number = $('#pag_ibig_number').val();
                var philhealth_number = $('#philhealth_number').val();
                var tin_number = $('#tin_number').val();
                var account_number = $('#account_number').val();

                $.ajax({
                    url:"/employees/updateWorkInformation",
                    type:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id:id,
                        employee_id:data.id,
                        employee_number:employee_number,
                        employee_company:employee_company,
                        employee_department:employee_department,
                        employee_branch:employee_branch,
                        employee_status:employee_status,
                        employment_origin:employment_origin,
                        employee_shift:employee_shift,
                        employee_position:employee_position,
                        employee_supervisor:employee_supervisor,
                        date_hired:date_hired,
                        company_email_address:company_email_address,
                        company_contact_number:company_contact_number,
                        sss_number:sss_number,
                        pag_ibig_number:pag_ibig_number,
                        philhealth_number:philhealth_number,
                        tin_number:tin_number,
                        account_number:account_number
                    },
                });

                var employee_salary = $('#employee_salary').val();
                var employee_incentives = $('#employee_incentives').val();
                var employee_overtime_pay = $('#employee_overtime_pay').val();
                var employee_bonus = $('#employee_bonus').val();
                var employee_insurance = $('#employee_insurance').val().split("\n").join(' \n');

                $.ajax({
                    url:"/employees/updateCompensationBenefits",
                    type:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id:id,
                        employee_id:data.id,
                        employee_salary:employee_salary,
                        employee_incentives:employee_incentives,
                        employee_overtime_pay:employee_overtime_pay,
                        employee_bonus:employee_bonus,
                        employee_insurance:employee_insurance
                    },
                });

                var secondary_school_name = $('#secondary_school_name').val();
                var secondary_school_address = $('#secondary_school_address').val();
                var secondary_school_inclusive_years = $('#secondary_school_inclusive_years').val();
                var primary_school_name = $('#primary_school_name').val();
                var primary_school_address = $('#primary_school_address').val();
                var primary_school_inclusive_years = $('#primary_school_inclusive_years').val();

                $.ajax({
                    url:"/employees/updateEducationalAttainment", 
                    type:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id:id,
                        employee_id:data.id,
                        secondary_school_name:secondary_school_name,
                        secondary_school_address:secondary_school_address,
                        secondary_school_inclusive_years:secondary_school_inclusive_years,
                        primary_school_name:primary_school_name,
                        primary_school_address:primary_school_address,
                        primary_school_inclusive_years:primary_school_inclusive_years
                    },
                });

                var past_medical_condition = $('#past_medical_condition').val().split("\n").join(' \n');
                var allergies = $('#allergies').val().split("\n").join(' \n');
                var medication = $('#medication').val().split("\n").join(' \n');
                var psychological_history = $('#psychological_history').val().split("\n").join(' \n');

                $.ajax({
                    url:"/employees/updateMedicalHistory",
                    type:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id:id,
                        employee_id:data.id,
                        allergies:allergies,
                        past_medical_condition:past_medical_condition,
                        medication:medication,
                        psychological_history:psychological_history
                    },
                });

                console.log('success');
            }
            else{
                console.log('failed');
            }
        }
    });
});