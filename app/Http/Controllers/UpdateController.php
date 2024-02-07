<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\traits\Logs;
use Carbon\Carbon;
use App\Models\Benefits;
use App\Models\Branch;
use App\Models\Children;
use App\Models\College;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Department;
use App\Models\Document;
use App\Models\EducationalAttainment;
use App\Models\EmployeeLogs;
use App\Models\Evaluation;
use App\Models\Hmo;
use App\Models\JobHistory;
use App\Models\MedicalHistory;
use App\Models\Memo;
use App\Models\PersonalInformationTable;
use App\Models\Position;
use App\Models\Resignation;
use App\Models\Shift;
use App\Models\Termination;
use App\Models\Training;
use App\Models\UserLogs;
use App\Models\Vocational;
use App\Models\WorkInformationTable;
use App\Models\WorkLogs;
use DataTables;
use Str;

class UpdateController extends Controller{

    use Logs;

    public function updatePersonalInformation(Request $request){
        if($request->filename_delete){
            if(file_exists('storage/employee_images/'.$request->filename_delete)){
                unlink('storage/employee_images/'.$request->filename_delete);
            }
        }
        $employee = PersonalInformationTable::find($request->id);
        $employee->employee_image = $request->employee_image == '' ? '' : $request->employee_image;
        $data = PersonalInformationTable::where('id', $request->id)->select('empno', 'first_name', 'middle_name', 'last_name', 'suffix', 'nickname', 'birthday', 'gender', 'address', 'ownership', 'province', 'city', 'region', 'blood_type', 'height', 'weight', 'religion', 'civil_status', 'email_address', 'telephone_number', 'cellphone_number', 'spouse_name', 'spouse_contact_number', 'spouse_profession', 'father_name', 'father_contact_number', 'father_profession', 'mother_name', 'mother_contact_number', 'mother_profession', 'emergency_contact_name', 'emergency_contact_relationship', 'emergency_contact_number', 'employee_image')->first();

        $changes = 0;
        if($request->employee_image != $data->employee_image){
            $changes++;
            $employee_image_update = '[IMAGE CHANGE: USER MODIFY IMAGE OF THIS EMPLOYEE]';
        }
        else{
            $employee_image_update = NULL;
        }

        if($request->first_name != $data->first_name){
            $changes++;
            $first_name_change = "[FIRST NAME: FROM '$data->first_name' TO '".strtoupper($request->first_name)."']";
        }
        else{
            $first_name_change = NULL;
        }

        if($request->middle_name != $data->middle_name){
            $changes++;
            $middle_name_change = "[MIDDLE NAME: FROM '$data->middle_name' TO '".strtoupper($request->middle_name)."']";
        }
        else{
            $middle_name_change = NULL;
        }

        if($request->last_name != $data->last_name){
            $changes++;
            $last_name_change = "[LAST NAME: FROM '$data->last_name' TO '".strtoupper($request->last_name)."']";
        }
        else{
            $last_name_change = NULL;
        }

        if($request->suffix != $data->suffix){
            $changes++;
            $suffix_change = "[SUFFIX: FROM '$data->suffix' TO '".strtoupper($request->suffix)."']";
        }
        else{
            $suffix_change = NULL;
        }

        if($request->nickname != $data->nickname){
            $changes++;
            $nickname_change = "[NICKNAME: FROM '$data->nickname' TO '".strtoupper($request->nickname)."']";
        }
        else{
            $nickname_change = NULL;
        }

        if($request->birthday != $data->birthday){
            $changes++;
            $birthday_change = "[BIRTHDAY: FROM '".Carbon::parse($data->birthday)->format('F d, Y')."' TO '".Carbon::parse($request->birthday)->format('F d, Y')."']";
        }
        else{
            $birthday_change = NULL;
        }

        if($request->gender != $data->gender){
            $changes++;
            $data->gender = $data->gender ? $data->gender : 'N/A';
            $gender_change = "[GENDER: FROM '$data->gender' TO '$request->gender']";
        }
        else{
            $gender_change = NULL;
        }

        if($request->address != $data->address){
            $changes++;
            $data->address = $data->address ? $data->address : 'N/A';
            $address_change = "[ADDRESS: FROM '$data->address' TO '$request->address']";
        }
        else{
            $address_change = NULL;
        }

        if($request->ownership != $data->ownership){
            $changes++;
            $data->ownership = $data->ownership ? $data->ownership : 'N/A';
            $ownership_change = "[OWNERSHIP: FROM '$data->ownership' TO '$request->ownership']";
        }
        else{
            $ownership_change = NULL;
        }

        if($request->province != $data->province){
            $changes++;
            $data->province = $data->province ? $data->province : 'N/A';
            $province_change = "[PROVINCE: FROM '$data->province' TO '$request->province']";
        }
        else{
            $province_change = NULL;
        }

        if($request->city != $data->city){
            $changes++;
            $data->city = $data->city ? $data->city : 'N/A';
            $city_change = "[CITY: FROM '$data->city' TO '$request->city']";
        }
        else{
            $city_change = NULL;
        }

        if($request->region != $data->region){
            $changes++;
            $data->region = $data->region ? $data->region : 'N/A';
            $region_change = "[REGION: FROM '$data->region' TO '$request->region']";
        }
        else{
            $region_change = NULL;
        }

        if($request->blood_type != $data->blood_type){
            $changes++;
            $blood_type_change = "[BLOOD TYPE: FROM '$data->blood_type' TO '$request->blood_type']";
        }
        else{
            $blood_type_change = NULL;
        }

        if($request->height != $data->height){
            $changes++;
            $data->height = $data->height ? $data->height : 'N/A';
            $height_change = "[HEIGHT: FROM '$data->height' TO '$request->height']";
        }
        else{
            $height_change = NULL;
        }

        if($request->weight != $data->weight){
            $changes++;
            $data->weight = $data->weight ? $data->weight : 'N/A';
            $weight_change = "[WEIGHT: FROM '$data->weight' TO '$request->weight']";
        }
        else{
            $weight_change = NULL;
        }

        if($request->religion != $data->religion){
            $changes++;
            $data->religion = $data->religion ? $data->religion : 'N/A';
            $religion_change = "[RELIGION: FROM '$data->religion' TO '$request->religion']";
        }
        else{
            $religion_change = NULL;
        }

        if($request->civil_status != $data->civil_status){
            $changes++;
            $data->civil_status = $data->civil_status ? $data->civil_status : 'N/A';
            $civil_status_change = "[CIVIL STATUS: FROM '$data->civil_status' TO '$request->civil_status']";
        }
        else{
            $civil_status_change = NULL;
        }

        if($request->email_address != $data->email_address){
            $changes++;
            $data->email_address = $data->email_address ? $data->email_address : 'N/A';
            $email_address_change = "[EMAIL ADDRESS: FROM '$data->email_address' TO '$request->email_address']";
        }
        else{
            $email_address_change = NULL;
        }

        if($request->telephone_number != $data->telephone_number){
            $changes++;
            $data->telephone_number = $data->telephone_number ? $data->telephone_number : 'N/A';
            $telephone_number_change = "[TELEPHONE NUMBER: FROM '$data->telephone_number' TO '$request->telephone_number']";
        }
        else{
            $telephone_number_change = NULL;
        }

        if($request->cellphone_number != $data->cellphone_number){
            $changes++;
            $data->cellphone_number = $data->cellphone_number ? $data->cellphone_number : 'N/A';
            $cellphone_number_change = "[CELLPHONE NUMBER: FROM '$data->cellphone_number' TO '$request->cellphone_number']";
        }
        else{
            $cellphone_number_change = NULL;
        }

        if($request->spouse_name != $data->spouse_name){
            $changes++;
            $data->spouse_name = $data->spouse_name ? $data->spouse_name : 'N/A';
            $spouse_name_change = "[SPOUSE NAME: FROM '$data->spouse_name' TO '".strtoupper($request->spouse_name)."']";
        }
        else{
            $spouse_name_change = NULL;
        }

        if($request->spouse_contact_number != $data->spouse_contact_number){
            $changes++;
            $data->spouse_contact_number = $data->spouse_contact_number ? $data->spouse_contact_number : 'N/A';
            $spouse_contact_number_change = "[SPOUSE CONTACT NUMBER: FROM '$data->spouse_contact_number' TO '$request->spouse_contact_number']";
        }
        else{
            $spouse_contact_number_change = NULL;
        }

        if($request->spouse_profession != $data->spouse_profession){
            $changes++;
            $data->spouse_profession = $data->spouse_profession ? $data->spouse_profession : 'N/A';
            $spouse_profession_change = "[SPOUSE PROFESSION: FROM '$data->spouse_profession' TO '$request->spouse_profession']";
        }
        else{
            $spouse_profession_change = NULL;
        }

        if($request->father_name != $data->father_name){
            $changes++;
            $data->father_name = $data->father_name ? $data->father_name : 'N/A';
            $father_name_change = "[FATHER'S NAME: FROM '$data->father_name' TO '".strtoupper($request->father_name)."']";
        }
        else{
            $father_name_change = NULL;
        }

        if($request->father_contact_number != $data->father_contact_number){
            $changes++;
            $data->father_contact_number = $data->father_contact_number ? $data->father_contact_number : 'N/A';
            $father_contact_number_change = "[FATHER'S CONTACT NUMBER: FROM '$data->father_contact_number' TO '$request->father_contact_number']";
        }
        else{
            $father_contact_number_change = NULL;
        }

        if($request->father_profession != $data->father_profession){
            $changes++;
            $data->father_profession = $data->father_profession ? $data->father_profession : 'N/A';
            $father_profession_change = "[FATHER'S PROFESSION: FROM '$data->father_profession' TO '$request->father_profession']";
        }
        else{
            $father_profession_change = NULL;
        }

        if($request->mother_name != $data->mother_name){
            $changes++;
            $data->mother_name = $data->mother_name ? $data->mother_name : 'N/A';
            $mother_name_change = "[MOTHER'S MAIDEN NAME: FROM '$data->mother_name' TO '".strtoupper($request->mother_name)."']";
        }
        else{
            $mother_name_change = NULL;
        }

        if($request->mother_contact_number != $data->mother_contact_number){
            $changes++;
            $data->mother_contact_number = $data->mother_contact_number ? $data->mother_contact_number : 'N/A';
            $mother_contact_number_change = "[MOTHER'S CONTACT NUMBER: FROM '$data->mother_contact_number' TO '$request->mother_contact_number']";
        }
        else{
            $mother_contact_number_change = NULL;
        }

        if($request->mother_profession != $data->mother_profession){
            $changes++;
            $data->mother_profession = $data->mother_profession ? $data->mother_profession : 'N/A';
            $mother_profession_change = "[MOTHER'S PROFESSION: FROM '$data->mother_profession' TO '$request->mother_profession']";
        }
        else{
            $mother_profession_change = NULL;
        }

        if($request->emergency_contact_name != $data->emergency_contact_name){
            $changes++;
            $data->emergency_contact_name = $data->emergency_contact_name ? $data->emergency_contact_name : 'N/A';
            $emergency_contact_name_change = "[EMERGENCY CONTACT NAME: FROM '$data->emergency_contact_name' TO '".strtoupper($request->emergency_contact_name)."']";
        }
        else{
            $emergency_contact_name_change = NULL;
        }

        if($request->emergency_contact_relationship != $data->emergency_contact_relationship){
            $changes++;
            $data->emergency_contact_relationship = $data->emergency_contact_relationship ? $data->emergency_contact_relationship : 'N/A';
            $emergency_contact_relationship_change = "[EMERGENCY CONTACT RELATIONSHIP: FROM '$data->emergency_contact_relationship' TO '$request->emergency_contact_relationship']";
        }
        else{
            $emergency_contact_relationship_change = NULL;
        }

        if($request->emergency_contact_number != $data->emergency_contact_number){
            $changes++;
            $data->emergency_contact_number = $data->emergency_contact_number ? $data->emergency_contact_number : 'N/A';
            $emergency_contact_number_change = "[EMERGENCY CONTACT NUMBER: FROM '$data->emergency_contact_number' TO '$request->emergency_contact_number']";
        }
        else{
            $emergency_contact_number_change = NULL;
        }

        $update = PersonalInformationTable::find($request->id)
        ->update([
            'employee_image'                 => $request->employee_image,
            'first_name'                     => strtoupper($request->first_name),
            'middle_name'                    => strtoupper($request->middle_name),
            'last_name'                      => strtoupper($request->last_name),
            'suffix'                         => strtoupper($request->suffix),
            'nickname'                       => strtoupper($request->nickname ? $request->nickname : $request->first_name),
            'birthday'                       => $request->birthday,
            'gender'                         => $request->gender,
            'address'                        => $request->address,
            'ownership'                      => $request->ownership,
            'province'                       => $request->province,
            'city'                           => $request->city,
            'region'                         => $request->region,
            'blood_type'                     => $request->blood_type,
            'height'                         => $request->height,
            'weight'                         => $request->weight,
            'religion'                       => strtoupper($request->religion),
            'civil_status'                   => $request->civil_status,
            'email_address'                  => $request->email_address,
            'telephone_number'               => $request->telephone_number,
            'cellphone_number'               => $request->cellphone_number,
            'father_name'                    => strtoupper($request->father_name),
            'father_contact_number'          => $request->father_contact_number,
            'father_profession'              => strtoupper($request->father_profession),
            'mother_name'                    => strtoupper($request->mother_name),
            'mother_contact_number'          => $request->mother_contact_number,
            'mother_profession'              => strtoupper($request->mother_profession),
            'emergency_contact_name'         => strtoupper($request->emergency_contact_name),
            'emergency_contact_relationship' => strtoupper($request->emergency_contact_relationship),
            'emergency_contact_number'       => $request->emergency_contact_number,
            'stat'                           => $request->completed
        ]);

        if($update){
            $result = 'true';
            $id = $employee->id;

            if($changes > 0){
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S PERSONAL DETAILS ($data->first_name $data->middle_name $data->last_name with Employee No.$data->empno) $first_name_change $middle_name_change $last_name_change $suffix_change $nickname_change $birthday_change $gender_change $address_change $ownership_change $province_change $city_change $region_change $blood_type_change $height_change $weight_change $religion_change $civil_status_change $email_address_change $telephone_number_change $cellphone_number_change $spouse_name_change $spouse_contact_number_change $spouse_profession_change $father_name_change $father_contact_number_change $father_profession_change $mother_name_change $mother_contact_number_change $mother_profession_change $emergency_contact_name_change $emergency_contact_relationship_change $emergency_contact_number_change $employee_image_update");
                $this->save_employee_logs($id, "USER UPDATED THIS EMPLOYEE'S PERSONAL DETAILS: $first_name_change $middle_name_change $last_name_change $suffix_change $nickname_change $birthday_change $gender_change $address_change $ownership_change $province_change $city_change $region_change $blood_type_change $height_change $weight_change $religion_change $civil_status_change $email_address_change $telephone_number_change $cellphone_number_change $spouse_name_change $spouse_contact_number_change $spouse_profession_change $father_name_change $father_contact_number_change $father_profession_change $mother_name_change $mother_contact_number_change $mother_profession_change $emergency_contact_name_change $emergency_contact_relationship_change $emergency_contact_number_change $employee_image_update");
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
        if(!$employee_number_orig = WorkInformationTable::where('employee_number', substr($request->employee_number,2))->first()){
            $employee_details = PersonalInformationTable::select('first_name','middle_name','last_name')->where('id', $request->id)->first();

            $date_hired_orig             = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_company_orig       = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_branch_orig        = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_department_orig    = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_position_orig      = WorkInformationTable::where('employee_id', $request->id)->first();
            $employment_status_orig      = WorkInformationTable::where('employee_id', $request->id)->first();
            $employment_origin_orig      = WorkInformationTable::where('employee_id', $request->id)->first();
            $company_email_address_orig  = WorkInformationTable::where('employee_id', $request->id)->first();
            $company_contact_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $hmo_number_orig             = WorkInformationTable::where('employee_id', $request->id)->first();
            $sss_number_orig             = WorkInformationTable::where('employee_id', $request->id)->first();
            $pag_ibig_number_orig        = WorkInformationTable::where('employee_id', $request->id)->first();
            $philhealth_number_orig      = WorkInformationTable::where('employee_id', $request->id)->first();
            $tin_number_orig             = WorkInformationTable::where('employee_id', $request->id)->first();
            $account_number_orig         = WorkInformationTable::where('employee_id', $request->id)->first();

            $changes = 0;
            if($request->date_hired != $date_hired_orig){
                $changes++;
                $date_hired_change = "[DATE HIRED: FROM 'N/A' TO '".Carbon::parse($request->date_hired)->format('F d, Y')."']";
            }
            else{
                $date_hired_change = null;
            }

            if($request->employee_company != $employee_company_orig){
                $changes++;
                $employee_company_change = "[COMPANY: FROM 'N/A' TO '".Company::where('entity', $request->employee_company)->first()->company_name."']";
            }
            else{
                $employee_company_change = null;
            }

            if($request->employee_branch != $employee_branch_orig){
                $changes++;
                $employee_branch_change = "[BRANCH: FROM 'N/A' TO '".Branch::where('entity03', $request->employee_branch)->first()->entity03_desc."']";
            }
            else{
                $employee_branch_change = NULL;
            }

            if($request->employee_department != $employee_department_orig){
                $changes++;
                $employee_department_change = "[DEPARTMENT: FROM 'N/A' TO '".Department::where('deptcode', $request->employee_department)->first()->deptdesc."']";
            }
            else{
                $employee_department_change = null;
            }

            if($request->employee_position != $employee_position_orig){
                $changes++;
                $employee_position_change = "[POSITION: FROM 'N/A' TO '".Position::where('id', $request->employee_position)->first()->job_position_name."']";
            }
            else{
                $employee_position_change = null;
            }

            if($request->employment_status != $employment_status_orig){
                $changes++;
                $employment_status_change = "[EMPLOYMENT STATUS: FROM 'N/A' TO '$request->employment_status']";
            }
            else{
                $employment_status_change = null;
            }

            if($request->employment_origin != $employment_origin_orig){
                $changes++;
                $employment_origin_change = "[EMPLOYMENT ORIGIN: FROM 'N/A' TO '$request->employment_origin']";
            }
            else{
                $employment_origin_change = null;
            }

            if($request->company_email_address != $company_email_address_orig){
                $changes++;
                $company_email_address_change = "[WORK EMAIL ADDRESS: FROM 'N/A' TO '$request->company_email_address']";
            }
            else{
                $company_email_address_change = null;
            }

            if($request->company_contact_number != $company_contact_number_orig){
                $changes++;
                $company_contact_number_change = "[WORK CONTACT NO.: FROM 'N/A' TO '$request->company_contact_number']";
            }
            else{
                $company_contact_number_change = null;
            }

            if($request->hmo_number != $hmo_number_orig){
                $changes++;
                $hmo_number_change = "[HMO NO.: FROM 'N/A' TO '$request->hmo_number']";
            }
            else{
                $hmo_number_change = NULL;
            }

            if($request->sss_number != $sss_number_orig){
                $changes++;
                $sss_number_change = "[SSS NO.: FROM 'N/A' TO '$request->sss_number']";
            }
            else{
                $sss_number_change = NULL;
            }

            if($request->pag_ibig_number != $pag_ibig_number_orig){
                $changes++;
                $pag_ibig_number_change = "[PAG-IBIG NO.: FROM 'N/A' TO '$request->pag_ibig_number']";
            }
            else{
                $pag_ibig_number_change = NULL;
            }

            if($request->philhealth_number !== $philhealth_number_orig){
                $changes++;
                $philhealth_number_change = "[PHILHEALTH NO.: FROM 'N/A' TO ' $request->philhealth_number']";
            }
            else{
                $philhealth_number_change = NULL;
            }

            if($request->tin_number !== $tin_number_orig){
                $changes++;
                $tin_number_change = "[TIN NO.: FROM 'N/A' TO '$request->tin_number']";
            }
            else{
                $tin_number_change = NULL;
            }

            if($request->account_number !== $account_number_orig){
                $changes++;
                $account_number_change = "[ACCOUNT NO.: FROM 'N/A' TO '$request->account_number']";
            }
            else{
                $account_number_change = NULL;
            }

            $create = WorkInformationTable::create([
                'employee_id'            => $request->employee_id,
                'employee_number'        => $request->employee_number,
                'employee_company'       => $request->employee_company,
                'employee_department'    => $request->employee_department,
                'employee_branch'        => $request->employee_branch,
                'employment_status'      => $request->employment_status,
                'employment_origin'      => $request->employment_origin,
                'employee_position'      => $request->employee_position,
                'date_hired'             => $request->date_hired,
                'company_email_address'  => $request->company_email_address,
                'company_contact_number' => $request->company_contact_number,
                'hmo_number'             => $request->hmo_number,
                'sss_number'             => $request->sss_number,
                'pag_ibig_number'        => $request->pag_ibig_number,
                'philhealth_number'      => $request->philhealth_number,
                'tin_number'             => $request->tin_number,
                'account_number'         => $request->account_number
            ]);

            if($create){
                if($changes > 0){
                    $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S WORK DETAILS: ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$request->employee_number) $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change");
                    $this->save_work_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change");
                    $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change");
                }
            }
        }
        else{
            $employee_details = PersonalInformationTable::select('first_name','middle_name','last_name')->where('id', $request->id)->first();
            $data             = WorkInformationTable::where('employee_id', $request->id)->select('employee_number','employee_company','employee_department','employee_branch','employment_status','employment_origin','employee_position','date_hired','company_email_address','company_contact_number','hmo_number','sss_number','pag_ibig_number','philhealth_number','tin_number','account_number')->first();

            $changes = 0;
            if($request->date_hired != $data->date_hired){
                $changes++;
                $date_hired_change = "[DATE HIRED: FROM '".Carbon::parse($data->date_hired)->format('F d, Y')."' TO '".Carbon::parse($request->date_hired)->format('F d, Y')."']";
            }
            else{
                $date_hired_change = NULL;
            }

            if($request->employee_company != $data->employee_company){
                $changes++;
                $employee_company_change = "[COMPANY: FROM '".Company::where('entity', $data->employee_company)->first()->company_name."' TO '".Company::where('entity', $request->employee_company)->first()->company_name."']";
            }
            else{
                $employee_company_change = NULL;
            }

            if($request->employee_branch != $data->employee_branch){
                $changes++;
                $employee_branch_change = "[BRANCH: FROM '".Branch::where('entity03', $data->employee_branch)->first()->entity03_desc."' TO '".Branch::where('entity03', $request->employee_branch)->first()->entity03_desc."']";
            }
            else{
                $employee_branch_change = NULL;
            }

            if($request->employee_department != $data->employee_department){
                $changes++;
                $employee_department_change = "[DEPARTMENT: FROM '".Department::where('deptcode', $data->employee_department)->first()->deptdesc."' TO '".Department::where('deptcode', $request->employee_department)->first()->deptdesc."']";
            }
            else{
                $employee_department_change = NULL;
            }

            if($request->employee_position != $data->employee_position){
                $changes++;
                $employee_position_change = "[POSITION: FROM '".Position::where('id', $data->employee_position)->first()->job_position_name."' TO '".Position::where('id', $request->employee_position)->first()->job_position_name."']";
            }
            else{
                $employee_position_change = NULL;
            }

            if($request->employment_status != $data->employment_status){
                $changes++;
                $employment_status_change = "[EMPLOYMENT STATUS: FROM '$data->employment_status' TO '$request->employment_status']";
            }
            else{
                $employment_status_change = NULL;
            }

            if($request->employment_origin != $data->employment_origin){
                $changes++;
                $employment_origin_change = "[EMPLOYMENT ORIGIN: FROM '$data->employment_origin' TO '$request->employment_origin']";
            }
            else{
                $employment_origin_change = NULL;
            }

            if($request->company_email_address != $data->company_email_address){
                $changes++;
                $company_email_address_change = "[WORK EMAIL ADDRESS: FROM '$data->company_email_address' TO '$request->company_email_address']";
            }
            else{
                $company_email_address_change = NULL;
            }

            if($request->company_contact_number != $data->company_contact_number){
                $changes++;
                $company_contact_number_change = "[WORK CONTACT NO.: FROM '$data->company_contact_number' TO '$request->company_contact_number']";
            }
            else{
                $company_contact_number_change = NULL;
            }

            if($request->hmo_number != $data->hmo_number){
                $changes++;
                $hmo_number_change = "[HMO NO.: FROM '$data->hmo_number' TO '$request->hmo_number']";
            }
            else{
                $hmo_number_change = NULL;
            }

            if($request->sss_number != $data->sss_number){
                $changes++;
                $sss_number_change = "[SSS NO.: FROM '$data->sss_number' TO '$request->sss_number']";
            }
            else{
                $sss_number_change = NULL;
            }

            if($request->pag_ibig_number != $data->pag_ibig_number){
                $changes++;
                $pag_ibig_number_change = "[PAG-IBIG NO.: FROM '$data->pag_ibig_number' TO '$request->pag_ibig_number']";
            }
            else{
                $pag_ibig_number_change = NULL;
            }

            if($request->philhealth_number != $data->philhealth_number){
                $changes++;
                $philhealth_number_change = "[PHILHEALTH NO.: FROM '$data->philhealth_number' TO '$request->philhealth_number']";
            }
            else{
                $philhealth_number_change = NULL;
            }

            if($request->tin_number != $data->tin_number){
                $changes++;
                $tin_number_change = "[TIN NO.: FROM '$data->tin_number' TO '$request->tin_number']";
            }
            else{
                $tin_number_change = NULL;
            }

            if($request->account_number != $data->account_number){
                $changes++;
                $account_number_change = "[ACCOUNT NO.: FROM '$data->account_number' TO '$request->account_number']";
            }
            else{
                $account_number_change = NULL;
            }

            $update = WorkInformationTable::where('employee_id',$request->employee_id)
                ->update([
                    'employee_number'        => substr($request->employee_number, 2),
                    'date_hired'             => $request->date_hired,
                    'employee_company'       => $request->employee_company,
                    'employee_branch'        => $request->employee_branch,
                    'employee_department'    => $request->employee_department,
                    'employee_position'      => $request->employee_position,
                    'employment_status'      => $request->employment_status,
                    'employment_origin'      => $request->employment_origin,
                    'company_email_address'  => $request->company_email_address,
                    'company_contact_number' => $request->company_contact_number,
                    'hmo_number'             => $request->hmo_number,
                    'sss_number'             => $request->sss_number,
                    'pag_ibig_number'        => $request->pag_ibig_number,
                    'philhealth_number'      => $request->philhealth_number,
                    'tin_number'             => $request->tin_number,
                    'account_number'         => $request->account_number,
                ]);

            if($update){
                if($changes > 0){
                    $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S WORK DETAILS: ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$request->employee_number) $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change");
                    $this->save_work_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change");
                    $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change");
                }
            }
        }
    }

