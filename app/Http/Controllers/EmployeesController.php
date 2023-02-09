<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Models\UserLogs;
use App\Models\ChildrenTable;
use App\Models\CollegeTable;
use App\Models\TrainingTable;
use App\Models\VocationalTable;
use App\Models\JobHistoryTable;
use App\Models\MemoTable;
use App\Models\EvaluationTable;
use App\Models\ContractTable;
use App\Models\ResignationTable;
use App\Models\TerminationTable;
use App\Models\PersonalInformationTable;
use App\Models\WorkInformationTable;
use App\Models\CompensationBenefits;
use App\Models\EducationalAttainment;
use App\Models\MedicalHistory;
use App\Models\Document;
use App\Models\LogsTable;
use App\Models\History;
use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function logs_reload(){
        if(LogsTable::count() == 0){
            return 'NULL';
        }
        $data_update = LogsTable::latest('updated_at')->first()->updated_at;
        return $data_update;
    }

    public function listOfEmployees(Request $request){
        if($request->filter == 'probationary'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Probationary')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'regular'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Regular')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'part_time'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Part_Time')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'agency'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Agency')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'intern'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Intern')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else{
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
            }
        return DataTables::of($employees)->make(true);
    }

    public function employeeFetch(Request $request){
        $employees = PersonalInformationTable::select(
            'personal_information_tables.id',
            'employee_image',
            'first_name',
            'middle_name',
            'last_name',
            'suffix',
            'nickname',
            'birthday',
            'gender',
            'civil_status',
            'address',
            'ownership',
            'province',
            'city',
            'region',
            'height',
            'weight',
            'religion',
            'email_address',
            'telephone_number',
            'cellphone_number',
            'spouse_name',
            'spouse_contact_number',
            'spouse_profession',
            'father_name',
            'father_contact_number',
            'father_profession',
            'mother_name',
            'mother_contact_number',
            'mother_profession',
            'emergency_contact_name',
            'emergency_contact_relationship',
            'emergency_contact_number',
            'work_information_tables.employee_number',
            'work_information_tables.date_hired',
            'work_information_tables.employee_shift',
            'work_information_tables.employee_company',
            'work_information_tables.employee_branch',
            'work_information_tables.employee_department',
            'work_information_tables.employee_position',
            'work_information_tables.employment_status',
            'work_information_tables.employment_origin',
            'work_information_tables.hmo_number',
            'work_information_tables.sss_number',
            'work_information_tables.pag_ibig_number',
            'work_information_tables.philhealth_number',
            'work_information_tables.tin_number',
            'work_information_tables.account_number',
            'work_information_tables.company_email_address',
            'work_information_tables.company_contact_number',
            'educational_attainments.secondary_school_name',
            'educational_attainments.secondary_school_address',
            'educational_attainments.secondary_school_inclusive_years_from',
            'educational_attainments.secondary_school_inclusive_years_to',
            'educational_attainments.primary_school_name',
            'educational_attainments.primary_school_address',
            'educational_attainments.primary_school_inclusive_years_from',
            'educational_attainments.primary_school_inclusive_years_to',
            'medical_histories.past_medical_condition',
            'medical_histories.allergies',
            'medical_histories.medication',
            'medical_histories.psychological_history',
            'documents.barangay_clearance_file',
            'documents.birthcertificate_file',
            'documents.diploma_file',
            'documents.medical_certificate_file',
            'documents.nbi_clearance_file',
            'documents.pag_ibig_file',
            'documents.philhealth_file',
            'documents.police_clearance_file',
            'documents.resume_file',
            'documents.sss_file',
            'documents.transcript_of_records_file',
            'compensation_benefits.employee_salary',
            'compensation_benefits.employee_incentives',
            'compensation_benefits.employee_overtime_pay',
            'compensation_benefits.employee_bonus',
            'compensation_benefits.employee_insurance'
        )
        ->where('personal_information_tables.id',$request->id)
        ->leftJoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->leftJoin('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')
        ->leftJoin('medical_histories','medical_histories.employee_id','personal_information_tables.id')  
        ->leftJoin('documents','documents.employee_id','personal_information_tables.id')  
        ->leftJoin('compensation_benefits','compensation_benefits.employee_id','personal_information_tables.id')  
        ->get();
        return DataTables::of($employees)->toJson();
    }

    public function insertImage(Request $request){
        
        $employeeImageFile = $request->file('employee_image');
        $employeeImageExtension = $employeeImageFile->getClientOriginalExtension();
        $employeeImageFileName = strftime("%m-%d-%Y-%H-%M-%S").'_Employee_Image.'.$employeeImageExtension;
        $employeeImageFile->storeAs('public/employee_images',$employeeImageFileName);
        return $employeeImageFileName;
    }

    public function savePersonalInformation(Request $request){
        $employee = new PersonalInformationTable;
        $employee->employee_image = $request->employee_image == 'N\A' ? '' : $request->employee_image;
        $employee->first_name =  strtoupper($request->first_name);
        $employee->last_name = strtoupper($request->last_name); 
        $employee->middle_name = strtoupper($request->middle_name);
        $employee->suffix = strtoupper($request->suffix);
        if(!$request->nickname){
            $employee->nickname = strtoupper($request->first_name);
        }
        else{
            $employee->nickname = strtoupper($request->nickname);
        }
        $employee->birthday = $request->birthday;
        $employee->address = ucwords($request->address);
        $employee->gender = $request->gender;
        $employee->ownership = $request->ownership;
        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->region = $request->region;
        $employee->height = $request->height;
        $employee->weight = $request->weight;
        $employee->religion = ucwords($request->religion);
        $employee->civil_status = $request->civil_status;
        $employee->email_address = strtolower($request->email_address);
        $employee->telephone_number = $request->telephone_number;
        $employee->cellphone_number = $request->cellphone_number;
        $employee->spouse_name = strtoupper($request->spouse_name);
        $employee->spouse_contact_number = $request->spouse_contact_number;
        $employee->spouse_profession = strtoupper($request->spouse_profession);
        $employee->father_name = strtoupper($request->father_name);
        $employee->father_contact_number = $request->father_contact_number;
        $employee->father_profession = strtoupper($request->father_profession);
        $employee->mother_name = strtoupper($request->mother_name);
        $employee->mother_contact_number = $request->mother_contact_number;
        $employee->mother_profession = strtoupper($request->mother_profession);
        $employee->emergency_contact_name = strtoupper($request->emergency_contact_name);
        $employee->emergency_contact_relationship = strtoupper($request->emergency_contact_relationship);
        $employee->emergency_contact_number = $request->emergency_contact_number;
        $sql = $employee->save();
        
        if($sql){
            $result = 'true';
            $id = $employee->id;
        }
        else{
            $result = 'false';
            $id = '';
        }

        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function saveWorkInformation(Request $request){
        $employee = new WorkInformationTable;
        $employee->employee_id = $request->employee_id;
        $employee->employee_number = $request->employee_number;
        $employee->employee_company = $request->employee_company;
        $employee->employee_department = $request->employee_department;
        $employee->employee_branch = $request->employee_branch;
        $employee->employment_status = $request->employment_status;
        $employee->employment_origin = $request->employment_origin;
        $employee->employee_shift = $request->employee_shift;
        $employee->employee_position = $request->employee_position;
        $employee->date_hired = $request->date_hired;
        $employee->company_email_address = $request->company_email_address;
        $employee->company_contact_number = $request->company_contact_number;
        $employee->hmo_number = $request->hmo_number;
        $employee->sss_number = $request->sss_number;
        $employee->pag_ibig_number = $request->pag_ibig_number;
        $employee->philhealth_number = $request->philhealth_number;
        $employee->tin_number = $request->tin_number;
        $employee->account_number = $request->account_number;
        $employee->save();
    }

    public function saveChildren(Request $request){
        $children = new ChildrenTable;
        $children->employee_id = $request->employee_id;
        $children->child_name = ucwords($request->child_name);
        $children->child_birthday = $request->child_birthday;
        $children->child_gender = $request->child_gender;
        $children->save();
    }

    public function saveEducationalAttainment(Request $request){
        $employee = new EducationalAttainment;
        $employee->employee_id = $request->employee_id;
        $employee->secondary_school_name = $request->secondary_school_name;
        $employee->secondary_school_address = $request->secondary_school_address;
        $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
        $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
        $employee->primary_school_name = $request->primary_school_name;
        $employee->primary_school_address = $request->primary_school_address;
        $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
        $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
        $employee->save();
    }

    public function saveCollege(Request $request){
        $employee = new CollegeTable;
        $employee->employee_id = $request->employee_id;
        $employee->college_name = ucwords($request->college_name);
        $employee->college_degree = ucfirst($request->college_degree);
        $employee->college_inclusive_years_from = $request->college_inclusive_years_from;
        $employee->college_inclusive_years_to = $request->college_inclusive_years_to;
        $employee->save();  
    }

    public function saveTraining(Request $request){
        $employee = new TrainingTable;
        $employee->employee_id = $request->employee_id;
        $employee->training_name = ucfirst($request->training_name);
        $employee->training_title = ucfirst($request->training_title);
        $employee->training_inclusive_years_from = $request->training_inclusive_years_from;
        $employee->training_inclusive_years_to = $request->training_inclusive_years_to;
        $employee->save();
    }

    public function saveVocational(Request $request){
        $employee = new VocationalTable;
        $employee->employee_id = $request->employee_id;
        $employee->vocational_name = ucfirst($request->vocational_name);
        $employee->vocational_course = ucfirst($request->vocational_course);
        $employee->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
        $employee->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
        $employee->save();
    }

    public function saveJobHistory(Request $request){
        $employee = new JobHistoryTable;
        $employee->employee_id = $request->employee_id;
        $employee->job_company_name = ucfirst($request->job_company_name);
        $employee->job_description = ucfirst($request->job_description);
        $employee->job_position = ucfirst($request->job_position);
        $employee->job_contact_number = $request->job_contact_number;
        $employee->job_inclusive_years_from = $request->job_inclusive_years_from;
        $employee->job_inclusive_years_to = $request->job_inclusive_years_to;
        $employee->save();
    }

    public function saveMedicalHistory(Request $request){
        if($request->past_medical_condition && $request->allergies && $request->medication && $request->psychological_history){
            $employee = new MedicalHistory;
            $employee->employee_id = $request->employee_id;
            $employee->past_medical_condition = ucwords($request->past_medical_condition);
            $employee->allergies = ucwords($request->allergies);
            $employee->medication = ucwords($request->medication);
            $employee->psychological_history = ucwords($request->psychological_history);
            $employee->save();
        } 
    }

    public function saveCompensationBenefits(Request $request){

        if($request->employee_salary && $request->employee_incentives && $request->employee_overtime_pay && $request->employee_bonus && $request->employee_insurance){
            $employee = new CompensationBenefits;
            $employee->employee_id = $request->employee_id;
            $employee->employee_salary = $request->employee_salary;
            $employee->employee_incentives = $request->employee_incentives;
            $employee->employee_overtime_pay = $request->employee_overtime_pay;
            $employee->employee_bonus = $request->employee_bonus;
            $employee->employee_insurance = $request->employee_insurance;
            $employee->save();
        }

        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $userlogs = new UserLogs;
        $userlogs->user_id = auth()->user()->id;
        $userlogs->activity = "ADDED USER: User successfully added new employee: [Employee Number: $employee_number] [Employee Name: $employee_details->first_name $employee_details->middle_name $employee_details->last_name]";
        $userlogs->save();
    }

    public function updatePersonalInformation(Request $request){
        $first_name_orig = PersonalInformationTable::where('id', $request->id)->first()->first_name;
        $middle_name_orig = PersonalInformationTable::where('id', $request->id)->first()->middle_name;
        $last_name_orig = PersonalInformationTable::where('id', $request->id)->first()->last_name;
        $suffix_orig = PersonalInformationTable::where('id', $request->id)->first()->suffix;
        $nickname_orig = PersonalInformationTable::where('id', $request->id)->first()->nickname;
        $birthday_orig = PersonalInformationTable::where('id', $request->id)->first()->birthday;
        $gender_orig = PersonalInformationTable::where('id', $request->id)->first()->gender;
        $address_orig = PersonalInformationTable::where('id', $request->id)->first()->address;
        $ownership_orig = PersonalInformationTable::where('id', $request->id)->first()->ownership;
        $province_orig = PersonalInformationTable::where('id', $request->id)->first()->province;
        $city_orig = PersonalInformationTable::where('id', $request->id)->first()->city;
        $region_orig = PersonalInformationTable::where('id', $request->id)->first()->region;
        $height_orig = PersonalInformationTable::where('id', $request->id)->first()->height;
        $weight_orig = PersonalInformationTable::where('id', $request->id)->first()->weight;
        $religion_orig = PersonalInformationTable::where('id', $request->id)->first()->religion;
        $civil_status_orig = PersonalInformationTable::where('id', $request->id)->first()->civil_status;
        $email_address_orig = PersonalInformationTable::where('id', $request->id)->first()->email_address;
        $telephone_number_orig = PersonalInformationTable::where('id', $request->id)->first()->telephone_number;
        $cellphone_number_orig = PersonalInformationTable::where('id', $request->id)->first()->cellphone_number;
        $father_name_orig = PersonalInformationTable::where('id', $request->id)->first()->father_name;
        $father_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->father_contact_number;
        $father_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->father_profession;
        $mother_name_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_name;
        $mother_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_contact_number;
        $mother_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_profession;
        $emergency_contact_name_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_name;
        $emergency_contact_relationship_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_relationship;
        $emergency_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_number;

        if(
            $first_name_orig == $request->first_name &&
            $middle_name_orig == $request->middle_name &&
            $last_name_orig == $request->last_name &&
            $suffix_orig == $request->suffix &&
            $nickname_orig == $request->nickname &&
            $birthday_orig == $request->birthday &&
            $gender_orig == $request->gender &&
            $address_orig == $request->address &&
            $ownership_orig == $request->ownership &&
            $province_orig == $request->province &&
            $city_orig == $request->city &&
            $region_orig == $request->region &&
            $height_orig == $request->height &&
            $weight_orig == $request->weight &&
            $religion_orig == $request->religion &&
            $civil_status_orig == $request->civil_status &&
            $email_address_orig == $request->email_address &&
            $telephone_number_orig == $request->telephone_number &&
            $cellphone_number_orig == $request->cellphone_number &&
            $father_name_orig == $request->father_name &&
            $father_contact_number_orig == $request->father_contact_number &&
            $father_profession_orig == $request->father_profession &&
            $mother_name_orig == $request->mother_name &&
            $mother_contact_number_orig == $request->mother_contact_number &&
            $mother_profession_orig == $request->mother_profession &&
            $emergency_contact_name_orig == $request->emergency_contact_name &&
            $emergency_contact_relationship_orig == $request->emergency_contact_relationship &&
            $emergency_contact_number_orig == $request->emergency_contact_number
            ){
            return 'nochanges';
        }
        if(strtoupper($request->first_name) != $first_name_orig){
            $first_name_new = strtoupper($request->first_name);
            $first_name_change = "[FIRST NAME: FROM '$first_name_orig' TO '$first_name_new']";
        }
        else{
            $first_name_change = NULL;
        }

        if(strtoupper($request->middle_name) != $middle_name_orig){
            $middle_name_new = strtoupper($request->middle_name);
            $middle_name_change = "[MIDDLE NAME: FROM '$middle_name_orig' TO '$middle_name_new']";
        }
        else{
            $middle_name_change = NULL;
        }

        if(strtoupper($request->last_name) != $last_name_orig){
            $last_name_new = strtoupper($request->last_name);
            $last_name_change = "[LAST NAME: FROM '$last_name_orig' TO '$last_name_new']";
        }
        else{
            $last_name_change = NULL;
        }
        
        if(strtoupper($request->suffix) != $suffix_orig){
            $suffix_new = strtoupper($request->suffix);
            $suffix_change = "[SUFFIX: FROM '$suffix_orig' TO '$suffix_new']";
        }
        else{
            $suffix_change = NULL;
        }

        if(strtoupper($request->nickname) != $nickname_orig){
            $nickname_new = strtoupper($request->nickname);
            $nickname_change = "[NICKNAME: FROM '$nickname_orig' TO '$nickname_new']";
        }
        else{
            $nickname_change = NULL;
        }
        
        if($request->birthday != $birthday_orig){
            $birthday_new = $request->birthday;
            $birthday_change = "[BIRTHDAY: FROM '$birthday_orig' TO '$birthday_new']";
        }
        else{
            $birthday_change = NULL;
        }

        if($request->gender != $gender_orig){
            $gender_new = $request->gender;
            $gender_change = "[GENDER: FROM '$gender_orig' TO '$gender_new']";
        }
        else{
            $gender_change = NULL;
        }

        if($request->address != $address_orig){
            $address_new = $request->address;
            $address_change = "[ADDRESS: FROM '$address_orig' TO '$address_new']";
        }
        else{
            $address_change = NULL;
        }

        if($request->ownership != $ownership_orig){
            $ownership_new = $request->ownership;
            $ownership_change = "[OWNERSHIP: FROM '$ownership_orig' TO '$ownership_new']";
        }
        else{
            $ownership_change = NULL;
        }

        if($request->province != $province_orig){
            $province_new = $request->province;
            $province_change = "[PROVINCE: FROM '$province_orig' TO '$province_new']";
        }
        else{
            $province_change = NULL;
        }

        if($request->city != $city_orig){
            $city_new = $request->city;
            $city_change = "[CITY: FROM '$city_orig' TO '$city_new']";
        }
        else{
            $city_change = NULL;
        }

        if($request->region != $region_orig){
            $region_new = $request->region;
            $region_change = "[REGION: FROM '$region_orig' TO '$region_new']";
        }
        else{
            $region_change = NULL;
        }

        if($request->height != $height_orig){
            $height_new = $request->height;
            $height_change = "[HEIGHT: FROM '$height_orig' TO '$height_new']";
        }
        else{
            $height_change = NULL;
        }

        if($request->weight != $weight_orig){
            $weight_new = $request->weight;
            $weight_change = "[WEIGHT: FROM '$weight_orig' TO '$weight_new']";
        }
        else{
            $weight_change = NULL;
        }

        if(strtoupper($request->religion) != $religion_orig){
            $religion_new = strtoupper($request->religion);
            $religion_change = "[RELIGION: FROM '$religion_orig' TO '$religion_new']";
        }
        else{
            $religion_change = NULL;
        }

        if($request->civil_status != $civil_status_orig){
            $civil_status_new = $request->civil_status;
            $civil_status_change = "[CIVIL STATUS: FROM '$civil_status_orig' TO '$civil_status_new']";
        }
        else{
            $civil_status_change = NULL;
        }

        if($request->email_address != $email_address_orig){
            $email_address_new = $request->email_address;
            $email_address_change = "[EMAIL ADDRESS: FROM '$email_address_orig' TO '$email_address_new']";
        }
        else{
            $email_address_change = NULL;
        }

        if($request->telephone_number != $telephone_number_orig){
            $telephone_number_new = $request->telephone_number;
            $telephone_number_change = "[TELEPHONE NUMBER: FROM '$telephone_number_orig' TO '$telephone_number_new']";
        }
        else{
            $telephone_number_change = NULL;
        }

        if($request->cellphone_number != $cellphone_number_orig){
            $cellphone_number_new = $request->cellphone_number;
            $cellphone_number_change = "[CELLPHONE NUMBER: FROM '$cellphone_number_orig' TO '$cellphone_number_new']";
        }
        else{
            $cellphone_number_change = NULL;
        }

        if(strtoupper($request->father_name) != $father_name_orig){
            $father_name_new = strtoupper($request->father_name);
            $father_name_change = "[FATHER'S NAME: FROM '$father_name_orig' TO '$father_name_new']";
        }
        else{
            $father_name_change = NULL;
        }

        if($request->father_contact_number != $father_contact_number_orig){
            $father_contact_number_new = $request->father_contact_number;
            $father_contact_number_change = "[FATHER'S CONTACT NUMBER: FROM '$father_contact_number_orig' TO '$father_contact_number_new']";
        }
        else{
            $father_contact_number_change = NULL;
        }

        if(strtoupper($request->father_profession) != $father_profession_orig){
            $father_profession_new = strtoupper($request->father_profession);
            $father_profession_change = "[FATHER'S PROFESSION: FROM '$father_profession_orig' TO '$father_profession_new']";
        }
        else{
            $father_profession_change = NULL;
        }

        if(strtoupper($request->mother_name) != $mother_name_orig){
            $mother_name_new = strtoupper($request->mother_name);
            $mother_name_change = "[MOTHER'S MAIDEN NAME: FROM '$mother_name_orig' TO '$mother_name_new']";
        }
        else{
            $mother_name_change = NULL;
        }

        if($request->mother_contact_number != $mother_contact_number_orig){
            $mother_contact_number_new = $request->mother_contact_number;
            $mother_contact_number_change = "[MOTHER'S CONTACT NUMBER: FROM '$mother_contact_number_orig' TO '$mother_contact_number_new']";
        }
        else{
            $mother_contact_number_change = NULL;
        }

        if(strtoupper($request->mother_profession) != $mother_profession_orig){
            $mother_profession_new = strtoupper($request->mother_profession);
            $mother_profession_change = "[MOTHER'S PROFESSION: FROM '$mother_profession_orig' TO '$mother_profession_new']";
        }
        else{
            $mother_profession_change = NULL;
        }

        if(strtoupper($request->emergency_contact_name) != $emergency_contact_name_orig){
            $emergency_contact_name_new = strtoupper($request->emergency_contact_name);
            $emergency_contact_name_change = "[EMERGENCY CONTACT NAME: FROM '$emergency_contact_name_orig' TO '$emergency_contact_name_new']";
        }
        else{
            $emergency_contact_name_change = NULL;
        }

        if(strtoupper($request->emergency_contact_relationship) != $emergency_contact_relationship_orig){
            $emergency_contact_relationship_new = strtoupper($request->emergency_contact_relationship);
            $emergency_contact_relationship_change = "[EMERGENCY CONTACT RELATIONSHIP: FROM '$emergency_contact_relationship_orig' TO '$emergency_contact_relationship_new']";
        }
        else{
            $emergency_contact_relationship_change = NULL;
        }

        if($request->emergency_contact_number != $emergency_contact_number_orig){
            $emergency_contact_number_new = $request->emergency_contact_number;
            $emergency_contact_number_change = "[EMERGENCY CONTACT NUMBER: FROM '$emergency_contact_number_orig' TO '$emergency_contact_number_new']";
        }
        else{
            $emergency_contact_number_change = NULL;
        }
       
        $employee = PersonalInformationTable::find($request->id);
        $employee->first_name = strtoupper($request->first_name);
        $employee->middle_name = strtoupper($request->middle_name);
        $employee->last_name = strtoupper($request->last_name);
        $employee->suffix = strtoupper($request->suffix);
        $employee->nickname = strtoupper($request->nickname);
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->ownership = $request->ownership;
        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->region = $request->region;
        $employee->height = $request->height;
        $employee->weight = $request->weight;
        $employee->religion = strtoupper($request->religion);
        $employee->civil_status = $request->civil_status;
        $employee->email_address = $request->email_address;
        $employee->telephone_number = $request->telephone_number;
        $employee->cellphone_number = $request->cellphone_number;
        $employee->father_name = strtoupper($request->father_name);
        $employee->father_contact_number = $request->father_contact_number;
        $employee->father_profession = strtoupper($request->father_profession);
        $employee->mother_name = strtoupper($request->mother_name);
        $employee->mother_contact_number = $request->mother_contact_number;
        $employee->mother_profession = strtoupper($request->mother_profession);
        $employee->emergency_contact_name = strtoupper($request->emergency_contact_name);
        $employee->emergency_contact_relationship = strtoupper($request->emergency_contact_relationship);
        $employee->emergency_contact_number = $request->emergency_contact_number;
        
        $sql = $employee->save();

        if($sql){
            $personal_info_title = "[PERSONAL INFO]";

            $result = 'true';
            $id = $employee->id;

            $employee_logs = new LogsTable;
            $employee_logs->employee_id = $request->id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE: $personal_info_title $first_name_change $middle_name_change $last_name_change $suffix_change $nickname_change $birthday_change $gender_change $address_change $ownership_change $province_change $city_change $region_change $height_change $weight_change $religion_change $civil_status_change $email_address_change $telephone_number_change $cellphone_number_change $father_name_change $father_contact_number_change $father_profession_change $mother_name_change $mother_contact_number_change $mother_profession_change $emergency_contact_name_change $emergency_contact_relationship_change $emergency_contact_number_change";
            $employee_logs->save();
        }
        else{
            $result = 'false';
            $id = '';
        }
        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    // public function updateWorkInformation(Request $request){
    //     $employee = WorkInformationTable::where('employee_id',$request->employee_id)->first();
    //     $employee_number_orig = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

    //     if($request->employee_number != $employee_number_orig){
    //         $employee_number_new = $request->employee_number;
    //         $employee_number_change = "[EMPLOYEE NUMBER: FROM '$employee_number_orig' TO '$employee_number_new']";
    //     }
    //     else{
    //         $employee_number_change = NULL;
    //     }

    //     $sql = WorkInformationTable::where('employee_id',$request->employee_id)
    //         ->update([
    //             'employee_number' => $request->employee_number,
    //         ]);

    //     if($sql){
    //         $work_info_title = "[WORK INFO]";
    //         $result = 'true';
    //         $id = $employee->id;

    //     // $employee_number = WorkInformationTable::where('id', $request->id)->first()->employee_number;
    //     // $employee_details = PersonalInformationTable::where('id', $request->id)->first();
    //         $employee_logs = new LogsTable;
    //         $employee_logs->employee_id = $request->id;
    //         $employee_logs->user_id = auth()->user()->id;
    //         $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE: $work_info_title $employee_number_change";
    //         $employee_logs->save();

    //     // $employee_history_logs = new History;
    //     // $employee_history_logs->employee_id = $request->id;
    //     // $employee_history_logs->history = "$employee_shift_change $employee_position_change $employee_company_change $employee_branch_change $employment_status_change $employment_origin_change";
    //     // $employee_history_logs->save();
    //     }
    //     else{
    //         $result = 'false';
    //         $id = '';
    //     }
    //     $data = array('result' => $result, 'id' => $id);
    //     return response()->json($data);
    // }

    public function updateEducationalAttainment(Request $request){
        $employee = EducationalAttainment::where('employee_id',$request->employee_id)->first();
        if(!$employee){
            if($request->secondary_school_name
            && $request->secondary_school_address
            && $request->secondary_school_inclusive_years_from
            && $request->secondary_school_inclusive_years_to
            && $request->primary_school_name
            && $request->primary_school_address
            && $request->primary_school_inclusive_years_from
            && $request->primary_school_inclusive_years_to
            ){
                $employee = new EducationalAttainment;
                $employee->employee_id = $request->employee_id;
                $employee->secondary_school_name = $request->secondary_school_name;
                $employee->secondary_school_address = $request->secondary_school_address;
                $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
                $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
                $employee->primary_school_name = $request->primary_school_name;
                $employee->primary_school_address = $request->primary_school_address;
                $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
                $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
                $employee->save();
            }
        }
        else{
            $secondary_school_name_orig = $request->secondary_school_name_orig;
            $secondary_school_address_orig = $request->secondary_school_address_orig;
            $secondary_school_inclusive_years_from_orig = $request->secondary_school_inclusive_years_from_orig;
            $secondary_school_inclusive_years_to_orig = $request->secondary_school_inclusive_years_to_orig;

            $primary_school_name_orig = $request->primary_school_name_orig;
            $primary_school_address_orig = $request->primary_school_address_orig;
            $primary_school_inclusive_years_from_orig = $request->primary_school_inclusive_years_from_orig;
            $primary_school_inclusive_years_to_orig = $request->primary_school_inclusive_years_to_orig;

            $sql = EducationalAttainment::where('employee_id',$request->employee_id)
            ->update([
                'secondary_school_name' => $request->secondary_school_name_new,
                'secondary_school_address' => $request->secondary_school_address_new,
                'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from_new,
                'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to_new,
                'primary_school_name' => $request->primary_school_name_new,
                'primary_school_address' => $request->primary_school_address_new,
                'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from_new,
                'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to_new,
            ]);

            if($sql){
                $education_trainings_title = "[EDUCATION/TRAININGS]";
                if($secondary_school_name_orig != $request->secondary_school_name_new){
                    $secondary_school_name_change = "[Secondary School Name: FROM '$secondary_school_name_orig' TO '$request->secondary_school_name_new']";
                }
                else{
                    $secondary_school_name_change = NULL;
                }
                if($secondary_school_address_orig != $request->secondary_school_address_new){
                    $secondary_school_address_change = "[Secondary School Address: FROM '$secondary_school_address_orig' TO '$request->secondary_school_address_new']";
                }
                else{
                    $secondary_school_address_change = NULL;
                }
                if($secondary_school_inclusive_years_from_orig != $request->secondary_school_inclusive_years_from_new){
                    $secondary_school_inclusive_years_from_change = "[Secondary School Start Year: FROM '$secondary_school_inclusive_years_from_orig' TO '$request->secondary_school_inclusive_years_from_new']";
                }
                else{
                    $secondary_school_inclusive_years_from_change = NULL;
                }
                if($secondary_school_inclusive_years_to_orig != $request->secondary_school_inclusive_years_to_new){
                    $secondary_school_inclusive_years_to_change = "[Secondary School End Year: FROM '$secondary_school_inclusive_years_to_orig' TO '$request->secondary_school_inclusive_years_to_new']";
                }
                else{
                    $secondary_school_inclusive_years_to_change = NULL;
                }
                if($primary_school_name_orig != $request->primary_school_name_new){
                    $primary_school_name_change = "[Primary School Name: FROM '$primary_school_name_orig' TO '$request->primary_school_name_new']";
                }
                else{
                    $primary_school_name_change = NULL;
                }
                if($primary_school_address_orig != $request->primary_school_address_new){
                    $primary_school_address_change = "[Primary School Address: FROM '$primary_school_address_orig' TO '$request->primary_school_address_new']";
                }
                else{
                    $primary_school_address_change = NULL;
                }
                if($primary_school_inclusive_years_from_orig != $request->primary_school_inclusive_years_from_new){
                    $primary_school_inclusive_years_from_change = "[Primary School Start Year: FROM '$primary_school_inclusive_years_from_orig' TO '$request->primary_school_inclusive_years_from_new']";
                }
                else{
                    $primary_school_inclusive_years_from_change = NULL;
                }
                if($primary_school_inclusive_years_to_orig != $request->primary_school_inclusive_years_to_new){
                    $primary_school_inclusive_years_to_change = "[Primary School End Year: FROM '$primary_school_inclusive_years_to_orig' TO '$request->primary_school_inclusive_years_to_new']";
                }
                else{
                    $primary_school_inclusive_years_to_change = NULL;
                }

                $result = 'true';
                $id = $employee->id;

                if($secondary_school_name_orig != $request->secondary_school_name_new
                || $secondary_school_address_orig != $request->secondary_school_address_new
                || $secondary_school_inclusive_years_from_orig != $request->secondary_school_inclusive_years_from_new
                || $secondary_school_inclusive_years_to_orig != $request->secondary_school_inclusive_years_to_new
                || $primary_school_name_orig != $request->primary_school_name_new
                || $primary_school_address_orig != $request->primary_school_address_new
                || $primary_school_inclusive_years_from_orig != $request->primary_school_inclusive_years_from_new
                || $primary_school_inclusive_years_to_orig != $request->primary_school_inclusive_years_to_new
                ){

                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $request->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
                                            $education_trainings_title
                                            $secondary_school_name_change
                                            $secondary_school_address_change
                                            $secondary_school_inclusive_years_from_change
                                            $secondary_school_inclusive_years_to_change
                                            $primary_school_name_change
                                            $primary_school_address_change
                                            $primary_school_inclusive_years_from_change
                                            $primary_school_inclusive_years_to_change
                                            ";
                    $employee_logs->save();
                }
            }
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
    }

    public function updateMedicalHistory(Request $request){
        $employee = MedicalHistory::where('employee_id',$request->employee_id)->first();
        if(!$employee){
            if($request->past_medical_condition_new
            || $request->allergies_new
            || $request->medication_new
            || $request->psychological_history_new
            ){
                $employee = new MedicalHistory;
                $employee->employee_id = $request->employee_id;
                $employee->past_medical_condition = $request->past_medical_condition_new;
                $employee->allergies = $request->allergies_new;
                $employee->medication = $request->medication_new;
                $employee->psychological_history = $request->psychological_history_new;
                $save = $employee->save();
            }
        }
        else{
            $past_medical_condition_orig = $request->past_medical_condition_orig;
            $allergies_orig = $request->allergies_orig;
            $medication_orig = $request->medication_orig;
            $psychological_history_orig = $request->psychological_history_orig;

            $sql = MedicalHistory::where('employee_id',$request->employee_id)
            ->update([
                'past_medical_condition' => $request->past_medical_condition_new,
                'allergies' => $request->allergies_new,
                'medication' => $request->medication_new,
                'psychological_history' => $request->psychological_history_new
            ]);

        //     if($sql){
        //         if($past_medical_condition_orig != $request->past_medical_condition_new){
        //             $past_medical_condition_change = "[Past Med. Condition: FROM '$past_medical_condition_orig' TO '$request->past_medical_condition_new']";
        //         }
        //         else{
        //             $past_medical_condition_change = NULL;
        //         }
        //         if($allergies_orig != $request->allergies_new){
        //             $allergies_change = "[Allergies: FROM '$allergies_orig' TO '$request->allergies_new']";
        //         }
        //         else{
        //             $allergies_change = NULL;
        //         }
        //         if($medication_orig != $request->medication_new){
        //             $medication_change = "[Medication: FROM '$medication_orig' TO '$request->medication_new']";
        //         }
        //         else{
        //             $medication_change = NULL;
        //         }
        //         if($psychological_history_orig != $request->psychological_history_new){
        //             $psychological_history_change = "[Psychological History: FROM '$psychological_history_orig' TO '$request->psychological_history_new']";
        //         }
        //         else{
        //             $psychological_history_change = NULL;
        //         }

        //         $result = 'true';
        //         $id = $employee->id;

        //         if($past_medical_condition_orig != $request->past_medical_condition_new
        //         || $allergies_orig != $request->allergies_new
        //         || $medication_orig != $request->medication_new
        //         || $psychological_history_orig != $request->psychological_history_new
        //         ){

        //             $employee_logs = new LogsTable;
        //             $employee_logs->employee_id = $request->id;
        //             $employee_logs->user_id = auth()->user()->id;
        //             $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
        //                                     $past_medical_condition_change
        //                                     $allergies_change
        //                                     $medication_change
        //                                     $psychological_history_change
        //                                     ";
        //             $employee_logs->save();
        //         }
        //     }
        //     else{
        //         $result = 'false';
        //         $id = '';
        //     }
        //     $data = array('result' => $result, 'id' => $id);
        //     return response()->json($data);
        // }
        }
    }

    public function updateCompensationBenefits(Request $request){
        $employee = CompensationBenefits::where('employee_id',$request->employee_id)->first();
        if(!$employee){
            if($request->employee_salary_new 
            || $request->employee_incentives_new 
            || $request->employee_overtime_pay_new 
            || $request->employee_bonus_new 
            || $request->employee_insurance_new){
                $employee = new CompensationBenefits;
                $employee->employee_id = $request->employee_id;
                $employee->employee_salary = $request->employee_salary_new;
                $employee->employee_incentives = $request->employee_incentives_new;
                $employee->employee_overtime_pay = $request->employee_overtime_pay_new;
                $employee->employee_bonus = $request->employee_bonus_new;
                $employee->employee_insurance = $request->employee_insurance_new;
                $employee->save();
            }
        }
        else{
            $employee_salary_orig = $request->employee_salary_orig;
            $employee_incentives_orig = $request->employee_incentives_orig;
            $employee_overtime_pay_orig = $request->employee_overtime_pay_orig;
            $employee_bonus_orig = $request->employee_bonus_orig;
            $employee_insurance_orig = $request->employee_insurance_orig;
            
            $update = CompensationBenefits::where('employee_id',$request->employee_id)
            ->update([
                'employee_salary' => $request->employee_salary_new,
                'employee_incentives' => $request->employee_incentives_new,
                'employee_overtime_pay' => $request->employee_overtime_pay_new,
                'employee_bonus' => $request->employee_bonus_new,
                'employee_insurance' => $request->employee_insurance_new
            ]);

        //     if($update){
        //         if($employee_salary_orig != $request->employee_salary_new){
        //             $compensation_benefits_title = "[Compensation/Benefits]";
        //             $employee_salary_change = "[Salary: FROM '$employee_salary_orig' TO '$request->employee_salary_new']";
        //         }
        //         else{
        //             $employee_salary_change = NULL;
        //         }
        //         if($employee_incentives_orig != $request->employee_incentives_new){
        //             $compensation_benefits_title = "[Compensation/Benefits]";
        //             $employee_incentives_change = "[Incentives Pay: FROM '$employee_incentives_orig' TO '$request->employee_incentives_new']";
        //         }
        //         else{
        //             $employee_incentives_change = NULL;
        //         }
        //         if($employee_overtime_pay_orig != $request->employee_overtime_pay_new){
        //             $compensation_benefits_title = "[Compensation/Benefits]";
        //             $employee_overtime_pay_change = "[Overtime Pay: FROM '$employee_overtime_pay_orig' TO '$request->employee_overtime_pay_new']";
        //         }
        //         else{
        //             $employee_overtime_pay_change = NULL;
        //         }
        //         if($employee_bonus_orig != $request->employee_bonus_new){
        //             $compensation_benefits_title = "[Compensation/Benefits]";
        //             $employee_bonus_change = "[Bonus Pay: FROM '$employee_bonus_orig' TO '$request->employee_bonus_new']";
        //         }
        //         else{
        //             $employee_bonus_change = NULL;
        //         }
        //         if($employee_insurance_orig = $request->employee_insurance_new){
        //             $compensation_benefits_title = "[Compensation/Benefits]";
        //             $employee_insurance_change = "[Health Insurance/Benefits: FROM '$employee_insurance_orig' TO '$request->employee_insurance_new']";
        //         }
        //         else{
        //             $employee_insurance_change = NULL;
        //         }

        //         $result = 'true';
        //         $id = $employee->id;

        //         if($employee_salary_orig != $request->employee_salary_new
        //         || $employee_incentives_orig != $request->employee_incentives_new
        //         || $employee_overtime_pay_orig != $request->employee_overtime_pay_new
        //         || $employee_bonus_orig != $request->employee_bonus_new
        //         || $employee_insurance_orig = $request->employee_insurance_new
        //         ){
        //             $employee_logs = new LogsTable;
        //             $employee_logs->employee_id = $request->id;
        //             $employee_logs->user_id = auth()->user()->id;
        //             $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
        //                                     $compensation_benefits_title
        //                                     $employee_salary_change
        //                                     $employee_incentives_change
        //                                     $employee_overtime_pay_change
        //                                     $employee_bonus_change
        //                                     $employee_insurance_change
        //                                     ";
        //             $employee_logs->save();
        //         }
        //     }
        //     else{
        //         $result = 'false';
        //         $id = '';
        //     }
        //     $data = array('result' => $result, 'id' => $id);
        //     return response()->json($data);
        // }
        }
    }

    public function duplicate_personal_info(Request $request){
        if(PersonalInformationTable::where('email_address', '=', $request->email_address)->exists()){
            return 'duplicate_email_address';
        }
        
        if(PersonalInformationTable::where('telephone_number', '=', $request->telephone_number)->exists()){
            return 'duplicate_telephone_number';
        }

        if(PersonalInformationTable::where('cellphone_number', '=', $request->cellphone_number)->exists()){
            return 'duplicate_cellphone_number';
        }

        if(PersonalInformationTable::where('father_contact_number', '=', $request->father_contact_number)->exists()){
            return 'duplicate_father_contact_number';
        }

        if(PersonalInformationTable::where('mother_contact_number', '=', $request->mother_contact_number)->exists()){
            return 'duplicate_mother_contact_number';
        }

        if(PersonalInformationTable::where('emergency_contact_number', '=', $request->emergency_contact_number)->exists()){
            return 'duplicate_emergency_contact_number';
        }
    }

    public function duplicate_work_info(Request $request){
        if(WorkInformationTable::where('employee_number', '=', $request->employee_number)->exists()) {
            return 'duplicate_employee_number';
        }

        if(WorkInformationTable::where('company_email_address', '=', $request->company_email_address)->exists()) {
            return 'duplicate_company_email_address';
        }

        if(WorkInformationTable::where('company_contact_number', '=', $request->company_contact_number)->exists()) {
            return 'duplicate_company_contact_number';
        }

        if(WorkInformationTable::where('company_contact_number', '=', $request->company_contact_number)->exists()) {
            return 'duplicate_company_contact_number';
        }
        
        if(WorkInformationTable::where('sss_number', '=', $request->sss_number)->exists()) {
            return 'duplicate_sss_number';
        }

        if(WorkInformationTable::where('pag_ibig_number', '=', $request->pag_ibig_number)->exists()) {
            return 'duplicate_pag_ibig_number';
        }

        if(WorkInformationTable::where('philhealth_number', '=', $request->philhealth_number)->exists()) {
            return 'duplicate_philhealth_number';
        }
        if(WorkInformationTable::where('tin_number', '=', $request->tin_number)->exists()) {
            return 'duplicate_tin_number';
        }
        if(WorkInformationTable::where('account_number', '=', $request->account_number)->exists()) {
            return 'duplicate_account_number';
        }
    }

    public function saveDocuments(Request $request)
    {   
        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $memoFileName = time().rand(1,100).'_Memo_File.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/evaluation_files',$memoFileName);
                
                $memo = new MemoTable;
                $memo->employee_id = $request->employee_id;
                $memo->memo_subject = $request->memo_subject[$key];
                $memo->memo_date = $request->memo_date[$key];
                $memo->memo_penalty = $request->memo_penalty[$key];
                $memo->memo_file = $memoFileName;
                $memo->save();
            }
        }

        if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
            foreach($request->file('evaluation_file') as $key => $value){
                $evaluationFileName = time().rand(1,100).'_Evaluation_File.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation_files',$evaluationFileName);
                
                $evaluation = new EvaluationTable;
                $evaluation->employee_id = $request->employee_id;
                $evaluation->evaluation_reason = $request->evaluation_reason[$key];
                $evaluation->evaluation_date = $request->evaluation_date[$key];
                $evaluation->evaluation_evaluated_by = $request->evaluation_evaluated_by[$key];
                $evaluation->evaluation_file = $evaluationFileName;
                $evaluation->save();
            }
        }

        if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
            foreach($request->file('contracts_file') as $key => $value){
                $contractsFileName = time().rand(1,100).'_Contracts_File.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/evaluation_files',$contractsFileName);
                
                $contracts = new ContractTable;
                $contracts->employee_id = $request->employee_id;
                $contracts->contracts_type = $request->contracts_type[$key];
                $contracts->contracts_date = $request->contracts_date[$key];
                $contracts->contracts_file = $contractsFileName;
                $contracts->save();
            }
        }
    
            $document = new Document;
            $document->employee_id = $request->employee_id;
            $barangayClearanceFile = $request->file('barangay_clearance_file');
            $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
            $barangayClearanceFilename = time().rand(1,100).'_Barangay_Clearance_File.'.$barangayClearanceExtension;
            $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
            $document->barangay_clearance_file = $barangayClearanceFilename;

            $birthcertificateFile = $request->file('birthcertificate_file');
            $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
            $birthcertificateFilename = time().rand(1,100).'_Birth_Certificate_File.'.$birthcertificateExtension;
            $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
            $document->birthcertificate_file = $birthcertificateFilename;

        if($request->hasFile('diploma_file')){
            $diplomaFile = $request->file('diploma_file');
            $diplomaExtension = $diplomaFile->getClientOriginalExtension();
            $diplomaFilename = time().rand(1,100).'_Diploma_File.'.$diplomaExtension;
            $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
            $document->diploma_file = $diplomaFilename;
        }

            $medicalCertificateFile = $request->file('medical_certificate_file');
            $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
            $medicalCertificateFilename = time().rand(1,100).'_Medical_Certificate_File.'.$medicalCertificateExtension;
            $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
            $document->medical_certificate_file = $medicalCertificateFilename;

        if($request->hasFile('nbi_clearance_file')){
            $nbiFile = $request->file('nbi_clearance_file');
            $nbiExtension = $nbiFile->getClientOriginalExtension();
            $nbiFilename = time().rand(1,100).'_NBI_Clearance_File.'.$nbiExtension;
            $nbiFile->storeAs('public/documents_files',$nbiFilename);
            $document->nbi_clearance_file = $nbiFilename;
        }

            $pagibigFile = $request->file('pag_ibig_file');
            $pagibigExtension = $pagibigFile->getClientOriginalExtension();
            $pagibigFilename = time().rand(1,100).'_Pag_ibig_File.'.$pagibigExtension;
            $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
            $document->pag_ibig_file = $pagibigFilename;

            $philhealthFile = $request->file('philhealth_file');
            $philhealthExtension = $philhealthFile->getClientOriginalExtension();
            $philhealthFilename = time().rand(1,100).'_Philhealth_File.'.$philhealthExtension;
            $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
            $document->philhealth_file = $philhealthFilename;

            $policeClearanceFile = $request->file('police_clearance_file');
            $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
            $policeClearanceFilename = time().rand(1,100).'_Police_Clearance_File.'.$policeClearanceExtension;
            $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
            $document->police_clearance_file = $policeClearanceFilename;

            $resumeFile = $request->file('resume_file');
            $resumeExtension = $resumeFile->getClientOriginalExtension();
            $resumeFilename = time().rand(1,100).'_Resume_File.'.$resumeExtension;
            $resumeFile->storeAs('public/documents_files',$resumeFilename);
            $document->resume_file = $resumeFilename;

            $sssFile = $request->file('sss_file');
            $sssExtension = $sssFile->getClientOriginalExtension();
            $sssFilename = time().rand(1,100).'_SSS_File.'.$sssExtension;
            $sssFile->storeAs('public/documents_files',$sssFilename);
            $document->sss_file = $sssFilename;
            
        if($request->hasFile('tor_file')){
            $torFile = $request->file('tor_file');
            $torExtension = $torFile->getClientOriginalExtension();
            $torFilename = time().rand(1,100).'_Transcript_of_Records_File.'.$torExtension;
            $torFile->storeAs('public/documents_files',$torFilename);
            $document->transcript_of_records_file = $torFilename;
        }
            $document->save();
            sleep(2);
            return Redirect::to(url()->previous());
    }

    // public function updateDocuments(Request $request){
    //     if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
    //         foreach($request->file('memo_file') as $key => $value){
    //             $memoFileName = time().rand(1,100).'_Memo_File.'.$request->memo_file[$key]->extension();
    //             $request->memo_file[$key]->storeAs('public/evaluation_files',$memoFileName);
                
    //             $memo = new MemoTable;
    //             $memo->employee_id = $request->employee_id;
    //             $memo->memo_subject = $request->memo_subject[$key];
    //             $memo->memo_date = $request->memo_date[$key];
    //             $memo->memo_penalty = $request->memo_penalty[$key];
    //             $memo->memo_file = $memoFileName;
    //             $memo->save();
    //         }
    //     }

    //     if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
    //         foreach($request->file('evaluation_file') as $key => $value){
    //             $evaluationFileName = time().rand(1,100).'_Evaluation_File.'.$request->evaluation_file[$key]->extension();
    //             $request->evaluation_file[$key]->storeAs('public/evaluation_files',$evaluationFileName);
                
    //             $evaluation = new EvaluationTable;
    //             $evaluation->employee_id = $request->employee_id;
    //             $evaluation->evaluation_reason = $request->evaluation_reason[$key];
    //             $evaluation->evaluation_date = $request->evaluation_date[$key];
    //             $evaluation->evaluation_evaluated_by = $request->evaluation_evaluated_by[$key];
    //             $evaluation->evaluation_file = $evaluationFileName;
    //             $evaluation->save();
    //         }
    //     }

    //     if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
    //         foreach($request->file('contracts_file') as $key => $value){
    //             $contractsFileName = time().rand(1,100).'_Contracts_File.'.$request->contracts_file[$key]->extension();
    //             $request->contracts_file[$key]->storeAs('public/evaluation_files',$contractsFileName);
                
    //             $contracts = new ContractTable;
    //             $contracts->employee_id = $request->employee_id;
    //             $contracts->contracts_type = $request->contracts_type[$key];
    //             $contracts->contracts_date = $request->contracts_date[$key];
    //             $contracts->contracts_file = $contractsFileName;
    //             $contracts->save();
    //         }
    //     }
        
    //     if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
    //         foreach($request->file('resignation_file') as $key => $value){
    //             $resignationFileName = time().rand(1,100).'_Resignation_File.'.$request->resignation_file[$key]->extension();
    //             $request->resignation_file[$key]->storeAs('public/evaluation_files',$resignationFileName);
                
    //             $resignation = new ResignationTable;
    //             $resignation->employee_id = $request->employee_id;
    //             $resignation->resignation_reason = $request->resignation_reason[$key];
    //             $resignation->resignation_date = $request->resignation_date[$key];
    //             $resignation->resignation_file = $resignationFileName;
    //             $resignation->save();
    //         }
    //     }

    //     if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
    //         foreach($request->file('termination_file') as $key => $value){
    //             $terminationFileName = time().rand(1,100).'_Termination_File.'.$request->termination_file[$key]->extension();
    //             $request->termination_file[$key]->storeAs('public/evaluation_files',$terminationFileName);

    //             $termination = new TerminationTable;
    //             $termination->employee_id = $request->employee_id;
    //             $termination->termination_reason = $request->termination_reason[$key];
    //             $termination->termination_date = $request->termination_date[$key];
    //             $termination->termination_file = $terminationFileName;
    //             $termination->save();
    //         }
    //     }

    //     $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

    //     $employee = Document::where('employee_id',$request->employee_id)->first();
    //     if(!$employee){
    //         $document = new Document;
    //         $document->employee_id = $request->employee_id;
    //         $barangayClearanceFile = $request->file('barangay_clearance_file');
    //         $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
    //         $barangayClearanceFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Barangay_Clearance_File.'.$barangayClearanceExtension;
    //         $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
    //         $document->barangay_clearance_file = $barangayClearanceFilename;

    //         $birthcertificateFile = $request->file('birthcertificate_file');
    //         $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
    //         $birthcertificateFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Birth_Certificate_File.'.$birthcertificateExtension;
    //         $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
    //         $document->birthcertificate_file = $birthcertificateFilename;

    //         if($request->hasFile('diploma_file')){
    //             $diplomaFile = $request->file('diploma_file');
    //             $diplomaExtension = $diplomaFile->getClientOriginalExtension();
    //             $diplomaFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Diploma_File.'.$diplomaExtension;
    //             $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
    //             $document->diploma_file = $diplomaFilename;
    //         }

    //         $medicalCertificateFile = $request->file('medical_certificate_file');
    //         $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
    //         $medicalCertificateFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Medical_Certificate_File.'.$medicalCertificateExtension;
    //         $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
    //         $document->medical_certificate_file = $medicalCertificateFilename;

    //         if($request->hasFile('nbi_clearance_file')){
    //             $nbiFile = $request->file('nbi_clearance_file');
    //             $nbiExtension = $nbiFile->getClientOriginalExtension();
    //             $nbiFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_NBI_Clearance_File.'.$nbiExtension;
    //             $nbiFile->storeAs('public/documents_files',$nbiFilename);
    //             $document->nbi_clearance_file = $nbiFilename;
    //         }

    //         $pagibigFile = $request->file('pag_ibig_file');
    //         $pagibigExtension = $pagibigFile->getClientOriginalExtension();
    //         $pagibigFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Pag_ibig_File.'.$pagibigExtension;
    //         $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
    //         $document->pag_ibig_file = $pagibigFilename;

    //         $philhealthFile = $request->file('philhealth_file');
    //         $philhealthExtension = $philhealthFile->getClientOriginalExtension();
    //         $philhealthFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Philhealth_File.'.$philhealthExtension;
    //         $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
    //         $document->philhealth_file = $philhealthFilename;

    //         $policeClearanceFile = $request->file('police_clearance_file');
    //         $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
    //         $policeClearanceFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Police_Clearance_File.'.$policeClearanceExtension;
    //         $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
    //         $document->police_clearance_file = $policeClearanceFilename;

    //         $resumeFile = $request->file('resume_file');
    //         $resumeExtension = $resumeFile->getClientOriginalExtension();
    //         $resumeFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Resume_File.'.$resumeExtension;
    //         $resumeFile->storeAs('public/documents_files',$resumeFilename);
    //         $document->resume_file = $resumeFilename;

    //         $sssFile = $request->file('sss_file');
    //         $sssExtension = $sssFile->getClientOriginalExtension();
    //         $sssFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_SSS_File.'.$sssExtension;
    //         $sssFile->storeAs('public/documents_files',$sssFilename);
    //         $document->sss_file = $sssFilename;
            
    //     if($request->hasFile('tor_file')){
    //         $torFile = $request->file('tor_file');
    //         $torExtension = $torFile->getClientOriginalExtension();
    //         $torFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Transcript_of_Records_File.'.$torExtension;
    //         $torFile->storeAs('public/documents_files',$torFilename);
    //         $document->transcript_of_records_file = $torFilename;
    //     }

    //         $document->save();
    //         sleep(2);
    //         return Redirect::to(url()->previous());
    //     }
    //     else{
    //         if($request->hasFile('barangay_clearance_file')){
    //             if(file_exists('storage/documents_files/'.$request->barangay_clearance_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->barangay_clearance_filename));
    //             }

    //             $barangayClearanceFile = $request->file('barangay_clearance_file');
    //             $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
    //             $barangayClearanceFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Barangay_Clearance.'.$barangayClearanceExtension;
    //             $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
    //             $barangay_clearance_file = $barangayClearanceFilename;
    //         }
    //         else{
    //             $barangay_clearance_file = $request->barangay_clearance_filename;
    //         }

    //         if($request->hasFile('birthcertificate_file')){
    //             if(file_exists('storage/documents_files/'.$request->birthcertificate_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->birthcertificate_filename));
    //             }

    //             $birthcertificateFile = $request->file('birthcertificate_file');
    //             $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
    //             $birthcertificateFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Birth_Certificate.'.$birthcertificateExtension;
    //             $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
    //             $birthcertificate_file = $birthcertificateFilename;
    //         }
    //         else{
    //             $birthcertificate_file = $request->birthcertificate_filename;
    //         }

    //         if($request->hasFile('diploma_file')){
    //             if(file_exists('storage/documents_files/'.$request->diploma_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->diploma_filename));
    //             }

    //             $diplomaFile = $request->file('diploma_file');
    //             $diplomaExtension = $diplomaFile->getClientOriginalExtension();
    //             $diplomaFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Diploma.'.$diplomaExtension;
    //             $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
    //             $diploma_file = $diplomaFilename;
    //         }
    //         else{
    //             $diploma_file = $request->diploma_filename;
    //         }

    //         if($request->hasFile('medical_certificate_file')){
    //             if(file_exists('storage/documents_files/'.$request->medical_certificate_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->medical_certificate_filename));
    //             }

    //             $medicalCertificateFile = $request->file('medical_certificate_file');
    //             $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
    //             $medicalCertificateFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Medical_Certificate.'.$medicalCertificateExtension;
    //             $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
    //             $medical_certificate_file = $medicalCertificateFilename;
    //         }
    //         else{
    //             $medical_certificate_file = $request->medical_certificate_filename;
    //         }

    //         if($request->hasFile('nbi_clearance_file')){
    //             if(file_exists('storage/documents_files/'.$request->nbi_clearance_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->nbi_clearance_filename));
    //             }

    //             $nbiFile = $request->file('nbi_clearance_file');
    //             $nbiExtension = $nbiFile->getClientOriginalExtension();
    //             $nbiFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_NBI_Clearance.'.$nbiExtension;
    //             $nbiFile->storeAs('public/documents_files',$nbiFilename);
    //             $nbi_clearance_file = $nbiFilename;
    //         }
    //         else{
    //             $nbi_clearance_file = $request->nbi_clearance_filename;
    //         }

    //         if($request->hasFile('pag_ibig_file')){
    //             if(file_exists('storage/documents_files/'.$request->pag_ibig_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->pag_ibig_filename));
    //             }

    //             $pagibigFile = $request->file('pag_ibig_file');
    //             $pagibigExtension = $pagibigFile->getClientOriginalExtension();
    //             $pagibigFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Pagibig_Form.'.$pagibigExtension;
    //             $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
    //             $pag_ibig_file = $pagibigFilename;
    //         }
    //         else{
    //             $pag_ibig_file = $request->pag_ibig_filename;
    //         }

    //         if($request->hasFile('philhealth_file')){
    //             if(file_exists('storage/documents_files/'.$request->philhealth_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->philhealth_filename));
    //             }
    //             $philhealthFile = $request->file('philhealth_file');
    //             $philhealthExtension = $philhealthFile->getClientOriginalExtension();
    //             $philhealthFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Philhealth_Form.'.$philhealthExtension;
    //             $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
    //             $philhealth_file = $philhealthFilename;
    //         }
    //         else{
    //             $philhealth_file = $request->philhealth_filename;
    //         }

    //         if($request->hasFile('police_clearance_file')){
    //             if(file_exists('storage/documents_files/'.$request->police_clearance_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->police_clearance_filename));
    //             }

    //             $policeClearanceFile = $request->file('police_clearance_file');
    //             $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
    //             $policeClearanceFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Police_Clearance.'.$policeClearanceExtension;
    //             $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
    //             $police_clearance_file = $policeClearanceFilename;
    //         }
    //         else{
    //             $police_clearance_file = $request->police_clearance_filename;
    //         }

    //         if($request->hasFile('resume_file')){
    //             if(file_exists('storage/documents_files/'.$request->resume_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->resume_filename));
    //             }

    //             $resumeFile = $request->file('resume_file');
    //             $resumeExtension = $resumeFile->getClientOriginalExtension();
    //             $resumeFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Resume.'.$resumeExtension;
    //             $resumeFile->storeAs('public/documents_files',$resumeFilename);
    //             $resume_file = $resumeFilename;
    //         }
    //         else{
    //             $resume_file = $request->resume_filename;
    //         }

    //         if($request->hasFile('sss_file')){                
    //             if(file_exists('storage/documents_files/'.$request->sss_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->sss_filename));
    //             }

    //             $sssFile = $request->file('sss_file');
    //             $sssExtension = $sssFile->getClientOriginalExtension();
    //             $sssFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_SSS_Form.'.$sssExtension;
    //             $sssFile->storeAs('public/documents_files',$sssFilename);
    //             $sss_file = $sssFilename;
    //         }
    //         else{
    //             $sss_file = $request->sss_filename;
    //         }
        
    //         if($request->hasFile('tor_file')){
    //             if(file_exists('storage/documents_files/'.$request->transcript_of_records_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->transcript_of_records_filename));
    //             }
                    
    //             $torFile = $request->file('tor_file');
    //             $torExtension = $torFile->getClientOriginalExtension();
    //             $torFilename = $employee_number.'_'.strftime("%m-%d-%Y-%H-%M-%S").'_Transcript_of_Records.'.$torExtension;
    //             $torFile->storeAs('public/documents_files',$torFilename);
    //             $transcript_of_records_file = $torFilename;
    //         }
    //         else{
    //             $transcript_of_records_file = $request->transcript_of_records_filename;
    //         } 

    //         Document::where('employee_id',$request->employee_id)
    //             ->update([
    //                 'barangay_clearance_file' => $barangay_clearance_file,
    //                 'birthcertificate_file' => $birthcertificate_file,
    //                 'diploma_file' => $diploma_file,
    //                 'medical_certificate_file' => $medical_certificate_file,
    //                 'nbi_clearance_file' => $nbi_clearance_file,
    //                 'pag_ibig_file' => $pag_ibig_file,
    //                 'philhealth_file' => $philhealth_file,
    //                 'police_clearance_file' => $police_clearance_file,
    //                 'resume_file' => $resume_file,
    //                 'sss_file' => $sss_file,
    //                 'transcript_of_records_file' => $transcript_of_records_file
    //             ]);
    //             sleep(2);
    //             return Redirect::to(url()->previous());
    //     }
    // }

    public function children_data(Request $request){
        return DataTables::of(ChildrenTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function history_data(Request $request){
        return DataTables::of(History::where('employee_id',$request->id)->get())->make(true);
    }
    public function college_data(Request $request){
        return DataTables::of(CollegeTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function training_data(Request $request){
        return DataTables::of(TrainingTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function vocational_data(Request $request){
        return DataTables::of(VocationalTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function job_history_data(Request $request){
        return DataTables::of(JobHistoryTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function memo_data(Request $request){
        return DataTables::of(MemoTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function evaluation_data(Request $request){
        return DataTables::of(EvaluationTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function contracts_data(Request $request){
        return DataTables::of(ContractTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function resignation_data(Request $request){
        return DataTables::of(ResignationTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function termination_data(Request $request){
        return DataTables::of(TerminationTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function logs_data(Request $request){
        // return DataTables::of(LogsTable::where('employee_id',$request->id)->get())->make(true);
        $logs = LogsTable::selectRaw(
                        'users.id AS user_id,
                        logs_tables.id,
                        users.name AS username,
                        users.user_level,
                        logs_tables.created_at AS date,
                        DATE_FORMAT(logs_tables.created_at, "%b. %d, %Y, %h:%i %p") AS datetime, 
                        logs_tables.logs'
                        )
            ->where('employee_id',$request->id)
            ->join('users', 'users.id','user_id')
            ->get();
        return DataTables::of($logs)->make(true);
    }  

    public function college_delete(Request $request){
        $college_id = explode(",", $request->id);
        foreach($college_id as $id){
            CollegeTable::where('id', $id)->delete();
        }
    }
    
    public function children_delete(Request $request){
        $children_id = explode(",", $request->id);
        foreach($children_id as $id){
            ChildrenTable::where('id', $id)->delete();
        }
    }

    public function training_delete(Request $request){
        $training_id = explode(",", $request->id);
        foreach($training_id as $id){
            TrainingTable::where('id', $id)->delete();
        }
    }

    public function vocational_delete(Request $request){
        $vocational_id = explode(",", $request->id);
        foreach($vocational_id as $id){
            VocationalTable::where('id', $id)->delete();
        }
    }

    public function job_history_delete(Request $request){
        $job_history_id = explode(",", $request->id);
        foreach($job_history_id as $id){
            JobHistoryTable::where('id', $id)->delete();
        }
    }

    public function memo_delete(Request $request){
        $memo_id = explode(",", $request->id);
        foreach($memo_id as $id){
            MemoTable::where('id', $id)->delete();
        }
    }

    public function evaluation_delete(Request $request){
        $evaluation_id = explode(",", $request->id);
        foreach($evaluation_id as $id){
            EvaluationTable::where('id', $id)->delete();
        }
    }

    public function contracts_delete(Request $request){
        $contracts_id = explode(",", $request->id);
        foreach($contracts_id as $id){
            ContractTable::where('id', $id)->delete();
        }
    }

    public function resignation_delete(Request $request){
        $resignation_id = explode(",", $request->id);
        foreach($resignation_id as $id){
            ResignationTable::where('id', $id)->delete();
        }
    }

    public function termination_delete(Request $request){
        $termination_id = explode(",", $request->id);
        foreach($termination_id as $id){
            TerminationTable::where('id', $id)->delete();
        }
    }
}