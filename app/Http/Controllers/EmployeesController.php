<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        $employees->employee_number = $request->employee_number;//Eloquent Syntax/Form
        $employees->cover_image = $request->fileName;
        $employees->first_name = ucwords($request->first_name);
        $employees->last_name = ucwords($request->last_name);
        $employees->middle_name = ucwords($request->middle_name);
        $employees->suffix = ucwords($request->suffix);
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
        $employees->employee_company = $request->employee_company;
        $employees->employee_branch = $request->employee_branch;
        $employees->employee_status = $request->employee_status;
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
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;// Filename to store
            $fileNameToStore = time().'_'."Picture".'.'.$extension;// Filename to store
            // $path = $request->file('file')->storeAs('public/cover_images',$fileNameToStore);//To create folder for images under public folder
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
        $employees->cover_image = $request->fileName;
        $employees->first_name = ucwords($request->first_name);
        $employees->last_name = ucwords($request->last_name);
        $employees->middle_name = ucwords($request->middle_name);
        $employees->suffix = ucwords($request->suffix);
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
        // return Employee::where('employee_number',$request->employee_number)->count() > 0 ? 'true': 'false';
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

    // public function memoSave(Request $request){

    //     if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
    //         $memo = new Memo;
    //         $memo->employee_id = $request->employee_id;//use to associate employee id
    //         $memo->memo_subject = ucfirst($request->memo_subject);
    //         $memo->memo_date = $request->memo_date;
    //         $memo->memo_penalty = $request->memo_penalty;
            
    //         $memoFile = $request->file('memo_file');
    //         $memoExtension = $memoFile->getClientOriginalExtension();
    //         $memoFileName = time(). '_' . 'Memo_Subject'. '.' . $memoExtension;
    //         $memoFile->storeAs('public/memoFiles',$memoFileName);
    //         $memo->memo_file = $memoFileName;
    //         $memo->save();
    //     }
    // }

    public function evaluationSave(Request $request){

        if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by){
            $evaluation = new Evaluation;
            $evaluation->employee_id = $request->employee_id;//use to associate employee id
            $evaluation->evaluation_reason = ucfirst($request->evaluation_reason);
            $evaluation->evaluation_date = $request->evaluation_date;
            $evaluation->evaluation_evaluated_by = ucwords($request->evaluation_evaluated_by);
            $evaluation->save();
        }
    }

    public function contractsSave(Request $request){
        if($request->contracts_type && $request->contracts_date){
            $contract = new Contracts;
            $contract->employee_id = $request->employee_id;//use to associate employee id
            $contract->contracts_type = ucfirst($request->contracts_type);
            $contract->contracts_date = $request->contracts_date;
            $contract->save();
        }
    }

    public function storeRequirements(Request $request)
    {
        if($request->memo_subject && $request->memo_date && $request->memo_penalty){
            $memo = new Memo;
            $memo->employee_id = $request->employee_id;//use to associate employee id
            $memo->memo_subject = ucfirst($request->memo_subject);
            $memo->memo_date = $request->memo_date;
            $memo->memo_penalty = $request->memo_penalty;
            
            // $memoFile = $request->file('memo_file');
            // $memoExtension = $memoFile->getClientOriginalExtension();
            // $memoFileName = time(). '_' . 'Memo_Subject'. '.' . $memoExtension;
            // $memoFile->storeAs('public/memoFiles',$memoFileName);
            // $memo->memo_file = $memoFileName;
            $memo->save();
        }
        
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
            $terminationFileName = time(). '_' . 'Termination_Letter'. '.' . $terminationExtension;
            $terminationFile->storeAs('public/terminationFiles',$terminationFileName);
            $termination->termination_file = $terminationFileName;
            $termination->save();
        }
            //Save Document Files Function
            $birthcertificate_file = $request->file('birthcertificate_file'); //File that will request
            $nbi_file = $request->file('nbi_file');
            $barangay_clearance_file = $request->file('barangay_clearance_file');
            $police_clearance_file = $request->file('police_clearance_file');
            $sss_file = $request->file('sss_file');
            $philhealth_file = $request->file('philhealth_file');
            $pag_ibig_file = $request->file('pag_ibig_file');

            $birthcertificate = time(). '_' . 'Birth_Certificate'. '.' .$birthcertificate_file->getClientOriginalExtension();//File name to store
            $path = $birthcertificate_file->storeAs('public/documents', $birthcertificate);//Storage of the file uploaded

            $nbi = time(). '_' . 'NBI_Clearance'. '.' .$nbi_file->getClientOriginalExtension();
            $path = $nbi_file->storeAs('public/documents', $nbi);

            $barangay_clearance = time(). '_' . 'Barangay_Clearance'. '.' .$barangay_clearance_file->getClientOriginalExtension();
            $path = $barangay_clearance_file->storeAs('public/documents', $barangay_clearance);

            $police_clearance = time(). '_' . 'Police_Clearance'. '.' .$police_clearance_file->getClientOriginalExtension();
            $path = $police_clearance_file->storeAs('public/documents', $police_clearance);

            $sss = time(). '_' . 'SSS_Form'. '.' .$sss_file->getClientOriginalExtension();
            $path = $sss_file->storeAs('public/documents', $sss);

            $philhealth = time(). '_' . 'Philhealth_Form'. '.' .$philhealth_file->getClientOriginalExtension();
            $path = $philhealth_file->storeAs('public/documents', $philhealth);

            $pag_ibig = time(). '_' . 'Pag_ibig_Form'. '.' .$pag_ibig_file->getClientOriginalExtension();
            $path = $pag_ibig_file->storeAs('public/documents', $pag_ibig);
            
            Document::create([
                'employee_id' => $request->employee_id,
                'birthcertificate' => $birthcertificate, //Store in database (documents) //column name and file name to store
                'nbi_clearance' => $nbi,
                'barangay_clearance' => $barangay_clearance,
                'police_clearance' => $police_clearance,
                'sss_form' => $sss,
                'philhealth_form' => $philhealth,
                'pag_ibig_form' => $pag_ibig,
            ]);

            // return Redirect::to(url()->previous());//Return previous page
            // return redirect()->back();
        }
    }


    
