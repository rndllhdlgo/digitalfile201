<div id="logs" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
        <h5 class="table-title">SAMPLE TABLE</h5>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width: 30%;">SAMPLE1</th>
                    <th style="width: 30%;">SAMPLE2</th>
                    <th style="width: 30%;">SAMPLE3</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="sample1" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="sample1" class="formlabel form-label"><span class="span_college_name span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="text" id="sample2" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="sample2" class="formlabel form-label"><span class="span_college_degree span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="sample3" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="sample3" class="formlabel form-label"><span class="span_college_inclusive_years span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <button type="button" id="sampleAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- Save Table --}}
        <table id="sample_table" class="table table-bordered table-striped table-hover align-middle" style="margin-top: -17px;">
            <thead class="sample_table_thead">
                <tr style="display: none;">
                    <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%;">DEGREE</th>
                    <th style="width: 30%;">INCLUSIVE YEARS</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        {{-- Update Table --}}
        <table id="sample_table_orig" class="table table-bordered table-striped table-hover align-middle sample_table_orig" style="display: none; margin-top:-16px;">
            <thead class="sample_table_orig_thead">
                <tr style="display: none;">
                    <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%;">DEGREE</th>
                    <th style="width: 30%;">INCLUSIVE YEARS</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody id="sample_table_orig_tbody"></tbody>
        </table>
    <hr class="hr-design">
</div>