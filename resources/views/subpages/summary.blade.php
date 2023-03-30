{{-- PDF PRINT --}}
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

                <div id="print_file">
                    <div class="summary_container">
                         <div class="clear_float">
                            <div class="column_one">
                                <div class="row mb-1">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>PERSONAL INFORMATION</u></h5>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>FIRST NAME:</b><br>
                                        <span class="first_name font_weight"></span>
                                    </div>
                                     <div class="col">
                                        <b>MIDDLE NAME:</b><br>
                                        <span class="middle_name font_weight"></span>
                                    </div>

                                    <div class="col">
                                        <b>LAST NAME:</b><br>
                                        <span class="last_name font_weight"></span>
                                    </div>
                                    <div class="col" id="suffix_div">
                                        <b>SUFFIX:</b><br>
                                        <span class="suffix font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <b>NICKNAME:</b><br>
                                        <span class="nickname font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>BIRTHDAY:</b><br>
                                        <input type="date" class="birthday font_weight d-none" style="border:none; width:106px;" disabled> <span id="birthday_summary"> </span>
                                    </div>
                                    <div class="col">
                                        <b>AGE:</b><br>
                                        <span class="age font_weight"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <b>GENDER:</b><br>
                                        <span class="gender font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>HEIGHT:</b><br>
                                        <span class="height font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>WEIGHT:</b><br>
                                        <span class="weight font_weight"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <b>RELIGION:</b><br>
                                        <span class="religion font_weight"></span>
                                    </div>
                                    <div class="col-4">
                                        <b>CIVIL STATUS:</b><br>
                                        <input type="hidden" class="civil_status font_weight" style="border:none;" disabled> <span id="civil_status_content"></span>
                                    </div>
                                </div>
                            </div> <!-- Column 1 -->

                            <div class="column_two">
                                <img id="image_preview_summary">
                            </div> <!-- Column 2 -->
                        </div><!-- Clear Float -->

                        <div class="column_three" style="padding:5px;">
                            <div class="row">
                                <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>HOME ADDRESS</u></h5>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>ADDRESS:</b> <span class="address font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>PROVINCE:</b> <input type="hidden" id="province_summary" class="font_weight" style="border:none;" disabled> <span id="province_content"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <b>CITY:</b> <input type="hidden" id="city_summary" class="font_weight" style="border:none;" disabled> <span id="city_content"></span>
                                </div>
                                <div class="col">
                                    <b>REGION:</b> <input type="hidden" id="region_summary" class="font_weight" style="border:none; width:85%;" disabled> <span id="region_content"></span>
                                </div>
                            </div>
                        </div>

                        <div class="column_four" style="padding:5px;">
                            <div class="row mb-1">
                                <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>CONTACT DETAILS</u></h5>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>EMAIL ADDRESS:</b><br> <span class="email_address font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>CELLPHONE NO.:</b><br> <span class="cellphone_number font_weight"></span>
                                </div>
                                <div class="col" id="telephone_number_div">
                                    <b>TELEPHONE NO.:</b><br> <span class="telephone_number font_weight"></span>
                                </div>
                            </div>

                            <div class="row mb-3" id="spouse_summary_div" style="display:none;">
                                <div class="col">
                                    <b>SPOUSE NAME:</b><br> <span class="spouse_name"></span>
                                </div>
                                <div class="col">
                                    <b>SPOUSE CONTACT NO.:</b><br> <span class="spouse_contact_number"></span>
                                </div>
                                <div class="col">
                                    <b>SPOUSE PROFESSION:</b><br> <span class="spouse_profession"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>FATHER'S NAME:</b><br> <span class="father_name font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>CELLPHONE NO.:</b><br> <span class="father_contact_number font_weight"></span>
                                </div>
                                <div class="col" id="father_profession_div">
                                    <b>PROFESSION:</b><br> <span class="father_profession font_weight"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>MOTHER'S MAIDEN NAME:</b><br> <span class="mother_name font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>CELLPHONE NO.:</b><br> <span class="mother_contact_number font_weight"></span>
                                </div>
                                <div class="col" id="mother_profession_div">
                                    <b>PROFESSION:</b><br> <span class="mother_profession font_weight"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>EMERGENCY CONTACT NAME:</b><br> <span class="emergency_contact_name font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>CELLPHONE NO.:</b><br> <span class="emergency_contact_number font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>RELATIONSHIP:</b><br> <span class="emergency_contact_relationship font_weight"></span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="page-break"></div> --}}
                        <hr style="border:0.5px solid black; opacity:100%;">

                        <div class="column_five" style="padding:5px;">
                            <div class="row mb-1">
                                <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>WORK INFORMATION</u></h5>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>EMPLOYEE NO.:</b><br> <span class="employee_number"></span>
                                </div>

                                <div class="col">
                                    <b>DATE HIRED:</b><br>
                                    <input type="date" class="date_hired font_weight d-none" style="border:none; width:106px;" disabled> <span id="date_hired_summary"> </span>
                                </div>

                                {{-- <div class="col" style="visibility:hidden;">
                                    <b>SUPERVISOR:</b><br>
                                    <span class="employee_supervisor"></span>
                                </div> --}}
                                <div class="col">
                                    <b>COMPANY:</b><br>
                                    <span class="employee_company"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>BRANCH:</b><br>
                                    <span class="employee_branch"></span>
                                </div>

                                <div class="col">
                                    <b>DEPARTMENT:</b><br>
                                    <span class="employee_department"></span>
                                </div>
                                <div class="col">
                                    <b>EMPLOYMENT STATUS:</b><br>
                                    <span class="employment_status"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>EMPLOYMENT ORIGIN:</b><br>
                                    <span class="employment_origin"></span>
                                </div>
                                <div class="col" id="company_email_address_div">
                                    <b>WORK EMAIL ADDRESS:</b><br>
                                    <span class="company_email_address font_weight"></span>
                                </div>
                                <div class="col" id="company_contact_number_div">
                                    <b>WORK CONTACT NO.:</b><br>
                                    <span class="company_contact_number font_weight"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>JOB POSITION:</b><br>
                                    <span class="employee_position"></span>
                                </div>

                                <div class="col">
                                    <b>JOB DESCRIPTION:</b><br>
                                    <p class="job_desc_div" style="zoom: 110%;color:black;"></p>
                                </div>

                                <div class="col">
                                    <b>JOB REQUIREMENTS/SKILLS:</b><br>
                                    <p class="job_req_div" style="zoom:110%;color:black"></p>
                                </div>
                            </div>
                        </div>

                        <div class="column_six" style="padding:5px; display:none;">
                            <hr style="border:0.5px solid black; opacity:100%;">

                                <div class="row mb-1">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>WORK EXPERIENCE</u></h5>
                                </div>

                                <div id="job_history_summary_div" class="row"></div>
                        </div>

                        <hr style="border:0.5px solid black; opacity:100%;">

                        <div class="column_seven mb-3" id="benefits_summary" style="padding:5px;">
                            <div class="row mb-1">
                                <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>GOVERNMENT MANDATORY BENEFITS INFORMATION</u></h5>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <b>PAG-IBIG NO. :</b><br>
                                    <span class="pag_ibig_number"></span>
                                </div>
                                <div class="col">
                                    <b>PHILHEALTH NO. :</b><br>
                                    <span class="philhealth_number"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <b>SSS NO. :</b><br>
                                    <span class="sss_number"></span>
                                </div>
                                <div class="col">
                                    <b>TIN NO. :</b><br>
                                    <span class="tin_number"></span>
                                </div>
                            </div>
                            <hr style="border:0.5px solid black; opacity:100%;">
                        </div>
                    </div> <!-- Summary Container -->
                </div> <!-- Print Summary -->
                <hr class="hr-design">
            </div> <!-- Modal Body Div -->
        </div> <!-- Modal Content -->
    </div> <!-- Modal Dialogue -->
