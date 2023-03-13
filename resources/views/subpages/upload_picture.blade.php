<input type="hidden" id="filename">
<input type="hidden" id="filename_delete">

<i class="fas fa-times float-end grow" id="image_close" style="zoom:150%; cursor:pointer; display:none; margin-top:3px; margin-bottom:3px; " title="REPLACE IMAGE"></i>

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
    <img src="" id="image_preview" alt="">
</div>

<div class="top-container center_div" style="display:none; margin-top:1px !important;">
    <button type="button" class="btn btn-success" id="image_download" title="DOWNLOAD" style="visibility: hidden;"><i class="fas fa-download"></i></button>
    <button type="button" class="btn btn-primary" id="image_zoom_in" title="ZOOM IN"><i class="fas fa-search-plus"></i></button>
    <button type="button" class="btn btn-secondary" id="image_up" title="MOVE UP"><i class="fas fa-arrow-up"></i></button>
    <button type="button" class="btn btn-primary" id="image_zoom_out" title="ZOOM OUT"><i class="fas fa-search-minus"></i></button>
    <button type="button" class="btn btn-success" id="image_crop" title="CROP IMAGE"><i class="fas fa-crop"></i></button>
    </div>
    <div class="bottom-container center_div" style="display:none;">
    <button type="button" class="btn btn-danger" id="image_close" title="REMOVE IMAGE"><i class="fas fa-trash"></i></button>
    <button type="button" class="btn btn-secondary" id="image_left" title="MOVE LEFT"><i class="fas fa-arrow-left"></i></button>
    <button type="button" class="btn btn-secondary" id="image_down" title="MOVE DOWN"><i class="fas fa-arrow-down"></i></button>
    <button type="button" class="btn btn-secondary" id="image_right" title="MOVE RIGHT"><i class="fas fa-arrow-right"></i></button>
    <button type="button" class="btn btn-danger" id="image_crop_reset" title="RESET IMAGE"><i class="fas fa-sync-alt"></i></button>
</div>