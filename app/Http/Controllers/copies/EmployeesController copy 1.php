<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\College;
use App\Vocational;
use App\Training;
use App\Job;
use App\Memo;
use App\Evaluation;
use App\Contracts;
use App\Resignation;
use App\Termination;
use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//For Authentication
    }
    public function listOfEmployees(){
        $employees = Employee::all();
        return DataTables::of($employees)
        // ->addColumn('action',function($employees){
        //     return //<a href="#" class="btn btn-success edit mx-2 grow" title="EDIT" id="'.$employees->id.'"><i class="fas fa-edit"></i></a>
        //             '<a href="#" class="btn btn-success view grow" title="VIEW" id="'.$employees->id.'"><i class="fas fa-eye"></i></a>';
        // })
        ->make(true);
    }

    public function collegeDataTable(Request $request){
        $college = College::where('employee_id',$request->employee_id)->get();
        return DataTables::of($college)->make(true);
    }

    public function vocationalDataTable(Request $request){
        $vocational = Vocational::where('employee_id',$request->employee_id)->get();
        return DataTables::of($vocational)->make(true);
    }

    public function trainingsDataTable(Request $request){
        $training = Training::where('employee_id',$request->employee_id)->get();
        return DataTables::of($training)->make(true);
    }

    public function jobDataTable(Request $request){
        $job = Job::where('employee_id',$request->employee_id)->get();
        return DataTables::of($job)->make(true);
    }

    public function memosDataTable(Request $request){
        $memo = Memo::where('employee_id',$request->employee_id)->get();
        return DataTables::of($memo)->make(true);
    }

    public function evaluationDataTable(Request $request){
        $evaluation = Evaluation::where('employee_id',$request->employee_id)->get();
        return DataTables::of($evaluation)->make(true);
    }

    public function contractsDataTable(Request $request){
        $contract = Contracts::where('employee_id',$request->employee_id)->get();
        return DataTables::of($contract)->make(true);
    }

    public function resignationDataTable(Request $request){
        $resignation = Resignation::where('employee_id',$request->employee_id)->get();
        return DataTables::of($resignation)->make(true);
    }

    public function terminationDataTable(Request $request){
        $termination = Termination::where('employee_id',$request->employee_id)->get();
        return DataTables::of($termination)->make(true);
    }

    public function save(Request $request){//To save only Work,Personal,School Information Form
        
        $employees = new Employee;
    //Personal Information
        $employees->employee_number = $request->employee_number;//Eloquent Syntax/Form
        // $employees->first_name = $request->first_name;
        // $employees->last_name = $request->last_name;
        // $employees->middle_name = $request->middle_name;
        // $employees->suffix = $request->suffix;
        $employees->first_name = ucwords($request->first_name);
        $employees->last_name = ucwords($request->last_name);
        $employees->middle_name = ucwords($request->middle_name);
        $employees->suffix = ucwords($request->suffix);
        $employees->birthday = $request->birthday;
        $employees->gender = $request->gender;
        $employees->civil_status = $request->civil_status;
        $employees->home_address = $request->home_address;
        $employees->email_address = $request->email_address;
        $employees->telephone_number = $request->telephone_number;
        $employees->cellphone_number = $request->cellphone_number;
        $employees->spouse_name = ucwords($request->spouse_name);
        $employees->spouse_contact_number = $request->spouse_contact_number;
        $employees->spouse_profession = ucwords($request->spouse_profession);
        $employees->father_name = ucwords($request->father_name);
        $employees->father_contact_number = $request->father_contact_number;
        $employees->father_profession = $request->father_profession;
        $employees->mother_name = ucwords($request->mother_name);
        $employees->mother_contact_number = $request->mother_contact_number;
        $employees->mother_profession = ucwords($request->mother_profession);
        $employees->emergency_contact_name = ucwords($request->emergency_contact_name);
        $employees->emergency_contact_relationship = $request->emergency_contact_relationship;
        $employees->emergency_contact_number = $request->emergency_contact_number;
        //Work Information
        $employees->company_of_employee = $request->company_of_employee;
        $employees->branch_of_employee = $request->branch_of_employee;
        $employees->status_of_employee = $request->status_of_employee;
        $employees->shift_of_employee = $request->shift_of_employee;
        $employees->position_of_employee = $request->position_of_employee;
        $employees->supervisor_of_employee = $request->supervisor_of_employee;
        $employees->date_hired = $request->date_hired;
        $employees->employee_email_address = $request->employee_email_address;
        $employees->employee_contact_number = $request->employee_contact_number;
        $employees->sss_number = $request->sss_number;
        $employees->pag_ibig_number = $request->pag_ibig_number;
        $employees->philhealth_number = $request->philhealth_number;
        $employees->tin_number = $request->tin_number;
        $employees->account_number = $request->account_number;
        //School Information
        //Secondary Section
        $employees->secondary_school_name = $request->secondary_school_name;
        $employees->secondary_school_address = $request->secondary_school_address;
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        //Primary Section
        $employees->primary_school_name = $request->primary_school_name;
        $employees->primary_school_address = $request->primary_school_address;
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $employees->cover_image = $request->fileName;

        $sql = $employees->save();//To save data 

        $id = $employees->id;
        
        return $sql ? $id : '' ;//Ternary Operator ?
    }

    public function insertImage(Request $request){//This function is to save the image
            
        // $filenameWithExt = $request->file('file')->getClientOriginalName();//Get filename with the extension
        // return $filenameWithExt;
        
        // return $request->hasFile('cover_image');
        // $file = Input::file('file');
        // return response($file);
        if($request->hasFile('file')){
            
            $filenameWithExt = $request->file('file')->getClientOriginalName();//Get filename with the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);//Get Just filename
            $extension = $request->file('file')->getClientOriginalExtension();//Get just extension
            $fileNameToStore = $filename.'_'.time().'.'.$extension;// Filename to store
            $path = $request->file('file')->storeAs('public/cover_images',$fileNameToStore);//To create folder for images under public folder
        }
        else{
            $fileNameToStore = 'noimage.png';
        }
            return $fileNameToStore;
    }
    public function fetch(Request $request){
        $employees = Employee::where('id',$request->id)->first();
        return $employees;
    }

    public function update(Request $request){
        
        $employees = Employee::find($request->id);
    //Personal Information
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->middle_name = $request->middle_name;
        $employees->suffix = $request->suffix;
        $employees->birthday = $request->birthday;
        $employees->gender = $request->gender;
        $employees->civil_status = $request->civil_status;
        $employees->home_address = $request->home_address;
        $employees->email_address = $request->email_address;
        $employees->telephone_number = $request->telephone_number;
        $employees->cellphone_number = $request->cellphone_number;
        $employees->spouse_name = $request->spouse_name;
        $employees->spouse_contact_number = $request->spouse_contact_number;
        $employees->spouse_profession = $request->spouse_profession;
        $employees->father_name = $request->father_name;
        $employees->father_contact_number = $request->father_contact_number;
        $employees->father_profession = $request->father_profession;
        $employees->mother_name = $request->mother_name;
        $employees->mother_contact_number = $request->mother_contact_number;
        $employees->mother_profession = $request->mother_profession;
        $employees->emergency_contact_name = $request->emergency_contact_name;
        $employees->emergency_contact_relationship = $request->emergency_contact_relationship;
        $employees->emergency_contact_number = $request->emergency_contact_number;
        $employees->cover_image = $request->fileName;
    //Work Information
        $employees->employee_number = $request->employee_number;
        $employees->company_of_employee = $request->company_of_employee;
        $employees->branch_of_employee = $request->branch_of_employee;
        $employees->status_of_employee = $request->status_of_employee;
        $employees->shift_of_employee = $request->shift_of_employee;
        $employees->position_of_employee = $request->position_of_employee;
        $employees->supervisor_of_employee = $request->supervisor_of_employee;
        $employees->date_hired = $request->date_hired;
        $employees->employee_email_address = $request->employee_email_address;
        $employees->employee_contact_number = $request->employee_contact_number;
        $employees->sss_number = $request->sss_number;
        $employees->pag_ibig_number = $request->pag_ibig_number;
        $employees->philhealth_number = $request->philhealth_number;
        $employees->tin_number = $request->tin_number;
        $employees->account_number = $request->account_number;
    //School Information
        $employees->secondary_school_name = $request->secondary_school_name;
        $employees->secondary_school_address = $request->secondary_school_address;
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employees->primary_school_name = $request->primary_school_name;
        $employees->primary_school_address = $request->primary_school_address;
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $sql = $employees->save();

        return $sql ? 'true' : 'false';
    }

    public function insert(Request $request){//This function is to save multiple data into database
        
        //Save College Table
        $employee_id = $request->employee_id;//To   insert employee_id
        
        if($request->isSaveCollege == 'true'){

            $college_name = $request->college_name;
            $college_degree = $request->college_degree;
            $college_inclusive_years = $request->college_inclusive_years;
            
            //For loop (Begin;Condition;Step(increment/decrement))
            for($count = 0; $count < count($college_name); $count++){//To loop the data that the user will insert
            
            //Loop Body
            $data_college = array(
                'employee_id'              => $employee_id,//To insert employee_id on College Table but not include in loop
                'college_name'             => $college_name[$count],//To insert college_name on College Table in loop
                'college_degree'           => $college_degree[$count],//""
                'college_inclusive_years'  => $college_inclusive_years[$count]//""
            );
            $insert_college_data[] = $data_college; //To insert the data inside the $data array
            }
            $sql = College::insert($insert_college_data);
        }
        
        //Save Vocational Table
        if($request->isSaveVocational == 'true'){//If the isSaveVocational id change from false to true this block of codes will execute

            $vocational_name = $request->vocational_name;
            $vocational_course = $request->vocational_course;
            $vocational_inclusive_years = $request->vocational_inclusive_years;
        
            //For loop (Begin;Condition;Step(increment/decrement))
            for($count = 0;$count < count($vocational_name); $count++){//To repeat the same code multiple times inside the for loop statement

                $data_vocational = array(
                    'employee_id'                => $employee_id,
                    'vocational_name'            => $vocational_name[$count],
                    'vocational_course'          => $vocational_course[$count],
                    'vocational_inclusive_years' => $vocational_inclusive_years[$count]
                );
                $insert_vocational_data[] = $data_vocational;
            }
            $sql = Vocational::insert($insert_vocational_data);
        }
        
        //Save Training Table
        if($request->isSaveTraining == 'true'){

            $training_name = $request->training_name;
            $training_title = $request->training_title;
            $training_inclusive_years = $request->training_inclusive_years;

            //For loop (Begin;Condition;Step(increment/decrement))
            for($count = 0;$count < count($training_name); $count++){

                $data_training = array(
                    'employee_id'              => $employee_id,
                    'training_name'            => $training_name[$count],
                    'training_title'           => $training_title[$count],
                    'training_inclusive_years' => $training_inclusive_years[$count]
                );
                $insert_training_data[] = $data_training;
            }
            $sql = Training::insert($insert_training_data);
        }

        //Save Job Table
        if($request->isSaveJob == 'true'){

            $job_name = $request->job_name;
            $job_position = $request->job_position;
            $job_address = $request->job_address;
            $job_contact_details = $request->job_contact_details;
            $job_inclusive_years = $request->job_inclusive_years;

            for($count = 0; $count < count($job_name); $count++){

            $data_job = array(
                'employee_id'          => $employee_id,
                'job_name'             => $job_name[$count],
                'job_position'         => $job_position[$count],
                'job_address'          => $job_address[$count],
                'job_contact_details'  => $job_name[$count],
                'job_inclusive_years'  => $job_inclusive_years[$count]
            );
            $insert_job_data[] = $data_job;
        }
            $sql = Job::insert($insert_job_data);
        }

        //Save Memos Received Table
        if($request->isSaveMemos == 'true'){

            $memo_subject = $request->memo_subject;
            $memo_date = $request->memo_date;
            $memo_option = $request->memo_option;
            // $memo_file = $request->memo_file;

            for($count = 0; $count < count($memo_subject); $count++){
                $data_memo = array(
                    'employee_id'          => $employee_id,
                    'memo_subject'         => $memo_subject[$count],
                    'memo_date'            => $memo_date[$count],
                    'memo_option'          => $memo_option[$count]
                    // 'memo_file'            => $memo_file[$count]
                );
                $insert_memo_data[] = $data_memo;
            }
                $sql = Memo::insert($insert_memo_data);
        }

        //Save Evaluation Received Table
        if($request->isSaveEvaluation == 'true'){

            $evaluation_reason = $request->evaluation_reason;
            $evaluation_date = $request->evaluation_date;
            $evaluation_evaluated_by = $request->evaluation_evaluated_by;
            // $evaluation_file = $request->evaluation_file;

            for($count = 0; $count < count($evaluation_reason); $count++){

                $data_evaluation = array(
                    'employee_id'               => $employee_id,
                    'evaluation_reason'         => $evaluation_reason[$count],
                    'evaluation_date'           => $evaluation_date[$count],
                    'evaluation_evaluated_by'   => $evaluation_evaluated_by[$count]
                    // 'evaluation_file'           => $evaluation_file[$count]
                );
                $insert_evaluation_data[] = $data_evaluation;
            }
                $sql = Evaluation::insert($insert_evaluation_data);
        }

        //Save Contracts Table
        if($request->isSaveContracts == 'true'){

            $contracts_type = $request->contracts_type;
            $contracts_date = $request->contracts_date;
            // $contracts_file = $request->contracts_file;

            for($count = 0; $count < count($contracts_type);$count++){

                $data_contracts = array(
                    'employee_id' => $employee_id,
                    'contracts_type' => $contracts_type[$count],
                    'contracts_date' => $contracts_date[$count]
                    // 'contracts_file' => $contracts_file[$count]

                );
                $insert_contracts_data[] = $data_contracts;
            }
                $sql = Contracts::insert($insert_contracts_data);
        }

        //Save Resignation Table
        if($request->isSaveResignation == 'true'){

            $resignation_letter = $request->resignation_letter;
            $resignation_date = $request->resignation_date;
            // $resignation_file = $request->resignation_file;

            for($count = 0;$count < count($resignation_letter); $count++){

                $data_resignation = array(
                    'employee_id'        => $employee_id,
                    'resignation_letter' => $resignation_letter[$count],
                    'resignation_date'   => $resignation_date[$count]
                    // 'resignation_file'   => $resignation_file[$count]
                );

                $insert_resignation_data = $data_resignation;
            }
                $sql = Resignation::insert($insert_resignation_data);
        }

        //Save Termination Table
        if($request->isSaveTermination == 'true'){

            $termination_letter = $request->termination_letter;
            $termination_date = $request->termination_date;
            $termination_file = $request->termination_file;

            for($count = 0;$count < count($termination_letter); $count++){

                $data_termination = array(
                    'employee_id'        => $employee_id,
                    'termination_letter' => $termination_letter[$count],
                    'termination_date'   => $termination_date[$count]
                    // 'termination_file'   => $termination_file[$count]
                );

                $insert_termination_data = $data_termination;
            }
                $sql = Termination::insert($insert_termination_data);
        }
            return $sql ? 'true' : 'false';

    }

    public function checkDuplicate(Request $request){
        return Employee::where('employee_number',$request->employee_number)->count() > 0 ? 'true': 'false';
    }
}
