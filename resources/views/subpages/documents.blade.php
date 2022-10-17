<div id="documents" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="container" style="width:70%;">
        <strong class="table-title">REQUIREMENTS</strong>
        <table class="table table-striped table-bordered table-hover mt-1">
            <thead class="thead-educational">
                <tr>
                    <th style="width:25%"><i class="fas fa-file"></i> FILE NAME</th>
                    <th style="width:50%"><i class="fas fa-upload"></i> ATTACH FILE</th>
                    <th style="width:15%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p><b>BIRTH CERTIFICATE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#birthcertificate_file').click();" id="birthcertificate_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                        <span id="birthcertificate_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_birthcertificate').click();" id="eye_birthcertificate" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_birthcertificate" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_birthcertificate" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>NBI CLEARANCE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#nbi_file').click();" id="nbi_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="nbi_file" id="nbi_file" style="display: none;" onchange="return nbiValidation()">
                        <span id="nbi_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_nbi').click();" id="eye_nbi" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_nbi" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_nbi" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>BARANGAY CLEARANCE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#barangay_clearance_file').click();" id="barangay_clearance_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="barangay_clearance_file" id="barangay_clearance_file" style="display: none;" onchange="return barangayclearanceValidation()">
                        <span id="barangay_clearance_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_barangay_clearance').click();" id="eye_barangay_clearance" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_barangay_clearance" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_barangay_clearance" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>POLICE CLEARANCE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#police_clearance_file').click();" id="police_clearance_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="police_clearance_file" id="police_clearance_file" style="display: none;" onchange="return policeclearanceValidation()">
                        <span id="police_clearance_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_police_clearance').click();" id="eye_police_clearance" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_police_clearance" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_police_clearance" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>SSS E1 FORM</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#sss_file').click();" id="sss_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="sss_file" id="sss_file" style="display: none;" onchange="return sssValidation()">
                        <span id="sss_text">No file chosen, yet.</span>
                    </td>
                    <td> 
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_sss').click();" id="eye_sss" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_sss" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_sss" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>PHILHEALTH FORM</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#philhealth_file').click();" id="philhealth_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="philhealth_file" id="philhealth_file" style="display: none;" onchange="return philhealthValidation()">
                        <span id="philhealth_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_philhealth').click();" id="eye_philhealth" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_philhealth" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_philhealth" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>PAG-IBIG FORM</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#pag_ibig_file').click();" id="pag_ibig_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" class="" accept="image/*,.pdf" name="pag_ibig_file" id="pag_ibig_file" style="display: none;" onchange="return pagibigValidation()">
                        <span id="pag_ibig_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" title="VIEW" onclick="$('#preview_pag_ibig').click();" id="eye_pag_ibig" style="margin-left: 13%;" disabled><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-primary bp" title="REPLACE FILE" id="replace_pag_ibig" disabled><i class="fa-solid fa-file-pen"></i></button>
                        <img src="" alt="" id="preview_pag_ibig" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changePreview(this)">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr class="hr-design">

    
    {{-- Display File Chosen --}}
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-xxl-down">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <iframe src="" alt="" id="file_display" style="width:100%;height:100%;"></iframe>
                </div>
            </div>
        </div>
    </div>

    
</div>