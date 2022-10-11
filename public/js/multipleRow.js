//To add table row in college education table
$(document).ready(function(){
    var countCollegeRow = 1;
    college_field(countCollegeRow);
      function college_field(collegeNumber){//This function will add the input field on college table
          html = '<tr>';
          html += '<td><input type="text" name="college_name[]" class="form-control required_field" autocomplete="off" placeholder="Required" onkeyup="lettersOnly(this)"></td>';
          html += '<td><input type="text" name="college_degree[]" class="form-control required_field" autocomplete="off" placeholder="Required" onkeyup="lettersOnly(this)"></td>'; 
          html += '<td><input type="text" name="college_inclusive_years[]" class="form-control required_field" autocomplete="off" placeholder="Required" onkeyup="numbersOnly(this)"></td>'; 

          if(collegeNumber > 1){
              html += '<td><button type="button" class="btn btn-danger center removeCollegeRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
              $('tbody.college_education_body').append(html);
          }
      }
      $(document).on('click','#addCollegeRow', function(){//Add row onclick base on its id
          $('#college_education_table').fadeIn('slow');
          $('#isSaveCollege').val('true');//To make the isSaveCollege id value from 'false' to 'true'
          addRequiredField+=3;

          countCollegeRow++;//increment the tr on this table
          college_field(countCollegeRow);
      });

      $(document).on('click','.removeCollegeRow', function(){//Remove row onclick
          countCollegeRow--;
          addRequiredField-=3;
          $(this).closest("tr").remove();

          if($('#college_education_table tbody tr').length == 0){//Table will disappear when there are no row
              $('#college_education_table').fadeOut('slow');
              $('#isSaveCollege').val('false');//To make the isSaveCollege id value from 'true' to 'false'
          }
      });
});

