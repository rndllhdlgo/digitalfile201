<div class="modal fade" id="summaryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0d1a80;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Employee Summary Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <div class="row mb-2">
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
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <b>SUFFIX:</b> <span class="suffix font_weight"></span>
                                    </div>
                                    <div class="col-4">
                                        <b>NICKNAME:</b> <span class="nickname font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>GENDER:</b> <span class="gender font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>BIRTHDAY:</b> <input type="date" class="birthday font_weight" style="border:none; width:58%;" disabled>
                                    </div>
                                    <div class="col">
                                        <b>AGE:</b> <input type="text" class="age font_weight" style="border:none; width:40px;" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
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
                                        <b>CIVIL STATUS:</b> <input type="text" class="civil_status font_weight" style="border:none;" disabled>
                                    </div>
                                </div>
                                
                                <div class="row mb-1">
                                    <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>HOME ADDRESS</u></h5>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>UNIT/ROOM #/FLOOR:</b> <span class="unit font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>LOT/HOUSE #, STREET NAME:</b> <span class="lot font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>SUBDIVISION, BARANGAY:</b> <span class="barangay font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="radio" id="default" name="house" class="house font_weight" value="Owned"> Owned
                                        <input type="radio" name="house" class="house font_weight" value="Rent" style="margin-left: 30px;"> Rent
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>PROVINCE:</b> <input type="text" id="province_summary" class="font_weight" style="border:none;" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>CITY:</b> <input type="text" id="city_summary" class="font_weight" style="border:none;" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>REGION:</b> <input type="text" id="region_summary" class="font_weight" style="border:none; width:85%;" disabled>
                                    </div>
                                </div>
                            </div> <!-- Column 1 -->

                            <div class="column_two">
                                <img id="image_preview_summary">
                            </div> <!-- Column 2 -->

                        </div><!-- Clear Float -->
                            <div class="column_three">
                                <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><u>CONTACT DETAILS</u></h5>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>EMAIL ADDRESS:</b> <span class="email_address font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>TELEPHONE #:</b> <span class="telephone_number font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>CELLPHONE #:</b> <span class="cellphone_number font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>FATHER'S NAME:</b> <span class="father_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>FATHER'S CONTACT #:</b> <span class="father_contact_number font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>FATHERS'S PROFESSION #:</b> <span class="father_profession font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>MOTHER'S MAIDEN NAME:</b> <span class="mother_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>MOTHER'S CONTACT #:</b> <span class="mother_contact_number font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>MOTHER'S PROFESSION #:</b> <span class="mother_profession font_weight"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <b>EMERGENCY CONTACT NAME:</b> <span class="emergency_contact_name font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>EMERGENCY CONTACT RELATIONSHIP:</b> <span class="emergency_contact_relationship font_weight"></span>
                                    </div>
                                    <div class="col">
                                        <b>EMERGENCY CONTACT #:</b> <span class="emergency_contact_number font_weight"></span>
                                    </div>
                                </div>
                            </div> <!-- Column 3-->
                         
                    </div> <!-- Summary Container -->
                </div> <!-- Print Summary -->
            </div> <!-- Modal Body Div -->
        </div> <!-- Modal Content -->
    </div> <!-- Modal Dialogue -->
</div> <!-- Summary Modal -->