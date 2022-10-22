
<div id="educational_background" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <strong class="table-title">COLLEGE EDUCATION</strong>
        <table class="table table-striped table-bordered table-hover mt-1" id="college_table">
            <thead class="thead-educational">
                <tr>
                    <th style="width:30%"><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width:30%"><i class="fas fa-graduation-cap"></i> DEGREE</th>
                    <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody id="college_tbody">
                <tr>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="college_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="college_name" class="formlabel form-label"><span class="span_college_name span_all">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="text" id="college_degree" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="college_degree" class="formlabel form-label"><span class="span_college_degree span_all">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="college_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                            <label for="college_inclusive_years" class="formlabel form-label"><span class="span_college_inclusive_years span_all">(Required)</span></label>
                        </div>
                    </td>
                    <td>
                        <button type="button" id="btnCollegeAdd" class="btn btn-success center grow btnDisable" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
        <br>
        
        {{-- Secondary Table --> --}}
    <strong class="table-title">SECONDARY</strong><br>
    <table class="table table-striped table-bordered mt-1" id="">
        <thead class="thead-educational">
            <tr>
                <th style="width:30%"><i class="fas fa-school"></i> NAME OF SCHOOL</th>
                <th style="width:30%"><i class="fas fa-map-marker-alt"></i> SCHOOL ADDRESS</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="secondary" class="formlabel form-label"><span class="span_secondary_school_name span_all">(Required)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="secondary_address" class="formlabel form-label"><span class="span_secondary_school_address span_all">(Required)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="secondary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                        <label for="secondary_inclusive_years" class="formlabel form-label"><span class="span_secondary_school_inclusive_years span_all">(Required)</span></label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> {{-- End of Secondary Table --}}
    <hr class="hr-design">
    <br>
    <br>
    {{-- Primary Table --> --}}
    <strong class="table-title">PRIMARY</strong>
    <br>
        <table class="table table-striped table-bordered mt-1" id="">
            <thead class="thead-educational">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF SCHOOL</th>
                    <th><i class="fas fa-map-marker-alt"></i> SCHOOL ADDRESS</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="primary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="primary" class="formlabel form-label"><span class="span_primary_school_name span_all">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="primary_address" class="formlabel form-label"><span class="span_primary_school_address span_all">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="primary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                            <label for="primary_inclusive_years" class="formlabel form-label"><span class="span_primary_school_inclusive_years span_all">(Required)</span></label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
        <br>
    {{-- Training Table --}}
    <strong class="table-title">TRAININGS</strong><br>
        <table class="table table-striped table-bordered table-hover mt-1">
            <thead class="thead-educational">
                <tr>
                    <th style="width:30%"><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th style="width:30%"><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody id="training_tbody">
                <tr>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="training_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="training_name" class="formlabel form-label"><span class="span_training_name span_all">(Optional)</span></label>
                        </div>
                    </td>

                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="training_title" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="training_title" class="formlabel form-label"><span class="span_training_title span_all">(Optional)</span></label>
                        </div>
                    </td>

                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="training_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                            <label for="training_inclusive_years" class="formlabel form-label"><span class="span_training_inclusive_years span_all">(Optional)</span></label>
                        </div>
                    </td>

                    <td>
                        <button type="button" id="btnTrainingAdd" class="btn btn-success center grow btnDisable" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
        <br>

    {{-- Vocational Table --}}
    <strong class="table-title">VOCATIONAL</strong><br>
    <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width:30%"><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                <th style="width:30%"><i class="fas fa-certificate"></i> COURSE</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody id="vocational_tbody">
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="vocational_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="vocational_name" class="formlabel form-label"><span class="span_vocational_name span_all">(Optional)</span></label>
                    </div>
                </td>

                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="vocational_course" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="vocational_course" class="formlabel form-label"><span class="span_vocational_course span_all">(Optional)</span></label>
                    </div>
                </td>

                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="vocational_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                        <label for="vocational_inclusive_years" class="formlabel form-label"><span class="span_vocational_inclusive_years span_all">(Optional)</span></label>
                    </div>
                </td>

                <td>
                    <button type="button" id="btnVocationalAdd" class="btn btn-success center grow btnDisable" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
        <hr class="hr-design">
</div> 