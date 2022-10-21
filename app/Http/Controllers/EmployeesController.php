<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
use App\Document;
use App\Children;

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
        $employees->street = $request->street;
        $employees->region = $request->region;
        $employees->province = $request->province;
        $employees->city = $request->city;
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
        $employees->secondary_school_name = ucwords($request->secondary_school_name);
        $employees->secondary_school_address = ucwords($request->secondary_school_address);
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employees->primary_school_name = ucwords($request->primary_school_name);
        $employees->primary_school_address = ucwords($request->primary_school_address);
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $sql = $employees->save();//To save data 

        return $sql ? 'true' : 'false';
    }

    public function insertImage(Request $request){//This function is to save the image

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();//Get filename with the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);//Get Just filename
            $extension = $request->file('file')->getClientOriginalExtension();//Get just extension
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;// Filename to store
            $fileNameToStore = time().'_'.$filename.'.'.$extension;// Filename to store
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
        $employees->street = $request->street;
        $employees->region = $request->region;
        $employees->province = $request->province;
        $employees->city = $request->city;
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
        return Employee::where('employee_number',$request->employee_number)->count() > 0 ? 'employee_number_duplicate_true': 'employee_number_duplicate_false';
    }
    public function checkEmailDuplicate(Request $request){
        return Employee::where('email_address',$request->email_address)->count() > 0 ? 'email_address_duplicate_true': 'email_address_duplicate_false';
    }
    public function checkTelephoneNumberDuplicate(Request $request){
        return Employee::where('telephone_number',$request->telephone_number)->count() > 0 ? 'telephone_number_duplicate_true': 'telephone_number_duplicate_false';
    }
    public function checkCellphoneNumberDuplicate(Request $request){
        return Employee::where('cellphone_number',$request->cellphone_number)->count() > 0 ? 'cellphone_number_duplicate_true': 'cellphone_number_duplicate_false';
    }
    public function checkFatherCellphoneNumberDuplicate(Request $request){
        return Employee::where('father_contact_number',$request->father_contact_number)->count() > 0 ? 'father_contact_number_duplicate_true': 'father_contact_number_duplicate_false';
    }
    public function checkMotherCellphoneNumberDuplicate(Request $request){
        return Employee::where('mother_contact_number',$request->mother_contact_number)->count() > 0 ? 'mother_contact_number_duplicate_true': 'mother_contact_number_duplicate_false';
    }
    public function checkEmergencyContactNumberDuplicate(Request $request){
        return Employee::where('emergency_contact_number',$request->emergency_contact_number)->count() > 0 ? 'emergency_contact_number_duplicate_true': 'emergency_contact_number_duplicate_false';
    }
    public function checkEmployeeEmailAddressDuplicate(Request $request){
        return Employee::where('employee_email_address',$request->employee_email_address)->count() > 0 ? 'employee_email_address_duplicate_true': 'employee_email_address_duplicate_false';
    }
    public function checkEmployeeContactNumberDuplicate(Request $request){
        return Employee::where('employee_contact_number',$request->employee_contact_number)->count() > 0 ? 'employee_contact_number_duplicate_true': 'employee_contact_number_duplicate_false';
    }

    public function singleParentSave(Request $request){
        $employees = new Children;
        $employees->child_name = ucwords($request->child_name);
        $employees->child_birthday = $request->child_birthday;
        $employees->child_gender = $request->child_gender;
        $sql = $employees->save();

        return $sql ? 'true' : 'false';
    }
    public function storeDocuments(Request $request)
    {
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
            'birthcertificate' => $birthcertificate, //Store in database (documents) //column name and file name to store
            'nbi_clearance' => $nbi,
            'barangay_clearance' => $barangay_clearance,
            'police_clearance' => $police_clearance,
            'sss_form' => $sss,
            'philhealth_form' => $philhealth,
            'pag_ibig_form' => $pag_ibig,
        ]);
        // return Redirect::to(url()->previous());//Return previous page
        return back();
    }

    public function jobSave(Request $request){
        $employees = new Job;
        $employees->job_name = $request->job_name;
        $employees->job_position = $request->job_position;
        $employees->job_address = $request->job_address;
        $employees->job_contact_details = $request->job_contact_details;
        $employees->job_inclusive_years = $request->job_inclusive_years;
        $sql = $employees->save();

        return $sql ? 'true' : 'false';
    }
}

    
