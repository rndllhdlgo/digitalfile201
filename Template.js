$(document).on('click','table.updateListTable tbody tr td',function(){
    var data = table.row(this).data();
    var id = data.id;
});

$.ajax({
    url: '/route_name',
    type: 'GET',
    success: function(data) {
    }
});

tableName = $('table.tableName').DataTable({
    dom: 'ltrip',
    aLengthMenu:[[10,25,50,100,500,1000,-1], [10,25,50,100,500,1000,"All"]],
    language: {
        info: "Showing _START_ to _END_ of _TOTAL_ Users",
        lengthMenu: "Show _MENU_ Users",
        emptyTable: "NO DATA AVAILABLE",
    },
    processing: true,
    serverSide: false,
    order: [],
    initComplete: function(){
        $(document).prop('title', $('#page-name').text());
        $('#loading').hide();
    }
});

$('.saveBtn').on('click',function(){
    var type = $('#type').val();

    Swal.fire({
        title: 'Do you want to save?',
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
            $('#loading').show();
            $.ajax({
                url:'/saveType',
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    type:type,
                },
                success:function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#typeModal').modal('hide');
                        Swal.fire({
                            title: 'STORE TYPE ADDED SUCCESSFULLY',
                            icon: 'success',
                            timer: 2000
                        });
                    }
                    else{
                        $('#loading').hide();
                        $('#typeModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            timer: 2000
                        });
                    }
                }
            });
        }
        else if(save.isDenied){
            Swal.fire('SAVE CANCELLED','','info');
            $('#typeModal').modal('hide');
        }
    });
});


if(strpos($request->empno, 'ID') !== false ||
strpos($request->empno, 'PL') !== false ||
strpos($request->empno, 'AP') !== false ||
strpos($request->empno, 'MJ') !== false ||
strpos($request->empno, 'NU') !== false){
$employee->empno = substr($request->empno, 2);
}
else{
$employee->empno = $request->empno;
}

var name;
function name() {
    var formData = new FormData();
    var file = $('#name').prop('files')[0];

    formData.append('name', file);
    $.ajax({
        url: '/route_name',
        method: 'post',
        data: formData,
        contentType : false,
        processData : false,
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            product_image = response;
        }
    });
}

var employee_image;
function employee_image_save(){
    var extension = "jpeg";
    var date = new Date();

    employee_image = $('#employee_number').val() + '_' + $('#last_name').val().toUpperCase() + '_' + $('#first_name').val().toUpperCase() + '_' +
                    date.getFullYear().toString().slice(-2) +
                    ("0" + (date.getMonth() + 1)).slice(-2) +
                    ("0" + date.getDate()).slice(-2) +
                    ("0" + date.getHours()).slice(-2) +
                    ("0" + date.getMinutes()).slice(-2) +
                    ("0" + date.getSeconds()).slice(-2) + '.' + extension;

    var croppedImageData = $('#image_preview').attr('src');
    $.ajax({
        url: '/employees/insertImage',
        method: 'post',
        data: {
                employee_image: employee_image,
                image_data: croppedImageData
              },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            console.log(response);
        }
    });
}


$('.checkDuplicate').on('focusout', function () {
    var inputField = $(this);
    var fieldName = inputField.attr('id');
    var fieldValue = inputField.val();
    var duplicateElement = $('#duplicate_' + fieldName);

    if (fieldValue.length === 0) {
        duplicateElement.hide();
        return;
    }

    $.ajax({
        url: "/check_duplicate",
        data: {
            field_name: fieldName,
            field_value: fieldValue,
        },
        success: function (data) {
            if (data == 'true') {
                duplicateElement.show();
            } else {
                duplicateElement.hide();
            }
        }
    });
});

<a id="composeEmailLink" href="#"><span id="recipientEmail">rendellhidalgo11@gmail.com</span></a>
$('#composeEmailLink').click(function(event) {
    event.preventDefault();

    var recipientEmail = $('#recipientEmail').text(); // Fetch the email from the HTML element

    var gmailComposeURL = 'https://mail.google.com/mail/?view=cm&fs=1&to=' + encodeURIComponent(recipientEmail);
    window.open(gmailComposeURL);
});


public function duplicate_work(Request $request){
    $fieldName = $request->field_name;
    $fieldValue = $request->field_value;

    if(WorkInformationTable::where($fieldName, $fieldValue)->count() > 0){
        return 'true';
    }
}

$('.check_duplicate').on('keyup', function(){
    var inputField = $(this);
    var fieldName = inputField.attr('id');
    var fieldValue = inputField.val();
    var duplicateElement = $('#duplicate_' + fieldName);

    if(fieldValue.length === 0){
        duplicateElement.hide();
        return;
    }

    $.ajax({
        url: "/check_duplicate",
        data: {
            field_name: fieldName,
            field_value: fieldValue,
        },
        success: function (data) {
            if (data == 'true') {
                duplicateElement.show();
            } else {
                duplicateElement.hide();
            }
        }
    });
});

{{-- {{App\Models\WorkInformationTable::whereNotIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])->count()}} --}}

if(window.location.search.includes('employee_number') == true){
    var url = new URL(window.location.href);
    var employee_number = url.searchParams.get("employee_number");
    $('.'+employee_number).closest('tr').click();
}