<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Http\Controllers\traits\Logs;
use App\Models\UserLogs;
use App\Models\Children;
use App\Models\College;
use App\Models\CollegeTablePending;
use App\Models\Training;
use App\Models\TrainingTablePending;
use App\Models\Vocational;
use App\Models\VocationalTablePending;
use App\Models\JobHistory;
use App\Models\JobHistoryTablePending;
use App\Models\Memo;
use App\Models\Evaluation;
use App\Models\Contract;
use App\Models\Resignation;
use App\Models\Termination;
use App\Models\PersonalInformationTable;
use App\Models\PersonalInformationTablePending;
use App\Models\WorkInformationTable;
use App\Models\WorkInformationTablePending;
use App\Models\Benefits;
use App\Models\EducationalAttainment;
use App\Models\EducationalAttainmentPending;
use App\Models\MedicalHistory;
use App\Models\MedicalHistoryPending;
use App\Models\Document;
use App\Models\EmployeeLogs;
use App\Models\WorkLogs;
// Maintenance
use App\Models\Shift;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Position;
use App\Models\Requests;
use App\Models\Hmo;

use App\Models\EmployeeStatus;
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
        $data = PersonalInformationTable::where('id', $request->id)->select('first_name', 'middle_name', 'last_name', 'suffix', 'nickname', 'birthday', 'gender', 'address', 'ownership', 'province', 'city', 'region', 'blood_type', 'height', 'weight', 'religion', 'civil_status', 'email_address', 'telephone_number', 'cellphone_number', 'spouse_name', 'spouse_contact_number', 'spouse_profession', 'father_name', 'father_contact_number', 'father_profession', 'mother_name', 'mother_contact_number', 'mother_profession', 'emergency_contact_name', 'emergency_contact_relationship', 'emergency_contact_number')->first();

        if($request->first_name != $data->first_name){
            $first_name_new = strtoupper($request->first_name);
            $first_name_change = "[FIRST NAME: FROM '$data->first_name' TO '$first_name_new']";
        }
        else{
            $first_name_change = NULL;
        }

        if($request->middle_name != $data->middle_name){
            $middle_name_new = strtoupper($request->middle_name);
            $middle_name_change = "[MIDDLE NAME: FROM '$data->middle_name' TO '$middle_name_new']";
        }
        else{
            $middle_name_change = NULL;
        }

        if($request->last_name != $data->last_name){
            $last_name_new = strtoupper($request->last_name);
            $last_name_change = "[LAST NAME: FROM '$data->last_name' TO '$last_name_new']";
        }
        else{
            $last_name_change = NULL;
        }

        if($request->suffix != $data->suffix){
            $suffix_new = strtoupper($request->suffix);
            $suffix_change = "[SUFFIX: FROM '$data->suffix' TO '$suffix_new']";
        }
        else{
            $suffix_change = NULL;
        }

        if($request->nickname != $data->nickname){
            $nickname_new = strtoupper($request->nickname);
            $nickname_change = "[NICKNAME: FROM '$data->nickname' TO '$nickname_new']";
        }
        else{
            $nickname_change = NULL;
        }

        if($request->birthday != $data->birthday){
            $birthday1 = Carbon::parse($data->birthday)->format('F d, Y');
            $birthday2 = Carbon::parse($request->birthday)->format('F d, Y');
            $birthday_change = "[BIRTHDAY: FROM '$birthday1' TO '$birthday2']";
        }
        else{
            $birthday_change = NULL;
        }

        if($request->gender != $data->gender){
            $gender_new = $request->gender;
            $data->gender = $data->gender ? $data->gender : 'N/A';
            $gender_change = "[GENDER: FROM '$data->gender' TO '$gender_new']";
        }
        else{
            $gender_change = NULL;
        }

        if($request->address != $data->address){
            $address_new = $request->address;
            $data->address = $data->address ? $data->address : 'N/A';
            $address_change = "[ADDRESS: FROM '$data->address' TO '$address_new']";
        }
        else{
            $address_change = NULL;
        }

        if($request->ownership != $data->ownership){
            $ownership_new = $request->ownership;
            $data->ownership = $data->ownership ? $data->ownership : 'N/A';
            $ownership_change = "[OWNERSHIP: FROM '$data->ownership' TO '$ownership_new']";
        }
        else{
            $ownership_change = NULL;
        }

        if($request->province != $data->province){
            $province_new = $request->province;
            $data->province = $data->province ? $data->province : 'N/A';
            $province_change = "[PROVINCE: FROM '$data->province' TO '$province_new']";
        }
        else{
            $province_change = NULL;
        }

        if($request->city != $data->city){
            $city_new = $request->city;
            $data->city = $data->city ? $data->city : 'N/A';
            $city_change = "[CITY: FROM '$data->city' TO '$city_new']";
        }
        else{
            $city_change = NULL;
        }

        if($request->region != $data->region){
            $region_new = $request->region;
            $data->region = $data->region ? $data->region : 'N/A';
            $region_change = "[REGION: FROM '$data->region' TO '$region_new']";
        }
        else{
            $region_change = NULL;
        }

        if($request->blood_type != $data->blood_type){
            $blood_type_new = $request->blood_type;
            $blood_type_change = "[BLOOD TYPE: FROM '$data->blood_type' TO '$blood_type_new']";
        }
        else{
            $blood_type_change = NULL;
        }

        if($request->height != $data->height){
            $height_new = $request->height;
            $data->height = $data->height ? $data->height : 'N/A';
            $height_change = "[HEIGHT: FROM '$data->height' TO '$height_new']";
        }
        else{
            $height_change = NULL;
        }

        if($request->weight != $data->weight){
            $weight_new = $request->weight;
            $data->weight = $data->weight ? $data->weight : 'N/A';
            $weight_change = "[WEIGHT: FROM '$data->weight' TO '$weight_new']";
        }
        else{
            $weight_change = NULL;
        }

        if($request->religion != $data->religion){
            $religion_new = strtoupper($request->religion);
            $data->religion = $data->religion ? $data->religion : 'N/A';
            $religion_change = "[RELIGION: FROM '$data->religion' TO '$religion_new']";
        }
        else{
            $religion_change = NULL;
        }

        if($request->civil_status != $data->civil_status){
            $civil_status_new = $request->civil_status;
            $data->civil_status = $data->civil_status ? $data->civil_status : 'N/A';
            $civil_status_change = "[CIVIL STATUS: FROM '$data->civil_status' TO '$civil_status_new']";
        }
        else{
            $civil_status_change = NULL;
        }

        if($request->email_address != $data->email_address){
            $email_address_new = $request->email_address;
            $data->email_address = $data->email_address ? $data->email_address : 'N/A';
            $email_address_change = "[EMAIL ADDRESS: FROM '$data->email_address' TO '$email_address_new']";
        }
        else{
            $email_address_change = NULL;
        }

        if($request->telephone_number != $data->telephone_number){
            $telephone_number_new = $request->telephone_number;
            $data->telephone_number = $data->telephone_number ? $data->telephone_number : 'N/A';
            $telephone_number_change = "[TELEPHONE NUMBER: FROM '$data->telephone_number' TO '$telephone_number_new']";
        }
        else{
            $telephone_number_change = NULL;
        }

        if($request->cellphone_number != $data->cellphone_number){
            $cellphone_number_new = $request->cellphone_number;
            $data->cellphone_number = $data->cellphone_number ? $data->cellphone_number : 'N/A';
            $cellphone_number_change = "[CELLPHONE NUMBER: FROM '$data->cellphone_number' TO '$cellphone_number_new']";
        }
        else{
            $cellphone_number_change = NULL;
        }

        if($request->spouse_name != $data->spouse_name){
            $spouse_name_new = strtoupper($request->spouse_name);
            $data->spouse_name = $data->spouse_name ? $data->spouse_name : 'N/A';
            $spouse_name_change = "[SPOUSE NAME: FROM '$data->spouse_name' TO '$spouse_name_new']";
        }
        else{
            $spouse_name_change = NULL;
        }

        if($request->spouse_contact_number != $data->spouse_contact_number){
            $spouse_contact_number_new = $request->spouse_contact_number;
            $data->spouse_contact_number = $data->spouse_contact_number ? $data->spouse_contact_number : 'N/A';
            $spouse_contact_number_change = "[SPOUSE CONTACT NUMBER: FROM '$data->spouse_contact_number' TO '$spouse_contact_number_new']";
        }
        else{
            $spouse_contact_number_change = NULL;
        }

        if($request->spouse_profession != $data->spouse_profession){
            $spouse_profession_new = strtoupper($request->spouse_profession);
            $data->spouse_profession = $data->spouse_profession ? $data->spouse_profession : 'N/A';
            $spouse_profession_change = "[SPOUSE PROFESSION: FROM '$data->spouse_profession' TO '$spouse_profession_new']";
        }
        else{
            $spouse_profession_change = NULL;
        }

        if($request->father_name != $data->father_name){
            $father_name_new = strtoupper($request->father_name);
            $data->father_name = $data->father_name ? $data->father_name : 'N/A';
            $father_name_change = "[FATHER'S NAME: FROM '$data->father_name' TO '$father_name_new']";
        }
        else{
            $father_name_change = NULL;
        }

        if($request->father_contact_number != $data->father_contact_number){
            $father_contact_number_new = $request->father_contact_number;
            $data->father_contact_number = $data->father_contact_number ? $data->father_contact_number : 'N/A';
            $father_contact_number_change = "[FATHER'S CONTACT NUMBER: FROM '$data->father_contact_number' TO '$father_contact_number_new']";
        }
        else{
            $father_contact_number_change = NULL;
        }

        if($request->father_profession != $data->father_profession){
            $father_profession_new = strtoupper($request->father_profession);
            $data->father_profession = $data->father_profession ? $data->father_profession : 'N/A';
            $father_profession_change = "[FATHER'S PROFESSION: FROM '$data->father_profession' TO '$father_profession_new']";
        }
        else{
            $father_profession_change = NULL;
        }

        if($request->mother_name != $data->mother_name){
            $mother_name_new = strtoupper($request->mother_name);
            $data->mother_name = $data->mother_name ? $data->mother_name : 'N/A';
            $mother_name_change = "[MOTHER'S MAIDEN NAME: FROM '$data->mother_name' TO '$mother_name_new']";
        }
        else{
            $mother_name_change = NULL;
        }

        if($request->mother_contact_number != $data->mother_contact_number){
            $mother_contact_number_new = $request->mother_contact_number;
            $data->mother_contact_number = $data->mother_contact_number ? $data->mother_contact_number : 'N/A';
            $mother_contact_number_change = "[MOTHER'S CONTACT NUMBER: FROM '$data->mother_contact_number' TO '$mother_contact_number_new']";
        }
        else{
            $mother_contact_number_change = NULL;
        }

        if($request->mother_profession != $data->mother_profession){
            $mother_profession_new = strtoupper($request->mother_profession);
            $data->mother_profession = $data->mother_profession ? $data->mother_profession : 'N/A';
            $mother_profession_change = "[MOTHER'S PROFESSION: FROM '$data->mother_profession' TO '$mother_profession_new']";
        }
        else{
            $mother_profession_change = NULL;
        }

        if($request->emergency_contact_name != $data->emergency_contact_name){
            $emergency_contact_name_new = strtoupper($request->emergency_contact_name);
            $data->emergency_contact_name = $data->emergency_contact_name ? $data->emergency_contact_name : 'N/A';
            $emergency_contact_name_change = "[EMERGENCY CONTACT NAME: FROM '$data->emergency_contact_name' TO '$emergency_contact_name_new']";
        }
        else{
            $emergency_contact_name_change = NULL;
        }

        if($request->emergency_contact_relationship != $data->emergency_contact_relationship){
            $emergency_contact_relationship_new = strtoupper($request->emergency_contact_relationship);
            $data->emergency_contact_relationship = $data->emergency_contact_relationship ? $data->emergency_contact_relationship : 'N/A';
            $emergency_contact_relationship_change = "[EMERGENCY CONTACT RELATIONSHIP: FROM '$data->emergency_contact_relationship' TO '$emergency_contact_relationship_new']";
        }
        else{
            $emergency_contact_relationship_change = NULL;
        }

        if($request->emergency_contact_number != $data->emergency_contact_number){
            $emergency_contact_number_new = $request->emergency_contact_number;
            $data->emergency_contact_number = $data->emergency_contact_number ? $data->emergency_contact_number : 'N/A';
            $emergency_contact_number_change = "[EMERGENCY CONTACT NUMBER: FROM '$data->emergency_contact_number' TO '$emergency_contact_number_new']";
        }
        else{
            $emergency_contact_number_change = NULL;
        }

        $employee_image_update = $request->employee_image_change == 'CHANGED' ? '[IMAGE CHANGE: USER MODIFY IMAGE OF THIS EMPLOYEE]' : null;

        $sql = PersonalInformationTable::find($request->id)
        ->update([
            'employee_image' => $request->employee_image,
            'first_name' => strtoupper($request->first_name),
            'middle_name' => strtoupper($request->middle_name),
            'last_name' => strtoupper($request->last_name),
            'suffix' => strtoupper($request->suffix),
            'nickname' => strtoupper($request->nickname ? $request->nickname : $request->first_name),
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'ownership' => $request->ownership,
            'province' => $request->province,
            'city' => $request->city,
            'region' => $request->region,
            'blood_type' => $request->blood_type,
            'height' => $request->height,
            'weight' => $request->weight,
            'religion' => strtoupper($request->religion),
            'civil_status' => $request->civil_status,
            'email_address' => $request->email_address,
            'telephone_number' => $request->telephone_number,
            'cellphone_number' => $request->cellphone_number,
            'father_name' => strtoupper($request->father_name),
            'father_contact_number' => $request->father_contact_number,
            'father_profession' => strtoupper($request->father_profession),
            'mother_name' => strtoupper($request->mother_name),
            'mother_contact_number' => $request->mother_contact_number,
            'mother_profession' => strtoupper($request->mother_profession),
            'emergency_contact_name' => strtoupper($request->emergency_contact_name),
            'emergency_contact_relationship' => strtoupper($request->emergency_contact_relationship),
            'emergency_contact_number' => $request->emergency_contact_number,
            'stat' => $request->completed
        ]);

        if($sql){

            $result = 'true';
            $id = $employee->id;

            if($first_name_change || $middle_name_change || $last_name_change || $suffix_change || $nickname_change || $birthday_change || $gender_change || $address_change || $ownership_change || $province_change || $city_change || $region_change || $blood_type_change || $height_change || $weight_change || $religion_change || $civil_status_change || $email_address_change || $telephone_number_change || $cellphone_number_change || $spouse_name_change || $spouse_contact_number_change || $spouse_profession_change || $father_name_change || $father_contact_number_change || $father_profession_change || $mother_name_change || $mother_contact_number_change || $mother_profession_change || $emergency_contact_name_change || $emergency_contact_relationship_change || $emergency_contact_number_change || $request->employee_image_change == 'CHANGED'){
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $request->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S PERSONAL DETAILS $first_name_change $middle_name_change $last_name_change $suffix_change $nickname_change $birthday_change $gender_change $address_change $ownership_change $province_change $city_change $region_change $blood_type_change $height_change $weight_change $religion_change $civil_status_change $email_address_change $telephone_number_change $cellphone_number_change $spouse_name_change $spouse_contact_number_change $spouse_profession_change $father_name_change $father_contact_number_change $father_profession_change $mother_name_change $mother_contact_number_change $mother_profession_change $emergency_contact_name_change $emergency_contact_relationship_change $emergency_contact_number_change $employee_image_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S PERSONAL DETAILS ($data->first_name $data->middle_name $data->last_name) $first_name_change $middle_name_change $last_name_change $suffix_change $nickname_change $birthday_change $gender_change $address_change $ownership_change $province_change $city_change $region_change $blood_type_change $height_change $weight_change $religion_change $civil_status_change $email_address_change $telephone_number_change $cellphone_number_change $spouse_name_change $spouse_contact_number_change $spouse_profession_change $father_name_change $father_contact_number_change $father_profession_change $mother_name_change $mother_contact_number_change $mother_profession_change $emergency_contact_name_change $emergency_contact_relationship_change $emergency_contact_number_change $employee_image_update ";
                $userlogs->save();
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
            $employee_details = PersonalInformationTable::where('id', $request->id)->first();

            $date_hired_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_company_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_branch_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_department_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $employee_position_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $employment_status_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $employment_origin_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $company_email_address_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $company_contact_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $hmo_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $sss_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $pag_ibig_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $philhealth_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $tin_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();
            $account_number_orig = WorkInformationTable::where('employee_id', $request->id)->first();

            if($request->date_hired != $date_hired_orig){
                $date_hired1 = ($date_hired_orig !== null) ? Carbon::parse($date_hired_orig)->format('F d, Y') : 'N/A';
                $date_hired2 = Carbon::parse($request->date_hired)->format('F d, Y');
                $date_hired_change = "[DATE HIRED: FROM '$date_hired1' TO '$date_hired2']";
            }
            else{
                $date_hired_change = null;
            }

            if($request->employee_company != $employee_company_orig){
                $employee_company_orig = ($employee_company_orig !== null) ? Company::where('entity', $employee_company_orig)->first()->company_name : 'N/A';
                $employee_company_new = Company::where('entity', $request->employee_company)->first()->company_name;
                $employee_company_change = "[COMPANY: FROM '$employee_company_orig' TO '$employee_company_new']";
            }
            else{
                $employee_company_change = null;
            }

            if($request->employee_branch != $employee_branch_orig){
                $employee_branch_orig = ($employee_branch_orig !== null) ? Branch::where('entity03', $employee_branch_orig)->first()->entity03_desc : 'N/A';
                $employee_branch_new = Branch::where('entity03', $request->employee_branch)->first()->entity03_desc;
                $employee_branch_change = "[BRANCH: FROM '$employee_branch_orig' TO '$employee_branch_new']";
            }
            else{
                $employee_branch_change = NULL;
            }

            if($request->employee_department != $employee_department_orig){
                $employee_department_orig = ($employee_department_orig !== null) ? Department::where('deptcode', $employee_department_orig)->first()->deptdesc : 'N/A';
                $employee_department_new = Department::where('deptcode', $request->employee_department)->first()->deptdesc;
                $employee_department_change = "[DEPARTMENT: FROM '$employee_department_orig' TO '$employee_department_new']";
            }
            else{
                $employee_department_change = null;
            }

            if($request->employee_position != $employee_position_orig){
                $employee_position_orig = ($employee_position_orig !== null) ? Position::where('id', $employee_position_orig)->first()->job_position_name : 'N/A';
                $employee_position_new = Position::where('id', $request->employee_position)->first()->job_position_name;
                $employee_position_change = "[POSITION: FROM '$employee_position_orig' TO '$employee_position_new']";
            }
            else{
                $employee_position_change = null;
            }

            if($request->employment_status != $employment_status_orig){
                $employment_status_new = $request->employment_status;
                if($employment_status_orig === null){
                    $employment_status_orig = 'N/A';
                }
                    $employment_status_change = "[EMPLOYMENT STATUS: FROM '$employment_status_orig' TO '$employment_status_new']";
            }
            else{
                $employment_status_change = null;
            }

            if($request->employment_origin != $employment_origin_orig){
                $employment_origin_new = $request->employment_origin;
                if($employment_origin_orig === null){
                    $employment_origin_orig = 'N/A';
                }
                    $employment_origin_change = "[EMPLOYMENT ORIGIN: FROM '$employment_origin_orig' TO '$employment_origin_new']";
            }
            else{
                $employment_origin_change = null;
            }

            if($request->company_email_address != $company_email_address_orig){
                $company_email_address_new = $request->company_email_address;
                if($company_email_address_orig === null){
                    $company_email_address_orig = 'N/A';
                }
                $company_email_address_change = "[WORK EMAIL ADDRESS: FROM '$company_email_address_orig' TO '$company_email_address_new']";
            }
            else{
                $company_email_address_change = null;
            }

            if($request->company_contact_number != $company_contact_number_orig){
                $company_contact_number_new = $request->company_contact_number;
                if($company_contact_number_orig === null){
                    $company_contact_number_orig = 'N/A';
                }
                $company_contact_number_change = "[WORK CONTACT NO.: FROM '$company_contact_number_orig' TO '$company_contact_number_new']";
            }
            else{
                $company_contact_number_change = null;
            }

            if($request->hmo_number != $hmo_number_orig){
                $hmo_number_new = $request->hmo_number;
                if($hmo_number_orig === null){
                    $hmo_number_orig = 'N/A';
                }
                $hmo_number_change = "[HMO NO.: FROM '$hmo_number_orig' TO '$hmo_number_new']";
            }
            else{
                $hmo_number_change = NULL;
            }

            if($request->sss_number != $sss_number_orig){
                $sss_number_new = $request->sss_number;
                if($sss_number_orig === null){
                    $sss_number_orig = 'N/A';
                }
                $sss_number_change = "[SSS NO.: FROM '$sss_number_orig' TO '$sss_number_new']";
            }
            else{
                $sss_number_change = NULL;
            }

            if($request->pag_ibig_number != $pag_ibig_number_orig){
                $pag_ibig_number_new = $request->pag_ibig_number;
                if($pag_ibig_number_orig === null){
                    $pag_ibig_number_orig = 'N/A';
                }
                $pag_ibig_number_change = "[PAG-IBIG NO.: FROM '$pag_ibig_number_orig' TO '$pag_ibig_number_new']";
            }
            else{
                $pag_ibig_number_change = NULL;
            }

            if($request->philhealth_number !== $philhealth_number_orig){
                $philhealth_number_new = $request->philhealth_number;
                if($philhealth_number_orig === null){
                    $philhealth_number_orig = 'N/A';
                }
                $philhealth_number_change = "[PHILHEALTH NO.: FROM '$philhealth_number_orig' TO '$philhealth_number_new']";
            }
            else{
                $philhealth_number_change = NULL;
            }

            if($request->tin_number !== $tin_number_orig){
                $tin_number_new = $request->tin_number;
                if($tin_number_orig === null){
                    $tin_number_orig = 'N/A';
                }
                $tin_number_change = "[TIN NO.: FROM '$tin_number_orig' TO '$tin_number_new']";
            }
            else{
                $tin_number_change = NULL;
            }

            if($request->account_number !== $account_number_orig){
                $account_number_new = $request->account_number;
                if($account_number_orig === null){
                    $account_number_orig = 'N/A';
                }
                $account_number_change = "[ACCOUNT NO.: FROM '$account_number_orig' TO '$account_number_new']";
            }
            else{
                $account_number_change = NULL;
            }

            $save = WorkInformationTable::create([
                'employee_id' => $request->employee_id,
                'employee_number' => $request->employee_number,
                'employee_company' => $request->employee_company,
                'employee_department' => $request->employee_department,
                'employee_branch' => $request->employee_branch,
                'employment_status' => $request->employment_status,
                'employment_origin' => $request->employment_origin,
                'employee_position' => $request->employee_position,
                'date_hired' => $request->date_hired,
                'company_email_address' => $request->company_email_address,
                'company_contact_number' => $request->company_contact_number,
                'hmo_number' => $request->hmo_number,
                'sss_number' => $request->sss_number,
                'pag_ibig_number' => $request->pag_ibig_number,
                'philhealth_number' => $request->philhealth_number,
                'tin_number' => $request->tin_number,
                'account_number' => $request->account_number
            ]);

            if($save){
                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S WORK DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$request->employee_number) $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change";
                $userlogs->save();

                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $request->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change ";
                $userlogs->save();

                $userlogs = new WorkLogs;
                $userlogs->employee_id = $request->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change";
                $userlogs->save();
            }
        }
        else{
            $employee = WorkInformationTable::where('employee_id',$request->employee_id)->first();
            $data = WorkInformationTable::where('employee_id', $request->id)->select('employee_number','employee_company','employee_department','employee_branch','employment_status','employment_origin','employee_position','date_hired','company_email_address','company_contact_number','hmo_number','sss_number','pag_ibig_number','philhealth_number','tin_number','account_number')->first();

            if($request->date_hired != $data->date_hired){
                $date_hired1 = Carbon::parse($data->date_hired)->format('F d, Y');
                $date_hired2 = Carbon::parse($request->date_hired)->format('F d, Y');
                $date_hired_change = "[DATE HIRED: FROM '$date_hired1' TO '$date_hired2']";
            }
            else{
                $date_hired_change = NULL;
            }

            if($request->employee_company != $data->employee_company){
                $data->employee_company = Company::where('entity', $data->employee_company)->first()->company_name;
                $employee_company_new = Company::where('entity', $request->employee_company)->first()->company_name;
                $employee_company_change = "[COMPANY: FROM '$data->employee_company' TO '$employee_company_new']";
            }
            else{
                $employee_company_change = NULL;
            }

            if($request->employee_branch != $data->employee_branch){
                $data->employee_branch = Branch::where('entity03', $data->employee_branch)->first()->entity03_desc;
                $employee_branch_new = Branch::where('entity03', $request->employee_branch)->first()->entity03_desc;
                $employee_branch_change = "[BRANCH: FROM '$data->employee_branch' TO '$employee_branch_new']";
            }
            else{
                $employee_branch_change = NULL;
            }

            if($request->employee_department != $data->employee_department){
                $data->employee_department = Department::where('deptcode', $data->employee_department)->first()->deptdesc;
                $employee_department_new = Department::where('deptcode', $request->employee_department)->first()->deptdesc;
                $employee_department_change = "[DEPARTMENT: FROM '$data->employee_department' TO '$employee_department_new']";
            }
            else{
                $employee_department_change = NULL;
            }

            if($request->employee_position != $data->employee_position){
                $data->employee_position = Position::where('id', $data->employee_position)->first()->job_position_name;
                $employee_position_new = Position::where('id', $request->employee_position)->first()->job_position_name;
                $employee_position_change = "[POSITION: FROM '$data->employee_position' TO '$employee_position_new']";
            }
            else{
                $employee_position_change = NULL;
            }

            if($request->employment_status != $data->employment_status){
                $employment_status_new = $request->employment_status;
                $employment_status_change = "[EMPLOYMENT STATUS: FROM '$data->employment_status' TO '$employment_status_new']";
            }
            else{
                $employment_status_change = NULL;
            }

            if($request->employment_origin != $data->employment_origin){
                $employment_origin_new = $request->employment_origin;
                $employment_origin_change = "[EMPLOYMENT ORIGIN: FROM '$data->employment_origin' TO '$employment_origin_new']";
            }
            else{
                $employment_origin_change = NULL;
            }

            if($request->company_email_address != $data->company_email_address){
                $company_email_address_new = $request->company_email_address;
                $company_email_address_change = "[WORK EMAIL ADDRESS: FROM '$data->company_email_address' TO '$company_email_address_new']";
            }
            else{
                $company_email_address_change = NULL;
            }

            if($request->company_contact_number != $data->company_contact_number){
                $company_contact_number_new = $request->company_contact_number;
                $company_contact_number_change = "[WORK CONTACT NO.: FROM '$data->company_contact_number' TO '$company_contact_number_new']";
            }
            else{
                $company_contact_number_change = NULL;
            }

            if($request->hmo_number != $data->hmo_number){
                $hmo_number_new = $request->hmo_number;
                $hmo_number_change = "[HMO NO.: FROM '$data->hmo_number' TO '$hmo_number_new']";
            }
            else{
                $hmo_number_change = NULL;
            }

            if($request->sss_number != $data->sss_number){
                $sss_number_new = $request->sss_number;
                $sss_number_change = "[SSS NO.: FROM '$data->sss_number' TO '$sss_number_new']";
            }
            else{
                $sss_number_change = NULL;
            }

            if($request->pag_ibig_number != $data->pag_ibig_number){
                $pag_ibig_number_new = $request->pag_ibig_number;
                $pag_ibig_number_change = "[PAG-IBIG NO.: FROM '$data->pag_ibig_number' TO '$pag_ibig_number_new']";
            }
            else{
                $pag_ibig_number_change = NULL;
            }

            if($request->philhealth_number != $data->philhealth_number){
                $philhealth_number_new = $request->philhealth_number;
                $philhealth_number_change = "[PHILHEALTH NO.: FROM '$data->philhealth_number' TO '$philhealth_number_new']";
            }
            else{
                $philhealth_number_change = NULL;
            }

            if($request->tin_number != $data->tin_number){
                $tin_number_new = $request->tin_number;
                $tin_number_change = "[TIN NO.: FROM '$data->tin_number' TO '$tin_number_new']";
            }
            else{
                $tin_number_change = NULL;
            }

            if($request->account_number != $data->account_number){
                $account_number_new = $request->account_number;
                $account_number_change = "[ACCOUNT NO.: FROM '$data->account_number' TO '$account_number_new']";
            }
            else{
                $account_number_change = NULL;
            }

            $update = WorkInformationTable::where('employee_id',$request->employee_id)
                ->update([
                    'employee_number' => substr($request->employee_number, 2),
                    'date_hired' => $request->date_hired,
                    'employee_company' => $request->employee_company,
                    'employee_branch' => $request->employee_branch,
                    'employee_department' => $request->employee_department,
                    'employee_position' => $request->employee_position,
                    'employment_status' => $request->employment_status,
                    'employment_origin' => $request->employment_origin,
                    'company_email_address' => $request->company_email_address,
                    'company_contact_number' => $request->company_contact_number,
                    'hmo_number' => $request->hmo_number,
                    'sss_number' => $request->sss_number,
                    'pag_ibig_number' => $request->pag_ibig_number,
                    'philhealth_number' => $request->philhealth_number,
                    'tin_number' => $request->tin_number,
                    'account_number' => $request->account_number,
                ]);

            if($update){
                if($date_hired_change || $employee_company_change || $employee_branch_change || $employee_department_change || $employee_position_change || $employment_status_change || $employment_origin_change || $company_email_address_change || $company_contact_number_change || $hmo_number_change || $sss_number_change || $pag_ibig_number_change || $philhealth_number_change || $tin_number_change || $account_number_change){
                    $employee_details = PersonalInformationTable::where('id', $request->id)->first();
                    $userlogs = new EmployeeLogs;
                    $userlogs->employee_id = $request->id;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change";
                    $userlogs->save();

                    $userlogs = new WorkLogs;
                    $userlogs->employee_id = $request->id;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S WORK DETAILS $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change";
                    $userlogs->save();

                    $userlogs = new UserLogs;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S WORK DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$data->employee_number) $date_hired_change $employee_company_change $employee_branch_change $employee_department_change $employee_position_change $employment_status_change $employment_origin_change $company_email_address_change $company_contact_number_change $hmo_number_change $sss_number_change $pag_ibig_number_change $philhealth_number_change $tin_number_change $account_number_change";
                    $userlogs->save();
                }
            }
        }
    }

    public function updateMedicalHistory(Request $request){
        if(!$employee = MedicalHistory::where('employee_id',$request->employee_id)->first()){
            $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();

            if($request->past_medical_condition || $request->allergies || $request->medication || $request->psychological_history){
                $past_medical_condition_orig = MedicalHistory::where('employee_id',$request->id)->first();
                $allergies_orig = MedicalHistory::where('employee_id',$request->id)->first();
                $medication_orig = MedicalHistory::where('employee_id',$request->id)->first();
                $psychological_history_orig = MedicalHistory::where('employee_id',$request->id)->first();

                if($request->past_medical_condition != $past_medical_condition_orig){
                    $past_medical_condition_new = strtoupper($request->past_medical_condition);
                    $past_medical_condition_orig = $past_medical_condition_orig ? $past_medical_condition_orig : 'N/A';
                    $past_medical_condition_change = "[PAST MEDICAL CONDITION: FROM '$past_medical_condition_orig' TO '$past_medical_condition_new']";
                }
                else{
                    $past_medical_condition_change = NULL;
                }

                if($request->allergies != $allergies_orig){
                    $allergies_new = strtoupper($request->allergies);
                    $allergies_orig = $allergies_orig ? $allergies_orig : 'N/A';
                    $allergies_change = "[ALLERGIES: FROM '$allergies_orig' TO '$allergies_new']";
                }
                else{
                    $allergies_change = NULL;
                }

                if($request->medication != $medication_orig){
                    $medication_new = strtoupper($request->medication);
                    $medication_orig = $medication_orig ? $medication_orig : 'N/A';
                    $medication_change = "[MEDICATION: FROM '$medication_orig' TO '$medication_new']";
                }
                else{
                    $medication_change = NULL;
                }

                if($request->psychological_history != $psychological_history_orig){
                    $psychological_history_new = strtoupper($request->psychological_history);
                    $psychological_history_orig = $psychological_history_orig ? $psychological_history_orig : 'N/A';
                    $psychological_history_change = "[PSYCHOLOGICAL HISTORY: FROM '$psychological_history_orig' TO '$psychological_history_new']";
                }
                else{
                    $psychological_history_change = NULL;
                }

                $save = MedicalHistory::create([
                    'employee_id' => $request->employee_id,
                    'past_medical_condition' => strtoupper($request->past_medical_condition),
                    'allergies' => strtoupper($request->allergies),
                    'medication' => strtoupper($request->medication),
                    'psychological_history' => strtoupper($request->psychological_history)
                ]);

                if($save){
                    $userlogs = new EmployeeLogs;
                    $userlogs->employee_id = $request->id;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATES DETAILS OF THIS EMPLOYEE: $past_medical_condition_change $allergies_change $medication_change $psychological_history_change ";
                    $userlogs->save();

                    $userlogs = new UserLogs;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No. $request->employee_number) $past_medical_condition_change $allergies_change $medication_change $psychological_history_change ";
                    $userlogs->save();
                }
            }
        }
        else{
            $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $data = MedicalHistory::where('employee_id', $request->id)->select('past_medical_condition','allergies','medication','psychological_history')->first();

            if($request->past_medical_condition != $data->past_medical_condition){
                $past_medical_condition_new = $request->past_medical_condition;
                $past_medical_condition_change = "[PAST MEDICAL CONDITION: FROM '$data->past_medical_condition' TO '$past_medical_condition_new']";
            }
            else{
                $past_medical_condition_change = NULL;
            }

            if($request->allergies != $data->allergies){
                $allergies_new = $request->allergies;
                $allergies_change = "[ALLERGIES: FROM '$data->allergies' TO '$allergies_new']";
            }
            else{
                $allergies_change = NULL;
            }

            if($request->medication != $data->medication){
                $medication_new = $request->medication;
                $medication_change = "[MEDICATION: FROM '$data->medication' TO '$medication_new']";
            }
            else{
                $medication_change = NULL;
            }

            if($request->psychological_history != $data->psychological_history){
                $psychological_history_new = $request->psychological_history;
                $psychological_history_change = "[PSYCHOLOGICAL HISTORY: FROM '$data->psychological_history' TO '$psychological_history_new']";
            }
            else{
                $psychological_history_change = NULL;
            }

            $update = MedicalHistory::where('employee_id',$request->employee_id)
                    ->update([
                        'past_medical_condition' => strtoupper($request->past_medical_condition),
                        'allergies' => strtoupper($request->allergies),
                        'medication' => strtoupper($request->medication),
                        'psychological_history' => strtoupper($request->psychological_history),
                    ]);

            if($update){
                if($past_medical_condition_change || $allergies_change || $medication_change || $psychological_history_change){
                    $userlogs = new EmployeeLogs;
                    $userlogs->employee_id = $request->id;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS: $past_medical_condition_change $allergies_change $medication_change $psychological_history_change ";
                    $userlogs->save();

                    $userlogs = new UserLogs;
                    $userlogs->username = auth()->user()->name;
                    $userlogs->role = auth()->user()->user_level;
                    $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $past_medical_condition_change $allergies_change $medication_change $psychological_history_change ";
                    $userlogs->save();
                }
            }
        }
    }

    public function updateDocuments(Request $request){
        $date = Carbon::now();
        $timestamp = date("ymdHis", strtotime($date));
        $count = Str::random(2);
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee = Document::where('employee_id',$request->employee_id)->first();

        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach ($request->file('memo_file') as $key => $value) {
                $count = Str::random(2);
                $memoFileName = $employee_details->empno.'_Memo_File_'.$timestamp.'_'.$count.'.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name, $memoFileName);

                Memo::create([
                    'employee_id' => $request->employee_id,
                    'memo_subject' => strtoupper($request->memo_subject[$key]),
                    'memo_date' => $request->memo_date[$key],
                    'memo_penalty' => $request->memo_penalty[$key],
                    'memo_file' => $memoFileName
                ]);
            }

            if($request->memo_change == 'CHANGED'){
                $memo_update = "[MEMO: LIST OF MEMO HAVE BEEN CHANGED]";
            }
            else{
                $memo_update = NULL;
            }

            if($memo_update){
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $employee_details->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S MEMO DETAILS $memo_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S MEMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $memo_update";
                $userlogs->save();
            }
        }

        if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
            foreach($request->file('evaluation_file') as $key => $value){
                $count = Str::random(2);
                $evaluationFileName =  $employee_details->empno.'_Evaluation_File_'.$timestamp.'_'.$count.'.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$evaluationFileName);

                $evaluation = Evaluation::create([
                    'employee_id' => $request->employee_id,
                    'evaluation_reason' => strtoupper($request->evaluation_reason[$key]),
                    'evaluation_date' => $request->evaluation_date[$key],
                    'evaluation_evaluated_by' => strtoupper($request->evaluation_evaluated_by[$key]),
                    'evaluation_file' => $evaluationFileName
                ]);
            }

            if($request->evaluation_change == 'CHANGED'){
                $evaluation_update = "[EVALUATION: LIST OF EVALUATION HAVE BEEN CHANGED]";
            }
            else{
                $evaluation_update = NULL;
            }

            if($evaluation_update){
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $employee_details->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS $evaluation_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $evaluation_update";
                $userlogs->save();
            }
        }

        if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
            foreach($request->file('contracts_file') as $key => $value){
                $count = Str::random(2);
                $contractsFileName = $employee_details->empno.'_Contracts_File_'.$timestamp.'_'.$count.'.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$contractsFileName);

                $contracts = Contract::create([
                    'employee_id' => $request->employee_id,
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
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $employee_details->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS $contracts_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $contracts_update";
                $userlogs->save();
            }
        }

        if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
            foreach($request->file('resignation_file') as $key => $value){
                $count = Str::random(2);
                $resignationFileName = $employee_details->empno.'_Resignation_File_'.$timestamp.'_'.$count.'.'.$request->resignation_file[$key]->extension();
                $request->resignation_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resignationFileName);

                $resignation = Resignation::create([
                    'employee_id' => $request->employee_id,
                    'resignation_reason' => $request->resignation_reason[$key],
                    'resignation_date' => $request->resignation_date[$key],
                    'resignation_file' => $resignationFileName
                ]);
            }

            if($request->resignation_change == 'CHANGED'){
                $resignation_update = "[RESIGNATION: LIST OF RESIGNATION HAVE BEEN CHANGED]";
            }
            else{
                $resignation_update = NULL;
            }

            if($resignation_update){
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $employee_details->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS $resignation_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $resignation_update";
                $userlogs->save();
            }
        }

        if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
            foreach($request->file('termination_file') as $key => $value){
                $count = Str::random(2);
                $terminationFileName = $employee_details->empno.'_Termination_File_'.$timestamp.'_'.$count.'.'.$request->termination_file[$key]->extension();
                $request->termination_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$terminationFileName);

                $termination = Termination::create([
                    'employee_id' => $request->employee_id,
                    'termination_reason' => $request->termination_reason[$key],
                    'termination_date' => $request->termination_date[$key],
                    'termination_file' => $terminationFileName
                ]);
            }

            if($request->termination_change == 'CHANGED'){
                $termination_update = "[TERMINATION: LIST OF TERMINATION HAVE BEEN CHANGED]";
            }
            else{
                $termination_update = NULL;
            }

            if($termination_update){
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $employee_details->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS $termination_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $termination_update";
                $userlogs->save();
            }
        }

        if(!$employee){
            if($request->hasFile('barangay_clearance_file')){
                $barangayClearanceFile = $request->file('barangay_clearance_file');
                $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                $barangayClearanceFilename = $employee_details->empno.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
                $barangayClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
            }

            if($request->hasFile('birthcertificate_file')){
                $birthcertificateFile = $request->file('birthcertificate_file');
                $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                $birthcertificateFilename = $employee_details->empno.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
                $birthcertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
            }

            if($request->hasFile('diploma_file')){
                $diplomaFile = $request->file('diploma_file');
                $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                $diplomaFilename = $employee_details->empno.'_Diploma_File_'.$timestamp.'.'.$diplomaExtension;
                $diplomaFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
            }

            if($request->hasFile('medical_certificate_file')){
                $medicalCertificateFile = $request->file('medical_certificate_file');
                $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                $medicalCertificateFilename = $employee_details->empno.'_Medical_Certificate_File_'.$timestamp.'.'.$medicalCertificateExtension;
                $medicalCertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
            }

            if($request->hasFile('nbi_clearance_file')){
                $nbiFile = $request->file('nbi_clearance_file');
                $nbiExtension = $nbiFile->getClientOriginalExtension();
                $nbiFilename = $employee_details->empno.'_NBI_Clearance_File_'.$timestamp.'.'.$nbiExtension;
                $nbiFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
            }

            if($request->hasFile('pag_ibig_file')){
                $pagibigFile = $request->file('pag_ibig_file');
                $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                $pagibigFilename = $employee_details->empno.'_Pag_ibig_File_'.$timestamp.'.'.$pagibigExtension;
                $pagibigFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
            }

            if($request->hasFile('philhealth_file')){
                $philhealthFile = $request->file('philhealth_file');
                $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                $philhealthFilename = $employee_details->empno.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
                $philhealthFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
            }

            if($request->hasFile('police_clearance_file')){
                $policeClearanceFile = $request->file('police_clearance_file');
                $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                $policeClearanceFilename = $employee_details->empno.'_Police_Clearance_File_'.$timestamp.'.'.$policeClearanceExtension;
                $policeClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
            }

            if($request->hasFile('resume_file')){
                $resumeFile = $request->file('resume_file');
                $resumeExtension = $resumeFile->getClientOriginalExtension();
                $resumeFilename = $employee_details->empno.'_Resume_File_'.$timestamp.'.'.$resumeExtension;
                $resumeFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
            }

            if($request->hasFile('sss_file')){
                $sssFile = $request->file('sss_file');
                $sssExtension = $sssFile->getClientOriginalExtension();
                $sssFilename = $employee_details->empno.'_SSS_File_'.$timestamp.'.'.$sssExtension;
                $sssFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
            }

            if($request->hasFile('tor_file')){
                $torFile = $request->file('tor_file');
                $torExtension = $torFile->getClientOriginalExtension();
                $torFilename = $employee_details->empno.'_Transcript_of_Records_File_'.$timestamp.'.'.$torExtension;
                $torFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
            }

            if($request->hasFile('barangay_clearance_file') || $request->hasFile('birthcertificate_file') || $request->hasFile('diploma_file') || $request->hasFile('medical_certificate_file') || $request->hasFile('nbi_clearance_file') || $request->hasFile('pag_ibig_file') || $request->hasFile('philhealth_file') || $request->hasFile('police_clearance_file') || $request->hasFile('resume_file') || $request->hasFile('sss_file') || $request->hasFile('tor_file')){
                $document = Document::create([
                    'employee_id' => $request->employee_id,
                    'barangay_clearance_file' => !empty($barangayClearanceFilename) ? $barangayClearanceFilename : null,
                    'birthcertificate_file' => !empty($birthcertificateFilename) ? $birthcertificateFilename : null,
                    'diploma_file' => !empty($diplomaFilename) ? $diplomaFilename : null,
                    'medical_certificate_file' => !empty($medicalCertificateFilename) ? $medicalCertificateFilename : null,
                    'nbi_clearance_file' => !empty($nbiFilename) ? $nbiFilename : null,
                    'pag_ibig_file' => !empty($pagibigFilename) ? $pagibigFilename : null,
                    'philhealth_file' => !empty($philhealthFilename) ? $philhealthFilename : null,
                    'police_clearance_file' => !empty($policeClearanceFilename) ? $policeClearanceFilename : null,
                    'resume_file' => !empty($resumeFilename) ? $resumeFilename : null,
                    'sss_file' => !empty($sssFilename) ? $sssFilename : null,
                    'transcript_of_records_file' => !empty($torFilename) ? $torFilename : null
                ]);
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
                    'barangay_clearance_file' => $barangay_clearance_file,
                    'birthcertificate_file' => $birthcertificate_file,
                    'diploma_file' => $diploma_file,
                    'medical_certificate_file' => $medical_certificate_file,
                    'nbi_clearance_file' => $nbi_clearance_file,
                    'pag_ibig_file' => $pag_ibig_file,
                    'philhealth_file' => $philhealth_file,
                    'police_clearance_file' => $police_clearance_file,
                    'resume_file' => $resume_file,
                    'sss_file' => $sss_file,
                    'transcript_of_records_file' => $transcript_of_records_file
                ]);

            if($request->hasFile('barangay_clearance_file')){
                $barangay_clearance_update = "[BARANGAY CLEARANCE FILE HAS BEEN CHANGED]";
            }

            else{
                $barangay_clearance_update = NULL;
            }

            if($request->hasFile('birthcertificate_file')){
                $birthcertificate_update = "[BIRTHCERTIFICATE FILE HAS BEEN CHANGED]";
            }
            else{
                $birthcertificate_update = NULL;
            }

            if($request->hasFile('diploma_file')){
                $diploma_update = "[DIPLOMA FILE HAS BEEN CHANGED]";
            }
            else{
                $diploma_update = NULL;
            }

            if($request->hasFile('medical_certificate_file')){
                $medical_certificate_update = "[MEDICAL CERTIFICATE FILE HAS BEEN CHANGED]";
            }
            else{
                $medical_certificate_update = NULL;
            }

            if($request->hasFile('nbi_clearance_file')){
                $nbi_clearance_update = "[NBI CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $nbi_clearance_update = NULL;
            }

            if($request->hasFile('pag_ibig_file')){
                $pag_ibig_update = "[PAG-IBIG FILE HAS BEEN CHANGED]";
            }
            else{
                $pag_ibig_update = NULL;
            }

            if($request->hasFile('philhealth_file')){
                $philhealth_update = "[PHILHEALTH FILE HAS BEEN CHANGED]";
            }
            else{
                $philhealth_update = NULL;
            }

            if($request->hasFile('police_clearance_file')){
                $police_clearance_update = "[POLICE CLEARANCE FILE HAS BEEN CHANGED]";
            }
            else{
                $police_clearance_update = NULL;
            }

            if($request->hasFile('resume_file')){
                $resume_update = "[RESUME FILE HAS BEEN CHANGED]";
            }
            else{
                $resume_update = NULL;
            }

            if($request->hasFile('sss_file')){
                $sss_update = "[SSS FILE HAS BEEN CHANGED]";
            }
            else{
                $sss_update = NULL;
            }

            if($request->hasFile('tor_file')){
                $tor_update = "[TRANSCRIPT OF RECORDS FILE HAS BEEN CHANGED]";
            }
            else{
                $tor_update = NULL;
            }

            if($request->hasFile('barangay_clearance_file') || $request->hasFile('birthcertificate_file') || $request->hasFile('diploma_file') || $request->hasFile('medical_certificate_file') || $request->hasFile('nbi_clearance_file') || $request->hasFile('pag_ibig_file') || $request->hasFile('philhealth_file') || $request->hasFile('police_clearance_file') || $request->hasFile('resume_file') || $request->hasFile('sss_file') || $request->hasFile('tor_file')){
                $userlogs = new EmployeeLogs;
                $userlogs->employee_id = $employee_details->id;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S DOCUMENTS $barangay_clearance_update $birthcertificate_update $diploma_update $medical_certificate_update $nbi_clearance_update $pag_ibig_update $philhealth_update $police_clearance_update $resume_update $sss_update $tor_update";
                $userlogs->save();

                $userlogs = new UserLogs;
                $userlogs->username = auth()->user()->name;
                $userlogs->role = auth()->user()->user_level;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S DOCUMENTS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $barangay_clearance_update $birthcertificate_update $diploma_update $medical_certificate_update $nbi_clearance_update $pag_ibig_update $philhealth_update $police_clearance_update $resume_update $sss_update $tor_update";
                $userlogs->save();
            }
        }
    }

    public function updateHmo(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

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

        if($update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S HMO DETAILS: $hmo_change $coverage_change $particulars_change $room_change $status_change");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S HMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $hmo_change $coverage_change $particulars_change $room_change $status_change");
            return 'true';
        }
        else{
            return 'false';
        }
    }
}
