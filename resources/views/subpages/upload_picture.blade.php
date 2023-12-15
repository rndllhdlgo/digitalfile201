<input type="hidden" id="filename">
<input type="hidden" id="filename_delete">

<div class="text-center mt-4">
    <i class="fa fa-user-circle fa-5x" id="image_user" aria-hidden="true"></i>
</div>

<div class="text-center mt-3">
    <button type="button" id="image_button" class="btn btn-primary bp"><span class="fas fa-upload"></span> UPLOAD IMAGE</button>
    <input type="file" name="employee_image" id="employee_image" class="required_field hiddenFile" accept=".jpg,.jpeg,.png,.gif" onchange="ImageValidation(employee_image)">
</div>

<div class="text-center mt-3" id="image_instruction">
    <span>File Size: Maximum (10MB)</span><br>
    <span>File Extensions: .jpg, .jpeg, .png</span>
</div>

<div>
    <center>
        <img src="" id="image_preview">
    </center>
</div>

<div class="top-container center_div" style="display:none; margin-top:1px !important;">
    <button type="button" class="btn btn-danger" id="image_close_trash" title="REMOVE IMAGE"><i class="fas fa-trash"></i></button>
    <button type="button" class="btn btn-danger" id="image_crop_reset" title="RESET IMAGE"><i class="fas fa-sync-alt"></i></button>
    <button type="button" class="btn btn-primary" id="image_zoom_in" title="ZOOM IN"><i class="fas fa-search-plus"></i></button>
    <button type="button" class="btn btn-primary" id="image_zoom_out" title="ZOOM OUT"><i class="fas fa-search-minus"></i></button>
    <button type="button" class="btn btn-success" id="image_crop" title="CROP IMAGE"><i class="fas fa-crop"></i></button>
</div>

<div class="bottom-container center_div" style="display:none; margin-top:1px !important;">
    <button type="button" class="btn btn-success" id="image_recrop" title="RECROP IMAGE"><i class="fa-solid fa-crop"></i></button>
    <button type="button" class="btn btn-danger" id="image_close" title="REMOVE IMAGE"><i class="fas fa-trash"></i></button>
</div>