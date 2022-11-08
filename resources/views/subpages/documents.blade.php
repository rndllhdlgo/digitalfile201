<div id="documents" class="tab-pane fade" style="border-radius:0px;">
    
    <hr class="hr-design">
    <div class="container" style="width:75%;">
        <strong class="table-title">REQUIREMENTS</strong>
            <table class="table table-striped table-bordered table-hover mt-1 align-middle">
                <thead class="thead-educational">
                    <tr>
                        <th style="width:25%"><i class="fas fa-file"></i> FILE TITLE</th>
                        <th style="width:40%"><i class="fas fa-upload"></i> ATTACH FILE</th>
                        <th style="width:15%"><i class="fas fa-user-cog"></i> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><p class="title_file"><b>BIRTH CERTIFICATE</b></p></td>
                        <td>
                            <button type="button" id="birthcertificate_button" class="btn btn-primary bp" onclick="$('#birthcertificate_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            {{-- <input  type="file"   id="birthcertificate_file"   class="required_field"     onchange="return BirthCertificateValidation()" accept="image/*,.pdf" name="birthcertificate_file"> --}}
                            <input  type="file"   id="birthcertificate_file"   class="required_field"     onchange="BirthCertificateValidation(birthcertificate_file)" accept=".pdf" name="birthcertificate_file">
                            <span id="birthcertificate_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="birthcertificate_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#birthcertificate_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="birthcertificate_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="birthcertificate_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><p class="title_file"><b>NBI CLEARANCE</b></p></td>
                        <td>
                            <button type="button" id="nbi_button" class="btn btn-primary bp" onclick="$('#nbi_file').click();" ><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input  type="file"   id="nbi_file"   class="required_field"     onchange="nbiValidation(nbi_file)" accept=".pdf" name="nbi_file">
                            <span id="nbi_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="nbi_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#nbi_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="nbi_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="nbi_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr> 
                    <tr>
                        <td><p class="title_file"><b>BARANGAY CLEARANCE</b></p></td>
                        <td>
                            <button type="button" id="barangay_clearance_button" class="btn btn-primary bp" onclick="$('#barangay_clearance_file').click();" ><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input  type="file"   id="barangay_clearance_file"   class="required_field"     onchange="barangayclearanceValidation(barangay_clearance_file)" accept=".pdf" name="barangay_clearance_file">
                            <span id="barangay_clearance_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="barangay_clearance_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#barangay_clearance_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="barangay_clearance_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="barangay_clearance_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><p class="title_file"><b>POLICE CLEARANCE</b></p></td>
                        <td>
                            <button type="button" id="police_clearance_button" class="btn btn-primary bp" onclick="$('#police_clearance_file').click();" ><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input  type="file"   id="police_clearance_file"   class="required_field"     onchange="policeclearanceValidation(police_clearance_file)" accept=".pdf" name="police_clearance_file">
                            <span id="police_clearance_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="police_clearance_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#police_clearance_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="police_clearance_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="police_clearance_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><p class="title_file"><b>SSS E1 FORM / SSS ID</b></p></td>
                        <td>
                            <button type="button" id="sss_button" class="btn btn-primary bp" onclick="$('#sss_file').click();" ><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input type="file"    id="sss_file"   class="required_field"     onchange="return sssValidation(sss_file)" accept=".pdf" name="sss_file">
                            <span id="sss_text">No file chosen, yet.</span>
                        </td>
                        <td> 
                            <button type="button" id="sss_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#sss_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="sss_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="sss_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><p class="title_file"><b>PHILHEALTH FORM</b></p></td>
                        <td>
                            <button type="button" id="philhealth_button" class="btn btn-primary bp" onclick="$('#philhealth_file').click();" ><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input  type="file"   id="philhealth_file"   class="required_field"     onchange="return philhealthValidation()" accept=".pdf" name="philhealth_file">
                            <span id="philhealth_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="philhealth_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#philhealth_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="philhealth_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="philhealth_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><p class="title_file"><b>PAG-IBIG FORM</b></p></td>
                        <td>
                            <button type="button"  id="pag_ibig_button" class="btn btn-primary bp" onclick="$('#pag_ibig_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input type="file"     id="pag_ibig_file"   class="required_field"     onchange="return pagibigValidation()"accept=".pdf" name="pag_ibig_file">
                            <span id="pag_ibig_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="pag_ibig_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#pag_ibig_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="pag_ibig_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="pag_ibig_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><p class="title_file"><b>MEDICAL CERTIFICATE</b></p></td>
                        <td>
                            <button type="button"  id="medical_certificate_button" class="btn btn-primary bp" onclick="$('#medical_certificate_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                            <input type="file"     id="medical_certificate_file"   class="required_field"     onchange="return medicalCertificateValidation()"accept=".pdf" name="medical_certificate_file">
                            <span id="medical_certificate_text">No file chosen, yet.</span>
                        </td>
                        <td>
                            <button type="button" id="medical_certificate_view"     class="btn btn-success grow btnDisabled" title="VIEW" onclick="$('#medical_certificate_preview').click();" disabled><i class="fas fa-eye"></i></button>
                            <button type="button" id="medical_certificate_replace"  class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                            <img src="" alt=""    id="medical_certificate_preview"  data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                        </td>
                    </tr>
                </tbody>
            </table>
    </div> {{-- Container div end tag --}}
    {{-- Display Preview of File Chosen --}}
    <div class="modal fade" id="preview_document">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-xxl-down">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" title="CLOSE"></button>
                </div>
                <div class="modal-body">
                    <iframe src="" alt="" id="document_display" style="width:100%;height:100%;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>