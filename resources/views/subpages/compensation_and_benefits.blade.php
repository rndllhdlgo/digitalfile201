<div id="compensation_and_benefits" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
        {{-- <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td style="background-color: #0d1a80;">
                        <strong class="text-white">COMPENSATION</strong>
                    </td>
                </tr>

                <tr>
                    <td class="pb-3 pt-3">
                        <div class="row">
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control required_field" type="search" id="employee_salary" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                                    <label for="employee_salary" class="formlabel form-label"><i class="fa-solid fa-peso-sign"></i> BASIC SALARY <span class="span_employee_salary span_all"></span></label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control required_field" type="search" id="employee_incentives" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                                    <label for="employee_incentives" class="formlabel form-label"><i class="fa-solid fa-peso-sign"></i> INCENTIVE PAY <span class="span_employee_incentives span_all"></span></label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control required_field" type="search" id="employee_overtime_pay" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                                    <label for="employee_overtime_pay" class="formlabel form-label"><i class="fa-solid fa-peso-sign"></i> OVERTIME PAY <span class="span_employee_overtime_pay span_all"></span></label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control required_field" type="search" id="employee_bonus" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                                    <label for="employee_bonus" class="formlabel form-label"><i class="fa-solid fa-peso-sign"></i> BONUS <span class="span_employee_bonus span_all"></span></label>        
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td style="background-color:#0d1a80;">
                        <strong class="text-white">BENEFITS / HEALTH CARE</strong>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <textarea class="form-control text-capitalize separated textarea_insurance" id="employee_insurance" rows="5" style="resize: none;" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                    </td>
                </tr>
            </tbody>
        </table> --}}

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
                            <input class="forminput form-control required_field" type="search" id="employee_salary" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_salary" class="formlabel form-label"><span class="span_employee_salary span_all"></span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="employee_incentives" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_incentives" class="formlabel form-label"> <span class="span_employee_incentives span_all"></span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="employee_overtime_pay" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                            <label for="employee_overtime_pay" class="formlabel form-label"> <span class="span_employee_overtime_pay span_all"></span></label>
                        </div>
                    </td>
                    <td>
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="search" id="employee_bonus" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
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
                    <textarea class="form-control text-capitalize separated textarea_insurance" id="employee_insurance" rows="5" style="resize: none;" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="hr-design">
</div>