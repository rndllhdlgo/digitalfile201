
<div id="education_trainings" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
        <h5 class="table-title">COLLEGE EDUCATION</h5>
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="thead-design">
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
                                <input class="forminput form-control text-uppercase" type="search" id="college_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="college_name" class="formlabel form-label"><span>(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control text-uppercase" type="text" id="college_degree" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="college_degree" class="formlabel form-label"><span>(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="college_inclusive_years_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="college_inclusive_years_to">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <button type="button" id="collegeAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table id="college_table" class="table table-bordered table-hover table-striped align-middle college_table" style="margin-top: -17px;">
                <thead style="display:none;">
                    <tr>
                        <th style="width: 30%;"></th>
                        <th style="width: 30%;"></th>
                        <th style="width: 30%;" colspan="2"></th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <table id="college_table_orig" class="table table-bordered table-hover table-striped align-middle college_table_orig" style="display: none; margin-top:-36px;">
                <thead>
                    <tr>
                        <th style="border: none;"></th>
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
{{--  --}}
        <h5 class="table-title">SECONDARY EDUCATION</h5>
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="thead-design">
                    <tr>
                        <th style="width: 30%;">NAME OF SCHOOL</th>
                        <th style="width: 30%;">SCHOOL ADDRESS</th>
                        <th style="width: 30%;" colspan="2" class="text-center">INCLUSIVE YEARS</th>
                        <th style="width: 10%;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control text-uppercase" type="search" id="secondary_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary_name" class="formlabel form-label"><span>(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control text-uppercase" type="text" id="secondary_address" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary_address" class="formlabel form-label"><span>(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="secondary_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="secondary_to">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <button type="button" id="secondaryAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table id="secondary_table" class="table table-bordered table-hover table-striped align-middle secondary_table" style="margin-top: -17px;">
                <thead style="display:none;">
                    <tr>
                        <th style="width: 30%;"></th>
                        <th style="width: 30%;"></th>
                        <th style="width: 30%;" colspan="2" class="text-center"></th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <table id="secondary_table_orig" class="table table-bordered table-hover table-striped align-middle secondary_table_orig" style="display: none; margin-top:-36px;">
                <thead>
                    <tr>
                        <th style="border: none;"></th>
                        <th style="border: none;"></th>
                        <th style="border: none;"></th>
                        <th style="border: none;"></th>
                        <th style="border-left: none;"></th>
                    </tr>
                </thead>
                <tbody id="secondary_table_orig_tbody">
                </tbody>
            </table>
            <hr class="hr-design">
            <br>
{{--  --}}
        <h5 class="table-title">PRIMARY EDUCATION</h5>
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="thead-design">
                    <tr>
                        <th style="width: 30%;">NAME OF SCHOOL</th>
                        <th style="width: 30%;">SCHOOL ADDRESS</th>
                        <th style="width: 30%;" colspan="2" class="text-center">INCLUSIVE YEARS</th>
                        <th style="width: 10%;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control text-uppercase" type="search" id="primary_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary_name" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control text-uppercase" type="text" id="primary_address" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary_address" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="primary_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="primary_to">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <button type="button" id="primaryAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table id="primary_table" class="table table-bordered table-hover table-striped align-middle primary_table" style="margin-top: -17px;">
                <thead style="display:none;">
                    <tr>
                        <th style="width: 30%;"></th>
                        <th style="width: 30%;"></th>
                        <th style="width: 30%;" colspan="2"></th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <table id="primary_table_orig" class="table table-bordered table-hover table-striped align-middle primary_table_orig" style="display: none; margin-top:-36px;">
                <thead>
                    <tr>
                        <th style="border: none;"></th>
                        <th style="border: none;"></th>
                        <th style="border: none;"></th>
                        <th style="border: none;"></th>
                        <th style="border-left: none;"></th>
                    </tr>
                </thead>
                <tbody id="primary_table_orig_tbody">
                </tbody>
            </table>
            <hr class="hr-design">
            <br>
{{--  --}}
        <h5 class="table-title">TRAININGS</h5>
        <table class="table table-striped table-bordered table-hover align-middle ">
                <thead class="thead-design">
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
                                <input class="forminput form-control text-uppercase" type="search" id="training_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="training_name" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>

                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control text-uppercase" type="search" id="training_title" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="training_title" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>

                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="training_inclusive_years_from">
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input type="month" class="forminput form-control max_month" id="training_inclusive_years_to">
                            </div>
                        </td>

                        <td>
                            <button type="button" id="trainingAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

        <table id="training_table" class="table table-bordered table-hover table-striped align-middle" style="margin-top: -17px;">
            <thead style="display: none;">
                <tr>
                    <th style="width: 30%;"></th>
                    <th style="width: 30%;"></th>
                    <th style="width: 30%;" colspan="2"></th>
                    <th style="width: 10%;"></thead>
            <tbody>
            </tbody>
        </table>

        <table id="training_table_orig" class="table table-bordered table-hover table-striped align-middle training_table_orig" style="display: none; margin-top:-36px;">
            <thead>
                <tr>
                    <th style="border: none;"></th>
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
{{--  --}}
        <h5 class="table-title">VOCATIONAL</h5>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-design">
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
                            <input class="forminput form-control text-uppercase" type="search" id="vocational_name" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="vocational_name" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="vocational_course" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="vocational_course" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>

                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control max_month" id="vocational_inclusive_years_from">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control max_month" id="vocational_inclusive_years_to">
                        </div>
                    </td>

                    <td>
                        <button type="button" id="vocationalAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    {{-- Vocational Data Table --}}
        <table id="vocational_table" class="table table-bordered table-hover table-striped align-middle" style="margin-top: -17px;">
            <thead style="display: none;">
                <tr>
                    <th style="width:30%;"></th>
                    <th style="width:30%;"></th>
                    <th style="width:30%;"></th>
                    <th style="width:10%;"></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="vocational_table_orig" class="table table-bordered table-hover table-striped align-middle vocational_table_orig" style="display: none; margin-top:-36px;">
            <thead>
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