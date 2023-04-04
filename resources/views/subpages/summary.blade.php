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
                <button type="button" class="btn btn-primary" id="btnSection">SELECT SECTION</button>

            <hr class="hr-design">
            <div id="print_file">
                <div class="summary_container">
                    <div class="clear_float">
                        <div class="column_one">
                            <div class="row">
                                <h5 class="summary_title">PERSONAL INFORMATION</h5>
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
                                <div class="col">
                                    <b>NICKNAME:</b><br>
                                    <span class="nickname font_weight"></span>
                                </div>
                                <div class="col" id="suffix_div">
                                    <b>GENDER:</b><br>
                                    <span class="gender font_weight"></span>
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
                                    <b>HEIGHT:</b><br>
                                    <span class="height font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>WEIGHT:</b><br>
                                    <span class="weight font_weight"></span>
                                </div>
                                <div class="col">
                                    <b>CIVIL STATUS:</b><br>
                                    <input type="hidden" class="civil_status font_weight" style="border:none;" disabled> <span id="civil_status_content"></span>
                                </div>
                                <div class="col">
                                    <b>RELIGION:</b><br>
                                    <span class="religion font_weight"></span>
                                </div>
                            </div>
                        </div>

                        <div class="column_two mt-4">
                            <img id="image_preview_summary">
                        </div>
                    </div>
                    <hr>

                    <div class="column_three" style="padding:5px;">
                        <div class="row">
                            <h5 class="summary_title">HOME ADDRESS</h5>
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
                        <hr>
                    </div>

                    <div class="column_four" style="padding:5px;">
                        <div class="row ">
                            <h5 class="summary_title">CONTACT DETAILS</h5>
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
                        <hr>
                    </div>

                    <div class="column_five" style="padding:5px;">
                        <div class="row ">
                            <h5 class="summary_title">WORK INFORMATION</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <b>EMPLOYEE NO.:</b><br> <span class="employee_number"></span>
                            </div>

                            <div class="col">
                                <b>DATE HIRED:</b><br>
                                <input type="date" class="date_hired font_weight d-none" style="border:none; width:106px;" disabled> <span id="date_hired_summary"> </span>
                            </div>

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
                        <hr>
                    </div>
                    <div class="column_six" style="padding:5px;">
                        <div class="row ">
                            <h5 class="summary_title">GOVERNMENT MANDATORY BENEFITS</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <b>PAG-IBIG NO.:</b><br>
                                <span class="pag_ibig_number"></span>
                            </div>
                            <div class="col">
                                <b>PHILHEALTH NO.:</b><br>
                                <span class="philhealth_number"></span>
                            </div>
                            <div class="col">
                                <b>SSS NO.:</b><br>
                                <span class="sss_number"></span>
                            </div>
                            <div class="col">
                                <b>TIN NO.:</b><br>
                                <span class="tin_number"></span>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="column_seven" style="padding:5px;display:none;">
                        <div class="row ">
                            <h5 class="summary_title">EDUCATIONAL ATTAINMENT</h5>
                        </div>

                        <div class="row mb-3">
                            <h6><b>COLLEGE ATTAINMENT</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b><br>
                                <span class="college_school_name"></span>
                            </div>
                            <div class="col">
                                <b>DEGREE:</b><br>
                                <span class="college_school_degree"></span>
                            </div>
                            <div class="col text-center">
                                <b>INCLUSIVE YEARS:</b><br>
                                <span class="college_years"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h6><b>SECONDARY SCHOOL ATTAINMENT</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b><br>
                                <span class="secondary_school_name"></span>
                            </div>
                            <div class="col">
                                <b>SCHOOL ADDRESS:</b><br>
                                <span class="secondary_school_address"></span>
                            </div>
                            <div class="col text-center">
                                <b>INCLUSIVE YEARS:</b><br>
                                <span class="secondary_from"></span>
                                <span class="secondary_to"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h6><b>PRIMARY SCHOOL ATTAINMENT</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b><br>
                                <span class="primary_school_name"></span>
                            </div>
                            <div class="col">
                                <b>SCHOOL ADDRESS:</b><br>
                                <span class="primary_school_address"></span>
                            </div>
                            <div class="col text-center">
                                <b>INCLUSIVE YEARS:</b><br>
                                <span class="primary_from"></span>
                                <span class="primary_to"></span>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="column_eight" style="padding:5px;display:none;">
                        <div class="row">
                            <h5 class="summary_title">TRAININGS/VOCATIONALS ATTENDED</h5>
                        </div>

                        <div class="row mb-3">
                            <h6><b>TRAININGS</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b><br>
                                <span class="training_school_name"></span>
                            </div>
                            <div class="col">
                                <b>TITLE:</b><br>
                                <span class="training_title"></span>
                            </div>
                            <div class="col text-center">
                                <b>INCLUSIVE YEARS:</b><br>
                                <span class="training_years"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h6><b>VOCATIONALS</b></h6><br>
                            <div class="col">
                                <b>SCHOOL NAME:</b><br>
                                <span class="vocational_school_name"></span>
                            </div>
                            <div class="col">
                                <b>COURSE:</b><br>
                                <span class="vocational_course"></span>
                            </div>
                            <div class="col text-center">
                                <b>INCLUSIVE YEARS:</b><br>
                                <span class="vocational_years"></span>
                            </div>
                        </div>
                    </div>
                    <div class="column_nine" style="padding:5px;display:none;">
                        <div class="row ">
                            <h5 class="summary_title">JOB HISTORY</h5>
                        </div>

                        <div id="job_history_summary_div" class="row"></div>
                        <hr>
                    </div>
                    <div class="column_ten" style="padding:5px;display:none;">
                        <div class="row ">
                            <h5 class="summary_title">MEDICAL HISTORY</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <b>PAST MEDICAL CONDITION</b><br>
                                <textarea class="form-control text-uppercase past_medical_condition textarea-container" readonly></textarea>
                            </div>
                            <div class="col">
                                <b>ALLERGIES</b><br>
                                <textarea class="form-control text-uppercase allergies textarea-container" readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <b>MEDICATION</b><br>
                                <textarea class="form-control text-uppercase medication textarea-container" readonly></textarea>
                            </div>
                            <div class="col">
                                <b>PSYCHOLOGICAL HISTORY</b><br>
                                <textarea class="form-control text-uppercase psychological_history textarea-container" readonly></textarea>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <hr class="hr-design">
            </div>
        </div>
    </div>
</div>