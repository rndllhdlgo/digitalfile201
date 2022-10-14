<div id="documents" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="container" style="width:70%;">
            <h4 style="text-align: center;">Requirements</h4>
        <div class="container" style="width:85%;">
            <table class="table table-striped table-bordered table-hover mt-1">
                <thead class="thead-educational">
                    <tr>
                        {{-- <th style="width:40%;"><i class="fas fa-envelope-open-text"></i> TITLE FILE</th> --}}
                        <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                        <th><i class="fas fa-eye"></i> PREVIEW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td><b>BIRTH CERTIFICATE</b></td>
                        <td><input type="file" id="birthcertificate_file" hidden="hidden">
                            <button type="button" id="birthcertificate_button">CHOOSE A FILE </button>
                            <span id="birthcertificate_text">No file chosen, yet.</span>
                        </td> --}}
                        <td>
                            {{-- <label class="label_birthcertificate"><li class="fas fa-upload"></i>
                                BIRTH CERTIFICATE
                                <input type="file" accept="image/*" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                            </label> --}}
                            <button type="button" class="btn btn-primary bp" onclick="$('#birthcertificate_file').click();" id="birthcertificate_button"><span class="fas fa-upload"></span> BIRTH CERTIFICATE</button>
                            <input type="file" accept="image/*" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                            <br>
                            <span id="birthcertificate_text" style="display: none;"></span>
                        </td>
                        <td>
                             <img src="" alt="" id="preview_birthcertificate" style="display: none;">
                        </td>
                        
                        {{-- <td>
                            <img src="" alt="" id="preview_birthcertificate" style="display: none;">
                            <label class="label_birthcertificate"><li class="fas fa-upload"></i>
                                UPLOAD FILE
                                <input type="file" accept="image/*" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                            </label>
                        </td> --}}
                    </tr>
                    <tr>
                        {{-- <td><b>NBI</b></td>
                        <td><input type="file" id="nbi_file" hidden="hidden">
                            <button type="button" id="nbi_button">CHOOSE A FILE </button>
                            <span id="nbi_text">No file chosen, yet.</span>
                        </td> --}}
                        <td>
                            <button type="button" class="btn btn-primary bp" onclick="$('#nbi_file').click();" id="nbi_button"><span class="fas fa-upload"></span> NBI</button>
                            <input type="file" accept="image/*" name="nbi_file" id="nbi_file" style="display: none;" onchange="return nbiValidation()">        
                            <br>
                            <span id="nbi_text" style="display: none;"></span>
                        </td>
                        <td>
                            <img src="" alt="" id="preview_nbi" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        {{-- <td><b>BARANGAY CLEARANCE</b></td>
                        <td>
                            <input type="file" id="barangay_clearance_file" hidden="hidden">
                            <button type="button" id="barangay_clearance_button">CHOOSE A FILE </button>
                            <span id="barangay_clearance_text">No file chosen, yet.</span>
                        </td> --}}
                        <td>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-primary bp" onclick="$('#barangay_clearance_file').click();" id="barangay_clearance_button"><span class="fas fa-upload"></span> BARANGAY CLEARANCE</button>
                                    <input type="file" accept="image/*" name="barangay_clearance_file" id="barangay_clearance_file" style="display: none;" onchange="return barangayclearanceValidation()">
                                    <br>
                                    <span id="barangay_clearance_text" style="display: none;"></span>
                                </div>
                                <div class="col">
                                    <img src="" alt="" id="preview_barangay_clearance" style="display: none;">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary bp" onclick="$('#sss_file').click();"><span class="fas fa-upload"></span> SSS E1 FORM</button>
                            <input type="file" accept="image/*" name="sss_file" id="sss_file" style="display: none;" onchange="return sssValidation()">
                        </td>
                        {{-- <td>
                            <img src="" alt="" id="preview_sss" style="display: none;">
                        </td> --}}
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary bp" onclick="$('#philhealth_file').click();"><span class="fas fa-upload"></span> PHILHEALTH FORM</button>
                            <input type="file" accept="image/*" name="philhealth_file" id="philhealth_file" style="display: none;" onchange="return philhealthValidation()">
                        </td>
                        {{-- <td>
                            <img src="" alt="" id="preview_philhealth" style="display: none;">
                        </td> --}}
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary bp" onclick="$('#pag_ibig_file').click();"><span class="fas fa-upload"></span> PAG IBIG FORM</button>
                            <input type="file" accept="image/*" name="pag_ibig_file" id="pag_ibig_file" style="display: none;" onchange="return pagibigValidation()">
                        </td>
                        {{-- <td>
                            <img src="" alt="" id="preview_pag_ibig" style="display: none;">
                        </td> --}}
                    </tr>
                    <!--
                    <tr>
                        <td><b>SSS E1 FORM</b></td>
                        <td><input type="file" name="sss_file" id="sss_file" hidden="hidden" accept="image/*">
                            <button type="button" id="sss_button">CHOOSE A FILE </button>
                            <span id="sss_text">No file chosen, yet.</span>
                        </td>
                        {{-- <td>
                            <div class="sss_preview" id="sssPreview" style="display: none;">
                                <img src="" alt="Image Preview" class="sss-preview__image">
                                <span class="pag_ibig-preview__default-text">No file chosen,yet</span>
                            </div>
                        </td> --}}
                    </tr>
                    <tr>
                        <td><b>PHILHEALTH FORM</b></td>
                        <td><input type="file" name="philhealth_file" id="philhealth_file" hidden="hidden" accept="image/*">
                            <button type="button" id="philhealth_button">CHOOSE A FILE </button>
                            <span id="philhealth_text">No file chosen, yet.</span>
                        </td>
                        {{-- <td>
                            <div class="philhealth_preview" id="philhealthPreview" style="display: none;">
                                <img src="" alt="Image Preview" class="philhealth-preview__image">
                                <span class="pag_ibig-preview__default-text">No file chosen,yet</span>
                            </div>
                        </td> --}}
                    </tr>
                     <tr>
                        <td><b>PAG-IBIG FORM</b></td>
                        <td>
                            <input type="file" name="pag_ibig_file" id="pag_ibig_file" hidden="hidden" accept="image/*">
                            <button type="button" id="pag_ibig_button">CHOOSE A FILE</button>
                            <span id="pag_ibig_text">No file chosen, yet</span>
                        </td>
                        {{-- <td>
                            <div class="pag_ibig_preview" id="pag_ibigPreview" style="display: none;">
                                <img src="" alt="Image Preview" class="pag_ibig-preview__image">
                                <span class="pag_ibig-preview__default-text">No file chosen,yet</span>
                            </div>
                        </td> --}}
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    <hr class="hr-design">
    <!--
         {{-- Documents Upload --}}
        <table class="table table-striped table-bordered table-hover mt-1">
            <thead class="thead-educational">
                <tr>
                    {{-- <th style="width:40%;"><i class="fas fa-envelope-open-text"></i> TITLE FILE</th> --}}
                    <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    <th><i class="fas fa-eye"></i> PREVIEW</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- <td><b>BIRTH CERTIFICATE</b></td>
                    <td><input type="file" id="birthcertificate_file" hidden="hidden">
                        <button type="button" id="birthcertificate_button">CHOOSE A FILE </button>
                        <span id="birthcertificate_text">No file chosen, yet.</span>
                    </td> --}}
                    <td><b>BIRTH CERTIFICATE</b>
                        <img src="" alt="" id="preview_birthcertificate" style="display: none;">
                        <label class="label_birthcertificate"><li class="fas fa-upload"></i>
                            UPLOAD FILE
                            <input type="file" accept="image/*" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                        </label>
                    </td>
                    {{-- <td>
                        <img src="" alt="" id="preview_birthcertificate" style="display: none;">
                        <label class="label_birthcertificate"><li class="fas fa-upload"></i>
                            UPLOAD FILE
                            <input type="file" accept="image/*" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                        </label>
                    </td> --}}
                </tr>
                <tr>
                    {{-- <td><b>NBI</b></td>
                    <td><input type="file" id="nbi_file" hidden="hidden">
                        <button type="button" id="nbi_button">CHOOSE A FILE </button>
                        <span id="nbi_text">No file chosen, yet.</span>
                    </td> --}}
                    <td><b>NBI</b></td>
                    <td>
                        <img src="" alt="" id="preview_nbi" style="display: none;">
                        <label class="label_nbi"><li class="fas fa-upload"></i>
                            UPLOAD FILE
                            <input type="file" accept="image/*" name="nbi_file" id="nbi_file" style="display: none;" onchange="return nbiValidation()">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><b>BARANGAY CLEARANCE</b></td>
                    <td><input type="file" id="barangay_clearance_file" hidden="hidden">
                        <button type="button" id="barangay_clearance_button">CHOOSE A FILE </button>
                        <span id="barangay_clearance_text">No file chosen, yet.</span>
                    </td>
                </tr>
                <tr>
                    <td><b>SSS E1 FORM</b></td>
                    <td><input type="file" name="sss_file" id="sss_file" hidden="hidden" accept="image/*">
                        <button type="button" id="sss_button">CHOOSE A FILE </button>
                        <span id="sss_text">No file chosen, yet.</span>
                    </td>
                    {{-- <td>
                        <div class="sss_preview" id="sssPreview" style="display: none;">
                            <img src="" alt="Image Preview" class="sss-preview__image">
                            <span class="pag_ibig-preview__default-text">No file chosen,yet</span>
                        </div>
                    </td> --}}
                </tr>
                <tr>
                    <td><b>PHILHEALTH FORM</b></td>
                    <td><input type="file" name="philhealth_file" id="philhealth_file" hidden="hidden" accept="image/*">
                        <button type="button" id="philhealth_button">CHOOSE A FILE </button>
                        <span id="philhealth_text">No file chosen, yet.</span>
                    </td>
                    {{-- <td>
                        <div class="philhealth_preview" id="philhealthPreview" style="display: none;">
                            <img src="" alt="Image Preview" class="philhealth-preview__image">
                            <span class="pag_ibig-preview__default-text">No file chosen,yet</span>
                        </div>
                    </td> --}}
                </tr>
                 <tr>
                    <td><b>PAG-IBIG FORM</b></td>
                    <td>
                        <input type="file" name="pag_ibig_file" id="pag_ibig_file" hidden="hidden" accept="image/*">
                        <button type="button" id="pag_ibig_button">CHOOSE A FILE</button>
                        <span id="pag_ibig_text">No file chosen, yet</span>
                    </td>
                    {{-- <td>
                        <div class="pag_ibig_preview" id="pag_ibigPreview" style="display: none;">
                            <img src="" alt="Image Preview" class="pag_ibig-preview__image">
                            <span class="pag_ibig-preview__default-text">No file chosen,yet</span>
                        </div>
                    </td> --}}
                </tr>
            </tbody>
        </table>
        <hr class="hr-design">
        <br>
        <br>
        {{-- <input type="file" name="inpFile" id="inpFile">
        <div class="image-preview" id="imagePreview">
            <img src="" alt="Image Preview" class="image-preview__image">
            <span class="image-preview__default-text">Image Preview</span>
        </div> --}}

        <img src="" alt="" id="preview" style="display: none;">
        <label class="sample"><li class="fas fa-upload"></i> UPLOAD FILE
            <input type="file" accept="image/*" name="sample" id="sample" style="display: none;" onchange="return ValidateUpload()">
        </label>
    -->
</div>