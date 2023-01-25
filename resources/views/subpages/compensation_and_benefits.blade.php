<div id="compensation_benefits" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">

        <h5 class="table-title">COMPENSATION</h5>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-educational">
                <tr>
                    <th><i class="fa-solid fa-peso-sign"></i> BASIC SALARY</th>
                    <th><i class="fa-solid fa-peso-sign"></i> INCENTIVE PAY</th>
                    <th><i class="fa-solid fa-peso-sign"></i> OVERTIME PAY</th>
                    <th><i class="fa-solid fa-peso-sign"></i> BONUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="f-outline">
                            <input type="hidden" id="employee_salary_orig">
                            <input class="forminput form-control optional_field" type="search" id="employee_salary" placeholder="(Optional)" style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_salary" class="formlabel form-label"><span class="span_employee_salary span_all"></span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input type="hidden" id="employee_incentives_orig">
                            <input class="forminput form-control optional_field" type="search" id="employee_incentives" placeholder="(Optional)" style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_incentives" class="formlabel form-label"> <span class="span_employee_incentives span_all"></span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input type="hidden" id="employee_overtime_pay_orig">
                            <input class="forminput form-control optional_field" type="search" id="employee_overtime_pay" placeholder="(Optional)" style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_overtime_pay" class="formlabel form-label"> <span class="span_employee_overtime_pay span_all"></span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input type="hidden" id="employee_bonus_orig">
                            <input class="forminput form-control optional_field" type="search" id="employee_bonus" placeholder="(Optional)" style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_bonus" class="formlabel form-label"><span class="span_employee_bonus span_all"></span></label>        
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    <hr class="hr-design">
    <br>
    <h5 class="table-title">HEALTHCARE / BENEFITS</h5>
    <table class="table table-bordered table-striped table-hover align-middle">
        <tbody>
            <tr>
                <td>
                    <input type="hidden" id="employee_insurance_orig">
                    <textarea class="form-control text-capitalize separated textarea_insurance" id="employee_insurance" rows="5" style="resize: none;" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="hr-design">
</div>