<div id="educational_background" class="tab-pane fade" style="border-radius:0px;">
    {{-- College Table --}}
    <br>
    <strong class="table-title">COLLEGE EDUCATIONsss</strong>
        <table class="table table-striped table-bordered mt-1">
            <thead class="text-white">
                <tr>
                    <th style="width: 30%"><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%"><i class="fas fa-graduation-cap"></i> DEGREE</th>
                    <th style="width: 30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width: 10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="college_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="college_name" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="college_degree" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="college_degree" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="college_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="college_inclusive_years" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td>
                        <button type="button" id="btnCollegeAdd" class="btn btn-success center"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        {{-- College Data Table --}}
        <table id="college_data_table" class="table table-bordered table-hover table-striped" style="display: none;">
            <thead>
                <tr>
                    <th style="width:30%"><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width:30%"><i class="fas fa-graduation-cap"></i> DEGREE</th>
                    <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    {{-- Training Table --}}
    <strong class="table-title">TRAININGS</strong><br>
        <table class="table table-striped table-bordered mt-1">
            <thead class="text-white">
                <tr>
                    <th style="width: 30%"><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th style="width: 30%"><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th style="width: 30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width: 10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="training_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="training_name" class="formlabel form-label"></label>
                        </div>
                    </td>

                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="training_title" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="training_title" class="formlabel form-label"></label>
                        </div>
                    </td>

                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="training_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="training_inclusive_years" class="formlabel form-label"></label>
                        </div>
                    </td>

                    <td>
                        <button type="button" id="btnTrainingAdd" class="btn btn-success center"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        {{-- Training Data Table --}}
        <table id="training_data_table" class="table table-bordered table-hover table-striped" style="display: none;">
            <thead>
                <tr>
                    <th style="width:30%"><i class="fas fa-school"></i> NAME OF TRAINING SCHOOL</th>
                    <th style="width:30%"><i class="fas fa-certificate"></i> TRAINING TITLE</th>
                    <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    
    {{-- Vocational Table --}}
    <strong class="table-title">VOCATIONAL</strong><br>
    <table class="table table-striped table-bordered mt-1">
        <thead class="text-white">
            <tr>
                <th style="width:30%"><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                <th style="width:30%"><i class="fas fa-certificate"></i> COURSE</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="vocational_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="vocational_name" class="formlabel form-label"></label>
                    </div>
                </td>

                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="vocational_course" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="vocational_course" class="formlabel form-label"></label>
                    </div>
                </td>

                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="vocational_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="vocational_inclusive_years" class="formlabel form-label"></label>
                    </div>
                </td>

                <td>
                    <button type="button" id="btnVocationalAdd" class="btn btn-success center"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
        {{-- Vocational Data Table --}}
        <table id="vocational_data_table" class="table table-bordered table-hover table-striped" style="display: none;">
            <thead>
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF VOCATIONAL SCHOOL</th>
                    <th><i class="fas fa-certificate"></i> COURSE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    <hr>
    <!-- Secondary Table -->
    <strong class="table-title">SECONDARY</strong><br>
        <table class="table table-striped table-bordered mt-1" id="">
            <thead class="text-white">
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
                            <input class="forminput form-control" type="text" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="secondary" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="secondary_address" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="secondary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                            <label for="secondary_inclusive_years" class="formlabel form-label"></label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> {{-- End of Secondary Table --}}
        <hr>
    <!-- Primary Table -->
    <strong class="table-title">PRIMARY</strong>
    <br>
        <table class="table table-striped table-bordered mt-1" id="">
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
                            <label for="primary" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="primary_address" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="primary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                            <label for="primary_inclusive_years" class="formlabel form-label"></label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
</div>