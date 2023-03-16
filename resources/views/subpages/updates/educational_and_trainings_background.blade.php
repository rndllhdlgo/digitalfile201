
<div id="update_education_trainings" class="tab-pane fade" style="border-radius:0px;">
    <br>
        <h5 class="table-title" style="border-bottom: 3px solid black !important;">COLLEGE EDUCATION</h5>
           <table id="college_table_orig" class="table table-bordered table-hover table-striped align-middle college_table_orig" style="display:none;">
                <thead class="thead-educational">
                    <tr class="college_table_orig_tr">
                        <th style="border: none;">NAME OF UNIVERSITY/COLLEGE</th>
                        <th style="border: none;">DEGREE</th>
                        <th style="border: none;" colspan="2">INCLUSIVE YEARS</th>
                    </tr>
                </thead>
                <tbody id="college_table_orig_tbody">
                </tbody>
         </table>
        <hr class="hr-design">

        <br>
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
                                <input class="forminput form-control secondary_field text-uppercase" type="search" id="secondary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="secondary_school_name" class="formlabel form-label"><span class="span_secondary_school_name span_all span_secondary">(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control secondary_field text-uppercase" type="search" id="secondary_school_address" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                                <label for="secondary_school_address" class="formlabel form-label"><span class="span_secondary_school_address span_all span_secondary">(Optional)</span></label>
                            </div>
                        </td>

                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control secondary_field" id="secondary_school_inclusive_years_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control secondary_field" id="secondary_school_inclusive_years_to">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    <hr class="hr-design">
    <br>

    <h5 class="table-title">PRIMARY EDUCATION</h5>
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
                        <input class="forminput form-control text-uppercase required_field" type="search" id="primary_school_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="primary_school_name" class="formlabel form-label"><span class="span_primary_school_name span_all"></span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field" type="search" id="primary_school_address" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="primary_school_address" class="formlabel form-label"><span class="span_primary_school_address span_all"></span></label>
                    </div>
                </td>

                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input type="month" class="forminput form-control required_field" id="primary_school_inclusive_years_from">
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input type="month" class="forminput form-control required_field" id="primary_school_inclusive_years_to">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="hr-design">
    <br>

    <h5 class="table-title" style="border-bottom: 3px solid black !important;"> TRAININGS</h5>
    <table id="training_table_orig" class="table table-bordered table-hover table-striped align-middle training_table_orig" style="display: none;">
        <thead class="thead-educational">
            <tr>
                <th style="border: none;">NAME OF TRAINING SCHOOL</th>
                <th style="border: none;">TRAINING TITLE</th>
                <th style="border: none;" colspan="2">INCLUSIVE YEARS</th>
            </tr>
        </thead>
        <tbody id="training_table_orig_tbody">
        </tbody>
    </table>
    <hr class="hr-design">
    <br>

    <h5 class="table-title" style="border-bottom: 3px solid black !important;"> VOCATIONAL</h5>
    <table id="vocational_table_orig" class="table table-bordered table-hover table-striped align-middle vocational_table_orig" style="display: none;">
        <thead class="thead-educational">
            <tr>
                <th style="border: none;">NAME OF VOCATIONAL SCHOOL</th>
                <th style="border: none;">COURSE</th>
                <th style="border: none;" colspan="2">INCLUSIVE YEARS</th>
            </tr>
        </thead>
        <tbody id="vocational_table_orig_tbody">
        </tbody>
    </table>
    <hr class="hr-design">
</div>