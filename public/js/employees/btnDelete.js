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

function deleteRow(tblName, tblRowId, tblChange, tblButton){
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
            if(tblChange == 'children_change'){
                children_change = 'CHANGED';
                tblChildren     = 'tblChildren';
            }
            else if(tblChange == 'college_change'){
                college_change = 'CHANGED';
                tblCollege     = 'tblCollege';
            }
            else if(tblChange == 'secondary_change'){
                secondary_change = 'CHANGED';
                tblSecondary     = 'tblSecondary';
            }
            else if(tblChange == 'primary_change'){
                primary_change = 'CHANGED';
                tblPrimary     = 'tblPrimary';
            }
            else if(tblChange == 'training_change'){
                training_change = 'CHANGED';
                tblTraining     = 'tblTraining';
            }
            else if(tblChange == 'vocational_change'){
                vocational_change = 'CHANGED';
                tblVocational     = 'tblVocational';
            }
            else if(tblChange == 'job_history_change'){
                job_history_change = 'CHANGED';
                tblJob             = 'tblJob';
            }
            else if(tblChange == 'memo_change'){
                memo_change = 'CHANGED';
                tblMemo     = 'tblMemo';
            }
            else if(tblChange == 'evaluation_change'){
                evaluation_change = 'CHANGED';
                tblEvaluation     = 'tblEvaluation';
            }
            else if(tblChange == 'contracts_change'){
                contracts_change = 'CHANGED';
                tblContracts     = 'tblContracts';
            }
            else if(tblChange == 'resignation_change'){
                resignation_change = 'CHANGED';
                tblResignation     = 'tblResignation';
            }
            else if(tblChange == 'termination_change'){
                termination_change = 'CHANGED';
                tblTermination     = 'tblTermination';
            }
            tblChange = 'CHANGED_ROW';
        }
    });
}