    public function updateMedicalHistory(Request $request){
        if(!$employee = MedicalHistory::where('employee_id',$request->employee_id)->first()){
            $employee_details = PersonalInformationTable::select('first_name','middle_name','last_name')->where('id', $request->id)->first();

            $past_medical_condition_orig = MedicalHistory::where('employee_id',$request->id)->first();
            $allergies_orig              = MedicalHistory::where('employee_id',$request->id)->first();
            $medication_orig             = MedicalHistory::where('employee_id',$request->id)->first();
            $psychological_history_orig  = MedicalHistory::where('employee_id',$request->id)->first();

            $changes = 0;
            if($request->past_medical_condition != $past_medical_condition_orig){
                $changes++;
                $past_medical_condition_change = "[PAST MEDICAL CONDITION: FROM 'N/A' TO '$request->past_medical_condition']";
            }
            else{
                $past_medical_condition_change = NULL;
            }

            if($request->allergies != $allergies_orig){
                $changes++;
                $allergies_change = "[ALLERGIES: FROM 'N/A' TO '$request->allergies']";
            }
            else{
                $allergies_change = NULL;
            }

            if($request->medication != $medication_orig){
                $changes++;
                $medication_change = "[MEDICATION: FROM 'N/A' TO '$request->medication']";
            }
            else{
                $medication_change = NULL;
            }

            if($request->psychological_history != $psychological_history_orig){
                $changes++;
                $psychological_history_change = "[PSYCHOLOGICAL HISTORY: FROM 'N/A' TO '$request->psychological_history']";
            }
            else{
                $psychological_history_change = NULL;
            }

            $save = MedicalHistory::create([
                'employee_id'            => $request->employee_id,
                'past_medical_condition' => strtoupper($request->past_medical_condition),
                'allergies'              => strtoupper($request->allergies),
                'medication'             => strtoupper($request->medication),
                'psychological_history'  => strtoupper($request->psychological_history)
            ]);

            if($save){
                if($changes > 0){
                    $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No. $request->employee_number) $past_medical_condition_change $allergies_change $medication_change $psychological_history_change");
                    $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS: $past_medical_condition_change $allergies_change $medication_change $psychological_history_change");
                }
            }
        }
        else{
            $employee_details = PersonalInformationTable::select('first_name','middle_name','last_name')->where('id', $request->id)->first();
            $employee_number  = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $data             = MedicalHistory::where('employee_id', $request->id)->select('past_medical_condition','allergies','medication','psychological_history')->first();

            $changes = 0;
            if($request->past_medical_condition != $data->past_medical_condition){
                $changes++;
                $past_medical_condition_change = "[PAST MEDICAL CONDITION: FROM '$data->past_medical_condition' TO '$request->past_medical_condition']";
            }
            else{
                $past_medical_condition_change = NULL;
            }

            if($request->allergies != $data->allergies){
                $changes++;
                $allergies_change = "[ALLERGIES: FROM '$data->allergies' TO '$request->allergies']";
            }
            else{
                $allergies_change = NULL;
            }

            if($request->medication != $data->medication){
                $changes++;
                $medication_change = "[MEDICATION: FROM '$data->medication' TO '$request->medication']";
            }
            else{
                $medication_change = NULL;
            }

            if($request->psychological_history != $data->psychological_history){
                $changes++;
                $psychological_history_change = "[PSYCHOLOGICAL HISTORY: FROM '$data->psychological_history' TO '$request->psychological_history']";
            }
            else{
                $psychological_history_change = NULL;
            }

            $update = MedicalHistory::where('employee_id',$request->employee_id)
                    ->update([
                        'past_medical_condition' => strtoupper($request->past_medical_condition),
                        'allergies'              => strtoupper($request->allergies),
                        'medication'             => strtoupper($request->medication),
                        'psychological_history'  => strtoupper($request->psychological_history),
                    ]);

            if($update){
                if($changes > 0){
                    $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No. $request->employee_number) $past_medical_condition_change $allergies_change $medication_change $psychological_history_change");
                    $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS: $past_medical_condition_change $allergies_change $medication_change $psychological_history_change");
                }
            }
        }
    }

    public function updateDocuments(Request $request){
        $date             = Carbon::now();
        $timestamp        = date("ymdHis", strtotime($date));
        $count            = Str::random(2);
        sleep(2);
        $employee_number  = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        $employee_details = PersonalInformationTable::select('empno', 'first_name', 'middle_name', 'last_name')->where('id', $request->employee_id)->first();
        $employee         = Document::where('employee_id', $request->employee_id)->first();

        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $count = Str::random(2);
                $memoFileName = $employee_details->empno.'_Memo_File_'.$timestamp.'_'.$count.'.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name, $memoFileName);

                Memo::create([
                    'employee_id'  => $request->employee_id,
                    'memo_subject' => strtoupper($request->memo_subject[$key]),
                    'memo_date'    => $request->memo_date[$key],
                    'memo_penalty' => $request->memo_penalty[$key],
                    'memo_file'    => $memoFileName
                ]);
            }

            if($request->memo_change == 'CHANGED'){
                $memo_update = "[MEMO: LIST OF MEMO HAS BEEN CHANGED]";
            }
            else{
                $memo_update = NULL;
            }

            if($memo_update){
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S PERSONAL DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $memo_update");
                $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S MEMO DETAILS: $memo_update");
            }
        }

        if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
            foreach($request->file('evaluation_file') as $key => $value){
                $count = Str::random(2);
                $evaluationFileName =  $employee_details->empno.'_Evaluation_File_'.$timestamp.'_'.$count.'.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$evaluationFileName);

                $evaluation = Evaluation::create([
                    'employee_id'             => $request->employee_id,
                    'evaluation_reason'       => strtoupper($request->evaluation_reason[$key]),
                    'evaluation_date'         => $request->evaluation_date[$key],
                    'evaluation_evaluated_by' => strtoupper($request->evaluation_evaluated_by[$key]),
                    'evaluation_file'         => $evaluationFileName
                ]);
            }

            if($request->evaluation_change == 'CHANGED'){
                $evaluation_update = "[EVALUATION: LIST OF EVALUATION HAS BEEN CHANGED]";
            }
            else{
                $evaluation_update = NULL;
            }

            if($evaluation_update){
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $evaluation_update");
                $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS: $evaluation_update");
            }
        }

        if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
            foreach($request->file('contracts_file') as $key => $value){
                $count = Str::random(2);
                $contractsFileName = $employee_details->empno.'_Contracts_File_'.$timestamp.'_'.$count.'.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$contractsFileName);

                $contracts = Contract::create([
                    'employee_id'    => $request->employee_id,
                    'contracts_type' => $request->contracts_type[$key],
                    'contracts_date' => $request->contracts_date[$key],
                    'contracts_file' => $contractsFileName
                ]);
            }

            if($request->contracts_change == 'CHANGED'){
                $contracts_update = "[CONTRACT: LIST OF CONTRACTS HAVE BEEN CHANGED]";
            }
            else{
                $contracts_update = NULL;
            }

            if($contracts_update){
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $contracts_update");
                $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS: $contracts_update");
            }
        }

        if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
            foreach($request->file('resignation_file') as $key => $value){
                $count = Str::random(2);
                $resignationFileName = $employee_details->empno.'_Resignation_File_'.$timestamp.'_'.$count.'.'.$request->resignation_file[$key]->extension();
                $request->resignation_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resignationFileName);

                $resignation = Resignation::create([
                    'employee_id'        => $request->employee_id,
                    'resignation_reason' => $request->resignation_reason[$key],
                    'resignation_date'   => $request->resignation_date[$key],
                    'resignation_file'   => $resignationFileName
                ]);
            }

            if($request->resignation_change == 'CHANGED'){
                $resignation_update = "[RESIGNATION: LIST OF RESIGNATION HAVE BEEN CHANGED]";
            }
            else{
                $resignation_update = NULL;
            }

            if($resignation_update){
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $resignation_update");
                $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS: $resignation_update");
            }
        }

        if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
            foreach($request->file('termination_file') as $key => $value){
                $count = Str::random(2);
                $terminationFileName = $employee_details->empno.'_Termination_File_'.$timestamp.'_'.$count.'.'.$request->termination_file[$key]->extension();
                $request->termination_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$terminationFileName);

                $termination = Termination::create([
                    'employee_id'        => $request->employee_id,
                    'termination_reason' => $request->termination_reason[$key],
                    'termination_date'   => $request->termination_date[$key],
                    'termination_file'   => $terminationFileName
                ]);
            }

            if($request->termination_change == 'CHANGED'){
                $termination_update = "[TERMINATION: LIST OF TERMINATION HAVE BEEN CHANGED]";
            }
            else{
                $termination_update = NULL;
            }

            if($termination_update){
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $termination_update");
                $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS: $termination_update");
            }
        }

        if(!$employee){
            $changes = 0;
            if($request->hasFile('barangay_clearance_file')){
                $changes++;
                $barangayClearanceFile      = $request->file('barangay_clearance_file');
                $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                $barangayClearanceFilename  = $employee_details->empno.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
                $barangayClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
                $barangayClearanceFile_change = "[BARANGAY CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $barangayClearanceFile_change = NULL;
            }

            if($request->hasFile('birthcertificate_file')){
                $changes++;
                $birthcertificateFile      = $request->file('birthcertificate_file');
                $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                $birthcertificateFilename  = $employee_details->empno.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
                $birthcertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
                $birthcertificateFile_change = "[BIRTHCERTIFICATE FILE HAS BEEN CHANGED]";
            }
            else{
                $birthcertificateFile_change = NULL;
            }

            if($request->hasFile('diploma_file')){
                $changes++;
                $diplomaFile      = $request->file('diploma_file');
                $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                $diplomaFilename  = $employee_details->empno.'_Diploma_File_'.$timestamp.'.'.$diplomaExtension;
                $diplomaFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
                $diplomaFile_change = "[DIPLOMA FILE HAS BEEN CHANGED]";
            }
            else{
                $diplomaFile_change = NULL;
            }

            if($request->hasFile('medical_certificate_file')){
                $changes++;
                $medicalCertificateFile      = $request->file('medical_certificate_file');
                $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                $medicalCertificateFilename  = $employee_details->empno.'_Medical_Certificate_File_'.$timestamp.'.'.$medicalCertificateExtension;
                $medicalCertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
                $medicalCertificateFile_change = "[MEDICAL CERTIFICATE FILE HAS BEEN CHANGED]";
            }
            else{
                $medicalCertificateFile_change = NULL;
            }

            if($request->hasFile('nbi_clearance_file')){
                $changes++;
                $nbiFile      = $request->file('nbi_clearance_file');
                $nbiExtension = $nbiFile->getClientOriginalExtension();
                $nbiFilename  = $employee_details->empno.'_NBI_Clearance_File_'.$timestamp.'.'.$nbiExtension;
                $nbiFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
                $nbiFile_change = "[NBI CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $nbiFile_change = NULL;
            }

            if($request->hasFile('pag_ibig_file')){
                $changes++;
                $pagibigFile      = $request->file('pag_ibig_file');
                $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                $pagibigFilename  = $employee_details->empno.'_Pag_ibig_File_'.$timestamp.'.'.$pagibigExtension;
                $pagibigFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
                $pagibigFile_change = "[PAG-IBIG FILE HAS BEEN CHANGED]";
            }
            else{
                $pagibigFile_change = NULL;
            }

            if($request->hasFile('philhealth_file')){
                $changes++;
                $philhealthFile      = $request->file('philhealth_file');
                $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                $philhealthFilename  = $employee_details->empno.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
                $philhealthFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
                $philhealthFile_change = "[PHILHEALTH FILE HAS BEEN CHANGED]";
            }
            else{
                $philhealthFile_change = NULL;
            }

            if($request->hasFile('police_clearance_file')){
                $changes++;
                $policeClearanceFile      = $request->file('police_clearance_file');
                $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                $policeClearanceFilename  = $employee_details->empno.'_Police_Clearance_File_'.$timestamp.'.'.$policeClearanceExtension;
                $policeClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
                $policeClearanceFile_change = "[POLICE CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $policeClearanceFile_change = NULL;
            }

            if($request->hasFile('resume_file')){
                $changes++;
                $resumeFile      = $request->file('resume_file');
                $resumeExtension = $resumeFile->getClientOriginalExtension();
                $resumeFilename  = $employee_details->empno.'_Resume_File_'.$timestamp.'.'.$resumeExtension;
                $resumeFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
                $resumeFile_change = "[RESUME FILE HAS BEEN CHANGED]";
            }
            else{
                $resumeFile_change = NULL;
            }

            if($request->hasFile('sss_file')){
                $sssFile      = $request->file('sss_file');
                $sssExtension = $sssFile->getClientOriginalExtension();
                $sssFilename  = $employee_details->empno.'_SSS_File_'.$timestamp.'.'.$sssExtension;
                $sssFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
                $sssFile_change = "[SSS FILE HAS BEEN CHANGED]";
            }
            else{
                $sssFile_change = NULL;
            }

            if($request->hasFile('tor_file')){
                $torFile      = $request->file('tor_file');
                $torExtension = $torFile->getClientOriginalExtension();
                $torFilename  = $employee_details->empno.'_Transcript_of_Records_File_'.$timestamp.'.'.$torExtension;
                $torFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
                $torFile_change = "[TRANSCRIPT OF RECORDS FILE HAS BEEN CHANGED]";
            }
            else{
                $torFile_change = NULL;
            }

            if($changes > 0){
                $document = Document::create([
                    'employee_id'                => $request->employee_id,
                    'barangay_clearance_file'    => !empty($barangayClearanceFilename) ? $barangayClearanceFilename : null,
                    'birthcertificate_file'      => !empty($birthcertificateFilename) ? $birthcertificateFilename : null,
                    'diploma_file'               => !empty($diplomaFilename) ? $diplomaFilename : null,
                    'medical_certificate_file'   => !empty($medicalCertificateFilename) ? $medicalCertificateFilename : null,
                    'nbi_clearance_file'         => !empty($nbiFilename) ? $nbiFilename : null,
                    'pag_ibig_file'              => !empty($pagibigFilename) ? $pagibigFilename : null,
                    'philhealth_file'            => !empty($philhealthFilename) ? $philhealthFilename : null,
                    'police_clearance_file'      => !empty($policeClearanceFilename) ? $policeClearanceFilename : null,
                    'resume_file'                => !empty($resumeFilename) ? $resumeFilename : null,
                    'sss_file'                   => !empty($sssFilename) ? $sssFilename : null,
                    'transcript_of_records_file' => !empty($torFilename) ? $torFilename : null
                ]);

                if($document){
                    $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S DOCUMENTS:
                        $barangayClearanceFile_change
                        $birthcertificateFile_change
                        $diplomaFile_change
                        $medicalCertificateFile_change
                        $nbiFile_change
                        $pagibigFile_change
                        $philhealthFile_change
                        $policeClearanceFile_change
                        $resumeFile_change
                        $sssFile_change
                        $torFile_change
                    ");

                    $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S DOCUMENTS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                        $barangayClearanceFile_change
                        $birthcertificateFile_change
                        $diplomaFile_change
                        $medicalCertificateFile_change
                        $nbiFile_change
                        $pagibigFile_change
                        $philhealthFile_change
                        $resumeFile_change
                        $sssFile_change
                        $torFile_change
                    ");
                }
            }
        }
        else{
            $document_orig = Document::where('employee_id', $request->employee_id)->first();

            if($request->hasFile('barangay_clearance_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->barangay_clearance_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->barangay_clearance_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->barangay_clearance_file);

                $barangayClearanceFile = $request->file('barangay_clearance_file');
                $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                $barangayClearanceFilename = $employee_details->empno.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
                $barangayClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
                $barangay_clearance_file = $barangayClearanceFilename;
            }
            else{
                $barangay_clearance_file = $request->barangay_clearance_filename;
            }

            if($request->hasFile('birthcertificate_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->birthcertificate_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->birthcertificate_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->birthcertificate_file);

                $birthcertificateFile = $request->file('birthcertificate_file');
                $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                $birthcertificateFilename = $employee_details->empno.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
                $birthcertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
                $birthcertificate_file = $birthcertificateFilename;
            }
            else{
                $birthcertificate_file = $request->birthcertificate_filename;
            }

            if($request->hasFile('diploma_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->diploma_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->diploma_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->diploma_file);

                $diplomaFile = $request->file('diploma_file');
                $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                $diplomaFilename = $employee_details->empno.'_Diploma_File_'.$timestamp.'.'.$diplomaExtension;
                $diplomaFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
                $diploma_file = $diplomaFilename;
            }
            else{
                $diploma_file = $request->diploma_filename;
            }

            if($request->hasFile('medical_certificate_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->medical_certificate_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->medical_certificate_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->medical_certificate_file);

                $medicalCertificateFile = $request->file('medical_certificate_file');
                $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                $medicalCertificateFilename = $employee_details->empno.'_Medical_Certificate_File_'.$timestamp.'.'.$medicalCertificateExtension;
                $medicalCertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
                $medical_certificate_file = $medicalCertificateFilename;
            }
            else{
                $medical_certificate_file = $request->medical_certificate_filename;
            }

            if($request->hasFile('nbi_clearance_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->nbi_clearance_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->nbi_clearance_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->nbi_clearance_file);

                $nbiFile = $request->file('nbi_clearance_file');
                $nbiExtension = $nbiFile->getClientOriginalExtension();
                $nbiFilename = $employee_details->empno.'_NBI_Clearance_File_'.$timestamp.'.'.$nbiExtension;
                $nbiFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
                $nbi_clearance_file = $nbiFilename;
            }
            else{
                $nbi_clearance_file = $request->nbi_clearance_filename;
            }

            if($request->hasFile('pag_ibig_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->pag_ibig_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->pag_ibig_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->pag_ibig_file);

                $pagibigFile = $request->file('pag_ibig_file');
                $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                $pagibigFilename = $employee_details->empno.'_Pag_ibig_File_'.$timestamp.'.'.$pagibigExtension;
                $pagibigFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
                $pag_ibig_file = $pagibigFilename;
            }
            else{
                $pag_ibig_file = $request->pag_ibig_filename;
            }

            if($request->hasFile('philhealth_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->philhealth_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->philhealth_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->philhealth_file);

                $philhealthFile = $request->file('philhealth_file');
                $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                $philhealthFilename = $employee_details->empno.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
                $philhealthFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
                $philhealth_file = $philhealthFilename;
            }
            else{
                $philhealth_file = $request->philhealth_filename;
            }

            if($request->hasFile('police_clearance_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->police_clearance_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->police_clearance_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->police_clearance_file);

                $policeClearanceFile = $request->file('police_clearance_file');
                $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                $policeClearanceFilename = $employee_details->empno.'_Police_Clearance_File_'.$timestamp.'.'.$policeClearanceExtension;
                $policeClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
                $police_clearance_file = $policeClearanceFilename;
            }
            else{
                $police_clearance_file = $request->police_clearance_filename;
            }

            if($request->hasFile('resume_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->resume_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->resume_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->resume_file);

                $resumeFile = $request->file('resume_file');
                $resumeExtension = $resumeFile->getClientOriginalExtension();
                $resumeFilename = $employee_details->empno.'_Resume_File_'.$timestamp.'.'.$resumeExtension;
                $resumeFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
                $resume_file = $resumeFilename;
            }
            else{
                $resume_file = $request->resume_filename;
            }

            if($request->hasFile('sss_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->sss_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->sss_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->sss_file);

                $sssFile = $request->file('sss_file');
                $sssExtension = $sssFile->getClientOriginalExtension();
                $sssFilename = $employee_details->empno.'_SSS_File_'.$timestamp.'.'.$sssExtension;
                $sssFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
                $sss_file = $sssFilename;
            }
            else{
                $sss_file = $request->sss_filename;
            }

            if($request->hasFile('tor_file')){
                if(file_exists('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->transcript_of_records_filename)){
                    unlink('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->transcript_of_records_filename);
                }
                Storage::delete('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->transcript_of_records_file);

                $torFile = $request->file('tor_file');
                $torExtension = $torFile->getClientOriginalExtension();
                $torFilename = $employee_details->empno.'_Transcript_of_Records_File_'.$timestamp.'.'.$torExtension;
                $torFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
                $transcript_of_records_file = $torFilename;
            }
            else{
                $transcript_of_records_file = $request->transcript_of_records_filename;
            }

            Document::where('employee_id',$request->employee_id)
                ->update([
                    'barangay_clearance_file'    => $barangay_clearance_file,
                    'birthcertificate_file'      => $birthcertificate_file,
                    'diploma_file'               => $diploma_file,
                    'medical_certificate_file'   => $medical_certificate_file,
                    'nbi_clearance_file'         => $nbi_clearance_file,
                    'pag_ibig_file'              => $pag_ibig_file,
                    'philhealth_file'            => $philhealth_file,
                    'police_clearance_file'      => $police_clearance_file,
                    'resume_file'                => $resume_file,
                    'sss_file'                   => $sss_file,
                    'transcript_of_records_file' => $transcript_of_records_file
                ]);

            $changes = 0;
            if($request->hasFile('barangay_clearance_file')){
                $changes++;
                $barangay_clearance_update = "[BARANGAY CLEARANCE FILE HAS BEEN CHANGED]";
            }

            else{
                $barangay_clearance_update = NULL;
            }

            if($request->hasFile('birthcertificate_file')){
                $changes++;
                $birthcertificate_update = "[BIRTHCERTIFICATE FILE HAS BEEN CHANGED]";
            }
            else{
                $birthcertificate_update = NULL;
            }

            if($request->hasFile('diploma_file')){
                $changes++;
                $diploma_update = "[DIPLOMA FILE HAS BEEN CHANGED]";
            }
            else{
                $diploma_update = NULL;
            }

            if($request->hasFile('medical_certificate_file')){
                $changes++;
                $medical_certificate_update = "[MEDICAL CERTIFICATE FILE HAS BEEN CHANGED]";
            }
            else{
                $medical_certificate_update = NULL;
            }

            if($request->hasFile('nbi_clearance_file')){
                $changes++;
                $nbi_clearance_update = "[NBI CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $nbi_clearance_update = NULL;
            }

            if($request->hasFile('pag_ibig_file')){
                $changes++;
                $pag_ibig_update = "[PAG-IBIG FILE HAS BEEN CHANGED]";
            }
            else{
                $pag_ibig_update = NULL;
            }

            if($request->hasFile('philhealth_file')){
                $changes++;
                $philhealth_update = "[PHILHEALTH FILE HAS BEEN CHANGED]";
            }
            else{
                $philhealth_update = NULL;
            }

            if($request->hasFile('police_clearance_file')){
                $changes++;
                $police_clearance_update = "[POLICE CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $police_clearance_update = NULL;
            }

            if($request->hasFile('resume_file')){
                $changes++;
                $resume_update = "[RESUME FILE HAS BEEN CHANGED]";
            }
            else{
                $resume_update = NULL;
            }

            if($request->hasFile('sss_file')){
                $changes++;
                $sss_update = "[SSS FILE HAS BEEN CHANGED]";
            }
            else{
                $sss_update = NULL;
            }

            if($request->hasFile('tor_file')){
                $changes++;
                $tor_update = "[TRANSCRIPT OF RECORDS FILE HAS BEEN CHANGED]";
            }
            else{
                $tor_update = NULL;
            }

            if($changes > 0){
                $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S DOCUMENTS: $barangay_clearance_update $birthcertificate_update $diploma_update $medical_certificate_update $nbi_clearance_update $pag_ibig_update $philhealth_update $police_clearance_update $resume_update $sss_update $tor_update");
                $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S DOCUMENTS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $barangay_clearance_update $birthcertificate_update $diploma_update $medical_certificate_update $nbi_clearance_update $pag_ibig_update $philhealth_update $police_clearance_update $resume_update $sss_update $tor_update");
            }
        }
    }

    // public function updateHmo(Request $request){
    //     $employee_details = PersonalInformationTable::select('first_name', 'middle_name', 'last_name')->where('id', $request->employee_id)->first();
    //     $employee_number  = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

    //     $hmo_orig              = Hmo::where('id', $request->id)->first()->hmo;
    //     $coverage_orig         = Hmo::where('id', $request->id)->first()->coverage;
    //     $particulars_orig      = Hmo::where('id', $request->id)->first()->particulars;
    //     $room_orig             = Hmo::where('id', $request->id)->first()->room;
    //     $effectivity_date_orig = Hmo::where('id', $request->id)->first()->effectivity_date;
    //     $expiration_date_orig  = Hmo::where('id', $request->id)->first()->expiration_date;
    //     $status_orig           = Hmo::where('id', $request->id)->first()->status;

    //     $changes = 0;
    //     if($request->hmo != $hmo_orig){
    //         $hmo_new = $request->hmo;
    //         $hmo_change = "[HMO: FROM '$hmo_orig' TO '$hmo_new']";
    //         $changes++;

    //     }
    //     else{
    //         $hmo_change = NULL;
    //     }

    //     if($request->coverage != $coverage_orig){
    //         $coverage_new = $request->coverage;
    //         $coverage_change = "[COVERAGE: FROM '$coverage_orig' TO '$coverage_new']";
    //         $changes++;
    //     }
    //     else{
    //         $coverage_change = NULL;
    //     }

    //     if($request->particulars != $particulars_orig){
    //         $particulars_new = $request->particulars;
    //         $particulars_change = "[PARTICULARS: FROM '$particulars_orig' TO '$particulars_new']";
    //         $changes++;
    //     }
    //     else{
    //         $particulars_change = NULL;
    //     }

    //     if($request->room != $room_orig){
    //         $room_new = $request->room;
    //         $room_change = "[ROOM: FROM '$room_orig' TO '$room_new']";
    //         $changes++;
    //     }
    //     else{
    //         $room_change = NULL;
    //     }

    //     if($request->effectivity_date != $effectivity_date_orig){
    //         $effectivity_date_new = $request->effectivity_date;
    //         $effectivity_date_change = "[EFFECTIVITY DATE: FROM '$effectivity_date_orig' TO '$effectivity_date_new']";
    //         $changes++;
    //     }
    //     else{
    //         $effectivity_date_change = NULL;
    //     }

    //     if($request->expiration_date != $expiration_date_orig){
    //         $expiration_date_new = $request->expiration_date;
    //         $expiration_date_change = "[EXPIRATION DATE: FROM '$expiration_date_orig' TO '$expiration_date_new']";
    //         $changes++;
    //     }
    //     else{
    //         $expiration_date_change = NULL;
    //     }

    //     if($request->status != $status_orig){
    //         $status_new = $request->status;
    //         $status_change = "[STATUS: FROM '$status_orig' TO '$status_new']";+
    //         $changes++;
    //     }
    //     else{
    //         $status_change = NULL;
    //     }

    //     if($changes == 0){
    //         return 'no changes';
    //     }

    //     $update = Hmo::find($request->id)
    //     ->update([
    //         'hmo'              => strtoupper($request->hmo),
    //         'coverage'         => strtoupper($request->coverage),
    //         'particulars'      => strtoupper($request->particulars),
    //         'room'             => strtoupper($request->room),
    //         'effectivity_date' => $request->effectivity_date,
    //         'expiration_date'  => $request->expiration_date,
    //         'status'           => strtoupper($request->status)
    //     ]);

    //     if($update){
    //         $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S HMO DETAILS: $hmo_change $coverage_change $particulars_change $room_change $status_change");
    //         $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S HMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $hmo_change $coverage_change $particulars_change $room_change $status_change");
    //         return 'true';
    //     }
    //     else{
    //         return 'false';
    //     }
    // }

    public function updateHmo(Request $request){
        $employee_details = PersonalInformationTable::select('first_name', 'middle_name', 'last_name')->where('id', $request->employee_id)->first();
        $employee_number  = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $hmo_orig              = Hmo::where('id', $request->id)->first()->hmo;
        $coverage_orig         = Hmo::where('id', $request->id)->first()->coverage;
        $particulars_orig      = Hmo::where('id', $request->id)->first()->particulars;
        $room_orig             = Hmo::where('id', $request->id)->first()->room;
        $effectivity_date_orig = Hmo::where('id', $request->id)->first()->effectivity_date;
        $expiration_date_orig  = Hmo::where('id', $request->id)->first()->expiration_date;
        $status_orig           = Hmo::where('id', $request->id)->first()->status;

        $changes = 0;
        if($request->hmo != $hmo_orig){
            $hmo_new = $request->hmo;
            $hmo_change = "[HMO: FROM '$hmo_orig' TO '$hmo_new']";
            $changes++;
        }
        else{
            $hmo_change = NULL;
        }

        if($request->coverage != $coverage_orig){
            $coverage_new = $request->coverage;
            $coverage_change = "[COVERAGE: FROM '$coverage_orig' TO '$coverage_new']";
            $changes++;
        }
        else{
            $coverage_change = NULL;
        }

        if($request->particulars != $particulars_orig){
            $particulars_new = $request->particulars;
            $particulars_change = "[PARTICULARS: FROM '$particulars_orig' TO '$particulars_new']";
            $changes++;
        }
        else{
            $particulars_change = NULL;
        }

        if($request->room != $room_orig){
            $room_new = $request->room;
            $room_change = "[ROOM: FROM '$room_orig' TO '$room_new']";
            $changes++;
        }
        else{
            $room_change = NULL;
        }

        if($request->effectivity_date != $effectivity_date_orig){
            $effectivity_date_new = $request->effectivity_date;
            $effectivity_date_change = "[EFFECTIVITY DATE: FROM '$effectivity_date_orig' TO '$effectivity_date_new']";
            $changes++;
        }
        else{
            $effectivity_date_change = NULL;
        }

        if($request->expiration_date != $expiration_date_orig){
            $expiration_date_new = $request->expiration_date;
            $expiration_date_change = "[EXPIRATION DATE: FROM '$expiration_date_orig' TO '$expiration_date_new']";
            $changes++;
        }
        else{
            $expiration_date_change = NULL;
        }

        if($request->status != $status_orig){
            $status_new = $request->status;
            $status_change = "[STATUS: FROM '$status_orig' TO '$status_new']";+
            $changes++;
        }
        else{
            $status_change = NULL;
        }

        if($changes == 0){
            return 'no changes';
        }

        if($hmo_change){
            $update = Hmo::where('employee_id', $request->employee_id)
            ->update(['hmo' => strtoupper($request->hmo)]);

            $update = Hmo::find($request->id)
            ->update([
                'coverage'         => strtoupper($request->coverage),
                'particulars'      => strtoupper($request->particulars),
                'room'             => strtoupper($request->room),
                'effectivity_date' => $request->effectivity_date,
                'expiration_date'  => $request->expiration_date,
                'status'           => strtoupper($request->status)
            ]);
        }
        else{
            $update = Hmo::find($request->id)
            ->update([
                'hmo'              => strtoupper($request->hmo),
                'coverage'         => strtoupper($request->coverage),
                'particulars'      => strtoupper($request->particulars),
                'room'             => strtoupper($request->room),
                'effectivity_date' => $request->effectivity_date,
                'expiration_date'  => $request->expiration_date,
                'status'           => strtoupper($request->status)
            ]);
        }

        if($update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S HMO DETAILS: [$hmo_orig] $hmo_change $coverage_change $particulars_change $room_change $status_change");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S HMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) [$hmo_orig] $hmo_change $coverage_change $particulars_change $room_change $status_change");
            return 'true';
        }
        else{
            return 'false';
        }
    }
}
