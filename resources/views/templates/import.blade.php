@extends('layouts.app')

@section('content')
<br>
    <h4>IMPORT</h4>
    <div class="row">
        <div class="col-2">
            <button type="button" class="form-control bg-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-file-export"></i> IMPORT</button>
        </div>
    </div>
    <hr class="hr-design">
    <div class="row">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control text-uppercase" type="text" id="test_fname" placeholder=" " style="background-color:white;" autocomplete="off">
                <label for="fname" class="formlabel form-label"><i class="fas fa-address-card"></i> FIRST NAME</label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control text-uppercase" type="text" id="test_mname" placeholder=" " style="background-color:white;" autocomplete="off">
                <label for="mname" class="formlabel form-label"><i class="fas fa-address-card"></i> MIDDLE NAME</label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control text-uppercase" type="text" id="test_lname" placeholder=" " style="background-color:white;" autocomplete="off">
                <label for="lname" class="formlabel form-label"><i class="fas fa-address-card"></i> LAST NAME</label>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUpload" action="/import_save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                    <input type="file" id="xlsx" name="xlsx" class="form-control" accept=".xls,.xlsx" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/templates/test_import.xlsx" class="btn btn-primary">DOWNLOAD TEMPLATE</a>
                            <button type="button" id="btnUpload"  class="btn btn-primary">UPLOAD</button>
                            <input type="submit" id="btnSubmit" class="d-none">
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <script>
        $('#loading').hide();

        $('#btnUpload').on('click',function(){
            if($('#xlsx')[0].files.length === 0){
                $('#btnSubmit').click();
            }
            else{
                Swal.fire({
                title: 'Do you want to import?',
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
                        $('#btnSubmit').click();
                    }
                });
            }
        });

        $(document).ready(function(){
            if(current_location == '/import_blade?import=success'){
                Swal.fire("IMPORT SUCCESS", "Import Sucessful.", "success");
            }
            else if(current_location == '/import_blade?import=failed'){
                Swal.fire("IMPORT FAILED", "Import Failed.", "error");
            }
        });

    </script>
@endsection