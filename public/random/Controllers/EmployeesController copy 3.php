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
            'medical_histories.psychological_history'
        )
        ->where('personal_information_tables.id',$request->id)
        ->leftJoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->leftJoin('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')
        ->leftJoin('medical_histories','medical_histories.employee_id','personal_information_tables.id')  
        ->get();
        return DataTables::of($employees)->toJson();
    }

    public function insertImage(Request $request){

        $employeeImageFile = $request->file('employee_image');
        $employeeImageExtension = $employeeImageFile->getClientOriginalExtension();
        $employeeImageFileName = time().rand(1,100).'_Employee_Image.'.$employeeImageExtension;
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
        // $employee->employee_supervisor = $request->employee_supervisor;
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
        // $employee_number = WorkInformationTable::where('id', $request->id)->first()->employee_number;

        $userlogs = new UserLogs;
        $userlogs->user_id = auth()->user()->id;
        $userlogs->activity = "ADDED USER: User successfully added new employee with Employee Name: [$employee_details->first_name $employee_details->middle_name $employee_details->last_name].";
        $userlogs->save();
    }

    public function updatePersonalInformation(Request $request){
        if($request->filename_delete){
            unlink(public_path('storage/employee_images/'.$request->filename_delete));
        }
        $first_name_orig = $request->first_name_orig;
        $middle_name_orig = $request->middle_name_orig;
        $last_name_orig = $request->last_name_orig;
        $suffix_orig = $request->suffix_orig;
        $nickname_orig = $request->nickname_orig;
        $birthday_orig = $request->birthday_orig;
        $gender_orig = $request->gender_orig;
        $address_orig = $request->address_orig;
        $height_orig = $request->height_orig;
        $weight_orig = $request->weight_orig;
        $religion_orig = $request->religion_orig;
        $civil_status_orig = $request->civil_status_orig;
        $province_orig = $request->province_orig;
        $city_orig = $request->city_orig;
        $region_orig = $request->region_orig;
        $ownership_orig = $request->ownership_orig;
        $email_address_orig = $request->email_address_orig;
        $telephone_number_orig = $request->telephone_number_orig;
        $cellphone_number_orig = $request->cellphone_number_orig;
        $spouse_contact_number_orig = $request->spouse_contact_number_orig;
        $spouse_profession_orig = $request->spouse_profession_orig;
        $father_name_orig = $request->father_name_orig;
        $father_contact_number_orig = $request->father_contact_number_orig;
        $father_profession_orig = $request->father_profession_orig;
        $mother_name_orig = $request->mother_name_orig;
        $mother_contact_number_orig = $request->mother_contact_number_orig;
        $mother_profession_orig = $request->mother_profession_orig;
        $emergency_contact_name_orig = $request->emergency_contact_name_orig;
        $emergency_contact_relationship_orig = $request->emergency_contact_relationship_orig;
        $emergency_contact_number_orig = $request->emergency_contact_number_orig;

        $employee = PersonalInformationTable::find($request->id);
        $employee->employee_image = $request->employee_image == 'N\A' ? '' : $request->employee_image;
        $employee->first_name =  strtoupper($request->first_name_new);
        $employee->last_name = strtoupper($request->last_name_new); 
        $employee->middle_name = strtoupper($request->middle_name_new);
        $employee->suffix = strtoupper($request->suffix_new);
        $employee->nickname = strtoupper($request->nickname_new);
        $employee->birthday = $request->birthday_new;
        $employee->gender = $request->gender_new;
        $employee->civil_status = $request->civil_status_new;
        $employee->address = ucwords($request->address_new);
        $employee->ownership = ucwords($request->ownership_new);
        $employee->province = $request->province_new;
        $employee->city = $request->city_new;
        $employee->region = $request->region_new;
        $employee->height = $request->height_new;
        $employee->weight = $request->weight_new;
        $employee->religion = ucwords($request->religion_new);
        $employee->email_address = strtolower($request->email_address_new);
        $employee->telephone_number = $request->telephone_number_new;
        $employee->cellphone_number = $request->cellphone_number_new;
        $employee->spouse_name = ucwords($request->spouse_name);
        $employee->spouse_contact_number = $request->spouse_contact_number_new;
        $employee->spouse_profession = ucwords($request->spouse_profession_new);
        $employee->father_name = ucwords($request->father_name_new);
        $employee->father_contact_number = $request->father_contact_number_new;
        $employee->father_profession = ucwords($request->father_profession_new);
        $employee->mother_name = ucwords($request->mother_name_new);
        $employee->mother_contact_number = $request->mother_contact_number_new;
        $employee->mother_profession = ucwords($request->mother_profession_new);
        $employee->emergency_contact_name = ucwords($request->emergency_contact_name_new);
        $employee->emergency_contact_relationship = ucwords($request->emergency_contact_relationship_new);
        $employee->emergency_contact_number = $request->emergency_contact_number_new;
        $sql = $employee->save();

        if($sql){
            if($first_name_orig != $request->first_name_new){
                $first_name_change = "[First Name: FROM '$first_name_orig' TO '$employee->first_name']";
            }
            else{
                $first_name_change = NULL;
            }
            
            if($middle_name_orig != $request->middle_name_new){
                $middle_name_change = "[Middle Name: FROM '$middle_name_orig' TO '$employee->middle_name]";
            }
            else{
                $middle_name_change = NULL;
            }

            if($last_name_orig != $request->last_name_new){
                $last_name_change = "[Last Name: FROM '$last_name_orig' TO '$employee->last_name']";
            }
            else{
                $last_name_change = NULL;
            }

            if($suffix_orig != $request->suffix_new){
                $suffix_change = "[Suffix: FROM '$suffix_orig' TO '$employee->suffix']";
            }
            else{
                $suffix_change = NULL;
            }

            if($nickname_orig != $request->nickname_new){
                $nickname_change = "[Nickname: FROM '$nickname_orig' TO '$employee->nickname']";
            }
            else{
                $nickname_change = NULL;
            }

            if($birthday_orig != $request->birthday_new){
                $birthday_change = "[Birthday: FROM '$birthday_orig' TO '$employee->birthday']";
            }
            else{
                $birthday_change = NULL;
            }
            if($gender_orig != $request->gender_new){
                $gender_change = "[Gender: FROM '$gender_orig' TO '$employee->gender']";
            }
            else{
                $gender_change = NULL;
            }

            if($address_orig != $request->address_new){
                $address_change = "[Address: FROM '$address_orig' TO '$employee->address']";
            }
            else{
                $address_change = NULL;
            }

            if($ownership_orig != $request->ownership_new){
                $ownership_change = "[Ownership: FROM '$ownership_orig' TO '$employee->ownership']";
            }
            else{
                $ownership_change = NULL;
            }

            if($province_orig != $request->province_new){
                $province_change = "[Province: FROM '$province_orig' TO '$employee->province']";
            }
            else{
                $province_change = NULL;
            }

            if($city_orig != $request->city_new){
                $city_change = "[City: FROM '$city_orig' TO '$employee->city']";
            }
            else{
                $city_change = NULL;
            }

            if($region_orig != $request->region_new){
                $region_change = "[Region: FROM '$region_orig' TO '$employee->region']";
            }
            else{
                $region_change = NULL;
            }

            if($height_orig != $request->height_new){
                $height_change = "[Height: FROM '$height_orig' TO '$employee->height]";
            }
            else{
                $height_change = NULL;
            }

            if($weight_orig != $request->weight_new){
                $weight_change = "[Weight: FROM '$weight_orig' TO $employee->weight]";
            }
            else{
                $weight_change = NULL;
            }

            if($religion_orig != $request->religion_new){
                $religion_change = "[Religion: FROM '$religion_orig' TO '$employee->religion'].";
            }
            else{
                $religion_change = NULL;
            }

            if($civil_status_orig != $request->civil_status_new){
                $civil_status_change = "[Civil Status: FROM '$civil_status_orig' TO '$employee->civil_status']";
            }
            else{
                $civil_status_change = NULL;
            }

            if($email_address_orig != $request->email_address_new){
                $email_address_change = "[Email Address: FROM '$email_address_orig' TO '$employee->email_address']";
            }
            else{
                $email_address_change = NULL;
            }
            
            if($telephone_number_orig != $request->telephone_number_new){
                $telephone_number_change = "[Telephone Number: FROM '$telephone_number_orig' TO '$employee->telephone_number']";
            }
            else{
                $telephone_number_change = NULL;
            }

            if($cellphone_number_orig != $request->cellphone_number_new){
                $cellphone_number_change = "[Cellphone Number: FROM '$cellphone_number_orig' TO '$employee->cellphone_number']";
            }
            else{
                $cellphone_number_change = NULL;
            }

            if($spouse_contact_number_orig != $request->spouse_contact_number_new){
                $spouse_contact_number_change = "[Spouse Contact Number: FROM '$spouse_contact_number_orig' TO '$employee->spouse_contact_number']";
            }
            else{
                $spouse_contact_number_change = NULL;
            }

            if($spouse_profession_orig != $request->spouse_profession_new){
                $spouse_profession_change = "[Spouse Profession: FROM '$spouse_profession_orig' TO '$employee->spouse_profession']";
            }
            else{
                $spouse_profession_change = NULL;
            }

            if($father_name_orig != $request->father_name_new){
                $father_name_change = "[Father Name: FROM '$father_name_orig' TO '$employee->father_name']";
            }
            else{
                $father_name_change = NULL;
            }
            if($father_contact_number_orig != $request->father_contact_number_new){
                $father_contact_number_change = "[Father Contact Number: FROM '$father_contact_number_orig' TO '$employee->father_contact_number']";
            }
            else{
                $father_contact_number_change = NULL;
            }

            if($father_profession_orig != $request->father_profession_new){
                $father_profession_change = "[Father Profession: FROM '$father_profession_orig' TO '$employee->father_profession']";
            }
            else{
                $father_profession_change = NULL;
            }

            if($mother_name_orig != $request->mother_name_new){
                $mother_name_change = "[Mother Name: FROM '$mother_name_orig' TO '$employee->mother_name']";
            }
            else{
                $mother_name_change = NULL;
            }
            if($mother_contact_number_orig != $request->mother_contact_number_new){
                $mother_contact_number_change = "[Mother Contact Number: FROM '$mother_contact_number_orig' TO '$employee->mother_contact_number']";
            }
            else{
                $mother_contact_number_change = NULL;
            }

            if($mother_profession_orig != $request->mother_profession_new){
                $mother_profession_change = "[Mother Profession: FROM '$mother_profession_orig' TO '$employee->mother_profession']";
            }
            else{
                $mother_profession_change = NULL;
            }

            if($emergency_contact_name_orig != $request->emergency_contact_name_new){
                $emergency_contact_name_change = "[Emergency Contact Name: FROM '$emergency_contact_name_orig' TO '$employee->emergency_contact_name']";
            }
            else{
                $emergency_contact_name_change = NULL;
            }

            if($emergency_contact_relationship_orig != $request->emergency_contact_relationship_new){
                $emergency_contact_relationship_change = "[Emergency Contact Relationship: FROM '$emergency_contact_relationship_orig' TO '$employee->emergency_contact_relationship']";
            }
            else{
                $emergency_contact_relationship_change = NULL;
            }

            if($emergency_contact_number_orig != $request->emergency_contact_number_new){
                $emergency_contact_number_change = "[Emergency Contact Number: FROM '$emergency_contact_number_orig' TO '$employee->emergency_contact_number']";
            }
            else{
                $emergency_contact_number_change = NULL;
            }

            $result = 'true';
            $id = $employee->id;

            if(
               $first_name_orig != $request->first_name_new
            || $middle_name_orig != $request->middle_name_new 
            || $last_name_orig != $request->last_name_new
            || $suffix_orig != $request->suffix_new
            || $nickname_orig != $request->nickname_new
            || $birthday_orig != $request->birthday_new
            || $gender_orig != $request->gender_new
            || $address_orig != $request->address_new
            || $ownership_orig != $request->ownership_new
            || $province_orig != $request->province_new
            || $city_orig != $request->city_new
            || $region_orig != $request->region_new
            || $height_orig != $request->height_new
            || $weight_orig != $request->weight_new
            || $religion_orig != $request->religion_new
            || $civil_status_orig != $request->civil_status_new
            || $email_address_orig != $request->email_address_new
            || $telephone_number_orig != $request->telephone_number_new
            || $cellphone_number_orig != $request->cellphone_number_new
            || $spouse_contact_number_orig != $request->spouse_contact_number_new
            || $spouse_profession_orig != $request->spouse_profession_new
            || $father_name_orig != $request->father_name_new
            || $father_contact_number_orig != $request->father_contact_number_new
            || $father_profession_orig != $request->father_profession_new
            || $mother_name_orig != $request->mother_name_new
            || $mother_contact_number_orig != $request->mother_contact_number_new
            || $mother_profession_orig != $request->mother_profession_new
            || $emergency_contact_name_orig != $request->emergency_contact_name_new
            || $emergency_contact_relationship_orig != $request->emergency_contact_relationship_new
            || $emergency_contact_number_orig != $request->emergency_contact_number_new
            ){
                // $employee_number = WorkInformationTable::where('id', $request->id)->first()->employee_number;
                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE: 
                                        $first_name_change
                                        $middle_name_change
                                        $last_name_change
                                        $suffix_change
                                        $nickname_change
                                        $birthday_change
                                        $gender_change
                                        $address_change
                                        $ownership_change
                                        $province_change
                                        $city_change
                                        $region_change
                                        $height_change
                                        $weight_change
                                        $religion_change
                                        $civil_status_change
                                        $email_address_change
                                        $telephone_number_change
                                        $cellphone_number_change
                                        $spouse_contact_number_change
                                        $spouse_profession_change
                                        $father_name_change
                                        $father_contact_number_change
                                        $father_profession_change
                                        $mother_name_change
                                        $mother_contact_number_change
                                        $mother_profession_change
                                        $emergency_contact_name_change
                                        $emergency_contact_relationship_change
                                        $emergency_contact_number_change";
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

    public function updateWorkInformation(Request $request){
        $employee_number_orig = $request->employee_number_orig;
        $date_hired_orig = $request->date_hired_orig;
        $employee_shift_orig = $request->employee_shift_orig;
        $employee_company_orig = $request->employee_company_orig;
        $employee_branch_orig = $request->employee_branch_orig;
        $employee_department_orig = $request->employee_department_orig;
        $employee_position_orig = $request->employee_position_orig;
        $employment_status_orig = $request->employment_status_orig;
        $employment_origin_orig = $request->employment_origin_orig;
        $company_email_address_orig = $request->company_email_address_orig;
        $company_contact_number_orig = $request->company_contact_number_orig;
        $hmo_number_orig = $request->hmo_number_orig;
        $sss_number_orig = $request->sss_number_orig;
        $pag_ibig_number_orig = $request->pag_ibig_number_orig;
        $philhealth_number_orig = $request->philhealth_number_orig;
        $tin_number_orig = $request->tin_number_orig;
        $account_number_orig = $request->account_number_orig;

        $employee = WorkInformationTable::find($request->id);
        $employee->employee_id = $request->employee_id;
        $employee->employee_number = $request->employee_number_new;
        $employee->date_hired = $request->date_hired_new;
        $employee->employee_shift = $request->employee_shift_new;
        $employee->employee_company = $request->employee_company_new;
        $employee->employee_branch = $request->employee_branch_new;
        $employee->employee_department = $request->employee_department_new;
        $employee->employment_status = $request->employment_status_new;
        $employee->employment_origin = $request->employment_origin_new;
        $employee->employee_position = $request->employee_position_new;
        // $employee->employee_supervisor = $request->employee_supervisor;
        $employee->company_email_address = $request->company_email_address_new;
        $employee->company_contact_number = $request->company_contact_number_new;
        $employee->hmo_number = $request->hmo_number_new;
        $employee->sss_number = $request->sss_number_new;
        $employee->pag_ibig_number = $request->pag_ibig_number_new;
        $employee->philhealth_number = $request->philhealth_number_new;
        $employee->tin_number = $request->tin_number_new;
        $employee->account_number = $request->account_number_new;
        $sql = $employee->save();

        if($sql){
            if($employee_number_orig != $request->employee_number_new){
                $employee_number_change = "[Employee Number: FROM '$employee_number_orig' TO '$employee->employee_number']";
            }
            else{
                $employee_number_change = NULL;
            }
            if($date_hired_orig != $request->date_hired_new){
                $date_hired_change = "[Date Hired: FROM '$date_hired_orig' TO $employee->date_hired']";
            }
            else{
                $date_hired_change = NULL;
            }
            if($employee_shift_orig != $request->employee_shift_new){
                $employee_shift_change = "[Shift: FROM '$employee_shift_orig' TO '$employee->employee_shift']";
            }
            else{
                $employee_shift_change = NULL;
            }
            if($employee_company_orig != $request->employee_company_new){
                $employee_company_change = "[Company: FROM '$employee_company_orig' TO '$employee->employee_company']";
            }
            else{
                $employee_company_change = NULL;
            }
            if($employee_branch_orig != $request->employee_branch_new){
                $employee_branch_change = "[Branch: FROM '$employee_branch_orig' TO: '$employee->employee_branch']";
            }
            else{
                $employee_branch_change = NULL;
            }
            if($employee_department_orig != $request->employee_department_new){
                $employee_department_change = "[Department: FROM '$employee_department_orig' TO '$employee->employee_department']";
            }
            else{
                $employee_department_change = NULL;
            }
            if($employee_position_orig != $request->employee_position_new){
                $employee_position_change = "[Position: FROM '$employee_position_orig' TO '$employee->employee_position']";
            }
            else{
                $employee_position_change = NULL;
            }
            if($employment_status_orig != $request->employment_status_new){
                $employment_status_change = "[Employment Status: FROM '$employment_status_orig' TO '$employee->employment_status']";
            }
            else{
                $employment_status_change = NULL;
            }
            if($employment_origin_orig != $request->employment_origin_new){
                $employment_origin_change = "[Employment Origin: FROM '$employment_origin_orig' TO '$employee->employment_origin'].";
            }
            else{
                $employment_origin_change = NULL;
            }
            if($company_email_address_orig != $request->company_email_address_new){
                $company_email_address_change = "[Work Email Address: FROM '$company_email_address_orig' TO '$employee->company_email_address']";
            }
            else{
                $company_email_address_change = NULL;
            }
            if($company_contact_number_orig != $request->company_contact_number_new){
                $company_contact_number_change = "[Work Contact No.: FROM '$company_contact_number_orig' TO '$employee->company_contact_number']";
            }
            else{
                $company_contact_number_change = NULL;
            }
            if($hmo_number_orig != $request->hmo_number_new){
                $hmo_number_change = "[HMO No.: FROM '$hmo_number_orig' TO '$employee->hmo_number']";
            }
            else{
                $hmo_number_change = NULL;
            }
            if($sss_number_orig != $request->sss_number_new){
                $sss_number_change = "[SSS No.: FROM '$sss_number_orig' TO '$employee->sss_number']";
            }
            else{
                $sss_number_change = NULL;
            }
            if($pag_ibig_number_orig != $request->pag_ibig_number_new){
                $pag_ibig_number_change = "[Pag-Ibig No.: FROM '$pag_ibig_number_orig' TO '$employee->pag_ibig_number']";
            }
            else{
                $pag_ibig_number_change = NULL;
            }
            if($philhealth_number_orig != $request->philhealth_number_new){
                $philhealth_number_change = "[Philhealth No.: FROM '$philhealth_number_orig' TO '$employee->philhealth_number']";
            }
            else{
                $philhealth_number_change = NULL;
            }
            if($tin_number_orig != $request->tin_number_new){
                $tin_number_change = "[Tin No.: FROM '$tin_number_orig' TO '$employee->tin_number']";
            }
            else{
                $tin_number_change = NULL;
            }
            if($account_number_orig != $request->account_number_new){
                $account_number_change = "[Account No.: FROM '$account_number_orig' TO '$employee->account_number']";
            }
            else{
                $account_number_change = NULL;
            }

            $result = 'true';
            $id = $employee->id;

            if($employee_number_orig != $request->employee_number_new
            || $date_hired_orig != $request->date_hired_new
            || $employee_shift_orig != $request->employee_shift_new
            || $employee_company_orig != $request->employee_company_new
            || $employee_branch_orig != $request->employee_branch_new
            || $employee_department_orig != $request->employee_department_new
            || $employee_position_orig != $request->employee_position_new
            || $employment_status_orig != $request->employment_status_new
            || $employment_origin_orig != $request->employment_origin_new
            || $company_email_address_orig != $request->company_email_address_new
            || $company_contact_number_orig != $request->company_contact_number_new
            || $hmo_number_orig != $request->hmo_number_new
            || $sss_number_orig != $request->sss_number_new
            || $pag_ibig_number_orig != $request->pag_ibig_number_new
            || $philhealth_number_orig != $request->philhealth_number_new
            || $tin_number_orig != $request->tin_number_new
            || $account_number_orig != $request->account_number_new
            ){

                // $employee_number = WorkInformationTable::where('id', $request->id)->first()->employee_number;
                // $employee_details = PersonalInformationTable::where('id', $request->id)->first();
                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
                                        $employee_number_change
                                        $date_hired_change
                                        $employee_shift_change
                                        $employee_company_change
                                        $employee_branch_change
                                        $employee_department_change
                                        $employee_position_change
                                        $employment_status_change
                                        $employment_origin_change
                                        $company_email_address_change
                                        $company_contact_number_change
                                        $hmo_number_change
                                        $sss_number_change
                                        $pag_ibig_number_change
                                        $philhealth_number_change
                                        $tin_number_change
                                        $account_number_change
                                        ";
                $employee_logs->save();

                $employee_history_logs = new History;
                $employee_history_logs->employee_id = $request->id;
                $employee_history_logs->history = "$employee_shift_change
                                                  $employee_position_change
                                                  $employee_company_change
                                                  $employee_branch_change
                                                  $employment_status_change
                                                  $employment_origin_change
                                                  ";
                $employee_history_logs->save();
            }

        }
        else{
            $result = 'false';
            $id = '';
        }
        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function updateEducationalAttainment(Request $request){
        $employee = EducationalAttainment::first();
        if(is_null($employee)){
            if($request->secondary_school_name_new 
            && $request->secondary_school_address_new
            && $request->secondary_school_inclusive_years_from_new
            && $request->secondary_school_inclusive_years_to_new
            && $request->primary_school_name
            && $request->primary_school_address
            && $request->primary_school_inclusive_years_from
            && $request->primary_school_inclusive_years_to
            ){
                $employee = new EducationalAttainment;
                $employee->employee_id = $request->employee_id;
                $employee->secondary_school_name = $request->secondary_school_name_new;
                $employee->secondary_school_address = $request->secondary_school_address_new;
                $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from_new;
                $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to_new;
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

            $sql = EducationalAttainment::where('employee_id',$request->employee_id)
            ->update([
                'secondary_school_name' => $request->secondary_school_name_new,
                'secondary_school_address' => $request->secondary_school_address_new,
                'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from_new,
                'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to_new
                // 'primary_school_name' => $request->primary_school_name,
                // 'primary_school_address' => $request->primary_school_address,
                // 'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
                // 'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to
            ]);

            if($sql){
                if($secondary_school_name_orig != $request->secondary_school_name_new){
                    $secondary_school_name_change = "[Name: FROM '$secondary_school_name_orig' TO '$request->secondary_school_name_new']";
                    $secondary_school_title = "[Secondary Education]";
                }
                else{
                    $secondary_school_name_change = NULL;
                }
                if($secondary_school_address_orig != $request->secondary_school_address_new){
                    $secondary_school_address_change = "[Address: FROM '$secondary_school_address_orig' TO '$request->secondary_school_address_new']";
                    $secondary_school_title = "[Secondary Education]";
                }
                else{
                    $secondary_school_address_change = NULL;
                }
                if($secondary_school_inclusive_years_from_orig != $request->secondary_school_inclusive_years_from_new){
                    $secondary_school_inclusive_years_from_change = "[Inclusive Start Year/Month: FROM '$secondary_school_inclusive_years_from_orig' TO '$request->secondary_school_inclusive_years_from_new']";
                    $secondary_school_title = "[Secondary Education]";
                }
                else{
                    $secondary_school_inclusive_years_from_change = NULL;
                }
                if($secondary_school_inclusive_years_to_orig != $request->secondary_school_inclusive_years_to_new){
                    $secondary_school_inclusive_years_to_change = "[Inclusive End Year/Month: FROM '$secondary_school_inclusive_years_to_orig' TO '$request->secondary_school_inclusive_years_to_new']";
                    $secondary_school_title = "[Secondary Education]";
                }
                else{
                    $secondary_school_inclusive_years_to_change = NULL;
                }

                $result = 'true';
                $id = $employee->id;

                if($secondary_school_name_orig != $request->secondary_school_name_new 
                    || $secondary_school_address_orig != $request->secondary_school_address_new
                    || $secondary_school_inclusive_years_from_orig != $request->secondary_school_inclusive_years_from_new
                    || $secondary_school_inclusive_years_to_orig != $request->secondary_school_inclusive_years_to_new
                ){

                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $request->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
                                            $secondary_school_title
                                            $secondary_school_name_change
                                            $secondary_school_address_change
                                            $secondary_school_inclusive_years_from_change
                                            $secondary_school_inclusive_years_to_change
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

        // else{
        //     $employee = EducationalAttainment::find($request->id);
        //     $employee->employee_id = $request->employee_id;
        //     $employee->secondary_school_name = $request->secondary_school_name;
        //     $employee->secondary_school_address = $request->secondary_school_address;
        //     $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
        //     $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
        //     $employee->primary_school_name = $request->primary_school_name;
        //     $employee->primary_school_address = $request->primary_school_address;
        //     $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
        //     $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
        //     $employee->save();
        // }
    }

    public function updateMedicalHistory(Request $request){
        $employee = MedicalHistory::first();
        if(is_null($employee)){
            if($request->past_medical_condition 
            && $request->allergies 
            && $request->medication 
            && $request->psychological_history
            ){
                $employee = new MedicalHistory;
                $employee->employee_id = $request->employee_id;
                $employee->past_medical_condition = ucwords($request->past_medical_condition);
                $employee->allergies = ucwords($request->allergies);
                $employee->medication = ucwords($request->medication);
                $employee->psychological_history = ucwords($request->psychological_history);
                $employee->save();
            }
        }
        else{
            MedicalHistory::where('employee_id',$request->employee_id)
            ->update([
                'past_medical_condition' => $employee->past_medical_condition,
                'allergies' => $employee->allergies,
                'medication' => $employee->medication,
                'psychological_history' => $employee->psychological_history
            ]);
        }
        // else{
        //     if($request->past_medical_condition && $request->allergies && $request->medication && $request->psychological_history){
        //         $employee = MedicalHistory::find($request->id);
        //         $employee->employee_id = $request->employee_id;
        //         $employee->past_medical_condition = ucwords($request->past_medical_condition);
        //         $employee->allergies = ucwords($request->allergies);
        //         $employee->medication = ucwords($request->medication);
        //         $employee->psychological_history = ucwords($request->psychological_history);
        //         $employee->save();
        //     }
        // }
    }

    public function updateCompensationBenefits(Request $request){
        $employee = CompensationBenefits::first();
        if(is_null($employee)){
            if($request->employee_salary 
            && $request->employee_incentives 
            && $request->employee_overtime_pay 
            && $request->employee_bonus 
            && $request->employee_insurance
            ){
                $employee = new CompensationBenefits;
                $employee->employee_id = $request->employee_id;
                $employee->employee_salary = $request->employee_salary;
                $employee->employee_incentives = $request->employee_incentives;
                $employee->employee_overtime_pay = $request->employee_overtime_pay;
                $employee->employee_bonus = $request->employee_bonus;
                $employee->employee_insurance = $request->employee_insurance;
                $employee->save();
            }
        }
        else{
            CompensationBenefits::where('employee_id',$request->employee_id)
            ->update([
                'employee_salary' =>$request->employee_salary,
                'employee_incentives' => $request->employee_incentives,
                'employee_overtime_pay' => $request->employee_overtime_pay,
                'employee_bonus' => $request->employee_bonus,
                'employee_insurance' => $request->employee_insurance
            ]);
            // if($request->employee_salary && $request->employee_incentives && $request->employee_overtime_pay && $request->employee_bonus && $request->employee_insurance){
            //     $employee = CompensationBenefits::find($request->id);
            //     $employee->employee_id = $request->employee_id;
            //     $employee->employee_salary = $request->employee_salary;
            //     $employee->employee_incentives = $request->employee_incentives;
            //     $employee->employee_overtime_pay = $request->employee_overtime_pay;
            //     $employee->employee_bonus = $request->employee_bonus;
            //     $employee->employee_insurance = $request->employee_insurance;
            //     $employee->save();
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

    // public function saveDocuments(Request $request)
    // {   
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
    
    //         $document = new Document;
    //         $document->employee_id = $request->employee_id;
    //         $barangayClearanceFile = $request->file('barangay_clearance_file');
    //         $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
    //         $barangayClearanceFilename = time().rand(1,100).'_Barangay_Clearance_File.'.$barangayClearanceExtension;
    //         $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
    //         $document->barangay_clearance_file = $barangayClearanceFilename;

    //         $birthcertificateFile = $request->file('birthcertificate_file');
    //         $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
    //         $birthcertificateFilename = time().rand(1,100).'_Birth_Certificate_File.'.$birthcertificateExtension;
    //         $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
    //         $document->birthcertificate_file = $birthcertificateFilename;

    //     if($request->hasFile('diploma_file')){
    //         $diplomaFile = $request->file('diploma_file');
    //         $diplomaExtension = $diplomaFile->getClientOriginalExtension();
    //         $diplomaFilename = time().rand(1,100).'_Diploma_File.'.$diplomaExtension;
    //         $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
    //         $document->diploma_file = $diplomaFilename;
    //     }

    //         $medicalCertificateFile = $request->file('medical_certificate_file');
    //         $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
    //         $medicalCertificateFilename = time().rand(1,100).'_Medical_Certificate_File.'.$medicalCertificateExtension;
    //         $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
    //         $document->medical_certificate_file = $medicalCertificateFilename;

    //     if($request->hasFile('nbi_clearance_file')){
    //         $nbiFile = $request->file('nbi_clearance_file');
    //         $nbiExtension = $nbiFile->getClientOriginalExtension();
    //         $nbiFilename = time().rand(1,100).'_NBI_Clearance_File.'.$nbiExtension;
    //         $nbiFile->storeAs('public/documents_files',$nbiFilename);
    //         $document->nbi_clearance_file = $nbiFilename;
    //     }

    //         $pagibigFile = $request->file('pag_ibig_file');
    //         $pagibigExtension = $pagibigFile->getClientOriginalExtension();
    //         $pagibigFilename = time().rand(1,100).'_Pag_ibig_File.'.$pagibigExtension;
    //         $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
    //         $document->pag_ibig_file = $pagibigFilename;

    //         $philhealthFile = $request->file('philhealth_file');
    //         $philhealthExtension = $philhealthFile->getClientOriginalExtension();
    //         $philhealthFilename = time().rand(1,100).'_Philhealth_File.'.$philhealthExtension;
    //         $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
    //         $document->philhealth_file = $philhealthFilename;

    //         $policeClearanceFile = $request->file('police_clearance_file');
    //         $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
    //         $policeClearanceFilename = time().rand(1,100).'_Police_Clearance_File.'.$policeClearanceExtension;
    //         $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
    //         $document->police_clearance_file = $policeClearanceFilename;

    //         $resumeFile = $request->file('resume_file');
    //         $resumeExtension = $resumeFile->getClientOriginalExtension();
    //         $resumeFilename = time().rand(1,100).'_Resume_File.'.$resumeExtension;
    //         $resumeFile->storeAs('public/documents_files',$resumeFilename);
    //         $document->resume_file = $resumeFilename;

    //         $sssFile = $request->file('sss_file');
    //         $sssExtension = $sssFile->getClientOriginalExtension();
    //         $sssFilename = time().rand(1,100).'_SSS_File.'.$sssExtension;
    //         $sssFile->storeAs('public/documents_files',$sssFilename);
    //         $document->sss_file = $sssFilename;
            
    //     if($request->hasFile('tor_file')){
    //         $torFile = $request->file('tor_file');
    //         $torExtension = $torFile->getClientOriginalExtension();
    //         $torFilename = time().rand(1,100).'_Transcript_of_Records_File.'.$torExtension;
    //         $torFile->storeAs('public/documents_files',$torFilename);
    //         $document->transcript_of_records_file = $torFilename;
    //     }
    //         $document->save();
    //         sleep(2);
    //         return Redirect::to(url()->previous());
    // }

    // public function updateDocuments(Request $request){

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

    //         if($request->hasFile('barangay_clearance_file')){
    //             if(file_exists('storage/documents_files/'.$request->barangay_clearance_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->barangay_clearance_filename));
    //             }

    //             $barangayClearanceFile = $request->file('barangay_clearance_file');
    //             $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
    //             $barangayClearanceFilename = time().rand(1,100).'_Barangay_Clearance.'.$barangayClearanceExtension;
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
    //             $birthcertificateFilename = time().rand(1,100).'_Birth_Certificate.'.$birthcertificateExtension;
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
    //             $diplomaFilename = time().rand(1,100).'_Diploma.'.$diplomaExtension;
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
    //             $medicalCertificateFilename = time().rand(1,100).'_Medical_Certificate.'.$medicalCertificateExtension;
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
    //             $nbiFilename = time().rand(1,100).'_NBI_Clearance.'.$nbiExtension;
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
    //             $pagibigFilename = time().rand(1,100).'_Pagibig_Form.'.$pagibigExtension;
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
    //             $philhealthFilename = time().rand(1,100).'_Philhealth_Form.'.$philhealthExtension;
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
    //             $policeClearanceFilename = time().rand(1,100).'_Police_Clearance.'.$policeClearanceExtension;
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
    //             $resumeFilename = time().rand(1,100).'_Resume.'.$resumeExtension;
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
    //             $sssFilename = time().rand(1,100).'_SSS_Form.'.$sssExtension;
    //             $sssFile->storeAs('public/documents_files',$sssFilename);
    //             $sss_file = $sssFilename;
    //         }
    //         else{
    //             $sss_file = $request->sss_filename;
    //         }

    //         if($request->hasFile('resume_file')){
    //             if(file_exists('storage/documents_files/'.$request->sss_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->sss_filename));
    //             }

    //             $resumeFile = $request->file('resume_file');
    //             $resumeExtension = $resumeFile->getClientOriginalExtension();
    //             $resumeFilename = time().rand(1,100).'_Resume.'.$resumeExtension;
    //             $resumeFile->storeAs('public/documents_files',$resumeFilename);
    //             $resume_file = $resumeFilename;
    //         }
    //         else{
    //             $resume_file = $request->resume_filename;
    //         } 
        
    //         if($request->hasFile('tor_file')){
    //             if(file_exists('storage/documents_files/'.$request->transcript_of_records_filename)){
    //                 unlink(public_path('storage/documents_files/'.$request->transcript_of_records_filename));
    //             }
                    
    //             $torFile = $request->file('tor_file');
    //             $torExtension = $torFile->getClientOriginalExtension();
    //             $torFilename = time().rand(1,100).'_Transcript_of_Records.'.$torExtension;
    //             $torFile->storeAs('public/documents_files',$torFilename);
    //             $transcript_of_records_file = $torFilename;
    //         }
    //         else{
    //             $transcript_of_records_file = $request->transcript_of_records_filename;
    //         } 
        
    //     Document::where('employee_id',$request->employee_id)
    //         ->update([
    //             'barangay_clearance_file' => $barangay_clearance_file,
    //             'birthcertificate_file' => $birthcertificate_file,
    //             'diploma_file' => $diploma_file,
    //             'medical_certificate_file' => $medical_certificate_file,
    //             'nbi_clearance_file' => $nbi_clearance_file,
    //             'pag_ibig_file' => $pag_ibig_file,
    //             'philhealth_file' => $philhealth_file,
    //             'police_clearance_file' => $police_clearance_file,
    //             'resume_file' => $resume_file,
    //             'sss_file' => $sss_file,
    //             'transcript_of_records_file' => $transcript_of_records_file
    //         ]);
    //         sleep(2);
    //         return Redirect::to(url()->previous());
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
                        logs'
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
}