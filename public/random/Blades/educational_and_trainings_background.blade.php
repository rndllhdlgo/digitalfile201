
<div id="educational_background" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <h5 class="table-title">COLLEGE EDUCATION</h5>
        <table class="table table-striped table-bordered table-hover align-middle mt-1">
            <thead class="thead-educational">
                <tr>
                    <th>NAME OF UNIVERSITY/COLLEGE</th>
                    <th>DEGREE</th>
                    <th>INCLUSIVE YEARS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="college_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="college_name" class="formlabel form-label"><span class="span_college_name span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="text" id="college_degree" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="college_degree" class="formlabel form-label"><span class="span_college_degree span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="college_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" >
                            <label for="college_inclusive_years" class="formlabel form-label"><span class="span_college_inclusive_years span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td>
                        <button type="button" id="collegeAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table id="college_table" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-educational">
                <tr style="display:none;">
                    <th>NAME OF UNIVERSITY/COLLEGE</th>
                    <th>DEGREE</th>
                    <th>INCLUSIVE YEARS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        
    {{-- Secondary Table --> --}}
    <h5 class="table-title">SECONDARY EDUCATION</h5>
    <table class="table table-striped table-bordered table-hover align-middle mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width:30%"><i class="fas fa-school"></i> NAME OF SCHOOL</th>
                <th style="width:30%"><i class="fas fa-map-marker-alt"></i> SCHOOL ADDRESS</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional_field text-capitalize" type="search" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                        <label for="secondary_school_name" class="formlabel form-label"><span class="span_secondary_school_name span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional_field text-capitalize" type="search" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off" >
                        <label for="secondary_school_address" class="formlabel form-label"><span class="span_secondary_school_address span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional_field" type="search" id="secondary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" >
                        <label for="secondary_school_inclusive_years" class="formlabel form-label"><span class="span_secondary_school_inclusive_years span_all">(Optional)</span></label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> {{-- End of Secondary Table --}}
    <br>

    {{-- Primary Table --}}
    <h5 class="table-title">PRIMARY EDUCATION</h5>
    <table class="table table-striped table-bordered table-hover align-middle mt-1">
            <thead class="thead-educational">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF SCHOOL</th>
                    <th><i class="fas fa-map-marker-alt"></i> SCHOOL ADDRESS</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-capitalize required_field" type="search" id="primary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="primary_school_name" class="formlabel form-label"><span class="span_primary_school_name span_all"></span></label>
                        </div>
                        
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-capitalize required_field" type="search" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off" >
                            <label for="primary_school_address" class="formlabel form-label"><span class="span_primary_school_address span_all"></span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="primary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" >
                            <label for="primary_school_inclusive_years" class="formlabel form-label"><span class="span_primary_school_inclusive_years span_all"></span></label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
    {{-- Training Table --}}
    <h5 class="table-title">TRAININGS</h5>
    <table class="table table-striped table-bordered table-hover align-middle mt-1">
            <thead class="thead-educational">
                <tr>
                    <th style="width:33.5%"><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th style="width:33%"><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th style="width:23.5%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="training_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="training_name" class="formlabel form-label"><span class="span_training_name span_all">(Optional)</span></label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="training_title" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="training_title" class="formlabel form-label"><span class="span_training_title span_all">(Optional)</span></label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="training_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" >
                            <label for="training_inclusive_years" class="formlabel form-label"><span class="span_training_inclusive_years span_all">(Optional)</span></label>
                        </div>
                    </td>

                    <td>
                        <button type="button" id="btnTrainingAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- Training Data Table --}}
        <table id="training_data_table" class="table table-bordered table-hover table-striped">
            <thead class="thead-educational">
                <tr style="display: none;">
                    <th style="width:33.5%"><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th style="width:33%"><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th style="width:23.5%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
    {{-- Vocational Table --}}
    <h5 class="table-title">VOCATIONAL</h5>
    <table class="table table-striped table-bordered table-hover align-middle mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width:33.5%"><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                <th style="width:33%"><i class="fas fa-certificate"></i> COURSE</th>
                <th style="width:23.5%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="vocational_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                        <label for="vocational_name" class="formlabel form-label"><span class="span_vocational_name span_all">(Optional)</span></label>
                    </div>
                </td>

                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="vocational_course" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                        <label for="vocational_course" class="formlabel form-label"><span class="span_vocational_course span_all">(Optional)</span></label>
                    </div>
                </td>

                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="vocational_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" >
                        <label for="vocational_inclusive_years" class="formlabel form-label"><span class="span_vocational_inclusive_years span_all">(Optional)</span></label>
                    </div>
                </td>

                <td>
                    <button type="button" id="btnVocationalAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- Vocational Data Table --}}
    <table id="vocational_data_table" class="table table-bordered table-hover table-striped ">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width:33.5%"><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                <th style="width:33%"><i class="fas fa-certificate"></i> COURSE</th>
                <th style="width:23.5%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
</div> 