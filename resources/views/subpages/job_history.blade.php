<div id="job_history" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
   <strong class="table-title">JOB HISTORY</strong>
   <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <tr>
                <th><i class="far fa-address-card"></i> NAME OF COMPANY</th>
                <th><i class="fas fa-briefcase"></i> JOB POSITION</th>
                <th><i class="fas fa-map-marker-alt"></i> COMPANY ADDRESS</th>
                <th><i class="fas fa-phone-square-alt"></i> CONTACT DETAILS</th>
                <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                <th style="width:10%;"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody id="job_tbody">
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="job_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="job_name" class="formlabel form-label"><span class="span_job_name">(Required)</span> </label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="job_position" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="job_position" class="formlabel form-label"><span class="span_job_position">(Required)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="job_address" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="job_address" class="formlabel form-label"><span class="span_job_address">(Required)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="job_contact_details" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                        <label for="job_contact_details" class="formlabel form-label"><span class="span_job_contact_details">(Required)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="job_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                        <label for="job_inclusive_years" class="formlabel form-label"><span class="span_job_inclusive_years">(Required)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <button type="button" id="btnJobHistoryAdd" class="btn btn-success center" title="ADD"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody> 
   </table>
   <hr class="hr-design">
</div>{{-- End of Job History Div --}}