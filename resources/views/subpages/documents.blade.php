<div id="documents" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <br>
    <span class="alert class alert-warning"><i class="fa-solid fa-circle-info"></i> <b> INSTRUCTION:</b> File Size: Maximum <b>(10MB)</b> File Extensions: <b>(.pdf)</b>.</span>
    <br>
    <br>
    <div class="document_table_clear">
        <div class="document_first_table">
            <h5 class="table-title">REQUIREMENTS</h5>
                <table class="table table-striped table-bordered table-hover align-middle">
                    <thead class="thead-educational">
                        <tr>
                            <th style="width:35%"> FILE TITLE</th>
                            <th style="width:45%"> ATTACHMENT</th>
                            <th style="width:20%"> ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><p class="file_title"><b>BARANGAY CLEARANCE</b></p></td>
                            <td>
                                <input type="hidden" id="barangay_clearance_filename" name="barangay_clearance_filename">

                                <span class="barangay_clearance_span" style="display: none;"></span>
                                <div class="input-group custom-file-button barangay_clearance_div">
                                    <label class="input-group-text barangay_clearance_label text-white" for="barangay_clearance_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control barangay_clearance_file input-file-text required_field" id="barangay_clearance_file" name="barangay_clearance_file" onchange="fileValidation('barangay_clearance_file', 'barangay_clearance_preview', 'barangay_clearance_view')" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="barangay_clearance_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" class="btn btn-success grow btnDisabled btnView" id="barangay_clearance_view" title="VIEW" onclick="$('#barangay_clearance_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    class="hiddenDocumentPreview" id="barangay_clearance_preview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                        <tr>
                            <td><p class="file_title"><b>BIRTH CERTIFICATE</b></p></td>
                            <td>
                                <input type="hidden" id="birthcertificate_filename" name="birthcertificate_filename">

                                <span class="birthcertificate_span" style="display: none;"></span>
                                <div class="input-group custom-file-button birthcertificate_div">
                                    <label class="input-group-text birthcertificate_label text-white" for="birthcertificate_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control birthcertificate_file input-file-text required_field" id="birthcertificate_file" name="birthcertificate_file" onchange="fileValidation('birthcertificate_file', 'birthcertificate_preview', 'birthcertificate_view')" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="birthcertificate_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" class="btn btn-success grow btnDisabled btnView" id="birthcertificate_view"     title="VIEW" onclick="$('#birthcertificate_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    class="hiddenDocumentPreview" id="birthcertificate_preview"   data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                        <tr>
                            <td><p class="file_title"><b>DIPLOMA (Optional)</b></p></td>
                            <td>
                                <input type="hidden" id="diploma_filename" name="diploma_filename">

                                <span class="diploma_span" style="display: none;"></span>
                                <div class="input-group custom-file-button diploma_div">
                                    <label class="input-group-text diploma_label text-white" for="diploma_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control diploma_file" id="diploma_file" name="diploma_file" onchange="fileValidation('diploma_file', 'diploma_preview', 'diploma_view')" accept=".pdf" style="border-color:#0d1a80 !important;">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="diploma_delete_button"   class="btn btn-success grow" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="diploma_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#diploma_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="diploma_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                        <tr>
                            <td><p class="file_title"><b>MEDICAL CERTIFICATE</b></p></td>
                            <td>
                                <input type="hidden" id="medical_certificate_filename" name="medical_certificate_filename">

                                <span class="medical_certificate_span" style="display: none;"></span>
                                <div class="input-group custom-file-button medical_certificate_div">
                                    <label class="input-group-text medical_certificate_label text-white" for="medical_certificate_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control medical_certificate_file input-file-text required_field" id="medical_certificate_file" name="medical_certificate_file" onchange="fileValidation('medical_certificate_file', 'medical_certificate_preview', 'medical_certificate_view')" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">

                                <button type="button" id="medical_certificate_delete_button"   class="btn btn-success grow" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="medical_certificate_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#medical_certificate_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="medical_certificate_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                        <tr>
                            <td><p class="file_title"><b>NBI CLEARANCE (Optional)</b></p></td>
                            <td>
                                <input type="hidden" id="nbi_clearance_filename" name="nbi_clearance_filename">

                                <span class="nbi_clearance_span" style="display: none;"></span>
                                <div class="input-group custom-file-button nbi_clearance_div">
                                    <label class="input-group-text nbi_label text-white" for="nbi_clearance_file">CHOOSE FILE</label>
                                    <input type="file" id="nbi_clearance_file" class="form-control nbi_clearance_file" name="nbi_clearance_file" onchange="fileValidation('nbi_clearance_file', 'nbi_preview', 'nbi_clearance_view')" accept=".pdf" style="border-color: #0d1a80 !important;">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="nbi_clearance_delete_button"   class="btn btn-success grow" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="nbi_clearance_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#nbi_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="nbi_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                        <tr>
                            <td><p class="file_title"><b>PAG-IBIG FORM</b></p></td>
                            <td>
                                <input type="hidden" id="pag_ibig_filename" name="pag_ibig_filename">

                                <span class="pag_ibig_span" style="display: none;"></span>
                                <div class="input-group custom-file-button pag_ibig_div">
                                    <label class="input-group-text pag_ibig_label text-white" for="pag_ibig_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control pag_ibig_file input-file-text required_field" id="pag_ibig_file" name="pag_ibig_file" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="pag_ibig_delete_button" class="btn btn-success grow" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="pag_ibig_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#pag_ibig_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="pag_ibig_preview"  class="hiddenDocumentPreview"data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div class="document_second_table">
            <br>
                <table class="table table-striped table-bordered table-hover align-middle" style="margin-top: 15px;">
                    <thead class="thead-educational">
                        <tr>
                            <th style="width:35%"> FILE TITLE</th>
                            <th style="width:45%"> ATTACHMENT</th>
                            <th style="width:20%"> ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><p class="file_title"><b>PHILHEALTH FORM</b></p></td>
                            <td>
                                <input type="hidden" id="philhealth_filename" name="philhealth_filename">

                                <span class="philhealth_span" style="display: none;"></span>
                                <div class="input-group custom-file-button philhealth_div">
                                    <label class="input-group-text philhealth_label text-white" for="philhealth_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control philhealth_file input-file-text required_field" id="philhealth_file" name="philhealth_file" onchange="fileValidation('philhealth_file', 'philhealth_preview', 'philhealth_view')" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="philhealth_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" class="btn btn-success grow btnDisabled btnView" id="philhealth_view" title="VIEW" onclick="$('#philhealth_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    class="hiddenDocumentPreview" id="philhealth_preview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>

                        <tr>
                            <td><p class="file_title"><b>POLICE CLEARANCE</b></p></td>
                            <td>
                                <input type="hidden" id="police_clearance_filename" name="police_clearance_filename">

                                <span class="police_clearance_span" style="display: none;"></span>
                                <div class="input-group custom-file-button police_clearance_div">
                                    <label class="input-group-text police_clearance_label text-white" for="police_clearance_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control police_clearance_file input-file-text required_field" id="police_clearance_file" name="police_clearance_file" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="police_clearance_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="police_clearance_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#police_clearance_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="police_clearance_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>

                        <tr>
                            <td><p class="file_title"><b>RESUME</b></p></td>
                            <td>
                                <input type="hidden" id="resume_filename" name="resume_filename">

                                <span class="resume_span" style="display: none;"></span>
                                <div class="input-group custom-file-button resume_div">
                                    <label class="input-group-text resume_label text-white" for="resume_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control resume_file input-file-text required_field" id="resume_file" name="resume_file" onchange="fileValidation('resume_file', 'resume_preview', 'resume_view')" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="resume_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" class="btn btn-success grow btnDisabled btnView" id="resume_view" title="VIEW" onclick="$('#resume_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="resume_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>

                        <tr>
                            <td><p class="file_title"><b>SSS E1 FORM / SSS ID</b></p></td>
                            <td>
                                <input type="hidden" id="sss_filename" name="sss_filename">

                                <span class="sss_span" style="display: none;"></span>
                                <div class="input-group custom-file-button sss_div">
                                    <label class="input-group-text sss_label text-white" for="sss_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control sss_file input-file-text required_field" id="sss_file" name="sss_file" onchange="fileValidation('sss_file', 'sss_preview', 'sss_view')" accept=".pdf">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="sss_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="sss_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#sss_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="sss_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>

                        <tr>
                            <td><p class="file_title"><b>TRANSCRIPT OF RECORDS <br> (Optional)</b></p></td>
                            <td>
                                <input type="hidden" id="transcript_of_records_filename" name="transcript_of_records_filename">

                                <span class="transcript_of_records_span" style="display: none;"></span>
                                <div class="input-group custom-file-button transcript_of_records_div">
                                    <label class="input-group-text tor_label text-white" for="tor_file">CHOOSE FILE</label>
                                    <input type="file" class="form-control tor_file" id="tor_file" name="tor_file" onchange="fileValidation('tor_file', 'tor_preview', 'tor_view')" accept=".pdf" style="border-color: #0d1a80 !important;">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success grow" id="tor_delete_button" style="display: none;"><i class="fa-solid fa-file-pen"></i></button>
                                <button type="button" id="tor_view"     class="btn btn-success grow btnDisabled btnView" title="VIEW" onclick="$('#tor_preview').click();" disabled><i class="fas fa-eye"></i></button>
                                <img src="" alt=""    id="tor_preview"  class="hiddenDocumentPreview" data-bs-toggle="modal" data-bs-target="#preview_document" onclick="documentPreview(this)">
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>

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