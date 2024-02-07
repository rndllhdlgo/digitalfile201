
var children_change,
    college_change,
    secondary_change,
    primary_change,
    training_change,
    vocational_change,
    job_history_change,
    hmo_change;
var memo_change,
    evaluation_change,
    contracts_change,
    resignation_change,
    termination_change;
var tblChildren,
    tblCollege,
    tblSecondary,
    tblPrimary,
    tblTraining,
    tblVocational,
    tblJob,
    tblHmo;
var tblMemo,
    tblEvaluation,
    tblContracts,
    tblResignation,
    tblTermination;

var changeCounter = 0;

$('#childrenAdd').click(function(){
    var emptyFields    = [];
    var child_name     = $('#child_name').val();
    var child_birthday = moment($('#child_birthday').val()).format('MMMM D, YYYY');
    var child_age      = $('#child_age').val();
    var child_gender   = $('#child_gender').val();

    if(!child_name){
        emptyFields.push('Child Name');
    }

    if(!child_gender){
        emptyFields.push('Child Gender');
    }

    if(child_birthday === 'Invalid date'){
        emptyFields.push('Child Birthday');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var children_table =`<tr class='children_tr'>
                            <td class='td_1 text-uppercase'>${child_name}</td>
                            <td class='td_2'>${child_birthday}</td>
                            <td class='td_3'>${child_age}</td>
                            <td class='td_4'>${child_gender}</td>
                            <td> <button type="button" class='btn btn-danger btn_children center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                        <tr>`;
    $('.dataTables_empty').closest('tr').remove();
    $('#children_table_orig_tbody').append(children_table);
    $('#children_table_orig').show();
    children_change = 'CHANGED';
    tblChildren = 'tblChildren';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#child_name').val("");
    $('#child_birthday').val("");
    $('#child_age').val("");
    $('#child_gender').val("");

    $('.btn_children').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$('#collegeAdd').click(function(){
    var emptyFields                  = [];
    var college_name                 = $('#college_name').val();
    var college_degree               = $('#college_degree').val();
    var college_inclusive_years_from = moment($('#college_inclusive_years_from').val()).format('MMMM YYYY');
    var college_inclusive_years_to   = moment($('#college_inclusive_years_to').val()).format('MMMM YYYY');

    if(!college_name){
        emptyFields.push('College Name');
    }

    if(!college_degree){
        emptyFields.push('College Degree');
    }

    if(college_inclusive_years_from == 'Invalid date'){
        emptyFields.push('College Inclusive Years From');
    }

    if(college_inclusive_years_to == 'Invalid date'){
        emptyFields.push('College Inclusive Years To');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var college_table = `<tr class='college_tr'>
                            <td class='td_1 text-uppercase'>${college_name}</td>
                            <td class='td_2 text-uppercase'>${college_degree}</td>
                            <td class='td_3'>FROM: ${college_inclusive_years_from}</td>
                            <td class='td_4'>TO: ${college_inclusive_years_to}</td>
                            <td><button type="button" class='btn btn-danger btn_college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                        <tr>`;

    $('.dataTables_empty').closest('tr').remove();
    $('#college_table_orig_tbody').append(college_table);
    $('#college_table_orig').show();
    $('#college_table_orig tr:last').remove();
    college_change = 'CHANGED';
    tblCollege = 'tblCollege';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#college_name').val("");
    $('#college_degree').val("");
    $('#college_inclusive_years_from').val("");
    $('#college_inclusive_years_to').val("");

    $('.btn_college').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$('#secondaryAdd').click(function(){
    var emptyFields       = [];
    var secondary_name    = $('#secondary_name').val();
    var secondary_address = $('#secondary_address').val();
    var secondary_from    = moment($('#secondary_from').val()).format('MMMM YYYY');
    var secondary_to      = moment($('#secondary_to').val()).format('MMMM YYYY');

    if(!secondary_name){
        emptyFields.push('Secondary School Name');
    }

    if(!secondary_address){
        emptyFields.push('Secondary School Address');
    }

    if(secondary_from == 'Invalid date'){
        emptyFields.push('Secondary School Inclusive Years From');
    }

    if(secondary_to == 'Invalid date'){
        emptyFields.push('Secondary School Inclusive Years To');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var secondary_table = `<tr class='secondary_tr'>
                            <td class='td_1 text-uppercase'>${secondary_name}</td>
                            <td class='td_2 text-uppercase'>${secondary_address}</td>
                            <td class='td_3'>FROM: ${secondary_from}</td>
                            <td class='td_4'>TO: ${secondary_to}</td>
                            <td style='width: 10%;'> <button type="button" class='btn btn-danger btn_secondary center' title='DELETE'> <i class='fas fa-trash-alt'></i></button></td>
                        <tr>`;

    $('.dataTables_empty').closest('tr').remove();
    $('#secondary_table_orig_tbody').append(secondary_table);
    $('#secondary_table_orig').show();
    $('#secondary_table_orig tr:last').remove();
    secondary_change = 'CHANGED';
    tblSecondary = 'tblSecondary';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#secondary_name').val("");
    $('#secondary_address').val("");
    $('#secondary_from').val("");
    $('#secondary_to').val("");

    $('.btn_secondary').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$('#primaryAdd').click(function(){
    var emptyFields     = [];
    var primary_name    = $('#primary_name').val();
    var primary_address = $('#primary_address').val();
    var primary_from    = moment($('#primary_from').val()).format('MMMM YYYY');
    var primary_to      = moment($('#primary_to').val()).format('MMMM YYYY');

    if(!primary_name){
        emptyFields.push('Primary School Name');
    }

    if(!primary_address){
        emptyFields.push('Primary School Address');
    }

    if(primary_from == 'Invalid date'){
        emptyFields.push('Primary School Inclusive Years From');
    }

    if(primary_to == 'Invalid date'){
        emptyFields.push('Primary School Inclusive Years To');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var primary_table = `<tr class='primary_tr'>
                            <td class='td_1 text-uppercase'>${primary_name}</td>
                            <td class='td_2 text-uppercase'>${primary_address}</td>
                            <td class='td_3'>FROM: ${primary_from}</td>
                            <td class='td_4'>TO: ${primary_to}</td>
                            <td><button type="button" class='btn btn-danger btn_primary center' title='DELETE'> <i class='fas fa-trash-alt'></i></button></td>
                        <tr>`;

    $('.dataTables_empty').closest('tr').remove();
    $('#primary_table_orig_tbody').append(primary_table);
    $('#primary_table_orig').show();
    $('#primary_table_orig tr:last').remove();
    primary_change = 'CHANGED';
    tblPrimary = 'tblPrimary';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#primary_name').val("");
    $('#primary_address').val("");
    $('#primary_from').val("");
    $('#primary_to').val("");

    $('.btn_primary').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$('#trainingAdd').click(function(){
    var emptyFields                   = [];
    var training_name                 = $('#training_name').val();
    var training_title                = $('#training_title').val();
    var training_inclusive_years_from = moment($('#training_inclusive_years_from').val()).format('MMMM YYYY');
    var training_inclusive_years_to   = moment($('#training_inclusive_years_to').val()).format('MMMMM YYYY');

    if(!training_name){
        emptyFields.push('Training School Name');
    }

    if(!training_title){
        emptyFields.push('Training Title');
    }

    if(training_inclusive_years_from == 'Invalid date'){
        emptyFields.push('Training Inclusive Years From');
    }

    if(training_inclusive_years_to == 'Invalid date'){
        emptyFields.push('Training Inclusive Years To');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var training_table = `<tr class='training_tr'>
                                <td class='td_1 text-uppercase'>${training_name}</td>
                                <td class='td_2 text-uppercase'>${training_title}</td>
                                <td class='td_3'>FROM: ${training_inclusive_years_from}</td>
                                <td class='td_4'>TO: ${training_inclusive_years_to}</td>
                                <td><button type="button" class='btn btn-danger btn_training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                            </tr>`;
    $('.dataTables_empty').closest('tr').remove();
    $('#training_table_orig_tbody').append(training_table);
    $('#training_table_orig').show();
    training_change = 'CHANGED';
    tblTraining = 'tblTraining';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#training_name').val("");
    $('#training_title').val("");
    $('#training_inclusive_years_from').val("");
    $('#training_inclusive_years_to').val("");

    $('.btn_training').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$('#vocationalAdd').click(function(){
    var emptyFields                     = [];
    var vocational_name                 = $('#vocational_name').val();
    var vocational_course               = $('#vocational_course').val();
    var vocational_inclusive_years_from = moment($('#vocational_inclusive_years_from').val()).format('MMMM YYYY');
    var vocational_inclusive_years_to   = moment($('#vocational_inclusive_years_to').val()).format('MMMM YYYY');

    if(!vocational_name){
        emptyFields.push('Vocational School Name');
    }

    if(!vocational_course){
        emptyFields.push('Vocational Course');
    }

    if(vocational_inclusive_years_from == 'Invalid date'){
        emptyFields.push('Vocational Inclusive Years From');
    }

    if(vocational_inclusive_years_to == 'Invalid date'){
        emptyFields.push('Vocational Inclusive Years To');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var vocational_table = `<tr class='vocational_tr'>
                                <td class='td_1 text-uppercase'>${vocational_name}</td>
                                <td class='td_2 text-uppercase'>${vocational_course}</td>
                                <td class='td_3'>${vocational_inclusive_years_from}</td>
                                <td class='td_4'>${vocational_inclusive_years_to}</td>
                                <td><button type="button" class='btn btn-danger btn_vocational center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                            </tr>`;
    $('.dataTables_empty').closest('tr').remove();
    $('#vocational_table_orig_tbody').append(vocational_table);
    $('#vocational_table_orig').show();
    vocational_change = 'CHANGED';
    tblVocational = 'tblVocational';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#vocational_name').val("");
    $('#vocational_course').val("");
    $('#vocational_inclusive_years_from').val("");
    $('#vocational_inclusive_years_to').val("");

    $('.btn_vocational').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$('#jobHistoryAdd').click(function(){
    var emptyFields              = [];
    var job_company_name         = $('#job_company_name').val();
    var job_description          = $('#job_description').val();
    var job_position             = $('#job_position').val();
    var job_contact_number       = $('#job_contact_number').val();
    var job_inclusive_years_from = moment($('#job_inclusive_years_from').val()).format('MMMM YYYY');
    var job_inclusive_years_to   = moment($('#job_inclusive_years_to').val()).format('MMMM YYYY');

    if(!job_company_name){
        emptyFields.push('Company Name');
    }

    if(!job_description){
        emptyFields.push('Job Desciprtion');
    }

    if(!job_position){
        emptyFields.push('Job Position');
    }

    if(!job_contact_number){
        emptyFields.push('Contact Number');
    }

    if(job_inclusive_years_from == 'Invalid date'){
        emptyFields.push('Job Inclusive Years From');
    }

    if(job_inclusive_years_to == 'Invalid date'){
        emptyFields.push('Job Inclusive Years To');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    var job_history_table = `<tr class='job_history_tr'>
                                <td class='td_1 text-uppercase'>${job_company_name}</td>
                                <td class='td_2 text-uppercase'>${job_description}</td>
                                <td class='td_3 text-uppercase'>${job_position}</td>
                                <td class='td_4'>${job_contact_number}</td>
                                <td class='td_5'>${job_inclusive_years_from}</td>
                                <td class='td_6'>${job_inclusive_years_to}</td>
                                <td><button type="button" class='btn btn-danger btn_job center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                            </tr>`;
    $('.dataTables_empty').closest('tr').remove();
    $('#job_history_table_tbody').append(job_history_table);
    $('#job_history_table_orig').show();
    job_history_change = 'CHANGED';
    tblJob = 'tblJob';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#job_company_name').val("");
    $('#job_description').val("");
    $('#job_position').val("");
    $('#job_contact_number').val("");
    $('#job_inclusive_years_from').val("");
    $('#job_inclusive_years_to').val("");

    $('.btn_job').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

// $('#hmoAdd').click(function(){
//     var emptyFields      = [];
//     var hmo              = $('#hmo').val();
//     var coverage         = $('#coverage').val();
//     var particulars      = $('#particulars').val();
//     var room             = $('#room').val();
//     var effectivity_date = moment($('#effectivity_date').val()).format('MMMM D, YYYY');
//     var expiration_date  = moment($('#expiration_date').val()).format('MMMM D, YYYY');

//     if(!hmo){
//         emptyFields.push('HMO');
//     }

//     if(!coverage){
//         emptyFields.push('Coverage');
//     }

//     if(!particulars){
//         emptyFields.push('Particulars');
//     }

//     if(!room){
//         emptyFields.push('Room');
//     }

//     if(effectivity_date == 'Invalid date'){
//         emptyFields.push('Effectivity Date');
//     }

//     if(expiration_date == 'Invalid date'){
//         emptyFields.push('Expiration Date');
//     }

//     if(emptyFields.length > 0){
//         Swal.fire({
//             title: 'Please fill up the following fields:',
//             html: `<ul style="text-align: left !important; font-weight: 600 !important;">
//                         ${emptyFields.map(field => `<li>${field}</li>`).join('')}
//                     </ul>`,
//             icon: "error"
//         });
//         return false;
//     }

//     var hmo_table = `<tr class='hmo_tr'>
//                         <td class='td_1 text-uppercase'>${hmo}</td>
//                         <td class='td_2 text-uppercase'>${coverage}</td>
//                         <td class='td_3 text-uppercase'>${particulars}</td>
//                         <td class='td_4 text-uppercase'>${room}</td>
//                         <td class='td_5'>${effectivity_date}</td>
//                         <td class='td_6'>${expiration_date}</td>
//                         <td class='text-center'>ACTIVE</td>
//                         <td><button type="button" class='btn btn-danger btn_hmo center' title='DELETE'> <i class='fas fa-trash-alt'></i></button></td>
//                     <tr>`;

//     $('.dataTables_empty').closest('tr').remove();
//     $('#hmo_table_orig_tbody').append(hmo_table);
//     $('#hmo_table_orig').show();
//     $('#hmo_table_orig tr:last').remove();
//     hmo_change = 'CHANGED';
//     tblHmo = 'tblHmo';
//     changeCounter++;
//     disableUpdate('', changeCounter, true);

//     $('#hmo').val('');
//     $('#coverage').val('');
//     $('#particulars').val('');
//     $('#room').val('');
//     $('#effectivity_date').val('');
//     $('#expiration_date').val('');

//     $('.btn_hmo').click(function(){
//         Swal.fire({
//             title: 'Do you want to delete this row?',
//             text: "You won't be able to revert this!",
//             icon: 'warning',
//             allowOutsideClick: false,
//             allowEscapeKey: false,
//             showDenyButton: true,
//             confirmButtonText: 'Yes',
//             denyButtonText: 'No',
//             customClass: {
//             actions: 'my-actions',
//             confirmButton: 'order-2',
//             denyButton: 'order-3',
//             }
//         }).then((save) => {
//             if(save.isConfirmed){
//                 $(this).parent().parent().remove();
//                 changeCounter--;
//                 disableUpdate('', changeCounter, true);
//             }
//         });
//     });
// });

$('#hmoAdd').on('click', function(){
    $('#active_stat').text('ACTIVE');
    var newRow = `
            <tr class="tr_hmo">
                <td style="border-top: 1px solid white;">
                    <input name="hmo" type="hidden" value="${$('#hmo').val()}">
                </td>
                <td>
                    <input name="coverage" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                </td>
                <td>
                    <input name="particulars" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                </td>
                <td>
                    <input name="room" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                </td>
                <td>
                    <input name="effectivity_date" class="forminput form-control" type="date" placeholder=" " style="background-color:white;">
                </td>
                <td>
                    <input name="expiration_date" class="forminput form-control" type="date" placeholder=" " style="background-color:white;">
                </td>
                <td style="border-top: 1px solid white;">
                    <b class="text-success">ACTIVE</b>
                </td>
                <td style="border-top: 1px solid white;">
                    <button type="button" class='btn btn-danger btn_hmo center' title='DELETE'> <i class='fas fa-trash-alt'></i></button>
                </td>
            </tr>`;
    $('.tr_hmo:last').after(newRow);

    hmo_change = 'CHANGED';
    tblHmo = 'tblHmo';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('.btn_hmo').click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$(document).on('click','#btnAddMemoRow', function(){
    var emptyFields  = [];
    var memo_subject = $('#memo_subject').val();
    var memo_date    = $('#memo_date').val();
    var memo_penalty = $('#memo_penalty').val();
    var memo_file    = $('#memo_file')[0];

    if(!memo_subject){
        emptyFields.push('Memo Subject');
    }

    if(!memo_date){
        emptyFields.push('Memo Date');
    }

    if(!memo_penalty){
        emptyFields.push('Memo Penalty');
    }

    if(memo_file.files.length === 0){
        emptyFields.push('Memo File');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    memo_change = 'CHANGED';
    tblMemo = 'tblMemo';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#memo_subject').attr('id','');
    $('#memo_date').attr('id','');
    $('#memo_penalty').attr('id','');
    $('#memo_file').attr('id','');
    $('#memoTable').find('tbody').prepend(`<tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-uppercase" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="memo_subject" class="formlabel form-label">(Optional)</label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="memo_date" class="formlabel form-label">(Optional)</label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <select class="form-select forminput multiple_field form-control" name="memo_penalty[]" id="memo_penalty" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT PENALTY</option>
                            <option value="Verbal">Verbal</option>
                            <option value="Written">Written</option>
                            <option value="2nd Offense">2nd Offense</option>
                            <option value="3rd Offense">3rd Offense</option>
                            <option value="Final">Final</option>
                        </select>
                        <label for="memo_penalty" class="formlabel form-label">(Optional)</label>
                    </div>
                </td>
                <td>
                    <input type="file" class="form-control form_file" id="memo_file" name="memo_file[]" onchange="fileValidation('memo_file')" accept=".pdf">
                </td>
                <td>
                    <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddMemoRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                </td>
            </tr>`);
    $('#memoTable').find('tr').eq(3).find('td').eq(4).html('<button type="button" class="btn btn-danger btn_memo center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

    $(".btn_memo").click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$(document).on('click','#btnAddEvaluationRow', function(){
    var emptyFields             = [];
    var evaluation_reason       = $('#evaluation_reason').val();
    var evaluation_date         = $('#evaluation_date').val();
    var evaluation_evaluated_by = $('#evaluation_evaluated_by').val();
    var evaluation_file         = $('#evaluation_file')[0];

    if(!evaluation_reason){
        emptyFields.push('Evaluation Reason');
    }

    if(!evaluation_date){
        emptyFields.push('Evaluation Date');
    }

    if(!evaluation_evaluated_by){
        emptyFields.push('Evaluation Evaluated By');
    }

    if(evaluation_file.files.length === 0){
        emptyFields.push('Evaluation File');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    evaluation_change = 'CHANGED';
    tblEvaluation = 'tblEvaluation';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#evaluation_reason').attr('id','');
    $('#evaluation_date').attr('id','');
    $('#evaluation_evaluated_by').attr('id','');
    $('#evaluation_file').attr('id','');
    $('#evaluationTable').find('tbody').prepend(`<tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" name="evaluation_reason[]" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="evaluation_reason" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="date" name="evaluation_date[]" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="evaluation_date" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-uppercase" type="search" name="evaluation_evaluated_by[]" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="evaluation_evaluated_by" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>
                    <td>
                        <input type="file" class="form-control form_file" name="evaluation_file[]" id="evaluation_file" onchange="fileValidation('evaluation_file')" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddEvaluationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>`);
    $('#evaluationTable').find('tr').eq(3).find('td').eq(4).html('<button type="button" class="btn btn-danger btn_evaluation center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

    $(".btn_evaluation").click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$(document).on('click','#btnAddContractRow', function(){
    var emptyFields    = [];
    var contracts_type = $('#contracts_type').val();
    var contracts_date = $('#contracts_date').val();
    var contracts_file = $('#contracts_file')[0];

    if(!contracts_type){
        emptyFields.push('Contract Type');
    }

    if(!contracts_date){
        emptyFields.push('Contract Date');
    }

    if(contracts_file.files.length === 0){
        emptyFields.push('Contract File');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    contracts_change = 'CHANGED';
    tblContracts = 'tblContracts';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#contracts_type').attr('id','');
    $('#contracts_date').attr('id','');
    $('#contracts_file').attr('id','');
    $('#contractsTable').find('tbody').prepend(`<tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="search" name="contracts_type[]" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="contracts_type" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="date" name="contracts_date[]" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="contracts_date" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <input type="file" class="form-control form_file" name="contracts_file[]" id="contracts_file" onchange="fileValidation('contracts_file')" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddContractRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>`);
    $('#contractsTable').find('tr').eq(3).find('td').eq(3).html('<button type="button" class="btn btn-danger btn_contracts center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

    $(".btn_contracts").click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$(document).on('click','#btnAddResignationRow', function(){
    var emptyFields        = [];
    var resignation_reason = $('#resignation_reason').val();
    var resignation_date   = $('#resignation_date').val();
    var resignation_file   = $('#resignation_file')[0];

    if(!resignation_reason){
        emptyFields.push('Resignation Reason');
    }

    if(!resignation_date){
        emptyFields.push('Resignation Date');
    }

    if(resignation_file.files.length === 0){
        emptyFields.push('Resignation File');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    resignation_change = 'CHANGED';
    tblResignation = 'tblResignation';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#resignation_reason').attr('id','');
    $('#resignation_date').attr('id','');
    $('#resignation_file').attr('id','');
    $('#resignationTable').find('tbody').prepend(`<tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-uppercase" name="resignation_reason[]" type="search" id="resignation_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="resignation_reason" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" name="resignation_date[]" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="resignation_date" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <input type="file" class="form-control form_file" name="resignation_file[]" id="resignation_file" onchange="fileValidation('resignation_file')" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddResignationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>`);
    $('#resignationTable').find('tr').eq(3).find('td').eq(3).html('<button type="button" class="btn btn-danger btn_resignation center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

    $(".btn_resignation").click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});

$(document).on('click','#btnAddTerminationRow',function(){
    var emptyFields        = [];
    var termination_reason = $('#termination_reason').val();
    var termination_date   = $('#termination_date').val();
    var termination_file   = $('#termination_file')[0];

    if(!termination_reason){
        emptyFields.push('Termination Reason');
    }

    if(!termination_date){
        emptyFields.push('Termination Date');
    }

    if(termination_file.files.length === 0){
        emptyFields.push('Termination File');
    }

    if(emptyFields.length > 0){
        Swal.fire({
            title: 'Please fill up the following fields:',
            html: `<ul style="text-align: left !important; font-weight: 600 !important;">
                        ${emptyFields.map(field => `<li>${field}</li>`).join('')}
                    </ul>`,
            icon: "error"
        });
        return false;
    }

    termination_change = 'CHANGED';
    tblTermination = 'tblTermination';
    changeCounter++;
    disableUpdate('', changeCounter, true);

    $('#termination_reason').attr('id','');
    $('#termination_date').attr('id','');
    $('#termination_file').attr('id','');
    $('#terminationTable').find('tbody').prepend(`<tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-uppercase" name="termination_reason[]" type="search" id="termination_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="termination_reason" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" name="termination_date[]" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="termination_date" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <input type="file" class="form-control form_file" name="termination_file[]" id="termination_file" onchange="fileValidation('termination_file')" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddTerminationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>`);
    $('#terminationTable').find('tr').eq(3).find('td').eq(3).html('<button type="button" class="btn btn-danger btn_termination center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

    $(".btn_termination").click(function(){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
            if(save.isConfirmed){
                $(this).parent().parent().remove();
                changeCounter--;
                disableUpdate('', changeCounter, true);
            }
        });
    });
});