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
        $employees->secondary_school_name = $request->secondary_school_name;
        $employees->secondary_school_address = $request->secondary_school_address;
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employees->primary_school_name = $request->primary_school_name;
        $employees->primary_school_address = $request->primary_school_address;
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;

        $sql = $employees->save();//To save data 

        $id = $employees->id;
        
        return $sql ? $id : '' ;//Ternary Operator ?
    }

    public function insertImage(Request $request){//This function is to save the image

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
        $employees->cover_image = $request->fileName;
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->middle_name = $request->middle_name;
        $employees->suffix = $request->suffix;
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
        $employees->secondary_school_name = $request->secondary_school_name;
        $employees->secondary_school_address = $request->secondary_school_address;
        $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employees->primary_school_name = $request->primary_school_name;
        $employees->primary_school_address = $request->primary_school_address;
        $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $sql = $employees->save();

        return $sql ? 'true' : 'false';
    }

    public function checkDuplicate(Request $request){
        return Employee::where('employee_number',$request->employee_number)->count() > 0 ? 'true': 'false';
    }
}

    
