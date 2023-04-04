@extends('layouts.app')

@section('content')
<br>

{{-- <div class="row">
    <div class="col">
        <input class="forminput form-control" type="search" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11">
    </div>
    <div class="col">
        <input class="forminput form-control" type="search" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11">
    </div>
</div>

<script>
    $('#loading').hide();

    $(document).ready(function() {
        var cellphone_number = $('#cellphone_number');
        var emergency_contact_number = $('#emergency_contact_number');

        cellphone_number.add(emergency_contact_number).keyup(function() {
            if (cellphone_number.val() === emergency_contact_number.val()) {
            console.log('The two input fields have the same value.');
            } else {
            console.log('The two input fields have different values.');
            }
        });
    });
</script> --}}
<button type="button" class="btn btn-primary" id="open">OPEN</button>
<div class="modal fade" id="summaryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0d1a80;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Employee Summary Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="close_summary"></button>
            </div>

            <div class="modal-body p-2" style="overflow-x: hidden;">
                <button type="button" class="btn btn-primary" id="btnPdf">SAVE AS PDF</button>

            <hr class="hr-design">
                <div class="summary_container">
                    <div class="clear_float">
                        <div class="column_one">
                            <div class="row">
                                <h5 class="summary_title">PERSONAL INFORMATION</h5>
                            </div>
                        </div>

                        <div class="column_two mt-4">
                            <img id="image_preview_summary">
                        </div>
                    </div>

                    <div class="column_three" style="padding:5px;">
                        <div class="row">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>HOME ADDRESS</u></h5>
                        </div>
                    </div>

                    <div class="column_four" style="padding:5px;">
                        <div class="row mb-1">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>CONTACT DETAILS</u></h5>
                        </div>
                    </div>

                    <div class="column_five" style="padding:5px;">
                        <div class="row mb-1">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>WORK INFORMATION</u></h5>
                        </div>
                    </div>

                    <div class="column_six" style="padding:5px;">
                        <div class="row mb-1">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>JOB HISTORY</u></h5>
                        </div>
                    </div>

                    <div class="column_seven" style="padding:5px;">
                        <div class="row mb-1">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>GOVERNMENT MANDATORY BENEFITS</u></h5>
                        </div>
                    </div>

                    <div class="column_eight" style="padding:5px;">
                        <div class="row mb-1">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>MEDICAL HISTORY</u></h5>
                        </div>
                    </div>

                    <div class="column_nine" style="padding:5px;">
                        <div class="row mb-1">
                            <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>EDUCATIONAL ATTAINMENT</u></h5>
                        </div>

                        <div class="row mb-3">
                            <h6><b>COLLEGE ATTAINMENT</b></h6><br>
                                <div class="col">
                                    <b>SCHOOL NAME:</b>
                                </div>
                                <div class="col">
                                    <b>DEGREE:</b>
                                </div>
                                <div class="col">
                                    <b>INCLUSIVE YEARS:</b>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <h6><b>SECONDARY SCHOOL ATTAINMENT</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b>
                            </div>
                            <div class="col">
                                <b>SCHOOL ADDRESS:</b>
                            </div>
                            <div class="col">
                                <b>INCLUSIVE YEARS:</b>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h6><b>PRIMARY SCHOOL ATTAINMENT</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b>
                            </div>
                            <div class="col">
                                <b>SCHOOL ADDRESS:</b>
                            </div>
                            <div class="col">
                                <b>INCLUSIVE YEARS:</b>
                            </div>
                        </div>
                    </div>
                </div>
            <hr class="hr-design">
            </div>
        </div>
    </div>
</div>

<script>
    $('#open').on('click',function(){
        $('#summaryModal').modal('show');
    });
    $('#loading').hide();
</script>
@endsection