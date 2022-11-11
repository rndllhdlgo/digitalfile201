<div id="medical_history" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    {{-- <strong style="font-size:20px;color:#0d1a80;">GENERAL MEDICAL HISTORY</strong>
    <hr class="hr-design" style="width: 270px;"> --}}

    <strong class="table-title">DRUG ALLERGIES</strong>
   <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th><i class="far fa-address-card"></i> NAME OF DRUGS</th>
                <th><i class="fas fa-briefcase"></i> ALLERGY CAUSES</th>
                <th><i class="fas fa-briefcase"></i> ALLERGY SYMPTOMS</th>
                <th><i class="fas fa-briefcase"></i> ALLERGY TREATMENTS</th>
                <th><i class="fas fa-user-cog"></i> ACTION</th>
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
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="job_position" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="job_position" class="formlabel form-label"><span class="span_job_position span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="job_position" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="job_position" class="formlabel form-label"><span class="span_job_position span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="btnJobHistoryAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody> 
   </table>
   <br>

    <strong class="table-title">OPERATION HISTORY</strong>
    <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:18%"><i class="far fa-address-card"></i> CAUSE OF OPERATION</th>
                <th style="width:18%"><i class="fas fa-briefcase"></i> CURRENT MEDICATION</th>
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
                <td>
                    <button type="button" id="btnJobHistoryAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody> 
   </table>
   <br>

   <strong style="font-size:20px;color:#0d1a80;">PAST MEDICAL HISTORY</strong>
  
        <div class="row mb-3">
            <div class="col">
                <hr style="border:2px solid#0d1a80">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="anemia" name="option1" value="anemia">
                    <label class="form-check-label" for="anemia">Anemia</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="asthma" name="option2" value="asthma">
                    <label class="form-check-label" for="asthma">Asthma</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="arthritis" name="option3" value="arthritis">
                    <label class="form-check-label" for="arthritis">Arthritis</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="cancer" name="option4" value="cancer">
                    <label class="form-check-label" for="cancer">Cancer</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="gout" name="option5" value="gout">
                    <label class="form-check-label" for="gout">Gout</label>
                </div>
                <hr style="border:2px solid#0d1a80">
            </div>

            <div class="col">
                <hr style="border:2px solid#0d1a80">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="diabetes" name="option1" value="diabetes">
                        <label class="form-check-label" for="diabetes">Diabetes</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="emotional_disorder" name="option2" value="emotional_disorder">
                        <label class="form-check-label" for="emotional_disorder">Emotional Disorder</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="epilepsy_seizures" name="option3" value="epilepsy_seizures">
                        <label class="form-check-label" for="epilepsy_seizures">Epilepsy Seizures</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="fainting_spells" name="option4" value="fainting_spells">
                        <label class="form-check-label" for="fainting_spells">Fainting Spells</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="gallstones" name="option5" value="gallstones">
                        <label class="form-check-label" for="gallstones">Gallstones</label>
                    </div>
                <hr style="border:2px solid#0d1a80">
            </div>

            <div class="col">
                <hr style="border:2px solid#0d1a80">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="heart_disease" name="option1" value="heart_disease">
                        <label class="form-check-label" for="heart_disease">Heart Disease</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="heart_attack" name="option2" value="heart_attack">
                        <label class="form-check-label" for="heart_attack">Heart Attack</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rheumatic_fever" name="option3" value="rheumatic_fever">
                        <label class="form-check-label" for="rheumatic_fever">Rheumatic Fever</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="high_blood_pressure" name="option4" value="high_blood_pressure">
                        <label class="form-check-label" for="high_blood_pressure">High Blood Pressure</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="digestive_problems" name="option5" value="digestive_problems">
                        <label class="form-check-label" for="digestive_problems">Digestive Problems</label>
                    </div>
                <hr style="border:2px solid#0d1a80">
            </div>

            <div class="col">
                <hr style="border:2px solid#0d1a80">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="ulcerative_colitis" name="option1" value="ulcerative_colitis">
                        <label class="form-check-label" for="ulcerative_colitis">Ulcerative Colitis</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="ulcer_disease" name="option2" value="ulcer_disease">
                        <label class="form-check-label" for="ulcer_disease">Ulcear Disease</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="arthritis" name="option3" value="arthritis">
                        <label class="form-check-label" for="arthritis">Arthritis</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="cancer" name="option4" value="cancer">
                        <label class="form-check-label" for="cancer">Cancer</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="gout" name="option5" value="gout">
                        <label class="form-check-label" for="gout">Gout</label>
                    </div>
                <hr style="border:2px solid#0d1a80">
            </div>
        </div>
        <br>
        
        <strong style="font-size:20px">HEALTHY AND UNHEALTHY HABITS</strong>
        <div class="row">
            <div class="col">
                <strong style="font-size:15px">EXERCISE</strong>
                <hr style="border:2px solid#0d1a80">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                        <label class="form-check-label" for="radio1">Never</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                        <label class="form-check-label" for="radio2">1-2 days</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                        <label class="form-check-label" for="radio3">3-4 days</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4">
                        <label class="form-check-label" for="radio4">5+ days</label>
                    </div>
                    <hr style="border:2px solid#0d1a80">
            </div>

            <div class="col">
                <strong style="font-size:15px">ALCOHOL CONSUMPTION</strong>
                <hr style="border:2px solid#0d1a80">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                        <label class="form-check-label" for="radio1">I don't drink</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                        <label class="form-check-label" for="radio2">1-2 glasses/day</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                        <label class="form-check-label" for="radio3">3-4 glasses/day</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4">
                        <label class="form-check-label" for="radio4">5+ glasses/day</label>
                    </div>
                <hr style="border:2px solid#0d1a80">
            </div>

            <div class="col">
                <strong style="font-size:15px">CIGARETTE CONSUMPTION</strong>
                <hr style="border:2px solid#0d1a80">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                        <label class="form-check-label" for="radio1">I don't drink</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                        <label class="form-check-label" for="radio2">1-2 glasses/day</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                        <label class="form-check-label" for="radio3">3-4 glasses/day</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4">
                        <label class="form-check-label" for="radio4">5+ glasses/day</label>
                    </div>
                <hr style="border:2px solid#0d1a80">
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div>