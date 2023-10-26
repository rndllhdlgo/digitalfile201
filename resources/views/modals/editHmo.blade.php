<div class="modal fade" id="editHmoModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0d1a80;">
                <h5 class="modal-title text-white">Edit HMO Details</h5>
                <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal" title="CLOSE"></button>
            </div>
                <div class="modal-body">
                    <input type="hidden" id="hmoId">
                    <div class="row mb-4">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="hmoName" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="hmoName" class="formlabel form-label">HMO</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="hmoCoverage" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="hmoCoverage" class="formlabel form-label">COVERAGE</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="hmoParticulars" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="hmoParticulars" class="formlabel form-label">PARTICULARS</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="hmoRoom" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="hmoRoom" class="formlabel form-label">ROOM</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="f-outline">
                            <select class="form-select forminput form-control" id="hmoStatus" placeholder=" " style="background-color:white;" autocomplete="off">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
                            <label for="hmoStatus" class="formlabel form-label">STATUS</label>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnEditHmo">SAVE CHANGES</button>
            </div>
        </div>
    </div>
</div>