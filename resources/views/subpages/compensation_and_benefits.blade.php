<div id="compensation_benefits" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <h5 class="table-title" style="width:400px !important;">HEALTHCARE MAINTENANCE ORGANIZATION</h5>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-design">
                <tr>
                    <th style="width:20%;">HMO</th>
                    <th style="width:20%;">COVERAGE</th>
                    <th style="width:20%;">PARTICULARS</th>
                    <th style="width:20%;">ROOM</th>
                    <th style="width:10%;">STATUS</th>
                    <th style="width:10%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="hmo" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="hmo" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="text" id="coverage" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="coverage" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="text" id="particulars" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="particulars" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="text" id="room" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="room" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline text-center">
                            <span>ACTIVE</span>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <button type="button" id="hmoAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table id="hmo_table" class="table table-bordered table-hover table-striped align-middle hmo_table" style="margin-top: -17px;">
            <thead style="display:none;">
                <tr>
                    <th style="width:20%;"></th>
                    <th style="width:20%;"></th>
                    <th style="width:20%;"></th>
                    <th style="width:20%;"></th>
                    <th style="width:10%;"></th>
                    <th style="width:10%;"></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table id="hmo_table_orig" class="table table-bordered table-hover table-striped align-middle hmo_table_orig" style="display: none; margin-top:-36px;">
            <thead>
                <tr>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                    <th style="border-left: none;"></th>
                </tr>
            </thead>
            <tbody id="hmo_table_orig_tbody">
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
{{--  --}}
    <hr class="hr-design">
    <h5 class="table-title">LEAVE CREDITS</h5>
    <table class="table table-bordered table-striped table-hover align-middle w-100" id="leave_credits">
        <thead class="thead-design">
            <tr>
                <th>LEAVE TYPE</th>
                <th>BALANCE</th>
                <th>NO. OF DAYS</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <hr class="hr-design">
</div>