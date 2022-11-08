<div id="shift_div" class="tab-pane fade" style="border-radius:0px;">
    <br>
    <table class="table table-striped table-hover table-bordered w-100 shiftTable" id="shiftTable">
        <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th><i class="fas fa-id-card"></i> SHIFT CODE</th>
                    <th><i class="fa-solid fa-clock"></i> WORKING HOURS</th>
                    <th><i class="fa-solid fa-clock"></i> BREAK TIME</th>
                </tr>
        </thead>
            <tbody>
            </tbody>
    </table>

    <div class="modal fade" id="saveShiftModal" tabindex="-1" aria-labelledby="saveShiftModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="shift_code" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="shift_code" class="formlabel form-label"><i class="fas fa-address-card"></i> SHIFT CODE </label>
                    </div>
                    {{-- <div class="form-outline">
                        <input type="text" id="shift_code" class="form-control text-uppercase required_field" autocomplete="off">
                        <label class="form-label" for="shift_code">Shift Code</label>
                    </div> --}}
                    <br>
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="shift_working_hours" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="shift_working_hours" class="formlabel form-label"><i class="fas fa-address-card"></i> WORKING HOURS </label>
                    </div>
                    {{-- <div class="form-outline">
                        <input type="text" id="shift_working_hours" class="form-control text-capitalize required_field" autocomplete="off">
                        <label class="form-label" for="shift_working_hours">Working Hours</label>
                    </div> --}}
                    <br>
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="shift_break_time" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="shift_break_time" class="formlabel form-label"><i class="fas fa-address-card"></i> BREAK TIME </label>
                    </div>
                    {{-- <div class="form-outline">
                        <input type="text" id="shift_break_time" class="form-control text-capitalize required_field" autocomplete="off">
                        <label class="form-label" for="shift_break_time">Break Time</label>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="shiftSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateShiftModal" tabindex="-1" aria-labelledby="updateShiftModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Shift Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="shift_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="shift_details_code" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="shift_details_code" class="formlabel form-label"><i class="fas fa-address-card"></i> SHIFT CODE </label>
                    </div>
                    {{-- <div class="form-outline">
                        <input type="text" id="shift_details_code" class="form-control text-capitalize required_field" autocomplete="off">
                        <label class="form-label" for="shift_details_code">Shift Code</label>
                    </div> --}}
                    <br>
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="shift_details_working_hours" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="shift_details_working_hours" class="formlabel form-label"><i class="fas fa-address-card"></i> WORKING HOURS </label>
                    </div>
                    {{-- <div class="form-outline">
                        <input type="text" id="shift_details_working_hours" class="form-control text-capitalize required_field" autocomplete="off">
                        <label class="form-label" for="shift_details_working_hours">Working Hours</label>
                    </div> --}}
                    <br>
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="shift_details_break_time" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="shift_details_break_time" class="formlabel form-label"><i class="fas fa-address-card"></i> BREAK TIME </label>
                    </div>
                    {{-- <div class="form-outline">
                        <input type="text" id="shift_details_break_time" class="form-control text-capitalize required_field" autocomplete="off">
                        <label class="form-label" for="shift_details_break_time">Break Time</label>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="shiftUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>

</div>