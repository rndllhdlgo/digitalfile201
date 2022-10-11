<div id="educational_background" class="tab-pane fade" style="border-radius:0px;">
    {{-- College Table --}}
    <strong style="font-size:16px;">COLLEGE</strong><br>
        <table class="table table-striped table-bordered">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th><i class="fas fa-graduation-cap"></i> DEGREE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="college_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="college_name" class="formlabel form-label"><span class="span_college_name">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="college_degree" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="college_degree" class="formlabel form-label"><span class="span_college_degree">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="college_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="college_inclusive_years" class="formlabel form-label"><span class="span_college_inclusive_years">(Required)</span></label>
                        </div>
                    </td>
                    <td>
                        <button type="button" id="btnCollegeAdd" class="btn btn-success"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- College Data Table --}}
        <table id="college_data_table" class="table table-bordered table-hover table-striped" style="display: none;">
            <thead>
                <tr>
                    <th><i class="fas fa-school"></i> NAME OF UNIVERSITY/COLLEGE</th>
                    <th><i class="fas fa-graduation-cap"></i> DEGREE</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    <!-- Secondary Table -->
    <strong style="font-size:16px;">SECONDARY</strong><br>
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
                            <input class="forminput form-control required_field" type="text" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="secondary" class="formlabel form-label"><span class="span_secondary_school_name">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="secondary_address" class="formlabel form-label"><span class="span_secondary_school_address">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="secondary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
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
                            <input class="forminput form-control required_field" type="text" id="primary_school_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="primary" class="formlabel form-label"><span class="span_primary_school_name">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="primary_address" class="formlabel form-label"><span class="span_primary_school_address">(Required)</span></label>
                        </div>
                    </td>
                    <td class="pb-2 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="primary_school_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                            <label for="primary_inclusive_years" class="formlabel form-label"><span class="span_primary_school_inclusive_years">(Required)</span></label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
</div>