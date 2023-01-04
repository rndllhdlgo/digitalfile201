<div id="job_history" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
   <h5 class="table-title">JOB HISTORY</h5>
        <table class="table table-striped table-bordered align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:15%; "> COMPANY NAME</th>
                    <th style="width:15%; "> JOB DESCRIPTION</th>
                    <th style="width:15%; "> JOB POSITION</th>
                    <th style="width:15%; "> CONTACT NUMBER</th>
                    <th style="width:30%; " class="text-center" colspan="2"> INCLUSIVE YEARS</th>
                    <th style="width:10%; " class="text-center"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control job_field text-capitalize" type="search" id="job_company_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_company_name" class="formlabel form-label"><span class="span_job_company_name span_all span_job">(Optional)</span> </label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control job_field text-capitalize" type="search" id="job_description" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_description" class="formlabel form-label"><span class="span_job_position span_all span_job">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control job_field text-capitalize" type="search" id="job_position" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="job_position" class="formlabel form-label"><span class="span_job_position span_all span_job">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control job_field" type="search" id="job_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_contact_number" class="formlabel form-label"><span class="span_job_contact_number span_all span_job">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control job_field" id="job_inclusive_years_from">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input type="month" class="forminput form-control job_field" id="job_inclusive_years_to">
                        </div>
                    </td>
                    <td>
                        <button type="button" id="jobHistoryAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody> 
        </table>

   {{-- Job Data Table --}}
        <table id="job_history_table" class="table table-bordered table-hover table-striped job_history_table" style="margin-top: -17px;">
            <thead class="job_history_table_thead" style="display: none;">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="job_history_table_orig" class="table table-bordered table-hover table-striped job_history_table_orig" style="display: none; margin-top:-36px;">
            <thead class="job_history_table_orig_thead">
                <tr>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border-left:none;"> </th>
                </tr>
            </thead>
            <tbody id="job_history_table_tbody">
            </tbody>
        </table>
</div>