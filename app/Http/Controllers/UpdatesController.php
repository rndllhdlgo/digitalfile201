<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogs;
use App\Models\ChildrenTable;
use App\Models\CollegeTable;
use App\Models\CollegeTablePending;
use App\Models\TrainingTable;
use App\Models\TrainingTablePending;
use App\Models\VocationalTable;
use App\Models\VocationalTablePending;
use App\Models\JobHistoryTable;
use App\Models\JobHistoryTablePending;
use App\Models\MemoTable;
use App\Models\EvaluationTable;
use App\Models\ContractTable;
use App\Models\ResignationTable;
use App\Models\TerminationTable;
use App\Models\PersonalInformationTable;
use App\Models\PersonalInformationTablePending;
use App\Models\WorkInformationTable;
use App\Models\WorkInformationTablePending;
use App\Models\CompensationBenefits;
use App\Models\EducationalAttainment;
use App\Models\EducationalAttainmentPending;
use App\Models\MedicalHistory;
use App\Models\MedicalHistoryPending;
use App\Models\Document;
use App\Models\LogsTable;
use App\Models\History;
// Maintenance
use App\Models\Shift;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Position;
use App\Models\Requests;

use DataTables;
use Carbon\Carbon;

class UpdatesController extends Controller
{

    public function update_list(){

        $update_list = PersonalInformationTablePending::select(
            'personal_information_tables_pending.id',
            'work_information_tables_pending.employee_number',
            'first_name',
            'middle_name',
            'last_name',
            'positions.job_position_name AS employee_position',
            'branches.branch_name AS employee_branch',
            'work_information_tables_pending.employment_status',
            'status'
        )
        ->join('work_information_tables_pending','work_information_tables_pending.employee_id','personal_information_tables_pending.id')
        ->join('positions','positions.id','work_information_tables_pending.employee_position')
        ->join('branches','branches.id','work_information_tables_pending.employee_branch')
        ->get();
        return DataTables::of($update_list)->make(true);
    }

    public function update_fetch(Request $request){
        $update_fetch = PersonalInformationTablePending::select(
            'personal_information_tables_pending.id',
            'personal_information_tables_pending.empno',
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
            'educational_attainments_pending.secondary_school_name',
            'educational_attainments_pending.secondary_school_address',
            'educational_attainments_pending.secondary_school_inclusive_years_from',
            'educational_attainments_pending.secondary_school_inclusive_years_to',
            'educational_attainments_pending.primary_school_name',
            'educational_attainments_pending.primary_school_address',
            'educational_attainments_pending.primary_school_inclusive_years_from',
            'educational_attainments_pending.primary_school_inclusive_years_to',
            'medical_histories_pending.past_medical_condition',
            'medical_histories_pending.allergies',
            'medical_histories_pending.medication',
            'medical_histories_pending.psychological_history')
        ->where('personal_information_tables_pending.id',$request->id)
        ->leftJoin('educational_attainments_pending','educational_attainments_pending.employee_id','personal_information_tables_pending.id')
        ->leftJoin('medical_histories_pending','medical_histories_pending.employee_id','personal_information_tables_pending.id')
        ->get();
        return DataTables::of($update_fetch)->toJson();
    }