</div> <!-- Summary Modal -->

{{-- <div id="job_history_summary_div" class="row">
    <div class="col">
        <span class="job_position_span">GRAB FOOD RIDER/BICYCLE<br></span>
        <span class="job_company_name_span">GRAB<br></span>
            <ul class="job_description_ul">
                <li>DELIVER FOOD/ESSENTIAL ITEMS</li>
            </ul>
    </div>
    <div class="col">
        <span class="job_position_span">JR. PROGAMMER<br></span>
        <span class="job_company_name_span">APSOFT<br></span>
        <ul class="job_description_ul">
            <li>ASSISTING WITH THE CREATION OF WEBSITES</li>
        </ul>
    </div>
</div> --}}

{{-- <div id="job_history_summary_div" class="row">
    <div class="col-2">
        <span>Mar. 2022 - </span>
        <span>Mar. 2023<br></span>
    </div>
    <div class="col">
        <h5>GRAB FOOD DELIVERY RIDER/BICYCLE<br></h5>
        <h6>GRAB<br></h6>
        <span> - DELIVER FOOD/ESSENTIAL ITEMS</span>
    </div>

    <div class="col-2">
        <span>Mar. 2022 - </span>
        <span>Mar. 2023<br></span>
    </div>
    <div class="col">
        <h5>JR. PROGAMMER<br></h5>
        <h6>APSOFT<br></h6>
        <span> - ASSISTING WITH THE CREATION OF WEBSITES.</span>
    </div>
</div> --}}