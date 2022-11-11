<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserLogs;

use App\Models\Children;
use App\Models\College;
use App\Models\Contracts;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\Job;
use App\Models\Memo;
use App\Models\Resignation;
use App\Models\Termination;
use App\Models\Training;
use App\Models\Vocational;
use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//For Authentication
    }
    
    public function listOfEmployees(){
        $employees = Employee::all();
        return DataTables::of($employees)->make(true);
    }
    
    public function childrenDataTable(Request $request){
        $children = Children::where('employee_id',$request->employee_id)->get();
        return DataTables::of($children)->make(true);
    }

    public function save(Request $request){//To save only Work,Personal,School Information Form
        
        $employees = new Employee;
    //Personal Information Tab
        $employee_number_logs = $request->employee_number; 
        $employee_first_name_logs = ucwords($request->first_name);
        $employee_last_name_logs = ucwords($request->last_name); 

        $employees->employee_number = $employee_number_logs;//Eloquent Syntax/Form
        $employees->first_name =  $employee_first_name_logs;
        $employees->cover_image = $request->fileName;
        $employees->last_name = $employee_last_name_logs;

        $employees->middle_name = ucwords($request->middle_name);
        $employees->suffix = ucwords($request->suffix);
        $employees->nickname = ucwords($request->nickname);
        $employees->birthday = $request->birthday;
        $employees->gender = $request->gender;
        $employees->civil_status = $request->civil_status;
        $employees->street = ucwords($request->street);
        $employees->region = $request->region;
        $employees->province = $request->province;
        $employees->city = $request->city;
        $employees->height = $request->height;
        $employees->weight = $request->weight;
        $employees->religion = ucwords($request->religion);
        $employees->email_address = strtolower($request->email_address);
        $employees->telephone_number = $request->telephone_number;
        $employees->cellphone_number = $request->cellphone_number;
        $employees->spouse_name = ucwords($request->spouse_name);
        $employees->spouse_contact_number = $request->spouse_contact_number;
        $employees->spouse_profession = ucwords($request->spouse_profession);
        $employees->father_name = ucwords($request->father_name);
        $employees->father_contact_number = $request->father_contact_number;
        $employees->father_profession = ucwords($request->father_profession);
        $employees->mother_name = ucwords($request->mother_name);
        $employees->mother_contact_number = $request->mother_contact_number;
        $employees->mother_profession = ucwords($request->mother_profession);
        $employees->emergency_contact_name = ucwords($request->emergency_contact_name);
        $employees->emergency_contact_relationship = ucwords($request->emergency_contact_relationship);
        $employees->emergency_contact_number = $request->emergency_contact_number;
    //Work Information Tab
        $employees->employee_company = $request->employee_company;
        $employees->employee_branch = $request->employee_branch;
        $employees->employee_status = $request->employee_status;
        $employees->employee_salary = $request->employee_salary;
        $employees->employee_shift = $request->employee_shift;
        $employees->employee_position = $request->employee_position;
        $employees->employee_supervisor = $request->employee_supervisor;
        $employees->date_hired = $request->date_hired;
        $employees->employee_email_address = $request->employee_email_address;
        $employees->employee_contact_number = $request->employee_contact_number;
        $employees->sss_number = $request->sss_number;
        $employees->pag_ibig_number = $request->pag_ibig_number;
        $employees->philhealth_number = $request->philhealth_number;
        $employees->tin_number = $request->tin_number;
        $employees->account_number = $request->account_number;
    //Educational and Trainings Background Tab
        $employees->secondary_school_name = ucwords($request->secondary_school_name);
        $employees->secondary_school_address = ucwords($request->secondary_school_address);
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employees->primary_school_name = ucwords($request->primary_school_name);
        $employees->primary_school_address = ucwords($request->primary_school_address);
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $sql = $employees->save();//To save data
        
        // $id = $employees->id;

        // $result = $sql ? 'true' : 'false';
        if($sql){
            //To save user logs
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED USER: User successfully added new employee with Employee Number: ($employee_number_logs). Employee Name: ($employee_first_name_logs $employee_last_name_logs)."; //Display logs in home page
            $userlogs->save();

            $result = 'true';
            $id = $employees->id;
        }
        else{
            $result = 'false';
            $id = '';
        }

        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function insertImage(Request $request){//This function is to save the image

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();//Get filename with the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);//Get Just filename
            $extension = $request->file('file')->getClientOriginalExtension();//Get just extension
            $fileNameToStore = time().'_'."Picture".'.'.$extension;// Filename to store
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
    //Personal Information Tab
        $employees->cover_image = $request->fileName;
        $employees->first_name = ucwords($request->first_name);
        $employees->last_name = ucwords($request->last_name);
        $employees->middle_name = ucwords($request->middle_name);
        $employees->suffix = ucwords($request->suffix);
        $employees->nickname = ucwords($request->nickname);
        $employees->birthday = $request->birthday;
        $employees->gender = $request->gender;
        $employees->civil_status = $request->civil_status;
        $employees->street = ucwords($request->street);
        $employees->region = $request->region;
        $employees->province = $request->province;
        $employees->city = $request->city;
        $employees->email_address = strtolower($request->email_address);
        $employees->telephone_number = $request->telephone_number;
        $employees->cellphone_number = $request->cellphone_number;
        $employees->spouse_name = ucwords($request->spouse_name);
        $employees->spouse_contact_number = $request->spouse_contact_number;
        $employees->spouse_profession = ucwords($request->spouse_profession);
        $employees->father_name = ucwords($request->father_name);
        $employees->father_contact_number = $request->father_contact_number;
        $employees->father_profession = ucwords($request->father_profession);
        $employees->mother_name = ucwords($request->mother_name);
        $employees->mother_contact_number = $request->mother_contact_number;
        $employees->mother_profession = ucwords($request->mother_profession);
        $employees->emergency_contact_name = ucwords($request->emergency_contact_name);
        $employees->emergency_contact_relationship = ucwords($request->emergency_contact_relationship);
        $employees->emergency_contact_number = $request->emergency_contact_number;
    //Work Information Tab
        $employees->employee_number = $request->employee_number;
        $employees->employee_company = $request->employee_company;
        $employees->employee_branch = $request->employee_branch;
        $employees->employee_status = $request->employee_status;
        $employees->employee_shift = $request->employee_shift;
        $employees->employee_position = $request->employee_position;
        $employees->employee_supervisor = $request->employee_supervisor;
        $employees->date_hired = $request->date_hired;
        $employees->employee_email_address = strtolower($request->employee_email_address);
        $employees->employee_contact_number = $request->employee_contact_number;
        $employees->sss_number = $request->sss_number;
        $employees->pag_ibig_number = $request->pag_ibig_number;
        $employees->philhealth_number = $request->philhealth_number;
        $employees->tin_number = $request->tin_number;
        $employees->account_number = $request->account_number;
    //Educational and Trainings Background Tab
        $employees->secondary_school_name = ucwords($request->secondary_school_name);
        $employees->secondary_school_address = ucwords($request->secondary_school_address);
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employees->primary_school_name = ucwords($request->primary_school_name);
        $employees->primary_school_address = ucwords($request->primary_school_address);
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $sql = $employees->save();

        return $sql ? 'true' : 'false';
    }

    //Check Duplication of Data
    public function checkDuplicate(Request $request){
        return Employee::where('employee_number',$request->employee_number)->count() > 0 ? 'true': 'false';
    }
    public function checkEmailDuplicate(Request $request){
        return Employee::where('email_address',$request->email_address)->count() > 0 ? 'true': 'false';
    }
    public function checkTelephoneNumberDuplicate(Request $request){
        return Employee::where('telephone_number',$request->telephone_number)->count() > 0 ? 'true': 'false';
    }
    public function checkCellphoneNumberDuplicate(Request $request){
        return Employee::where('cellphone_number',$request->cellphone_number)->count() > 0 ? 'true': 'false';
    }
    public function checkFatherCellphoneNumberDuplicate(Request $request){
        return Employee::where('father_contact_number',$request->father_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkMotherCellphoneNumberDuplicate(Request $request){
        return Employee::where('mother_contact_number',$request->mother_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkSpouseCellphoneNumberDuplicate(Request $request){
        return Employee::where('spouse_contact_number',$request->spouse_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkEmergencyContactNumberDuplicate(Request $request){
        return Employee::where('emergency_contact_number',$request->emergency_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkEmployeeEmailAddressDuplicate(Request $request){
        return Employee::where('employee_email_address',$request->employee_email_address)->count() > 0 ? 'true': 'false';
    }
    public function checkEmployeeContactNumberDuplicate(Request $request){
        return Employee::where('employee_contact_number',$request->employee_contact_number)->count() > 0 ? 'true': 'false';
    }

    public function childrenSave(Request $request){
        $children = new Children;
        $children->employee_id = $request->employee_id;//use to associate employee id
        $children->child_name = ucwords($request->child_name);
        $children->child_birthday = $request->child_birthday;
        $children->child_gender = $request->child_gender;
        $children->save();
    }

    public function collegeSave(Request $request){
        $college = new College;
        $college->employee_id = $request->employee_id;//use to associate employee id
        $college->college_name = ucfirst($request->college_name);
        $college->college_degree = ucfirst($request->college_degree);
        $college->college_inclusive_years = $request->college_inclusive_years;
        $college->save();
    }

    public function trainingSave(Request $request){
        $training = new Training;
        $training->employee_id = $request->employee_id;//use to associate employee id
        $training->training_name = ucfirst($request->training_name);
        $training->training_title = ucfirst($request->training_title);
        $training->training_inclusive_years = $request->training_inclusive_years;
        $training->save();
    }

    public function vocationalSave(Request $request){
        $vocational = new Vocational;
        $vocational->employee_id = $request->employee_id;//use to associate employee id
        $vocational->vocational_name = ucfirst($request->vocational_name);
        $vocational->vocational_course = ucfirst($request->vocational_course);
        $vocational->vocational_inclusive_years = $request->vocational_inclusive_years;
        $vocational->save();
    }

    public function jobSave(Request $request){
        $job = new Job;
        $job->employee_id = $request->employee_id;//use to associate employee id
        $job->job_name = ucfirst($request->job_name);
        $job->job_position = ucfirst($request->job_position);
        $job->job_address = ucwords($request->job_address);
        $job->job_contact_details = $request->job_contact_details;
        $job->job_inclusive_years = $request->job_inclusive_years;
        $job->save();
    }

    public function memoSave(Request $request){
        $memo = new Memo;
        $memo->employee_id = $request->employee_id;//use to associate employee id
        $memo->memo_subject = ucfirst($request->memo_subject);
        $memo->memo_date = $request->memo_date;
        $memo->memo_penalty = $request->memo_penalty;
        $memo->save();
}

    public function evaluationSave(Request $request){
        $evaluation = new Evaluation;
        $evaluation->employee_id = $request->employee_id;//use to associate employee id
        $evaluation->evaluation_reason = ucfirst($request->evaluation_reason);
        $evaluation->evaluation_date = $request->evaluation_date;
        $evaluation->evaluation_evaluated_by = ucwords($request->evaluation_evaluated_by);
        $evaluation->save();
    }

    public function contractsSave(Request $request){
        $contract = new Contracts;
        $contract->employee_id = $request->employee_id;//use to associate employee id
        $contract->contracts_type = ucfirst($request->contracts_type);
        $contract->contracts_date = $request->contracts_date;
        $contract->save();
    }

    public function storeRequirements(Request $request)
    {   
        //Save Resignation and Termination File
        if($request->resignation_letter && $request->resignation_date && $request->hasFile('resignation_file')){
            $resignation = new Resignation;
            $resignation->employee_id = $request->employee_id;
            $resignation->resignation_letter = ucfirst($request->resignation_letter);
            $resignation->resignation_date = $request->resignation_date;

            $resignationFile = $request->file('resignation_file');
            $resignationExtension = $resignationFile->getClientOriginalExtension();
            $resignationFileName = time(). '_' . 'Resignation_Letter'. '.' . $resignationExtension;
            $resignationFile->storeAs('public/resignationFiles',$resignationFileName);
            $resignation->resignation_file = $resignationFileName;
            $resignation->save();
        }

        if($request->termination_letter && $request->termination_date && $request->hasFile('termination_file')){
            $termination = new Termination;
            $termination->employee_id = $request->employee_id;
            $termination->termination_letter = ucfirst($request->termination_letter);
            $termination->termination_date = $request->termination_date;

            $terminationFile = $request->file('termination_file');
            $terminationExtension = $terminationFile->getClientOriginalExtension();
            $terminationFileName = time(). '_' . 'Termination_Letter'. '.' .$terminationExtension;
            $terminationFile->storeAs('public/terminationFiles',$terminationFileName);
            $termination->termination_file = $terminationFileName;
            $termination->save();
        }
        
            $document = new Document;
            $document->employee_id = $request->employee_id;
            $birthcertificateFile = $request->file('birthcertificate_file');
            $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
            $birthcertificateFilename = time(). '_' . 'Birth_Certificate'. '.' .$birthcertificateExtension;
            $birthcertificateFile->storeAs('public/documents',$birthcertificateFilename);
            $document->birthcertificate = $birthcertificateFilename;

            $nbiFile = $request->file('nbi_file');
            $nbiExtension = $nbiFile->getClientOriginalExtension();
            $nbiFilename = time(). '_' . 'NBI_Clearance'. '.' .$nbiExtension;
            $nbiFile->storeAs('public/documents',$nbiFilename);
            $document->nbi_clearance = $nbiFilename;

            $barangayClearanceFile = $request->file('barangay_clearance_file');
            $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
            $barangayClearanceFilename = time(). '_' . 'Barangay_Clearance'. '.' .$barangayClearanceExtension;
            $barangayClearanceFile->storeAs('public/documents',$barangayClearanceFilename);
            $document->barangay_clearance = $barangayClearanceFilename;

            $policeClearanceFile = $request->file('police_clearance_file');
            $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
            $policeClearanceFilename = time(). '_' . 'Police_Clearance'. '.' .$policeClearanceExtension;
            $policeClearanceFile->storeAs('public/documents',$barangayClearanceFilename);
            $document->police_clearance = $policeClearanceFilename;

            $sssFile = $request->file('sss_file');
            $sssExtension = $sssFile->getClientOriginalExtension();
            $sssFilename = time(). '_' . 'SSS_Form'. '.' . $sssExtension;
            $sssFile->storeAs('public/documents',$sssFilename);
            $document->sss_form = $sssFilename;

            $philhealthFile = $request->file('philhealth_file');
            $philhealthExtension = $philhealthFile->getClientOriginalExtension();
            $philhealthFilename = time(). '_' . 'Philhealth_Form'. '.' .$philhealthExtension;
            $philhealthFile->storeAs('public/documents',$philhealthFilename);
            $document->philhealth_form = $philhealthFilename;

            $pagibigFile = $request->file('pag_ibig_file');
            $pagibigExtension = $pagibigFile->getClientOriginalExtension();
            $pagibigFilename = time(). '_' . 'Pagibig_Form'. '.' .$pagibigExtension;
            $pagibigFile->storeAs('public/documents',$pagibigFilename);
            $document->pag_ibig_form = $pagibigFilename;

            $medicalCertificateFile = $request->file('medical_certificate_file');
            $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
            $medicalCertificateFilename = time(). '_' . 'Medical_Certificate'. '.' .$medicalCertificateExtension;
            $medicalCertificateFile->storeAs('public/documents',$medicalCertificateFilename);
            $document->medical_certificate = $medicalCertificateFilename;
            
            $resumeFile = $request->file('resume_file');
            $resumeExtension = $resumeFile->getClientOriginalExtension();
            $resumeFilename = time(). '_' . 'Resume'. '.' . $resumeExtension;
            $resumeFile->storeAs('public/documents',$resumeFilename);
            $document->resume = $resumeFilename;
            
        if($request->hasFile('tor_file')){
            $torFile = $request->file('tor_file');
            $torExtension = $torFile->getClientOriginalExtension();
            $torFilename = time(). '_' . 'Transcript_of_Records'. '.' .$torExtension;
            $torFile->storeAs('public/documents',$torFilename);
            $document->transcript_of_records = $torFilename;
        }

        if($request->hasFile('diploma_file')){
            $diplomaFile = $request->file('diploma_file');
            $diplomaExtension = $diplomaFile->getClientOriginalExtension();
            $diplomaFilename = time(). '_' . 'Diploma'. '.' . $diplomaExtension;
            $diplomaFile->storeAs('public/documents',$diplomaFilename);
            $document->diploma = $diplomaFilename;
        }
            $document->save();
            return Redirect::to(url()->previous());//Return previous page
            // return redirect()->back();
        }
    }


    
