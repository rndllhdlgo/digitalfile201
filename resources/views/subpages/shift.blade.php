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
                    <div class="form-outline">
                        <input type="text" id="shift_code" class="form-control text-uppercase" autocomplete="off">
                        <label class="form-label" for="shift_code">Shift Code</label>
                    </div>
                    <br>
                    <div class="form-outline">
                        <input type="text" id="shift_working_hours" class="form-control text-capitalize" autocomplete="off">
                        <label class="form-label" for="shift_working_hours">Working Hours</label>
                    </div>
                    <br>
                    <div class="form-outline">
                        <input type="text" id="shift_break_time" class="form-control text-capitalize" autocomplete="off">
                        <label class="form-label" for="shift_break_time">Break Time</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="shiftSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                </div>
            </div>
        </div>
    </div>

</div>