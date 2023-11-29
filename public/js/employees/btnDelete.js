function replaceFile(fileSpan, fileDiv, fileButton, fileView, fileInput, fileName){
    Swal.fire({
        title: 'Do you want to replace file?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if(save.isConfirmed){
            $(`${fileSpan}`).hide();
            $(`${fileDiv}`).show();
            $(`${fileButton}`).hide();
            $(`${fileView}`).show();
            if(fileName !== 'diploma' && fileName !== 'nbi_clearance' && fileName !== 'tor'){
                $(`${fileInput}`).addClass('required_field');
            }
            $(`${fileInput}`).click();
        }
    });
}

function deleteRow(tblName, tblRowId, tblDesc, tblButton){
    var id = $(tblButton).attr("id");
    var data = $(tblName).DataTable().row(id).data();
    tblRowId.push(data.id);

    Swal.fire({
        title: 'Do you want to delete this row?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if(save.isConfirmed){
            $(tblButton).parent().parent().remove();
            if(tblDesc == 'children_change'){
                children_change = 'CHANGED';
                tblChildren     = 'tblChildren';
            }
            else if(tblDesc == 'college_change'){
                college_change = 'CHANGED';
                tblCollege     = 'tblCollege';
            }
            else if(tblDesc == 'secondary_change'){
                secondary_change = 'CHANGED';
                tblSecondary     = 'tblSecondary';
            }
            else if(tblDesc == 'primary_change'){
                primary_change = 'CHANGED';
                tblPrimary     = 'tblPrimary';
            }
            else if(tblDesc == 'training_change'){
                training_change = 'CHANGED';
                tblTraining     = 'tblTraining';
            }
            else if(tblDesc == 'vocational_change'){
                vocational_change = 'CHANGED';
                tblVocational     = 'tblVocational';
            }
            else if(tblDesc == 'job_history_change'){
                job_history_change = 'CHANGED';
                tblJob             = 'tblJob';
            }
            else if(tblDesc == 'memo_change'){
                memo_change = 'CHANGED';
                tblMemo     = 'tblMemo';
            }
            else if(tblDesc == 'evaluation_change'){
                evaluation_change = 'CHANGED';
                tblEvaluation     = 'tblEvaluation';
            }
            else if(tblDesc == 'contracts_change'){
                contracts_change = 'CHANGED';
                tblContracts     = 'tblContracts';
            }
            else if(tblDesc == 'resignation_change'){
                resignation_change = 'CHANGED';
                tblResignation     = 'tblResignation';
            }
            else if(tblDesc == 'termination_change'){
                termination_change = 'CHANGED';
                tblTermination     = 'tblTermination';
            }
        }
    });
}