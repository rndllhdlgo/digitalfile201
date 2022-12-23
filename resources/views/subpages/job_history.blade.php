<div id="job_history" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
   <h5 class="table-title">JOB HISTORY</h5>
        <table class="table table-striped table-bordered align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:18%"><i class="far fa-address-card"></i> NAME OF COMPANY</th>
                    <th style="width:18%"><i class="fas fa-briefcase"></i> JOB POSITION</th>
                    <th style="width:18%"><i class="fas fa-map-marker-alt"></i> COMPANY ADDRESS</th>
                    <th style="width:18%"><i class="fas fa-phone-square-alt"></i> CONTACT DETAILS</th>
                    <th style="width:18%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%;"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="job_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_name" class="formlabel form-label"><span class="span_job_name span_all">(Optional)</span> </label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="job_position" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_position" class="formlabel form-label"><span class="span_job_position span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="job_address" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="job_address" class="formlabel form-label"><span class="span_job_address span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="job_contact_details" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_contact_details" class="formlabel form-label"><span class="span_job_contact_details span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="job_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="job_inclusive_years" class="formlabel form-label"><span class="span_job_inclusive_years span_all">(Optional)</span></label>
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
                    <th style="width:18%"><i class="far fa-address-card"></i> NAME OF COMPANY</th>
                    <th style="width:18%"><i class="fas fa-briefcase"></i> JOB POSITION</th>
                    <th style="width:18%"><i class="fas fa-map-marker-alt"></i> COMPANY ADDRESS</th>
                    <th style="width:18%"><i class="fas fa-phone-square-alt"></i> CONTACT DETAILS</th>
                    <th style="width:18%"><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th style="width:10%;"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="job_history_table_orig" class="table table-bordered table-hover table-striped job_history_table_orig" style="display: none; margin-top:-16px;">
            <thead class="job_history_table_orig_thead">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="job_history_table_tbody">
            </tbody>
        </table>
</div>