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
                        <br>
                        <div class="clear_float">
                            <div class="column_one mb-3">
                                <div class="row mb-1">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>PERSONAL INFORMATION</u></h5>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>FIRST NAME:</b> <span class="first_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>MIDDLE NAME:</b> <span class="middle_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>LAST NAME:</b> <span class="last_name font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <b>SUFFIX:</b> <span class="suffix font_weight"></span>
                                    </div>
                                    <div class="col-4">
                                        <b>NICKNAME:</b> <span class="nickname font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>BIRTHDAY:</b> <input type="date" class="birthday font_weight d-none" style="border:none; width:106px;" disabled> <span id="birthday_summary"> </span>
                                    </div>
                                    <div class="col">
                                        <b>AGE:</b> <span class="age font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>GENDER:</b> <span class="gender font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <b>HEIGHT:</b> <span class="height font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>RELIGION:</b> <span class="religion font_weight"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <b>WEIGHT:</b> <span class="weight font_weight"></span>
                                    </div>
                                    
                                    <div class="col">
                                        <b>CIVIL STATUS:</b> <input type="hidden" class="civil_status font_weight" style="border:none;" disabled> <span id="civil_status_content"></span>
                                    </div>
                                </div>
                            </div> <!-- Column 1 -->

                            <div class="column_two">
                                <img id="image_preview_summary">
                            </div> <!-- Column 2 -->
                        </div><!-- Clear Float -->

                        <hr style="border:0.5px solid black; opacity:100%;">

                            <div class="column_three mb-3" style="padding:5px;">
                                <div class="row mb-1 mt-4">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>HOME ADDRESS</u></h5>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <b>UNIT/ROOM #/FLOOR:</b> <span class="unit font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>LOT/HOUSE #, STREET NAME:</b> <span class="lot font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>SUBDIVISION, BARANGAY:</b> <span class="barangay font_weight"></span>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>PROVINCE:</b> <input type="hidden" id="province_summary" class="font_weight" style="border:none;" disabled> <span id="province_content"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>CITY:</b> <input type="hidden" id="city_summary" class="font_weight" style="border:none;" disabled> <span id="city_content"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>REGION:</b> <input type="hidden" id="region_summary" class="font_weight" style="border:none; width:85%;" disabled> <span id="region_content"></span>
                                    </div>
                                </div>
                            </div>

                            <hr style="border:0.5px solid black; opacity:100%;">

                            <div class="column_four mb-3" style="padding: 5px;">
                                <div class="row mb-1 mt-3">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>CONTACT DETAILS</u></h5>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>EMAIL ADDRESS:</b><br> <span class="email_address font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>CELLPHONE NO.:</b><br> <span class="cellphone_number font_weight"></span>
                                    </div>
                                    <div class="col">
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
                                        <b>CONTACT NO.:</b><br> <span class="father_contact_number font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>PROFESSION:</b><br> <span class="father_profession font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>MOTHER'S MAIDEN NAME:</b><br> <span class="mother_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>CONTACT NO.:</b><br> <span class="mother_contact_number font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>PROFESSION:</b><br> <span class="mother_profession font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <b>EMERGENCY CONTACT NAME:</b><br> <span class="emergency_contact_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>CONTACT NO.:</b><br> <span class="emergency_contact_number font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>RELATIONSHIP:</b><br> <span class="emergency_contact_relationship font_weight"></span>
                                    </div>
                                </div>
                            </div> <!-- Column 3-->

                            <hr style="border:0.5px solid black; opacity:100%;">
                            <br>
                            <br>

                            <div class="column_five mb-3" style="padding:5px;">
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

                                    <div class="col">
                                        <b>SUPERVISOR:</b><br>
                                        <span class="employee_supervisor"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <b>COMPANY:</b><br>
                                        <span class="employee_company"></span>
                                    </div>

                                    <div class="col">
                                        <b>BRANCH:</b><br>
                                        <span class="employee_branch"></span>
                                    </div>

                                    <div class="col">
                                        <b>DEPARTMENT:</b><br>
                                        <span class="employee_department"></span>
                                    </div> 
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <b>POSITION:</b><br>
                                        <span class="employee_position"></span>
                                    </div>

                                    <div class="col">
                                        <b>EMPLOYMENT STATUS:</b><br>
                                        <span class="employment_status"></span>
                                    </div>

                                    <div class="col">
                                        <b>EMPLOYMENT ORIGIN:</b><br>
                                        <span class="employment_origin"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-8">
                                        <b>SHIFT:</b><br>
                                        <span class="employee_shift"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <b>WORK EMAIL ADDRESS:</b><br> 
                                        <span class="company_email_address font_weight"></span>
                                    </div>
                                    <div class="col-4">
                                        <b>WORK CONTACT NO.:</b><br> 
                                        <span class="company_contact_number font_weight"></span>
                                    </div>
                                </div>
                            </div>

                            <hr style="border:0.5px solid black; opacity:100%;">

                            <div class="column_six mb-3" id="benefits_summary" style="padding:5px;">
                                <div class="row mb-1 mt-3">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>PERSONAL ACCOUNTS</u></h5>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <b>SSS NO. :</b><br>
                                        <span class="sss_number"></span>
                                    </div>
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
                                    <div class="col-4">
                                        <b>TIN NO. :</b><br>
                                        <span class="tin_number"></span>
                                    </div>
                                    <div class="col-4">
                                        <b>BANK ACCOUNT NO. :</b><br>
                                        <span class="account_number"></span>
                                    </div>
                                </div>
                            </div>
                        <hr style="border:0.5px solid black; opacity:100%;">

                    </div> <!-- Summary Container -->
                </div> <!-- Print Summary -->
                <hr class="hr-design">
            </div> <!-- Modal Body Div -->
        </div> <!-- Modal Content -->
    </div> <!-- Modal Dialogue -->
</div> <!-- Summary Modal -->
