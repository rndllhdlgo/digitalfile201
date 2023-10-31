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
                        <div class="row_personal">
                            <div class="row">
                                <h5 class="summary_title">PERSONAL INFORMATION</h5>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3">
                                    <b>FIRST NAME:</b><br>
                                    <span class="first_name font_weight"></span>
                                </div>
                                 <div class="col-3">
                                    <b>MIDDLE NAME:</b><br>
                                    <span class="middle_name font_weight"></span>
                                </div>
                                <div class="col-3">
                                    <b>LAST NAME:</b><br>
                                    <span class="last_name font_weight"></span>
                                </div>
                                <div class="col-3" id="suffix_div">
                                    <b>SUFFIX:</b><br>
                                    <span class="suffix font_weight"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3" id="nickname_div">
                                    <b>NICKNAME:</b><br>
                                    <span class="nickname font_weight"></span>
                                </div>
                                <div class="col-3" id="gender_div">
                                    <b>GENDER:</b><br>
                                    <span class="gender font_weight"></span>
                                </div>
                                <div class="col-3">
                                    <b>BIRTHDAY:</b><br>
                                    <input type="date" class="birthday font_weight d-none" style="border:none; width:106px;" disabled> <span id="birthday_summary"> </span>
                                </div>
                                <div class="col-3">
                                    <b>AGE:</b><br>
                                    <span class="age font_weight"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3" id="height_div">
                                    <b>HEIGHT:</b><br>
                                    <span class="height font_weight"></span>
                                </div>
                                <div class="col-3" id="weight_div">
                                    <b>WEIGHT:</b><br>
                                    <span class="weight font_weight"></span>
                                </div>
                                <div class="col-3" id="civil_status_div">
                                    <b>CIVIL STATUS:</b><br>
                                    <input type="hidden" class="civil_status font_weight" style="border:none;" disabled> <span id="civil_status_content"></span>
                                </div>
                                <div class="col-3" id="religion_div">
                                    <b>RELIGION:</b><br>
                                    <span class="religion font_weight"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row_image mt-4">
                            <img id="image_preview_summary">
                        </div>
                    </div>
                    <hr>

                    <div class="row_address" style="padding:5px;">
                        <div class="row">
                            <h5 class="summary_title">HOME ADDRESS</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <b>ADDRESS:</b> <span class="address font_weight"></span>
                            </div>
                            <div class="col-6">
                                <b>PROVINCE:</b> <input type="hidden" id="province_summary" class="font_weight" style="border:none;" disabled> <span id="province_content"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <b>CITY:</b> <input type="hidden" id="city_summary" class="font_weight" style="border:none;" disabled> <span id="city_content"></span>
                            </div>
                            <div class="col-6">
                                <b>REGION:</b> <input type="hidden" id="region_summary" class="font_weight" style="border:none; width:85%;" disabled> <span id="region_content"></span>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="row_contact" style="padding:5px;">
                        <div class="row ">
                            <h5 class="summary_title">CONTACT DETAILS</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <b>EMAIL ADDRESS:</b><br>
                                <span class="email_address"></span>
                            </div>
                            <div class="col-4">
                                <b>CELLPHONE NO.:</b><br>
                                <span class="cellphone_number font_weight"></span>
                            </div>
                            <div class="col-4" id="telephone_number_div">
                                <b>TELEPHONE NO.:</b><br>
                                <span class="telephone_number font_weight"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <b>FATHER'S NAME:</b><br>
                                <span class="father_name font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>CELLPHONE NO.:</b><br>
                                <span class="father_contact_number font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>PROFESSION:</b><br>
                                <span class="father_profession font_weight"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <b>MOTHER'S MAIDEN NAME:</b><br>
                                <span class="mother_name font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>CELLPHONE NO.:</b><br>
                                <span class="mother_contact_number font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>PROFESSION:</b><br>
                                <span class="mother_profession font_weight"></span>
                            </div>
                        </div>

                        <div class="row mb-3" id="spouse_div" style="display:none;">
                            <div class="col-4">
                                <b>SPOUSE NAME:</b><br>
                                <span class="spouse_name font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>CELLPHONE NO.:</b><br>
                                <span class="spouse_contact_number font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>PROFESSION:</b><br>
                                <span class="spouse_profession font_weight"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <b>EMERGENCY CONTACT NAME:</b><br>
                                <span class="emergency_contact_name font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>CELLPHONE NO.:</b><br>
                                <span class="emergency_contact_number font_weight"></span>
                            </div>
                            <div class="col-4">
                                <b>RELATIONSHIP:</b><br>
                                <span class="emergency_contact_relationship font_weight"></span>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="row_work" style="padding:5px;">
                        <div class="row ">
                            <h5 class="summary_title">WORK INFORMATION</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <b>EMPLOYEE NO.:</b><br>
                                <span class="employee_number"></span>
                            </div>

                            <div class="col-4">
                                <b>DATE HIRED:</b><br>
                                <input type="date" class="date_hired font_weight d-none" style="border:none; width:106px;" disabled> <span id="date_hired_summary"> </span>
                            </div>

                            <div class="col-4">
                                <b>COMPANY:</b><br>
                                <span class="employee_company"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <b>BRANCH:</b><br>
                                <span class="employee_branch"></span>
                            </div>

                            <div class="col-4">
                                <b>DEPARTMENT:</b><br>
                                <span class="employee_department"></span>
                            </div>

                            <div class="col-4">
                                <b>EMPLOYMENT STATUS:</b><br>
                                <span class="employment_status"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <b>EMPLOYMENT ORIGIN:</b><br>
                                <span class="employment_origin"></span>
                            </div>

                            <div class="col">
                                <b>WORK EMAIL ADDRESS:</b><br>
                                <span class="company_email_address"></span>
                            </div>

                            <div class="col">
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
                    <div class="row_government" style="padding:5px;">
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

                    <div class="row_educational" style="padding:5px; display:none;">
                        <div class="row">
                            <h5 class="summary_title">EDUCATIONAL ATTAINMENT</h5>
                        </div>

                        <div class="row mb-3 college_div" style="display:none">
                            <h6 class="summary_sub_title"><b>COLLEGE SCHOOL</b></h6><br>
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

                        <div class="row mb-3 secondary_div" style="display:none">
                            <h6 class="summary_sub_title"><b>SECONDARY SCHOOL</b></h6><br>
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
                                <span class="secondary_years"></span>
                            </div>
                        </div>

                        <div class="row mb-3 primary_div" style="display:none">
                            <h6 class="summary_sub_title"><b>PRIMARY SCHOOL</b></h6><br>
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
                                <span class="primary_years"></span>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="row_trainings" style="padding:5px;display:none;">
                        <div class="row">
                            <h5 class="summary_title">TRAININGS/VOCATIONALS ATTENDED</h5>
                        </div>

                        <div class="row mb-3 training_div" style="display:none;">
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

                        <div class="row mb-3 vocational_div" style="display:none;">
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
                        <hr>
                    </div>
                    <div class="row_job" style="padding:5px; display:none;">
                        <div class="row">
                            <h5 class="summary_title">JOB HISTORY</h5>
                        </div>

                        <div id="job_history_summary_div" class="row"></div>
                        <hr>
                    </div>
                    <div class="row_medical" style="padding:5px; display:none;">
                        <div class="row">
                            <h5 class="summary_title">MEDICAL HISTORY</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col past_med_div">
                                <b>PAST MEDICAL CONDITION</b><br>
                                <textarea class="form-control text-uppercase past_medical_condition textarea-container" readonly></textarea>
                            </div>
                            <div class="col allergies_div">
                                <b>ALLERGIES</b><br>
                                <textarea class="form-control text-uppercase allergies textarea-container" readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col medication_div">
                                <b>MEDICATION</b><br>
                                <textarea class="form-control text-uppercase medication textarea-container" readonly></textarea>
                            </div>
                            <div class="col psych_div">
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