    public function update_personal_information(Request $request){
        $current_image = PersonalInformationTable::select('employee_image')->where('empno', $request->empno)->value('employee_image');
        $new_image = PersonalInformationTablePending::select('employee_image')->where('empno', $request->empno)->value('employee_image');
        $employee_personal_pending = PersonalInformationTablePending::where('empno', $request->empno)->first();
        $employee_work_pending = WorkInformationTablePending::where('employee_number', $request->empno)->first();
        $employee_number = WorkInformationTable::where('employee_number', $request->empno)->first()->employee_number;
        $employee_details = PersonalInformationTable::where('empno', $request->empno)->first();

        $first_name_orig = PersonalInformationTable::where('empno', $request->empno)->first()->first_name;
        $middle_name_orig = PersonalInformationTable::where('empno', $request->empno)->first()->middle_name;
        $last_name_orig = PersonalInformationTable::where('empno', $request->empno)->first()->last_name;
        $suffix_orig = PersonalInformationTable::where('empno', $request->empno)->first()->suffix;
        $nickname_orig = PersonalInformationTable::where('empno', $request->empno)->first()->nickname;
        $birthday_orig = PersonalInformationTable::where('empno', $request->empno)->first()->birthday;
        $gender_orig = PersonalInformationTable::where('empno', $request->empno)->first()->gender;
        $address_orig = PersonalInformationTable::where('empno', $request->empno)->first()->address;
        $ownership_orig = PersonalInformationTable::where('empno', $request->empno)->first()->ownership;
        $province_orig = PersonalInformationTable::where('empno', $request->empno)->first()->province;
        $city_orig = PersonalInformationTable::where('empno', $request->empno)->first()->city;
        $region_orig = PersonalInformationTable::where('empno', $request->empno)->first()->region;
        $height_orig = PersonalInformationTable::where('empno', $request->empno)->first()->height;
        $weight_orig = PersonalInformationTable::where('empno', $request->empno)->first()->weight;
        $religion_orig = PersonalInformationTable::where('empno', $request->empno)->first()->religion;
        $civil_status_orig = PersonalInformationTable::where('empno', $request->empno)->first()->civil_status;
        $email_address_orig = PersonalInformationTable::where('empno', $request->empno)->first()->email_address;
        $telephone_number_orig = PersonalInformationTable::where('empno', $request->empno)->first()->telephone_number;
        $cellphone_number_orig = PersonalInformationTable::where('empno', $request->empno)->first()->cellphone_number;
        $father_name_orig = PersonalInformationTable::where('empno', $request->empno)->first()->father_name;
        $father_contact_number_orig = PersonalInformationTable::where('empno', $request->empno)->first()->father_contact_number;
        $father_profession_orig = PersonalInformationTable::where('empno', $request->empno)->first()->father_profession;
        $mother_name_orig = PersonalInformationTable::where('empno', $request->empno)->first()->mother_name;
        $mother_contact_number_orig = PersonalInformationTable::where('empno', $request->empno)->first()->mother_contact_number;
        $mother_profession_orig = PersonalInformationTable::where('empno', $request->empno)->first()->mother_profession;
        $emergency_contact_name_orig = PersonalInformationTable::where('empno', $request->empno)->first()->emergency_contact_name;
        $emergency_contact_relationship_orig = PersonalInformationTable::where('empno', $request->empno)->first()->emergency_contact_relationship;
        $emergency_contact_number_orig = PersonalInformationTable::where('empno', $request->empno)->first()->emergency_contact_number;

        if($request->first_name != $first_name_orig){
            $first_name_new = strtoupper($request->first_name);
            $first_name_logs = "[FIRST NAME: FROM '$first_name_orig' TO '$first_name_new']";
        }
        else{
            $first_name_logs = NULL;
        }

        if($request->middle_name != $middle_name_orig){
            $middle_name_new = strtoupper($request->middle_name);
            $middle_name_logs = "[MIDDLE NAME: FROM '$middle_name_orig' TO '$middle_name_new']";
        }
        else{
            $middle_name_logs = NULL;
        }

        if($request->last_name != $last_name_orig){
            $last_name_new = strtoupper($request->last_name);
            $last_name_logs = "[LAST NAME: FROM '$last_name_orig' TO '$last_name_new']";
        }
        else{
            $last_name_logs = NULL;
        }

        if($request->suffix != $suffix_orig){
            $suffix_new = strtoupper($request->suffix);
            $suffix_logs = "[SUFFIX: FROM '$suffix_orig' TO '$suffix_new']";
        }
        else{
            $suffix_logs = NULL;
        }

        if($request->nickname != $nickname_orig){
            $nickname_new = strtoupper($request->nickname);
            $nickname_logs = "[NICKNAME: FROM '$nickname_orig' TO '$nickname_new']";
        }
        else{
            $nickname_logs = NULL;
        }

        if($request->birthday != $birthday_orig){
            $birthday1 = Carbon::parse($birthday_orig)->format('F d, Y');
            $birthday2 = Carbon::parse($request->birthday)->format('F d, Y');
            $birthday_logs = "[BIRTHDAY: FROM '$birthday1' TO '$birthday2']";
        }
        else{
            $birthday_logs = NULL;
        }

        if($request->gender != $gender_orig){
            $gender_new = $request->gender;
            $gender_logs = "[GENDER: FROM '$gender_orig' TO '$gender_new']";
        }
        else{
            $gender_logs = NULL;
        }

        if($request->address != $address_orig){
            $address_new = $request->address;
            $address_logs = "[ADDRESS: FROM '$address_orig' TO '$address_new']";
        }
        else{
            $address_logs = NULL;
        }

        if($request->ownership != $ownership_orig){
            $ownership_new = $request->ownership;
            $ownership_logs = "[OWNERSHIP: FROM '$ownership_orig' TO '$ownership_new']";
        }
        else{
            $ownership_logs = NULL;
        }

        if($request->province != $province_orig){
            $province_new = $request->province;
            $province_logs = "[PROVINCE: FROM '$province_orig' TO '$province_new']";
        }
        else{
            $province_logs = NULL;
        }

        if($request->city != $city_orig){
            $city_new = $request->city;
            $city_logs = "[CITY: FROM '$city_orig' TO '$city_new']";
        }
        else{
            $city_logs = NULL;
        }

        if($request->region != $region_orig){
            $region_new = $request->region;
            $region_logs = "[REGION: FROM '$region_orig' TO '$region_new']";
        }
        else{
            $region_logs = NULL;
        }

        if($request->height != $height_orig){
            $height_new = $request->height;
            $height_logs = "[HEIGHT: FROM '$height_orig' TO '$height_new']";
        }
        else{
            $height_logs = NULL;
        }

        if($request->weight != $weight_orig){
            $weight_new = $request->weight;
            $weight_logs = "[WEIGHT: FROM '$weight_orig' TO '$weight_new']";
        }
        else{
            $weight_logs = NULL;
        }

        if($request->religion != $religion_orig){
            $religion_new = strtoupper($request->religion);
            $religion_logs = "[RELIGION: FROM '$religion_orig' TO '$religion_new']";
        }
        else{
            $religion_logs = NULL;
        }

        if($request->civil_status != $civil_status_orig){
            $civil_status_new = $request->civil_status;
            $civil_status_logs = "[CIVIL STATUS: FROM '$civil_status_orig' TO '$civil_status_new']";
        }
        else{
            $civil_status_logs = NULL;
        }

        if($request->email_address != $email_address_orig){
            $email_address_new = $request->email_address;
            $email_address_logs = "[EMAIL ADDRESS: FROM '$email_address_orig' TO '$email_address_new']";
        }
        else{
            $email_address_logs = NULL;
        }

        if($request->telephone_number != $telephone_number_orig){
            $telephone_number_new = $request->telephone_number;
            $telephone_number_logs = "[TELEPHONE NUMBER: FROM '$telephone_number_orig' TO '$telephone_number_new']";
        }
        else{
            $telephone_number_logs = NULL;
        }

        if($request->cellphone_number != $cellphone_number_orig){
            $cellphone_number_new = $request->cellphone_number;
            $cellphone_number_logs = "[CELLPHONE NUMBER: FROM '$cellphone_number_orig' TO '$cellphone_number_new']";
        }
        else{
            $cellphone_number_logs = NULL;
        }

        if($request->father_name != $father_name_orig){
            $father_name_new = strtoupper($request->father_name);
            $father_name_logs = "[FATHER'S NAME: FROM '$father_name_orig' TO '$father_name_new']";
        }
        else{
            $father_name_logs = NULL;
        }

        if($request->father_contact_number != $father_contact_number_orig){
            $father_contact_number_new = $request->father_contact_number;
            $father_contact_number_logs = "[FATHER'S CONTACT NUMBER: FROM '$father_contact_number_orig' TO '$father_contact_number_new']";
        }
        else{
            $father_contact_number_logs = NULL;
        }

        if($request->father_profession != $father_profession_orig){
            $father_profession_new = strtoupper($request->father_profession);
            $father_profession_logs = "[FATHER'S PROFESSION: FROM '$father_profession_orig' TO '$father_profession_new']";
        }
        else{
            $father_profession_logs = NULL;
        }

        if($request->mother_name != $mother_name_orig){
            $mother_name_new = strtoupper($request->mother_name);
            $mother_name_logs = "[MOTHER'S MAIDEN NAME: FROM '$mother_name_orig' TO '$mother_name_new']";
        }
        else{
            $mother_name_logs = NULL;
        }

        if($request->mother_contact_number != $mother_contact_number_orig){
            $mother_contact_number_new = $request->mother_contact_number;
            $mother_contact_number_logs = "[MOTHER'S CONTACT NUMBER: FROM '$mother_contact_number_orig' TO '$mother_contact_number_new']";
        }
        else{
            $mother_contact_number_logs = NULL;
        }

        if($request->mother_profession != $mother_profession_orig){
            $mother_profession_new = strtoupper($request->mother_profession);
            $mother_profession_logs = "[MOTHER'S PROFESSION: FROM '$mother_profession_orig' TO '$mother_profession_new']";
        }
        else{
            $mother_profession_logs = NULL;
        }

        if($request->emergency_contact_name != $emergency_contact_name_orig){
            $emergency_contact_name_new = strtoupper($request->emergency_contact_name);
            $emergency_contact_name_logs = "[EMERGENCY CONTACT NAME: FROM '$emergency_contact_name_orig' TO '$emergency_contact_name_new']";
        }
        else{
            $emergency_contact_name_logs = NULL;
        }

        if($request->emergency_contact_relationship != $emergency_contact_relationship_orig){
            $emergency_contact_relationship_new = strtoupper($request->emergency_contact_relationship);
            $emergency_contact_relationship_logs = "[EMERGENCY CONTACT RELATIONSHIP: FROM '$emergency_contact_relationship_orig' TO '$emergency_contact_relationship_new']";
        }
        else{
            $emergency_contact_relationship_logs = NULL;
        }

        if($request->emergency_contact_number != $emergency_contact_number_orig){
            $emergency_contact_number_new = $request->emergency_contact_number;
            $emergency_contact_number_logs = "[EMERGENCY CONTACT NUMBER: FROM '$emergency_contact_number_orig' TO '$emergency_contact_number_new']";
        }
        else{
            $emergency_contact_number_logs = NULL;
        }

        if($current_image !== $new_image){
            unlink('storage/employee_images/'.$current_image);
        }

        $sql = PersonalInformationTable::where('empno', $request->empno)->first()
        ->update([
            'employee_image' => $request->employee_image,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'nickname' => $request->nickname,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'ownership' => $request->ownership,
            'province' => $request->province,
            'city' => $request->city,
            'region' => $request->region,
            'height' => $request->height,
            'weight' => $request->weight,
            'religion' => $request->religion,
            'civil_status' => $request->civil_status,
            'email_address' => $request->email_address,
            'telephone_number' => $request->telephone_number,
            'cellphone_number' => $request->cellphone_number,
            'father_name' => $request->father_name,
            'father_contact_number' => $request->father_contact_number,
            'father_profession' => $request->father_profession,
            'mother_name' => $request->mother_name,
            'mother_contact_number' => $request->mother_contact_number,
            'mother_profession' => $request->mother_profession,
            'emergency_contact_name' => $request->emergency_contact_name,
            'emergency_contact_relationship' => $request->emergency_contact_relationship,
            'emergency_contact_number' => $request->emergency_contact_number,
        ]);


        if($sql){
            if(
                $request->first_name != $first_name_orig ||
                $request->middle_name != $middle_name_orig ||
                $request->last_name != $last_name_orig ||
                $request->suffix != $suffix_orig ||
                $request->nickname != $nickname_orig ||
                $request->birthday != $birthday_orig ||
                $request->address != $address_orig ||
                $request->ownership != $ownership_orig ||
                $request->province != $province_orig ||
                $request->city != $city_orig ||
                $request->region != $region_orig ||
                $request->height != $height_orig ||
                $request->weight != $weight_orig ||
                $request->religion != $religion_orig ||
                $request->civil_status != $civil_status_orig ||
                $request->email_address != $email_address_orig ||
                $request->telephone_number != $telephone_number_orig ||
                $request->cellphone_number != $cellphone_number_orig ||
                $request->father_name != $father_name_orig ||
                $request->father_contact_number != $father_contact_number_orig ||
                $request->father_profession != $father_profession_orig ||
                $request->mother_name != $mother_name_orig ||
                $request->mother_contact_number != $mother_contact_number_orig ||
                $request->mother_profession != $mother_profession_orig ||
                $request->emergency_contact_name != $emergency_contact_name_orig ||
                $request->emergency_contact_relationship != $emergency_contact_relationship_orig ||
                $request->emergency_contact_number != $emergency_contact_number_orig
            ){
                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER SUCCESSFULLY APPROVED THE REQUEST UPDATE FOR THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                        $first_name_logs
                                        $middle_name_logs
                                        $last_name_logs
                                        $suffix_logs
                                        $nickname_logs
                                        $birthday_logs
                                        $gender_logs
                                        $address_logs
                                        $ownership_logs
                                        $province_logs
                                        $city_logs
                                        $region_logs
                                        $height_logs
                                        $weight_logs
                                        $religion_logs
                                        $civil_status_logs
                                        $email_address_logs
                                        $telephone_number_logs
                                        $cellphone_number_logs
                                        $father_name_logs
                                        $father_contact_number_logs
                                        $father_profession_logs
                                        $mother_name_logs
                                        $mother_contact_number_logs
                                        $mother_profession_logs
                                        $emergency_contact_name_logs
                                        $emergency_contact_relationship_logs
                                        $emergency_contact_number_logs
                                        ";
                $userlogs->save();
            }

            $employee_personal_pending->delete();
            $employee_work_pending->delete();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function update_educational_attainment(Request $request){
        $employee_educational = EducationalAttainment::where('empno',$request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');
        $employee_number = WorkInformationTable::where('employee_number', $request->empno)->first()->employee_number;
        $employee_details = PersonalInformationTable::where('empno', $request->empno)->first();

        if(!$employee_educational){
                $employee_educational_pending = EducationalAttainmentPending::where('empno', $request->empno)->first();
            if(
               $request->secondary_school_name
            || $request->secondary_school_address
            || $request->secondary_school_inclusive_years_from
            || $request->secondary_school_inclusive_years_to
            || $request->primary_school_name
            || $request->primary_school_address
            || $request->primary_school_inclusive_years_from
            || $request->primary_school_inclusive_years_to
            ){
                $sql = EducationalAttainment::
                create([
                    'employee_id' => $employee_id,
                    'empno' => $request->empno,
                    'secondary_school_name' => $request->secondary_school_name,
                    'secondary_school_address' => $request->secondary_school_address,
                    'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
                    'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
                    'primary_school_name' => $request->primary_school_name,
                    'primary_school_address' => $request->primary_school_address,
                    'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
                    'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to,
                ]);
                $employee_educational_pending->delete();

                if($sql){
                    if($request->secondary_school_name){
                        $secondary_school_name_logs = "[SECONDARY SCHOOL NAME: ".strtoupper($request->secondary_school_name)."]";
                    }
                    else{
                        $secondary_school_name_logs = NULL;
                    }

                    if($request->secondary_school_address){
                        $secondary_school_address_logs = "[SECONDARY SCHOOL ADDRESS: ".strtoupper($request->secondary_school_address)."]";
                    }
                    else{
                        $secondary_school_address_logs = NULL;
                    }

                    if($request->secondary_school_inclusive_years_from){
                        $secondary_school_inclusive_years_from_logs = "[SECONDARY SCHOOL START YEAR/MONTH: ".Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y')."]";
                    }
                    else{
                        $secondary_school_inclusive_years_from_logs = NULL;
                    }

                    if($request->secondary_school_inclusive_years_to){
                        $secondary_school_inclusive_years_to_logs = "[SECONDARY SCHOOL END YEAR/MONTH: ".Carbon::parse($request->secondary_school_inclusive_years_to)->format('F Y')."]";
                    }
                    else{
                        $secondary_school_inclusive_years_to_logs = NULL;
                    }

                    if($request->primary_school_name){
                        $primary_school_name_logs = "[PRIMARY SCHOOL NAME: ".strtoupper($request->primary_school_name)."]";
                    }
                    else{
                        $primary_school_name_logs = NULL;
                    }

                    if($request->primary_school_address){
                        $primary_school_address_logs = "[PRIMARY SCHOOL ADDRESS: ".strtoupper($request->primary_school_address)."]";
                    }
                    else{
                        $primary_school_address_logs = NULL;
                    }

                    if($request->primary_school_inclusive_years_from){
                        $primary_school_inclusive_years_from_logs = "[PRIMARY SCHOOL START YEAR/MONTH: ".Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y')."]";
                    }
                    else{
                        $primary_school_inclusive_years_from_logs = NULL;
                    }

                    if($request->primary_school_inclusive_years_to){
                        $primary_school_inclusive_years_to_logs = "[PRIMARY SCHOOL END YEAR/MONTH: ".Carbon::parse($request->primary_school_inclusive_years_to)->format('F Y')."]";
                    }
                    else{
                        $primary_school_inclusive_years_to_logs = NULL;
                    }

                    if(
                        $request->secondary_school_name
                        || $request->secondary_school_address
                        || $request->secondary_school_inclusive_years_from
                        || $request->secondary_school_inclusive_years_to
                        || $request->primary_school_name
                        || $request->primary_school_address
                        || $request->primary_school_inclusive_years_from
                        || $request->primary_school_inclusive_years_to
                        ){
                        $userlogs = new UserLogs;
                        $userlogs->user_id = auth()->user()->id;
                        $userlogs->activity = "USER SUCCESSFULLY APPROVED THE REQUEST UPDATE FOR THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                                $secondary_school_name_logs
                                                $secondary_school_address_logs
                                                $secondary_school_inclusive_years_from_logs
                                                $secondary_school_inclusive_years_to_logs
                                                $primary_school_name_logs
                                                $primary_school_address_logs
                                                $primary_school_inclusive_years_from_logs
                                                $primary_school_inclusive_years_to_logs
                                                ";
                        $userlogs->save();
                    }
                }
            }
        }
        else{
            $employee_educational_pending = EducationalAttainmentPending::where('empno', $request->empno)->first();
            $sql = EducationalAttainment::where('empno',$request->empno)->first()
            ->update([
                'secondary_school_name' => $request->secondary_school_name,
                'secondary_school_address' => $request->secondary_school_address,
                'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
                'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
                'primary_school_name' => $request->primary_school_name,
                'primary_school_address' => $request->primary_school_address,
                'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
                'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to
            ]);
            $employee_educational_pending->delete();
        }
    }

    public function update_medical_history(Request $request){
        $employee_medical_history = MedicalHistory::where('empno', $request->empno)->first();
        $employee_medical_history_pending = MedicalHistoryPending::where('empno', $request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');

        if(!$employee_medical_history){
            if(
               $request->past_medical_condition
            || $request->allergies
            || $request->medication
            || $request->psychological_history
            ){
                $sql = MedicalHistory::
                create([
                    'employee_id' => $employee_id,
                    'empno' => $request->empno,
                    'past_medical_condition' => $request->past_medical_condition,
                    'allergies' => $request->allergies,
                    'medication' => $request->medication,
                    'psychological_history' => $request->psychological_history
                ]);
                $employee_medical_history_pending->delete();
            }
        }
        else{
            $sql = MedicalHistory::where('empno', $request->empno)->first()
            ->update([
                'past_medical_condition' => $request->past_medical_condition,
                'allergies' => $request->allergies,
                'medication' => $request->medication,
                'psychological_history' => $request->psychological_history
            ]);
            $employee_medical_history_pending->delete();
        }
    }

    public function update_college(Request $request){
        $employee_college = CollegeTable::where('empno', $request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');

        if(!$employee_college){
            $employee_college_pending = CollegeTablePending::where('empno', $request->empno)->first();

            if($employee_college_pending){
                $sql = CollegeTable::
                create([
                    'employee_id' => $employee_id,
                    'empno' => $request->empno,
                    'college_name' => $employee_college_pending->college_name,
                    'college_degree' => $employee_college_pending->college_degree,
                    'college_inclusive_years_from' => $employee_college_pending->college_inclusive_years_from,
                    'college_inclusive_years_to' => $employee_college_pending->college_inclusive_years_to
                ]);
                $employee_college_pending->delete();
            }
        }
        else{

            if($employee_college_pending){
                $employee_college_pending = CollegeTablePending::where('empno', $request->empno)->first();
                $sql = CollegeTable::where('empno', $request->empno)
                ->update([
                    'college_name' => $employee_college_pending->college_name,
                    'college_degree' => $employee_college_pending->college_degree,
                    'college_inclusive_years_from' => $employee_college_pending->college_inclusive_years_from,
                    'college_inclusive_years_to' => $employee_college_pending->college_inclusive_years_to
                ]);
                $employee_college_pending->delete();
            }
        }
    }

    public function update_training(Request $request){
        $employee_training = TrainingTable::where('empno', $request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');

        if(!$employee_training){
            $employee_training_pending = TrainingTablePending::where('empno', $request->empno)->first();

            if($employee_training_pending){
                $sql = TrainingTable::
                create([
                    'employee_id' => $employee_id,
                    'empno' => $request->empno,
                    'training_name' => $employee_training_pending->training_name,
                    'training_title' => $employee_training_pending->training_title,
                    'training_inclusive_years_from' => $employee_training_pending->training_inclusive_years_from,
                    'training_inclusive_years_to' => $employee_training_pending->training_inclusive_years_to
                ]);
                $employee_training_pending->delete();
            }
        }
        else{
            $employee_training_pending = TrainingTablePending::where('empno', $request->empno)->first();
            if($employee_training_pending){
                $sql = TrainingTable::where('empno', $request->empno)
                ->update([
                    'training_name' => $employee_training_pending->training_name,
                    'training_title' => $employee_training_pending->training_title,
                    'training_inclusive_years_from' => $employee_training_pending->training_inclusive_years_from,
                    'training_inclusive_years_to' => $employee_training_pending->training_inclusive_years_to
                ]);
                $employee_training_pending->delete();
            }
        }
    }

    public function update_vocational(Request $request){
        $employee_vocational = VocationalTable::where('empno', $request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');

        if(!$employee_vocational){
            $employee_vocational_pending = VocationalTablePending::where('empno', $request->empno)->first();

            if($employee_vocational_pending){
                $sql = VocationalTable::
                create([
                    'employee_id' => $employee_id,
                    'empno' => $request->empno,
                    'vocational_name' => $employee_vocational_pending->vocational_name,
                    'vocational_course' => $employee_vocational_pending->vocational_course,
                    'vocational_inclusive_years_from' => $employee_vocational_pending->vocational_inclusive_years_from,
                    'vocational_inclusive_years_to' => $employee_vocational_pending->vocational_inclusive_years_to
                ]);
                $employee_vocational_pending->delete();
            }
        }
        else{
            $employee_vocational_pending = VocationalTablePending::where('empno', $request->empno)->first();

            if($employee_vocational_pending){
                $sql = VocationalTable::where('empno', $request->empno)
                ->update([
                    'vocational_name' => $employee_vocational_pending->vocational_name,
                    'vocational_course' => $employee_vocational_pending->vocational_course,
                    'vocational_inclusive_years_from' => $employee_vocational_pending->vocational_inclusive_years_from,
                    'vocational_inclusive_years_to' => $employee_vocational_pending->vocational_inclusive_years_to
                ]);
                $employee_vocational_pending->delete();
            }
        }
    }

    public function update_job_history(Request $request){
        $employee_job = JobHistoryTable::where('empno', $request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');

        if(!$employee_job){
            $employee_job_pending = JobHistoryTablePending::where('empno', $request->empno)->first();

            if($employee_job_pending){
                $sql = JobHistoryTable::
                create([
                    'employee_id' => $employee_id,
                    'empno' => $request->empno,
                    'job_company_name' => $employee_job_pending->job_company_name,
                    'job_description' => $employee_job_pending->job_description,
                    'job_position' => $employee_job_pending->job_position,
                    'job_contact_number' => $employee_job_pending->job_contact_number,
                    'job_inclusive_years_from' => $employee_job_pending->job_inclusive_years_from,
                    'job_inclusive_years_to' => $employee_job_pending->job_inclusive_years_to
                ]);
                $employee_job_pending->delete();
            }
        }
        else{
            $employee_job_pending = JobHistoryTablePending::where('empno', $request->empno)->first();

            if($employee_job_pending){
                $sql = JobHistoryTable::where('empno', $request->empno)
                ->update([
                    'job_company_name' => $employee_job_pending->job_company_name,
                    'job_description' => $employee_job_pending->job_description,
                    'job_position' => $employee_job_pending->job_position,
                    'job_contact_number' => $employee_job_pending->job_contact_number,
                    'job_inclusive_years_from' => $employee_job_pending->job_inclusive_years_from,
                    'job_inclusive_years_to' => $employee_job_pending->job_inclusive_years_to
                ]);
                $employee_job_pending->delete();
            }
        }
    }

    public function college_data(Request $request){
        return DataTables::of(CollegeTablePending::where('employee_id',$request->id)->get())->make(true);
    }

    public function training_data(Request $request){
        return DataTables::of(TrainingTablePending::where('employee_id',$request->id)->get())->make(true);
    }

    public function vocational_data(Request $request){
        return DataTables::of(VocationalTablePending::where('employee_id',$request->id)->get())->make(true);
    }

    public function job_history_data(Request $request){
        return DataTables::of(JobHistoryTablePending::where('employee_id',$request->id)->get())->make(true);
    }

    public function updates_request_data(Request $request){
        return DataTables::of(Requests::where('empno',$request->empno)->get())->make(true);
    }
}
