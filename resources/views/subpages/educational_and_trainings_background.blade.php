
<div id="education_trainings" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
        <h5 class="table-title">COLLEGE EDUCATION</h5>
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="thead-educational">
                    <tr>
                        <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                        <th style="width: 30%;">DEGREE</th>
                        <th style="width: 30%;" colspan="2" class="text-center">INCLUSIVE YEARS</th>
                        <th style="width: 10%;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control college_field text-capitalize" type="search" id="college_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="college_name" class="formlabel form-label"><span class="span_college_name span_all span_college">(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control college_field" type="text" id="college_degree" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="college_degree" class="formlabel form-label"><span class="span_college_degree span_all span_college">(Optional)</span></label>
                            </div>
                        </td>
                       
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control college_field" id="college_inclusive_years_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control college_field" id="college_inclusive_years_to">
                            </div>
                        </td>

                        <td class="pb-3 pt-3">
                            <button type="button" id="collegeAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
    
        <table id="college_table" class="table table-bordered table-hover table-striped align-middle college_table" style="margin-top: -17px;">
            <thead class="college_table_thead" style="display:none;">
                <tr>
                    <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%;">DEGREE</th>
                    <th style="width: 30%;">INCLUSIVE YEARS</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="college_table_orig" class="table table-bordered table-hover table-striped align-middle college_table_orig" style="display: none; margin-top:-36px;">
            <thead class="college_table_orig_thead">
                <tr class="college_table_orig_tr">
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border-left: none;"></th>
                </tr>
            </thead>
            <tbody id="college_table_orig_tbody">
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
    {{-- Secondary Table --> --}}
    <h5 class="table-title">SECONDARY EDUCATION</h5>
    <table class="table table-striped table-bordered table-hover align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:30%"> NAME OF SCHOOL</th>
                <th style="width:30%"> SCHOOL ADDRESS</th>
                <th style="width:30%" colspan="2" class="text-center"> INCLUSIVE YEARS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control secondary_field text-capitalize" type="search" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="secondary_school_name" class="formlabel form-label"><span class="span_secondary_school_name span_all span_secondary">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control secondary_field text-capitalize" type="search" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="secondary_school_address" class="formlabel form-label"><span class="span_secondary_school_address span_all span_secondary">(Optional)</span></label>
                    </div>
                </td>

                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input type="month" class="forminput form-control secondary_field" id="secondary_inclusive_years_from">
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input type="month" class="forminput form-control secondary_field" id="secondary_inclusive_years_to">
                    </div>
                </td>
            </tr>
        </tbody>
    </table> 
    <hr class="hr-design">
    <br>
    {{-- Primary Table --}}
    <h5 class="table-title">PRIMARY EDUCATION</h5>
    <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:30%"> NAME OF SCHOOL</th>
                    <th style="width:30%"> SCHOOL ADDRESS</th>
                    <th style="width:30%" colspan="2"> INCLUSIVE YEARS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-capitalize required_field" type="search" id="primary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="primary_school_name" class="formlabel form-label"><span class="span_primary_school_name span_all"></span></label>
                        </div>
                        
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-capitalize required_field" type="search" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="primary_school_address" class="formlabel form-label"><span class="span_primary_school_address span_all"></span></label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control required_field" id="primary_inclusive_years_from">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control required_field" id="primary_inclusive_years_to">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr class="hr-design">
        <br>

        <h5 class="table-title">TRAININGS</h5>
        <table class="table table-striped table-bordered table-hover align-middle ">
                <thead class="thead-educational">
                    <tr>
                        <th style="width: 30%;"> NAME OF TRAINING SCHOOL</th>
                        <th style="width: 30%;"> TRAINING TITLE</th>
                        <th style="width: 30%;" colspan="2" class="text-center"> INCLUSIVE YEARS</th>
                        <th style="width: 10%;"> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control training_field text-capitalize" type="search" id="training_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="training_name" class="formlabel form-label"><span class="span_training_name span_all span_training">(Optional)</span></label>
                            </div>
                        </td>

                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control training_field text-capitalize" type="search" id="training_title" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="training_title" class="formlabel form-label"><span class="span_training_title span_all span_training">(Optional)</span></label>
                            </div>
                        </td>

                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control training_field" id="training_inclusive_years_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control training_field" id="training_inclusive_years_to">
                            </div>
                        </td>

                        <td>
                            <button type="button" id="trainingAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

        <table id="training_table" class="table table-bordered table-hover table-striped align-middle" style="margin-top: -17px;">
            <thead class="training_table_thead"  style="display: none;">
                <tr>
                    <th style="width: 30%;"><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th style="width: 30%;"><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th style="width: 30%;"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width: 10%;"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="training_table_orig" class="table table-bordered table-hover table-striped align-middle training_table_orig" style="display: none; margin-top:-36px;">
            <thead class="training_table_orig_thead">
                <tr>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border-left: none;"></th>
                </tr>
            </thead>
            <tbody id="training_table_orig_tbody">
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
    {{-- Vocational Table --}}
        <h5 class="table-title">VOCATIONAL</h5>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:30%;"> NAME OF VOCATIONAL SCHOOL</th>
                    <th style="width:30%;"> COURSE</th>
                    <th style="width:30%;" colspan="2" class="text-center"> INCLUSIVE YEARS</th>
                    <th style="width:10%;"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control vocational_field text-capitalize" type="search" id="vocational_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="vocational_name" class="formlabel form-label"><span class="span_vocational_name span_all span_vocational">(Optional)</span></label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control vocational_field text-capitalize" type="search" id="vocational_course" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="vocational_course" class="formlabel form-label"><span class="span_vocational_course span_all span_vocational">(Optional)</span></label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control vocational_field" id="vocational_inclusive_years_from">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control vocational_field" id="vocational_inclusive_years_to">
                        </div>
                    </td>

                    <td>
                        <button type="button" id="vocationalAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    {{-- Vocational Data Table --}}
        <table id="vocational_table" class="table table-bordered table-hover table-striped align-middle" style="margin-top: -17px;">
            <thead class="vocational_table_thead"  style="display: none;">
                <tr>
                    <th style="width:30%;"><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                    <th style="width:30%;"><i class="fas fa-certificate"></i> COURSE</th>
                    <th style="width:30%;"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%;"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="vocational_table_orig" class="table table-bordered table-hover table-striped align-middle vocational_table_orig" style="display: none; margin-top:-36px;">
            <thead class="vocational_table_orig_thead">
                <tr>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border-left: none;"></th>
                </tr>
            </thead>
            <tbody id="vocational_table_orig_tbody">
            </tbody>
        </table>
        <hr class="hr-design">
</div> 