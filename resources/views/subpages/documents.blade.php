<div id="documents" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="container" style="border:1px solid black;width:70%;">
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead class="thead-educational">
                <tr>
                    <th style="width:25%"><i class="fas fa-file"></i> FILE NAME</th>
                    <th style="width:50%"><i class="fas fa-upload"></i> ATTACH FILE</th>
                    <th style="width:15%"><i class="fas fa-eye"></i> PREVIEW</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p><b>BIRTH CERTIFICATE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#birthcertificate_file').click();" id="birthcertificate_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*,.pdf" name="birthcertificate_file" id="birthcertificate_file" style="display: none;" onchange="return BirthCertificateValidation()">
                        <span id="birthcertificate_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_birthcertificate" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>NBI</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#nbi_file').click();" id="nbi_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*" name="nbi_file" id="nbi_file" style="display: none;" onchange="return nbiValidation()">
                        <span id="nbi_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_nbi" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>BARANGAY CLEARANCE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#barangay_clearance_file').click();" id="barangay_clearance_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*" name="barangay_clearance_file" id="barangay_clearance_file" style="display: none;" onchange="return barangayclearanceValidation()">
                        <span id="barangay_clearance_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_barangay_clearance" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>POLICE CLEARANCE</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#police_clearance_file').click();" id="police_clearance_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*" name="police_clearance_file" id="police_clearance_file" style="display: none;" onchange="return policeclearanceValidation()">
                        <span id="police_clearance_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_police_clearance" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>SSS E1 FORM</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#sss_file').click();" id="sss_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*" name="sss_file" id="sss_file" style="display: none;" onchange="return sssValidation()">
                        <span id="sss_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_sss" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>PHILHEALTH FORM</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#philhealth_file').click();" id="philhealth_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*" name="philhealth_file" id="philhealth_file" style="display: none;" onchange="return philhealthValidation()">
                        <span id="philhealth_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_philhealth" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
                <tr>
                    <td><p><b>PAG-IBIG FORM</b></p></td>
                    <td>
                        <button type="button" class="btn btn-primary bp" onclick="$('#pag_ibig_file').click();" id="pag_ibig_button"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                        <input type="file" accept="image/*" name="pag_ibig_file" id="pag_ibig_file" style="display: none;" onchange="return pagibigValidation()">
                        <span id="pag_ibig_text">No file chosen, yet.</span>
                    </td>
                    <td>
                        <img src="" alt="" id="preview_pag_ibig" style="display: none; cursor:zoom-in;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="changeImg(this)">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr class="hr-design">

    <div class="modal fade" id="myModal" style="margin-top: 40px;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" id="file_display" style="width:100%">
                </div>
            </div>
        </div>
    </div>
</div>