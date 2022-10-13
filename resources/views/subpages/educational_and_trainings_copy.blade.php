<div id="educational_background" class="tab-pane fade" style="border-radius:0px;"><br>
    @csrf
    <input type="submit" name="save" id="save" class="btn btn-primary d-none" value="Save">
    <input type="hidden" name="employee_id" id="employee_id">
    <input type="hidden" name="isSaveCollege" id="isSaveCollege" value="false">
    <input type="hidden" name="isSaveVocational" id="isSaveVocational" value="false">
    <input type="hidden" name="isSaveTraining" id="isSaveTraining" value="false">
    {{-- Separate --}}
    <input type="hidden" name="isSaveJob" id="isSaveJob" value="false">
    <input type="hidden" name="isSaveMemos" id="isSaveMemos" value="false">
    <input type="hidden" name="isSaveEvaluation" id="isSaveEvaluation" value="false">
    <input type="hidden" name="isSaveContracts" id="isSaveContracts" value="false">
    <input type="hidden" name="isSaveResignation" id="isSaveResignation" value="false">
    <input type="hidden" name="isSaveTermination" id="isSaveTermination" value="false">

    <div id="college_education_container">
        <div class="row mb-1">
            <div class="col-2">
                <strong style="font-size:16px;">COLLEGE EDUCATION</strong>
            </div>
            <div class="col">
                <button type="button" name="addCollegeRow" id="addCollegeRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
    </div>
    <!-- Table Education -->
        <table class="table table-striped table-bordered mt-2" id="college_education_table" style="display:none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th><i class="fas fa-graduation-cap"></i> DEGREE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="college_education_body">
            </tbody>
        </table>
    
    <!-- Data Table of College Education -->
    <div id="college_education_data_table_div" style="display: none;">
        <div class="row">
            <div class="col mb-2">
                <strong style="font-size:16px;">COLLEGE EDUCATION</strong>
            </div>
        </div>

        <table class="table table-striped table-bordered w-100" id="college_education_data_table">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th><i class="fas fa-graduation-cap"></i>DEGREE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <hr>

    <div id="vocational_container">
        <div class="row mb-1">
            <div class="col-2">
                <strong style="font-size:16px;">VOCATIONAL</strong>
            </div>
            <div class="col">
                <button type="button" name="addVocationalRow" id="addVocationalRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
    </div>
    <!-- Table of Vocational -->
        <table class="table table-striped table-bordered" id="vocational_table" style="display: none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                    <th><i class="fas fa-certificate"></i> COURSE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="vocational_body">
            </tbody>
        </table>

    <!-- Data Table of Vocational -->
    <div id="vocational_data_table_div" style="display: none;">
        <div class="row">
            <div class="col mb-2">
                <strong style="font-size:16px;">VOCATIONAL</strong>
            </div>
        </div>

        <table class="table table-striped table-bordered w-100" id="vocational_data_table">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                    <th><i class="fas fa-certificate"></i> COURSE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <hr>
    
    <div id="training_container">
        <div class="row mb-1">
            <div class="col-2">
                <strong style="font-size:16px;">TRAININGS</strong>
            </div>
            <div class="col">
                <button type="button" name="addTrainingRow" id="addTrainingRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
    </div>
    <!-- Table of Training -->
    <table class="table table-striped table-bordered" id="trainings_table" style="display: none;">
        <thead class="text-white">
            <tr>
                <th><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                <th><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                <th><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody class="training_body">
        </tbody>
    </table>

    <!-- Data Table of Training -->
    <div id="training_data_table_div" style="display: none;">
        <div class="row">
            <div class="col mb-2">
                <strong style="font-size:16px;">TRAININGS</strong>
            </div>
        </div>

        <table class="table table-striped table-bordered w-100" id="trainings_data_table">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <hr>

    <!-- Secondary Table -->
    <strong style="font-size:16px;">SECONDARY</strong>
        <br>
            <table class="table table-striped table-bordered" id="">
                <thead class="text-white">
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
                                <input class="forminput form-control" type="text" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary" class="formlabel form-label"><span class="span_secondary_school_name">(Required)</span></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary_address" class="formlabel form-label"><span class="span_secondary_school_address">(Required)</span></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="secondary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                                <label for="secondary_inclusive_years" class="formlabel form-label"><span class="span_secondary_school_inclusive_years">(Required)</span></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table> {{-- End of Secondary Table --}}

    <!-- Primary Table -->
    <strong style="font-size:16px;">PRIMARY</strong>
        <br>
            <table class="table table-striped table-bordered" id="">
                <thead class="text-white">
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
                                <input class="forminput form-control" type="text" id="primary_school_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary" class="formlabel form-label"><span class="span_primary_school_name">(Required)</span></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary_address" class="formlabel form-label"><span class="span_primary_school_address">(Required)</span></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="primary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                                <label for="primary_inclusive_years" class="formlabel form-label"><span class="span_primary_school_inclusive_years">(Required)</span></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>  <!-- End of Primary Table   -->

</div> <!-- End of Educational Background Nav -->
        