//To add table row in vocational table
$(document).ready(function(){
    var countVocationalRow = 1;
    vocational_field(countVocationalRow);
      function vocational_field(vocationalNumber){//This function will add the input field on vocational table
          html = '<tr>';
          html += '<td><input type="text" name="vocational_name[]" class="form-control required_field" autocomplete="off" placeholder="Required" onkeyup="lettersOnly(this)"></td>'; 
          html += '<td><input type="text" name="vocational_course[]" class="form-control required_field" autocomplete="off" placeholder="Required" onkeyup="lettersOnly(this)"></td>'; 
          html += '<td><input type="text" name="vocational_inclusive_years[]" class="form-control required_field" autocomplete="off" placeholder="Required" onkeyup="numbersOnly(this)"></td>'; 

          if(vocationalNumber > 1){
            html += '<td><button type="button" class="btn btn-danger center removeVocationalRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
            $('tbody.vocational_body').append(html);//This element will add in tr
          }
      }
      $(document).on('click','#addVocationalRow', function(){
          $('#vocational_table').fadeIn('slow');
          $('#isSaveVocational').val('true');//To make the isSaveVocational id value from 'false' to 'true'
          addRequiredField+=3;
          countVocationalRow++;
          vocational_field(countVocationalRow);
      });
      $(document).on('click','.removeVocationalRow' ,function(){
          countVocationalRow--;
          $(this).closest("tr").remove();//To remove the closest tr in the college table
          addRequiredField-=3;
          if($('#vocational_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
              $('#vocational_table').fadeOut('slow');
              $('#isSaveVocational').val('false');//To make the isSaveVocational id value from 'true' to 'false'
          }
      });
});

//To add table row in training table
$(document).ready(function(){
  var countTrainingRow = 1;
  training_field(countTrainingRow);
    function training_field(trainingNumber){
        html = '<tr>';
        html += '<td><input type="text" name="training_name[]" class="form-control required_field" placeholder="Required" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="training_title[]" class="form-control required_field" placeholder="Required" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="training_inclusive_years[]" class="form-control required_field" placeholder="Required" autocomplete="off"></td>'; 
      
        if(trainingNumber > 1){
          html += '<td><button type="button" class="btn btn-danger center removeTrainingRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
          $('tbody.training_body').append(html);
        }
    }
    $(document).on('click','#addTrainingRow', function(){
        $('#trainings_table').fadeIn('slow');
        $('#isSaveTraining').val('true');
        addRequiredField+=3;
        countTrainingRow++;
        training_field(countTrainingRow);
    });
    $(document).on('click','.removeTrainingRow' ,function(){
        countTrainingRow--;
        $(this).closest("tr").remove();
        addRequiredField-=3;
        if($('#trainings_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
            $('#trainings_table').fadeOut('slow');
            $('#isSaveTraining').val('false');
        }
    });
});

//To add table row in job history table
$(document).ready(function(){
  var countJobRow = 1;
  job_field(countJobRow);
    function job_field(jobNumber){
        html = '<tr>';
        html += '<td><input type="text" name="job_name[]" id="job_name" class="form-control required_field" autocomplete="off" onkeyup="lettersOnly(this)" placeholder="Required"></td>'; 
        html += '<td><input type="text" name="job_position[]" id="job_position" class="form-control required_field" autocomplete="off" onkeyup="lettersOnly(this)" placeholder="Required"></td>'; 
        html += '<td><input type="text" name="job_address[]" id="job_address" class="form-control required_field" autocomplete="off" onkeyup="lettersOnly(this)" placeholder="Required"></td>'; 
        html += '<td><input type="text" name="job_contact_details[]" id="job_contact_details" class="form-control required_field" autocomplete="off" onkeyup="numbersOnly(this)" placeholder="Required"></td>'; 
        html += '<td><input type="text" name="job_inclusive_years[]" id="job_inclusive_years" class="form-control required_field" autocomplete="off" onkeyup="numbersOnly(this)" placeholder="Required"></td>'; 
      
        if(jobNumber > 1){
          html += '<td><button type="button" class="btn btn-danger center removeJobRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
          $('tbody.job_body').append(html);
        }
    }
    $(document).on('click','#addJobRow', function(){
        $('#job_table').fadeIn('slow');
        $('#isSaveJob').val('true');
        addRequiredField+=5;
        countJobRow++;
        job_field(countJobRow);
    });
    $(document).on('click','.removeJobRow' ,function(){
        countJobRow--;
        $(this).closest("tr").remove();
        addRequiredField-=5;
        if($('#job_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
            $('#job_table').fadeOut('slow');
            $('#isSaveJob').val('false');
        }
    });
});

//To add table row in memos table
$(document).ready(function(){
  var memoRow = 1;
  memo_field(memoRow);
    function memo_field(memoNumber){
        html = '<tr>';
        html += '<td><input type="text" name="memo_subject[]" class="form-control required_field" autocomplete="off" onkeyup="lettersOnly(this)" placeholder="Required"></td>'; 
        html += '<td><input type="date" name="memo_date[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>'; 
        html += '<td><select class="form-select required_field" name="memo_option[]" >'+ 
                '<option disabled selected> Select </option>'+
                '<option value="Verbal">Verbal</option>'+
                '<option value="Written">Written</option>'+
                '<option value="2nd Offense">2nd Offense</option>'+
                '<option value="3rd Offense">3rd Offense</option>'+
                '<option value="Final">Final</option>'+
                '</select></td>';
        html += '<td><label for="memo_file" class="center file"><i class="fas fa-upload"></i> Upload File</label><input type="file" name="memo_file[]" id="memo_file"></td>';
        // html += '<td>'+
        //         '<img id="output">'+
        //         '<form method="POST" id="image_form" enctype="multipart/form-data">'+
        //             '<label class="custom_file bg-primary center grow" id="image_button"><i class="fas fa-upload"></i> Upload Image'+
        //               '<input type="file" name="cover_image" id="cover_image" class="center required_field" accept="image/*" onchange="return ValidateFileUpload()">'+
        //             '</label>'+
        //         '</form>'+
        //         '</td>';

        if(memoNumber > 1){
          html += '<td><button type="button" class="btn btn-danger center removeMemoRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
          $('tbody.memos_body').append(html);
        }
    }
    $(document).on('click','#addMemoRow', function(){
        $('#memos_table').fadeIn('slow');
        $('#isSaveMemos').val('true');
        addRequiredField+=4;
        memoRow++;
        memo_field(memoRow);
    });
    $(document).on('click','.removeMemoRow' ,function(){
        memoRow--;
        $(this).closest("tr").remove();
        addRequiredField-=4;
        if($('#memos_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
          $('#memos_table').fadeOut('slow');
          $('#isSaveMemos').val('false');
        }
    });
});

//To add table row in evaluation table
$(document).ready(function(){
    var evaluationRow = 1;
    evaluation_field(evaluationRow);
      function evaluation_field(evaluationNumber){
          html = '<tr>';
          html += '<td><input type="text" name="evaluation_reason[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>';
          html += '<td><input type="date" name="evaluation_date[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>';
          html += '<td><input type="text" name="evaluation_evaluated_by[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>';
          // html += '<td><input type="file"></td>';
          // html += '<td><button class="custom_attach_file bg-primary center w-100"><i class="fas fa-upload"></i> Attach File <input type="file" name="evaluation_file[]" class="form-control required_field" autocomplete="off"></button></td>';
          html += '<td><label for="evaluation_file" class="center file"><i class="fas fa-upload"></i> Upload File</label><input type="file" name="evaluation_file[]" id="evaluation_file"></td>';
      
          if(evaluationNumber > 1){
              html += '<td><button type="button" class="btn btn-danger center removeEvaluationRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
              $('tbody.evaluation_body').append(html);
          }
      }
      $(document).on('click','#addEvaluationRow', function(){
          $('#evaluation_table').fadeIn('slow');
          $('#isSaveEvaluation').val('true');
          addRequiredField+=4;
          evaluationRow++;
          evaluation_field(evaluationRow);
      });
      $(document).on('click','.removeEvaluationRow', function(){
          evaluationRow--;
          $(this).closest("tr").remove();
          addRequiredField-=4;
          if($('#evaluation_table tbody tr').length == 0){
              $('#evaluation_table').fadeOut('slow');
              $('#isSaveEvaluation').val('false');
          }
      });
});

//To add table row in evaluation table
$(document).ready(function(){
  var contractsRow = 1;
  contracts_field(contractsRow);
    function contracts_field(contractsNumber){
        html = '<tr>';
        html += '<td><input type="text" name="contracts_type[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>';
        html += '<td><input type="date" name="contracts_date[]" class="form-control required_field" autocomplete="off"></td>';
        // html += '<td><input type="file"></td>';
        // html += '<td><button class="custom_attach_file bg-primary center w-100"><i class="fas fa-upload"></i> Attach File <input type="file" name="contracts_file[]" class="form-control required_field" autocomplete="off"></button></td>';
        html += '<td><label for="contracts_file" class="center file"><i class="fas fa-upload"></i> Upload File</label><input type="file" name="contracts_file[]" id="contracts_file"></td>';
    
        if(contractsNumber > 1){
          html += '<td><button type="button" class="btn btn-danger center removeContractsRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
          $('tbody.contracts_body').append(html);
        }
    }
    $(document).on('click','#addContractsRow', function(){
        $('#contracts_table').fadeIn('slow');
        $('#isSaveContracts').val('true');
        addRequiredField+=3;
        contractsRow++;
        contracts_field(contractsRow);
    });
    $(document).on('click','.removeContractsRow', function(){
        contractsRow--;
        $(this).closest("tr").remove();
        addRequiredField-=3;
        if($('#contracts_table tbody tr').length == 0){
            $('#contracts_table').fadeOut('slow');
            $('#isSaveContracts').val('false');
        }
    });
});

//To add table row in resignation letter
$(document).ready(function(){
  var resignationRow = 1;
  resignation_field(resignationRow);
    function resignation_field(resignationNumber){
      html = '<tr>';
      html += '<td><input type="text" name="resignation_letter[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>';
      html += '<td><input type="date" name="resignation_date[]" class="form-control required_field" autocomplete="off"></td>';
      // html += '<td><input type="file"></td>';
      // html += '<td><button class="custom_attach_file bg-primary center w-100"><i class="fas fa-upload"></i> Attach File <input type="file" name="resignation_file[]" class="form-control required_field" autocomplete="off"></button></td>';
      html += '<td><label for="resignation_file" class="center file"><i class="fas fa-upload"></i> Upload File</label><input type="file" name="resignation_file[]" id="resignation_file"></td>';
    
      if(resignationNumber > 1){
          html += '<td><button type="button" class="btn btn-danger center removeResignationRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
            $('tbody.resignation_body').append(html);
      }
    }
      $(document).on('click','#addResignationRow', function(){
        $('#resignation_table').fadeIn('slow');
        $('#isSaveResignation').val('true');
        addRequiredField+=3;
        resignationRow++;
        resignation_field(resignationRow);
      });
      $(document).on('click','.removeResignationRow', function(){
        resignationRow--;
        $(this).closest("tr").remove();
        addRequiredField-=3;
        if($('#resignation_table tbody tr').length == 0){
            $('#resignation_table').fadeOut('slow');
            $('#isSaveResignation').val('false');
        }
      });
});

//To add table row in termination table
$(document).ready(function(){
    var terminationRow = 1;
    termination_field(terminationRow);
      function termination_field(terminationNumber){
        html = '<tr>';
        html += '<td><input type="text" name="termination_letter[]" class="form-control required_field" autocomplete="off" placeholder="Required"></td>';
        html += '<td><input type="date" name="termination_date[]" class="form-control required_field" autocomplete="off"></td>';
        // html += '<td><input type="file"></td>';
        // html += '<td><button class="custom_attach_file bg-primary center w-100"><i class="fas fa-upload"></i> Attach File <input type="file" name="termination_file[]" class="form-control required_field" autocomplete="off"></button></td>';
        html += '<td><label for="termination_file" class="center file"><i class="fas fa-upload"></i> Upload File</label><input type="file" name="termination_file[]" id="termination_file"></td>';

        if(terminationNumber > 1){
            html += '<td><button type="button" class="btn btn-danger center removeTerminationRow" title="DELETE"><i class="fas fa-trash-alt"></i></button></td></tr>';
            $('tbody.termination_body').append(html);
        }
      }
        $(document).on('click','#addTerminationRow', function(){
            $('#termination_table').fadeIn('slow');
            $('#isSaveTermination').val('true');
            addRequiredField+=3;
            terminationRow++;
            termination_field(terminationRow);
        });
        $(document).on('click','.removeTerminationRow', function(){
            $('#termination_table').fadeOut('slow');
            terminationRow--;
            $(this).closest("tr").remove();
            addRequiredField-=4;
            if($('#termination_table tbody tr').length == 0){
              $('#termination_table').fadeOut('slow');
              $('#isSaveTermination').val('false');
            }
        });
});