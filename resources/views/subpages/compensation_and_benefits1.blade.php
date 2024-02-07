<div id="compensation_benefits" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div style="zoom:85%;">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-design">
                <tr>
                    <th colspan="8" style="zoom:120% !important;">HEALTHCARE MAINTENANCE ORGANIZATION</th>
                </tr>
                <tr>
                    <th style="width:15%;">HMO</th>
                    <th style="width:15%;">COVERAGE</th>
                    <th style="width:15%;">PARTICULARS</th>
                    <th style="width:15%;">ROOM</th>
                    <th style="width:15%;">EFFECTIVITY DATE</th>
                    <th style="width:15%;">EXPIRATION DATE</th>
                    <th style="width:5%;">STATUS</th>
                    <th style="width:5%;">ACTION</th>
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
                        <div class="f-outline">
                            <input class="forminput form-control" type="date" id="effectivity_date" placeholder=" " style="background-color:white;">
                            <label for="effectivity_date" class="formlabel form-label">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="date" id="expiration_date" placeholder=" " style="background-color:white;">
                            <label for="expiration_date" class="formlabel form-label">
                        </div>
                    </td>
                    <td class="pb-3 pt-3"></td>
                    <td class="pb-3 pt-3">
                        <button type="button" id="hmoAdd" class="btn btn-success center btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table id="hmo_table" class="table table-bordered table-hover table-striped align-middle hmo_table" style="margin-top: -17px;">
            <thead style="display:none;">
                <tr>
                    <th></th>
                    <th></th>
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

        <table id="hmo_table_orig" class="table table-bordered table-hover table-striped align-middle hmo_table_orig" style="display: none; margin-top:-36px;">
            <thead>
                <tr>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                    <th style="border:none;"></th>
                </tr>
            </thead>
            <tbody id="hmo_table_orig_tbody">
            </tbody>
        </table>
    </div>

        <hr class="hr-design">
        <br>
{{--  --}}

    <hr class="hr-design">
    <table class="table table-bordered table-striped table-hover align-middle w-100" id="leave_credits">
        <thead class="thead-design">
            <tr>
                <th colspan="3">LEAVE CREDITS</th>
            </tr>
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