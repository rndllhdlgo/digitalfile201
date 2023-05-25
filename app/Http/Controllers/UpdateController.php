<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
use App\Models\EmployeeLogs;
use App\Models\History;
// Maintenance
use App\Models\Shift;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Position;
use App\Models\Requests;

use App\Models\EmployeeStatus;
use DataTables;
use Str;

class UpdateController extends Controller
{
    public function updatePersonalInformation(Request $request){
        if($request->filename_delete){
            if(file_exists('storage/employee_images/'.$request->filename_delete)){
                unlink('storage/employee_images/'.$request->filename_delete);
            }
        }
        $employee = PersonalInformationTable::find($request->id);
        $employee->employee_image = $request->employee_image == '' ? '' : $request->employee_image;
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

        $spouse_name_orig = PersonalInformationTable::where('id', $request->id)->first()->spouse_name;
        $spouse_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->spouse_contact_number;
        $spouse_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->spouse_profession;

        $father_name_orig = PersonalInformationTable::where('id', $request->id)->first()->father_name;
        $father_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->father_contact_number;
        $father_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->father_profession;
        $mother_name_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_name;
        $mother_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_contact_number;
        $mother_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_profession;
        $emergency_contact_name_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_name;
        $emergency_contact_relationship_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_relationship;
        $emergency_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_number;
        $blood_type_orig = PersonalInformationTable::where('id', $request->id)->first()->blood_type;

        if($request->blood_type != $blood_type_orig){
            $blood_type_new = $request->blood_type;
            $blood_type_change = "[BLOOD TYPE: FROM '$blood_type_orig' TO '$blood_type_new']";
        }
        else{
            $blood_type_change = NULL;
        }

        if($request->first_name != $first_name_orig){
            $first_name_new = strtoupper($request->first_name);
            $first_name_change = "[FIRST NAME: FROM '$first_name_orig' TO '$first_name_new']";
        }
        else{
            $first_name_change = NULL;
        }

        if($request->middle_name != $middle_name_orig){
            $middle_name_new = strtoupper($request->middle_name);
            $middle_name_change = "[MIDDLE NAME: FROM '$middle_name_orig' TO '$middle_name_new']";
        }
        else{
            $middle_name_change = NULL;
        }

        if($request->last_name != $last_name_orig){
            $last_name_new = strtoupper($request->last_name);
            $last_name_change = "[LAST NAME: FROM '$last_name_orig' TO '$last_name_new']";
        }
        else{
            $last_name_change = NULL;
        }

        if($request->suffix != $suffix_orig){
            $suffix_new = strtoupper($request->suffix);
            $suffix_change = "[SUFFIX: FROM '$suffix_orig' TO '$suffix_new']";
        }
        else{
            $suffix_change = NULL;
        }

        if($request->nickname != $nickname_orig){
            $nickname_new = strtoupper($request->nickname);
            $nickname_change = "[NICKNAME: FROM '$nickname_orig' TO '$nickname_new']";
        }
        else{
            $nickname_change = NULL;
        }

        if($request->birthday != $birthday_orig){
            $birthday1 = Carbon::parse($birthday_orig)->format('F d, Y');
            $birthday2 = Carbon::parse($request->birthday)->format('F d, Y');
            $birthday_change = "[BIRTHDAY: FROM '$birthday1' TO '$birthday2']";
        }
        else{
            $birthday_change = NULL;
        }

        if($request->gender != $gender_orig){
            $gender_new = $request->gender;
            $gender_orig = $gender_orig ? $gender_orig : 'N/A';
            $gender_change = "[GENDER: FROM '$gender_orig' TO '$gender_new']";
        }
        else{
            $gender_change = NULL;
        }

        if($request->address != $address_orig){
            $address_new = $request->address;
            $address_orig = $address_orig ? $address_orig : 'N/A';
            $address_change = "[ADDRESS: FROM '$address_orig' TO '$address_new']";
        }
        else{
            $address_change = NULL;
        }

        if($request->ownership != $ownership_orig){
            $ownership_new = $request->ownership;
            $ownership_orig = $ownership_orig ? $ownership_orig : 'N/A';
            $ownership_change = "[OWNERSHIP: FROM '$ownership_orig' TO '$ownership_new']";
        }
        else{
            $ownership_change = NULL;
        }

        if($request->province != $province_orig){
            $province_new = $request->province;
            $province_orig = $province_orig ? $province_orig : 'N/A';
            $province_change = "[PROVINCE: FROM '$province_orig' TO '$province_new']";
        }
        else{
            $province_change = NULL;
        }

        if($request->city != $city_orig){
            $city_new = $request->city;
            $city_orig = $city_orig ? $city_orig : 'N/A';
            $city_change = "[CITY: FROM '$city_orig' TO '$city_new']";
        }
        else{
            $city_change = NULL;
        }

        if($request->region != $region_orig){
            $region_new = $request->region;
            $region_orig = $region_orig ? $region_orig : 'N/A';
            $region_change = "[REGION: FROM '$region_orig' TO '$region_new']";
        }
        else{
            $region_change = NULL;
        }

        if($request->height != $height_orig){
            $height_new = $request->height;
            $height_orig = $height_orig ? $height_orig : 'N/A';
            $height_change = "[HEIGHT: FROM '$height_orig' TO '$height_new']";
        }
        else{
            $height_change = NULL;
        }

        if($request->weight != $weight_orig){
            $weight_new = $request->weight;
            $weight_orig = $weight_orig ? $weight_orig : 'N/A';
            $weight_change = "[WEIGHT: FROM '$weight_orig' TO '$weight_new']";
        }
        else{
            $weight_change = NULL;
        }

        if($request->religion != $religion_orig){
            $religion_new = strtoupper($request->religion);
            $religion_orig = $religion_orig ? $religion_orig : 'N/A';
            $religion_change = "[RELIGION: FROM '$religion_orig' TO '$religion_new']";
        }
        else{
            $religion_change = NULL;
        }

        if($request->civil_status != $civil_status_orig){
            $civil_status_new = $request->civil_status;
            $civil_status_orig = $civil_status_orig ? $civil_status_orig : 'N/A';
            $civil_status_change = "[CIVIL STATUS: FROM '$civil_status_orig' TO '$civil_status_new']";
        }
        else{
            $civil_status_change = NULL;
        }

        if($request->email_address != $email_address_orig){
            $email_address_new = $request->email_address;
            $email_address_orig = $email_address_orig ? $email_address_orig : 'N/A';
            $email_address_change = "[EMAIL ADDRESS: FROM '$email_address_orig' TO '$email_address_new']";
        }
        else{
            $email_address_change = NULL;
        }

        if($request->telephone_number != $telephone_number_orig){
            $telephone_number_new = $request->telephone_number;
            $telephone_number_orig = $telephone_number_orig ? $telephone_number_orig : 'N/A';
            $telephone_number_change = "[TELEPHONE NUMBER: FROM '$telephone_number_orig' TO '$telephone_number_new']";
        }
        else{
            $telephone_number_change = NULL;
        }

        if($request->cellphone_number != $cellphone_number_orig){
            $cellphone_number_new = $request->cellphone_number;
            $cellphone_number_orig = $cellphone_number_orig ? $cellphone_number_orig : 'N/A';
            $cellphone_number_change = "[CELLPHONE NUMBER: FROM '$cellphone_number_orig' TO '$cellphone_number_new']";
        }
        else{
            $cellphone_number_change = NULL;
        }

        if($request->spouse_name != $spouse_name_orig){
            $spouse_name_new = strtoupper($request->spouse_name);
            $spouse_name_orig = $spouse_name_orig ? $spouse_name_orig : 'N/A';
            $spouse_name_change = "[SPOUSE NAME: FROM '$spouse_name_orig' TO '$spouse_name_new']";
        }
        else{
            $spouse_name_change = NULL;
        }

        if($request->spouse_contact_number != $spouse_contact_number_orig){
            $spouse_contact_number_new = $request->spouse_contact_number;
            $spouse_contact_number_orig = $spouse_contact_number_orig ? $spouse_contact_number_orig : 'N/A';
            $spouse_contact_number_change = "[SPOUSE CONTACT NUMBER: FROM '$spouse_contact_number_orig' TO '$spouse_contact_number_new']";
        }
        else{
            $spouse_contact_number_change = NULL;
        }

        if($request->spouse_profession != $spouse_profession_orig){
            $spouse_profession_new = strtoupper($request->spouse_profession);
            $spouse_profession_orig = $spouse_profession_orig ? $spouse_profession_orig : 'N/A';
            $spouse_profession_change = "[SPOUSE PROFESSION: FROM '$spouse_profession_orig' TO '$spouse_profession_new']";
        }
        else{
            $spouse_profession_change = NULL;
        }

        if($request->father_name != $father_name_orig){
            $father_name_new = strtoupper($request->father_name);
            $father_name_orig = $father_name_orig ? $father_name_orig : 'N/A';
            $father_name_change = "[FATHER'S NAME: FROM '$father_name_orig' TO '$father_name_new']";
        }
        else{
            $father_name_change = NULL;
        }

        if($request->father_contact_number != $father_contact_number_orig){
            $father_contact_number_new = $request->father_contact_number;
            $father_contact_number_orig = $father_contact_number_orig ? $father_contact_number_orig : 'N/A';
            $father_contact_number_change = "[FATHER'S CONTACT NUMBER: FROM '$father_contact_number_orig' TO '$father_contact_number_new']";
        }
        else{
            $father_contact_number_change = NULL;
        }

        if($request->father_profession != $father_profession_orig){
            $father_profession_new = strtoupper($request->father_profession);
            $father_profession_orig = $father_profession_orig ? $father_profession_orig : 'N/A';
            $father_profession_change = "[FATHER'S PROFESSION: FROM '$father_profession_orig' TO '$father_profession_new']";
        }
        else{
            $father_profession_change = NULL;
        }

        if($request->mother_name != $mother_name_orig){
            $mother_name_new = strtoupper($request->mother_name);
            $mother_name_orig = $mother_name_orig ? $mother_name_orig : 'N/A';
            $mother_name_change = "[MOTHER'S MAIDEN NAME: FROM '$mother_name_orig' TO '$mother_name_new']";
        }
        else{
            $mother_name_change = NULL;
        }

        if($request->mother_contact_number != $mother_contact_number_orig){
            $mother_contact_number_new = $request->mother_contact_number;
            $mother_contact_number_orig = $mother_contact_number_orig ? $mother_contact_number_orig : 'N/A';
            $mother_contact_number_change = "[MOTHER'S CONTACT NUMBER: FROM '$mother_contact_number_orig' TO '$mother_contact_number_new']";
        }
        else{
            $mother_contact_number_change = NULL;
        }

        if($request->mother_profession != $mother_profession_orig){
            $mother_profession_new = strtoupper($request->mother_profession);
            $mother_profession_orig = $mother_profession_orig ? $mother_profession_orig : 'N/A';
            $mother_profession_change = "[MOTHER'S PROFESSION: FROM '$mother_profession_orig' TO '$mother_profession_new']";
        }
        else{
            $mother_profession_change = NULL;
        }

        if($request->emergency_contact_name != $emergency_contact_name_orig){
            $emergency_contact_name_new = strtoupper($request->emergency_contact_name);
            $emergency_contact_name_orig = $emergency_contact_name_orig ? $emergency_contact_name_orig : 'N/A';
            $emergency_contact_name_change = "[EMERGENCY CONTACT NAME: FROM '$emergency_contact_name_orig' TO '$emergency_contact_name_new']";
        }
        else{
            $emergency_contact_name_change = NULL;
        }

        if($request->emergency_contact_relationship != $emergency_contact_relationship_orig){
            $emergency_contact_relationship_new = strtoupper($request->emergency_contact_relationship);
            $emergency_contact_relationship_orig = $emergency_contact_relationship_orig ? $emergency_contact_relationship_orig : 'N/A';
            $emergency_contact_relationship_change = "[EMERGENCY CONTACT RELATIONSHIP: FROM '$emergency_contact_relationship_orig' TO '$emergency_contact_relationship_new']";
        }
        else{
            $emergency_contact_relationship_change = NULL;
        }

        if($request->emergency_contact_number != $emergency_contact_number_orig){
            $emergency_contact_number_new = $request->emergency_contact_number;
            $emergency_contact_number_orig = $emergency_contact_number_orig ? $emergency_contact_number_orig : 'N/A';
            $emergency_contact_number_change = "[EMERGENCY CONTACT NUMBER: FROM '$emergency_contact_number_orig' TO '$emergency_contact_number_new']";
        }
        else{
            $emergency_contact_number_change = NULL;
        }

        if(auth()->user()->user_level != 'EMPLOYEE'){
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

                if(
                    $request->first_name != $first_name_orig ||
                    $request->middle_name != $middle_name_orig ||
                    $request->last_name != $last_name_orig ||
                    $request->suffix != $suffix_orig ||
                    $request->nickname != $nickname_orig ||
                    $request->birthday != $birthday_orig ||
                    $request->gender != $gender_orig ||
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
                    $request->spouse_name != $spouse_name_orig ||
                    $request->spouse_contact_number != $spouse_contact_number_orig ||
                    $request->spouse_profession != $spouse_profession_orig ||
                    $request->mother_name != $mother_name_orig ||
                    $request->mother_contact_number != $mother_contact_number_orig ||
                    $request->mother_profession != $mother_profession_orig ||
                    $request->emergency_contact_name != $emergency_contact_name_orig ||
                    $request->emergency_contact_relationship != $emergency_contact_relationship_orig ||
                    $request->emergency_contact_number != $emergency_contact_number_orig ||
                    $request->blood_type != $blood_type_orig ||
                    $request->employee_image_change == 'CHANGED'
                ){
                    $employee_logs = new EmployeeLogs;
                    $employee_logs->employee_id = $request->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S PERSONAL INFORMATION DETAILS
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
                                            $spouse_name_change
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
                                            $emergency_contact_number_change
                                            $blood_type_change
                                            $employee_image_update
                                            ";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S PERSONAL INFORMATION DETAILS ($first_name_orig $middle_name_orig $last_name_orig)
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
                                        $spouse_name_change
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
                                        $emergency_contact_number_change
                                        $blood_type_change
                                        $employee_image_update
                                        ";
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
        // else{
        //     $empno = PersonalInformationTable::where('id',$request->id)->first()->empno;

        //     $employee_image_update = $request->employee_image_change == 'CHANGED' ? '[IMAGE CHANGE: USER UPLOADED NEW IMAGE]' : null;

        //     $sql = PersonalInformationTablePending::
        //         create([
        //         'empno' => $empno,
        //         'employee_image' => $request->employee_image,
        //         'first_name' => strtoupper($request->first_name),
        //         'middle_name' => strtoupper($request->middle_name),
        //         'last_name' => strtoupper($request->last_name),
        //         'suffix' => strtoupper($request->suffix),
        //         'nickname' => strtoupper($request->nickname),
        //         'birthday' => $request->birthday,
        //         'gender' => $request->gender,
        //         'address' => $request->address,
        //         'ownership' => $request->ownership,
        //         'province' => $request->province,
        //         'city' => $request->city,
        //         'region' => $request->region,
        //         'height' => $request->height,
        //         'weight' => $request->weight,
        //         'religion' => strtoupper($request->religion),
        //         'civil_status' => $request->civil_status,
        //         'email_address' => $request->email_address,
        //         'telephone_number' => $request->telephone_number,
        //         'cellphone_number' => $request->cellphone_number,
        //         'father_name' => strtoupper($request->father_name),
        //         'father_contact_number' => $request->father_contact_number,
        //         'father_profession' => strtoupper($request->father_profession),
        //         'mother_name' => strtoupper($request->mother_name),
        //         'mother_contact_number' => $request->mother_contact_number,
        //         'mother_profession' => strtoupper($request->mother_profession),
        //         'emergency_contact_name' => strtoupper($request->emergency_contact_name),
        //         'emergency_contact_relationship' => strtoupper($request->emergency_contact_relationship),
        //         'emergency_contact_number' => $request->emergency_contact_number
        //     ]);

        //     if($sql){

        //         $result = 'true';
        //         $id = $employee->id;

        //         if(
        //             $request->first_name != $first_name_orig ||
        //             $request->middle_name != $middle_name_orig ||
        //             $request->last_name != $last_name_orig ||
        //             $request->suffix != $suffix_orig ||
        //             $request->nickname != $nickname_orig ||
        //             $request->birthday != $birthday_orig ||
        //             $request->address != $address_orig ||
        //             $request->ownership != $ownership_orig ||
        //             $request->province != $province_orig ||
        //             $request->city != $city_orig ||
        //             $request->region != $region_orig ||
        //             $request->height != $height_orig ||
        //             $request->weight != $weight_orig ||
        //             $request->religion != $religion_orig ||
        //             $request->civil_status != $civil_status_orig ||
        //             $request->email_address != $email_address_orig ||
        //             $request->telephone_number != $telephone_number_orig ||
        //             $request->cellphone_number != $cellphone_number_orig ||
        //             $request->father_name != $father_name_orig ||
        //             $request->father_contact_number != $father_contact_number_orig ||
        //             $request->father_profession != $father_profession_orig ||
        //             $request->mother_name != $mother_name_orig ||
        //             $request->mother_contact_number != $mother_contact_number_orig ||
        //             $request->mother_profession != $mother_profession_orig ||
        //             $request->emergency_contact_name != $emergency_contact_name_orig ||
        //             $request->emergency_contact_relationship != $emergency_contact_relationship_orig ||
        //             $request->emergency_contact_number != $emergency_contact_number_orig ||
        //             $request->employee_image_change == 'CHANGED'
        //         ){
        //             $userlogs = new UserLogs;
        //             $userlogs->user_id = auth()->user()->id;
        //             $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THIS EMPLOYEE'S PERSONAL INFORMATION DETAILS ($first_name_orig $middle_name_orig $last_name_orig)
        //                                 $first_name_change
        //                                 $middle_name_change
        //                                 $last_name_change
        //                                 $suffix_change
        //                                 $nickname_change
        //                                 $birthday_change
        //                                 $gender_change
        //                                 $address_change
        //                                 $ownership_change
        //                                 $province_change
        //                                 $city_change
        //                                 $region_change
        //                                 $height_change
        //                                 $weight_change
        //                                 $religion_change
        //                                 $civil_status_change
        //                                 $email_address_change
        //                                 $telephone_number_change
        //                                 $cellphone_number_change
        //                                 $father_name_change
        //                                 $father_contact_number_change
        //                                 $father_profession_change
        //                                 $mother_name_change
        //                                 $mother_contact_number_change
        //                                 $mother_profession_change
        //                                 $emergency_contact_name_change
        //                                 $emergency_contact_relationship_change
        //                                 $emergency_contact_number_change
        //                                 $employee_image_update
        //                                 ";
        //             $userlogs->save();
        //         }

        //         $changes = [
        //             [
        //                 'field' => 'FIRST NAME',
        //                 'original_value' => $first_name_orig,
        //                 'new_value' => strtoupper($request->first_name)
        //             ],
        //             [
        //                 'field' => 'MIDDLE NAME',
        //                 'original_value' => $middle_name_orig,
        //                 'new_value' => strtoupper($request->middle_name)
        //             ],
        //             [
        //                 'field' => 'LAST NAME',
        //                 'original_value' => $last_name_orig,
        //                 'new_value' => strtoupper($request->last_name)
        //             ],
        //             [
        //                 'field' => 'SUFFIX',
        //                 'original_value' => $suffix_orig,
        //                 'new_value' => strtoupper($request->suffix)
        //             ],
        //             [
        //                 'field' => 'NICKNAME',
        //                 'original_value' => $nickname_orig,
        //                 'new_value' => strtoupper($request->nickname)
        //             ],
        //             [
        //                 'field' => 'GENDER',
        //                 'original_value' => $gender_orig,
        //                 'new_value' => strtoupper($request->gender)
        //             ],
        //             [
        //                 'field' => 'CIVIL STATUS',
        //                 'original_value' => $civil_status_orig,
        //                 'new_value' => strtoupper($request->civil_status)
        //             ],
        //             [
        //                 'field' => 'BIRTHDAY',
        //                 'original_value' => Carbon::parse($birthday_orig)->format('F d, Y'),
        //                 'new_value' => Carbon::parse($request->birthday)->format('F d, Y')
        //             ],
        //             [
        //                 'field' => 'ADDRESS',
        //                 'original_value' => $address_orig,
        //                 'new_value' => strtoupper($request->address)
        //             ],
        //             [
        //                 'field' => 'OWNERSHIP',
        //                 'original_value' => $ownership_orig,
        //                 'new_value' => strtoupper($request->ownership)
        //             ],
        //             [
        //                 'field' => 'PROVINCE',
        //                 'original_value' => $province_orig,
        //                 'new_value' => strtoupper($request->province)
        //             ],
        //             [
        //                 'field' => 'CITY',
        //                 'original_value' => $city_orig,
        //                 'new_value' => strtoupper($request->city)
        //             ],
        //             [
        //                 'field' => 'REGION',
        //                 'original_value' => $region_orig,
        //                 'new_value' => strtoupper($request->region)
        //             ],
        //             [
        //                 'field' => 'HEIGHT',
        //                 'original_value' => $height_orig,
        //                 'new_value' => $request->height
        //             ],
        //             [
        //                 'field' => 'WEIGHT',
        //                 'original_value' => $weight_orig,
        //                 'new_value' => $request->weight
        //             ],
        //             [
        //                 'field' => 'RELIGION',
        //                 'original_value' => $religion_orig,
        //                 'new_value' => strtoupper($request->religion)
        //             ],
        //             [
        //                 'field' => 'EMAIL ADDRESS',
        //                 'original_value' => $email_address_orig,
        //                 'new_value' => $request->email_address
        //             ],
        //             [
        //                 'field' => 'TELEPHONE NUMBER',
        //                 'original_value' => $telephone_number_orig,
        //                 'new_value' => strtoupper($request->telephone_number)
        //             ],
        //             [
        //                 'field' => 'CELLPHONE NUMBER',
        //                 'original_value' => $cellphone_number_orig,
        //                 'new_value' => strtoupper($request->cellphone_number)
        //             ],
        //             [
        //                 'field' => 'FATHER NAME',
        //                 'original_value' => $father_name_orig,
        //                 'new_value' => strtoupper($request->father_name)
        //             ],
        //             [
        //                 'field' => 'FATHER CONTACT NUMBER',
        //                 'original_value' => $father_contact_number_orig,
        //                 'new_value' => strtoupper($request->father_contact_number)
        //             ],
        //             [
        //                 'field' => 'FATHER PROFESSION',
        //                 'original_value' => $father_profession_orig,
        //                 'new_value' => strtoupper($request->father_profession)
        //             ],
        //             [
        //                 'field' => 'MOTHER NAME',
        //                 'original_value' => $mother_name_orig,
        //                 'new_value' => strtoupper($request->mother_name)
        //             ],
        //             [
        //                 'field' => 'MOTHER CONTACT NUMBER',
        //                 'original_value' => $mother_contact_number_orig,
        //                 'new_value' => strtoupper($request->mother_contact_number)
        //             ],
        //             [
        //                 'field' => 'MOTHER PROFESSION',
        //                 'original_value' => $mother_profession_orig,
        //                 'new_value' => strtoupper($request->mother_profession)
        //             ],
        //             [
        //                 'field' => 'EMERGENCY CONTACT NAME',
        //                 'original_value' => $emergency_contact_name_orig,
        //                 'new_value' => strtoupper($request->emergency_contact_name)
        //             ],
        //             [
        //                 'field' => 'EMERGENCY CONTACT RELATIONSHIP',
        //                 'original_value' => $emergency_contact_relationship_orig,
        //                 'new_value' => strtoupper($request->emergency_contact_relationship)
        //             ],
        //             [
        //                 'field' => 'EMERGENCY CONTACT NUMBER',
        //                 'original_value' => $emergency_contact_number_orig,
        //                 'new_value' => strtoupper($request->emergency_contact_number)
        //             ]
        //         ];

        //         foreach($changes as $change){
        //             if(!empty($change['new_value']) && $change['original_value'] !== $change['new_value']){
        //                 $request_logs = new Requests;
        //                 $request_logs->employee_id = $request->id;
        //                 $request_logs->empno = $empno;
        //                 $request_logs->field = $change['field'];
        //                 $request_logs->original_value = $change['original_value'];
        //                 $request_logs->new_value = $change['new_value'];
        //                 $request_logs->save();
        //             }
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

    public function updateWorkInformation(Request $request){
        if(!$employee_number_orig = WorkInformationTable::where('employee_number', substr($request->employee_number,2))->first()){
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

            $employee_details = PersonalInformationTable::where('id', $request->id)->first();

            $employee = new WorkInformationTable;
            $employee->employee_id = $request->employee_id;
            $employee->employee_number = $request->employee_number;
            $employee->employee_company = $request->employee_company;
            $employee->employee_department = $request->employee_department;
            $employee->employee_branch = $request->employee_branch;
            $employee->employment_status = $request->employment_status;
            $employee->employment_origin = $request->employment_origin;
            $employee->employee_position = $request->employee_position;
            $employee->date_hired = $request->date_hired;
            $employee->save();

            if($request->employee_number != $employee_number_orig){
                $employee_number_new = $request->employee_number;
                if($employee_number_orig === null){
                    $employee_number_orig = 'N/A';
                }
                $employee_number_change = "[EMPLOYEE NUMBER: FROM '$employee_number_orig' TO '$employee_number_new']";
            }
            else{
                $employee_number_change = NULL;
            }

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

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S WORK INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$request->employee_number)
                                    $employee_number_change
                                    $date_hired_change
                                    $employee_company_change
                                    $employee_branch_change
                                    $employee_department_change
                                    $employee_position_change
                                    $employment_status_change
                                    $employment_origin_change
                                    $company_contact_number_change
                                    $hmo_number_change
                                    $sss_number_change
                                    $pag_ibig_number_change
                                    $philhealth_number_change
                                    $tin_number_change
                                    $account_number_change";
            $userlogs->save();

            $userlogs = new EmployeeLogs;
            $userlogs->employee_id = $request->id;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->logs = "USER HAS UPDATED THE WORK INFORMATION DETAILS OF THIS EMPLOYEE
                                $employee_number_change
                                $date_hired_change
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
                                $account_number_change ";
            $userlogs->save();

            $userlogs = new History;
            $userlogs->employee_id = $request->id;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->history = "UPDATED DETAILS
                                $employee_number_change
                                $date_hired_change
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
                                $account_number_change";
            $userlogs->save();
        }
        else{
            $employee = WorkInformationTable::where('employee_id',$request->employee_id)->first();
            $employee_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_number;
            $date_hired_orig = WorkInformationTable::where('employee_id', $request->id)->first()->date_hired;
            $employee_company_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_company;
            $employee_branch_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_branch;
            $employee_department_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_department;
            $employee_position_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_position;
            $employment_status_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employment_status;
            $employment_origin_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employment_origin;
            $company_email_address_orig = WorkInformationTable::where('employee_id', $request->id)->first()->company_email_address;
            $company_contact_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->company_contact_number;
            $hmo_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->hmo_number;
            $sss_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->sss_number;
            $pag_ibig_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->pag_ibig_number;
            $philhealth_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->philhealth_number;
            $tin_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->tin_number;
            $account_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->account_number;

            // if(substr($request->employee_number,2) != $employee_number_orig){
            //     $employee_number_new = $request->employee_number;
            //     $employee_number_change = "[EMPLOYEE NUMBER: FROM '$employee_number_orig' TO '$employee_number_new']";
            // }
            // else{
            //     $employee_number_change = NULL;
            // }

            if($request->date_hired != $date_hired_orig){
                $date_hired1 = Carbon::parse($date_hired_orig)->format('F d, Y');
                $date_hired2 = Carbon::parse($request->date_hired)->format('F d, Y');
                $date_hired_change = "[DATE HIRED: FROM '$date_hired1' TO '$date_hired2']";
            }
            else{
                $date_hired_change = NULL;
            }

            if($request->employee_company != $employee_company_orig){
                $employee_company_orig = Company::where('entity', $employee_company_orig)->first()->company_name;
                $employee_company_new = Company::where('entity', $request->employee_company)->first()->company_name;
                $employee_company_change = "[COMPANY: FROM '$employee_company_orig' TO '$employee_company_new']";
            }
            else{
                $employee_company_change = NULL;
            }

            if($request->employee_branch != $employee_branch_orig){
                $employee_branch_orig = Branch::where('entity03', $employee_branch_orig)->first()->entity03_desc;
                $employee_branch_new = Branch::where('entity03', $request->employee_branch)->first()->entity03_desc;
                $employee_branch_change = "[BRANCH: FROM '$employee_branch_orig' TO '$employee_branch_new']";
            }
            else{
                $employee_branch_change = NULL;
            }

            if($request->employee_department != $employee_department_orig){
                $employee_department_orig = Department::where('deptcode', $employee_department_orig)->first()->deptdesc;
                $employee_department_new = Department::where('deptcode', $request->employee_department)->first()->deptdesc;
                $employee_department_change = "[DEPARTMENT: FROM '$employee_department_orig' TO '$employee_department_new']";
            }
            else{
                $employee_department_change = NULL;
            }

            if($request->employee_position != $employee_position_orig){
                $employee_position_orig = Position::where('id', $employee_position_orig)->first()->job_position_name;
                $employee_position_new = Position::where('id', $request->employee_position)->first()->job_position_name;
                $employee_position_change = "[POSITION: FROM '$employee_position_orig' TO '$employee_position_new']";
            }
            else{
                $employee_position_change = NULL;
            }

            if($request->employment_status != $employment_status_orig){
                $employment_status_new = $request->employment_status;
                $employment_status_change = "[EMPLOYMENT STATUS: FROM '$employment_status_orig' TO '$employment_status_new']";
            }
            else{
                $employment_status_change = NULL;
            }

            if($request->employment_origin != $employment_origin_orig){
                $employment_origin_new = $request->employment_origin;
                $employment_origin_change = "[EMPLOYMENT ORIGIN: FROM '$employment_origin_orig' TO '$employment_origin_new']";
            }
            else{
                $employment_origin_change = NULL;
            }

            if($request->company_email_address != $company_email_address_orig){
                $company_email_address_new = $request->company_email_address;
                $company_email_address_change = "[WORK EMAIL ADDRESS: FROM '$company_email_address_orig' TO '$company_email_address_new']";
            }
            else{
                $company_email_address_change = NULL;
            }

            if($request->company_contact_number != $company_contact_number_orig){
                $company_contact_number_new = $request->company_contact_number;
                $company_contact_number_change = "[WORK CONTACT NO.: FROM '$company_contact_number_orig' TO '$company_contact_number_new']";
            }
            else{
                $company_contact_number_change = NULL;
            }

            if($request->hmo_number != $hmo_number_orig){
                $hmo_number_new = $request->hmo_number;
                $hmo_number_change = "[HMO NO.: FROM '$hmo_number_orig' TO '$hmo_number_new']";
            }
            else{
                $hmo_number_change = NULL;
            }

            if($request->sss_number != $sss_number_orig){
                $sss_number_new = $request->sss_number;
                $sss_number_change = "[SSS NO.: FROM '$sss_number_orig' TO '$sss_number_new']";
            }
            else{
                $sss_number_change = NULL;
            }

            if($request->pag_ibig_number != $pag_ibig_number_orig){
                $pag_ibig_number_new = $request->pag_ibig_number;
                $pag_ibig_number_change = "[PAG-IBIG NO.: FROM '$pag_ibig_number_orig' TO '$pag_ibig_number_new']";
            }
            else{
                $pag_ibig_number_change = NULL;
            }

            if($request->philhealth_number != $philhealth_number_orig){
                $philhealth_number_new = $request->philhealth_number;
                $philhealth_number_change = "[PHILHEALTH NO.: FROM '$philhealth_number_orig' TO '$philhealth_number_new']";
            }
            else{
                $philhealth_number_change = NULL;
            }

            if($request->tin_number != $tin_number_orig){
                $tin_number_new = $request->tin_number;
                $tin_number_change = "[TIN NO.: FROM '$tin_number_orig' TO '$tin_number_new']";
            }
            else{
                $tin_number_change = NULL;
            }

            if($request->account_number != $account_number_orig){
                $account_number_new = $request->account_number;
                $account_number_change = "[ACCOUNT NO.: FROM '$account_number_orig' TO '$account_number_new']";
            }
            else{
                $account_number_change = NULL;
            }

            if(auth()->user()->user_level != 'EMPLOYEE'){
                $sql = WorkInformationTable::where('employee_id',$request->employee_id)
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

                if($sql){

                    $result = 'true';
                    $id = $employee->id;

                    if(
                        // $request->employee_number != $employee_number_orig ||
                        $request->date_hired != $date_hired_orig ||
                        $request->employee_company != $employee_company_orig ||
                        $request->employee_branch != $employee_branch_orig ||
                        $request->employee_position != $employee_position_orig ||
                        $request->employment_status != $employment_status_orig ||
                        $request->employment_origin != $employment_origin_orig ||
                        $request->company_email_address != $company_email_address_orig ||
                        $request->company_contact_number != $company_contact_number_orig ||
                        $request->hmo_number != $hmo_number_orig ||
                        $request->sss_number != $sss_number_orig ||
                        $request->pag_ibig_number != $pag_ibig_number_orig ||
                        $request->philhealth_number != $philhealth_number_orig ||
                        $request->tin_number != $tin_number_orig ||
                        $request->account_number != $account_number_orig ||
                        $request->employee_department != $employee_department_orig
                        ){
                        $employee_details = PersonalInformationTable::where('id', $request->id)->first();
                        $userlogs = new EmployeeLogs;
                        $userlogs->employee_id = $request->id;
                        $userlogs->user_id = auth()->user()->id;
                        $userlogs->logs = "USER HAS UPDATED THE WORK INFORMATION DETAILS OF THIS EMPLOYEE
                                            $date_hired_change
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
                                            $account_number_change ";
                        $userlogs->save();

                        $userlogs = new History;
                        $userlogs->employee_id = $request->id;
                        $userlogs->user_id = auth()->user()->id;
                        $userlogs->history = "UPDATED DETAILS
                                            $date_hired_change
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
                                            $account_number_change";
                        $userlogs->save();

                        $userlogs = new UserLogs;
                        $userlogs->user_id = auth()->user()->id;
                        $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S WORK INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number_orig)
                                                $date_hired_change
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
                                                $account_number_change";
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
            // else{
            //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
            //     $sql = WorkInformationTablePending::where('employee_id',$request->employee_id)
            //         ->create([
            //             'employee_id' => $emp_id,
            //             'employee_number' => $request->employee_number,
            //             'date_hired' => $request->date_hired,
            //             // 'employee_shift' => $request->employee_shift,
            //             'employee_company' => $request->employee_company,
            //             'employee_branch' => $request->employee_branch,
            //             'employee_department' => $request->employee_department,
            //             'employee_position' => $request->employee_position,
            //             'employment_status' => $request->employment_status,
            //             'employment_origin' => $request->employment_origin,
            //             'company_email_address' => $request->company_email_address,
            //             'company_contact_number' => $request->company_contact_number,
            //             'hmo_number' => $request->hmo_number,
            //             'sss_number' => $request->sss_number,
            //             'pag_ibig_number' => $request->pag_ibig_number,
            //             'philhealth_number' => $request->philhealth_number,
            //             'tin_number' => $request->tin_number,
            //             'account_number' => $request->account_number,
            //         ]);
            // }
        }
    }

    public function updateEducationalAttainment(Request $request){
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee_details = PersonalInformationTable::where('id', $request->id)->first();
            $employee = EducationalAttainment::where('employee_id',$request->employee_id)->first();
                if(!$employee){
                    if($request->secondary_school_name
                    || $request->secondary_school_address
                    || $request->secondary_school_inclusive_years_from
                    || $request->secondary_school_inclusive_years_to
                    || $request->primary_school_name
                    || $request->primary_school_address
                    || $request->primary_school_inclusive_years_from
                    || $request->primary_school_inclusive_years_to
                    ){
                        $secondary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $secondary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $secondary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $secondary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $secondary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $primary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $primary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $primary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first();
                        $primary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first();

                        $employee = new EducationalAttainment;
                        $employee->employee_id = $request->employee_id;
                        $employee->empno = substr($request->employee_number, 2);
                        $employee->secondary_school_name = strtoupper($request->secondary_school_name);
                        $employee->secondary_school_address = strtoupper($request->secondary_school_address);
                        $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
                        $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
                        $employee->primary_school_name = strtoupper($request->primary_school_name);
                        $employee->primary_school_address = strtoupper($request->primary_school_address);
                        $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
                        $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
                        $employee->save();

                        if($request->secondary_school_name != $secondary_school_name_orig){
                            $secondary_school_name_new = strtoupper($request->secondary_school_name);
                            $secondary_school_name_orig = $secondary_school_name_orig ? $secondary_school_name_orig :'N/A';
                            $secondary_school_name_change = "[SECONDARY SCHOOL NAME: FROM '$secondary_school_name_orig' TO '$secondary_school_name_new']";
                        }
                        else{
                            $secondary_school_name_change = NULL;
                        }

                        if($request->secondary_school_address != $secondary_school_address_orig){
                            $secondary_school_address_new = strtoupper($request->secondary_school_address);
                            $secondary_school_address_orig = $secondary_school_address_orig ? $secondary_school_address_orig :'N/A';
                            $secondary_school_address_change = "[SECONDARY SCHOOL ADDRESS: FROM '$secondary_school_address_orig' TO '$secondary_school_address_new']";
                        }
                        else{
                            $secondary_school_address_change = NULL;
                        }

                        if($request->secondary_school_inclusive_years_from != $secondary_school_inclusive_years_from_orig){
                            $secondary_school_inclusive_years_from_1 = ($secondary_school_inclusive_years_from_orig !== null) ? Carbon::parse($secondary_school_inclusive_years_from_orig)->format('F Y') : 'N/A';
                            $secondary_school_inclusive_years_from_2 = Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y');
                            $secondary_school_inclusive_years_from_change = "[SECONDARY SCHOOL START YEAR/MONTH: FROM '$secondary_school_inclusive_years_from_1' TO '$secondary_school_inclusive_years_from_2']";
                        }
                        else{
                            $secondary_school_inclusive_years_from_change = NULL;
                        }

                        if($request->secondary_school_inclusive_years_to != $secondary_school_inclusive_years_to_orig){
                            $secondary_school_inclusive_years_to_1 = ($secondary_school_inclusive_years_from_orig !== null) ? Carbon::parse($secondary_school_inclusive_years_to_orig)->format('F Y') : 'N/A';
                            $secondary_school_inclusive_years_to_2 = Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y');
                            $secondary_school_inclusive_years_to_change = "[SECONDARY SCHOOL END YEAR/MONTH: FROM '$secondary_school_inclusive_years_to_1' TO '$secondary_school_inclusive_years_to_2']";
                        }
                        else{
                            $secondary_school_inclusive_years_to_change = NULL;
                        }

                        if($request->primary_school_name != $primary_school_name_orig){
                            $primary_school_name_new = strtoupper($request->primary_school_name);
                            $primary_school_name_orig = $primary_school_name_orig ? $primary_school_name_orig :'N/A';
                            $primary_school_name_change = "[PRIMARY SCHOOL NAME: FROM '$primary_school_name_orig' TO '$primary_school_name_new']";
                        }
                        else{
                            $primary_school_name_change = NULL;
                        }

                        if($request->primary_school_address != $primary_school_address_orig){
                            $primary_school_address_new = strtoupper($request->primary_school_address);
                            $primary_school_address_orig = $primary_school_address_orig ? $primary_school_address_orig :'N/A';
                            $primary_school_address_change = "[PRIMARY SCHOOL ADDRESS: FROM '$primary_school_address_orig' TO '$primary_school_address_new']";
                        }
                        else{
                            $primary_school_address_change = NULL;
                        }

                        if($request->primary_school_inclusive_years_from != $primary_school_inclusive_years_from_orig){
                            $primary_school_inclusive_years_from_1 = ($primary_school_inclusive_years_from_orig !== null) ? Carbon::parse($primary_school_inclusive_years_from_orig)->format('F Y') : 'N/A';
                            $primary_school_inclusive_years_from_2 = Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y');
                            $primary_school_inclusive_years_from_change = "[PRIMARY SCHOOL START YEAR/MONTH: FROM '$primary_school_inclusive_years_from_1' TO '$primary_school_inclusive_years_from_2']";
                        }
                        else{
                            $primary_school_inclusive_years_from_change = NULL;
                        }

                        if($request->primary_school_inclusive_years_to != $primary_school_inclusive_years_to_orig){
                            $primary_school_inclusive_years_to_1 = ($primary_school_inclusive_years_from_orig !== null) ? Carbon::parse($primary_school_inclusive_years_to_orig)->format('F Y') : 'N/A';
                            $primary_school_inclusive_years_to_2 = Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y');
                            $primary_school_inclusive_years_to_change = "[PRIMARY SCHOOL END YEAR/MONTH: FROM '$primary_school_inclusive_years_to_1' TO '$primary_school_inclusive_years_to_2']";
                        }
                        else{
                            $primary_school_inclusive_years_to_change = NULL;
                        }

                        $userlogs = new UserLogs;
                        $userlogs->user_id = auth()->user()->id;
                        $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EDUCATION INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                                $secondary_school_name_change
                                                $secondary_school_address_change
                                                $secondary_school_inclusive_years_from_change
                                                $secondary_school_inclusive_years_to_change
                                                $primary_school_name_change
                                                $primary_school_address_change
                                                $primary_school_inclusive_years_from_change
                                                $primary_school_inclusive_years_to_change
                                                ";
                        $userlogs->save();

                        $employee_logs = new EmployeeLogs;
                        $employee_logs->employee_id = $request->id;
                        $employee_logs->user_id = auth()->user()->id;
                        $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
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
                    $secondary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_name;
                    $secondary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_address;
                    $secondary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_inclusive_years_from;
                    $secondary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_inclusive_years_to;
                    $primary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_name;
                    $primary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_address;
                    $primary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_inclusive_years_from;
                    $primary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_inclusive_years_to;

                    if($request->secondary_school_name != $secondary_school_name_orig){
                        $secondary_school_name_new = strtoupper($request->secondary_school_name);
                        $secondary_school_name_change = "[SECONDARY SCHOOL NAME: FROM '$secondary_school_name_orig' TO '$secondary_school_name_new']";
                    }
                    else{
                        $secondary_school_name_change = NULL;
                    }

                    if($request->secondary_school_address != $secondary_school_address_orig){
                        $secondary_school_address_new = strtoupper($request->secondary_school_address);
                        $secondary_school_address_change = "[SECONDARY SCHOOL ADDRESS: FROM '$secondary_school_address_orig' TO '$secondary_school_address_new']";
                    }
                    else{
                        $secondary_school_address_change = NULL;
                    }

                    if($request->secondary_school_inclusive_years_from != $secondary_school_inclusive_years_from_orig){
                        $secondary_school_inclusive_years_from_1 = Carbon::parse($secondary_school_inclusive_years_from_orig)->format('F Y');
                        $secondary_school_inclusive_years_from_2 = Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y');
                        $secondary_school_inclusive_years_from_change = "[SECONDARY SCHOOL START YEAR/MONTH: FROM '$secondary_school_inclusive_years_from_1' TO '$secondary_school_inclusive_years_from_2']";
                    }
                    else{
                        $secondary_school_inclusive_years_from_change = NULL;
                    }

                    if($request->secondary_school_inclusive_years_to != $secondary_school_inclusive_years_to_orig){
                        $secondary_school_inclusive_years_to_1 = Carbon::parse($secondary_school_inclusive_years_to_orig)->format('F Y');
                        $secondary_school_inclusive_years_to_2 = Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y');
                        $secondary_school_inclusive_years_to_change = "[SECONDARY SCHOOL END YEAR/MONTH: FROM '$secondary_school_inclusive_years_to_1' TO '$secondary_school_inclusive_years_to_2']";
                    }
                    else{
                        $secondary_school_inclusive_years_to_change = NULL;
                    }

                    if($request->primary_school_name != $primary_school_name_orig){
                        $primary_school_name_new = strtoupper($request->primary_school_name);
                        $primary_school_name_change = "[PRIMARY SCHOOL NAME: FROM '$primary_school_name_orig' TO '$primary_school_name_new']";
                    }
                    else{
                        $primary_school_name_change = NULL;
                    }

                    if($request->primary_school_address != $primary_school_address_orig){
                        $primary_school_address_new = strtoupper($request->primary_school_address);
                        $primary_school_address_change = "[PRIMARY SCHOOL ADDRESS: FROM '$primary_school_address_orig' TO '$primary_school_address_new']";
                    }
                    else{
                        $primary_school_address_change = NULL;
                    }

                    if($request->primary_school_inclusive_years_from != $primary_school_inclusive_years_from_orig){
                        $primary_school_inclusive_years_from_1 = Carbon::parse($primary_school_inclusive_years_from_orig)->format('F Y');
                        $primary_school_inclusive_years_from_2 = Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y');
                        $primary_school_inclusive_years_from_change = "[PRIMARY SCHOOL START YEAR/MONTH: FROM '$primary_school_inclusive_years_from_1' TO '$primary_school_inclusive_years_from_2']";
                    }
                    else{
                        $primary_school_inclusive_years_from_change = NULL;
                    }

                    if($request->primary_school_inclusive_years_to != $primary_school_inclusive_years_to_orig){
                        $primary_school_inclusive_years_to_1 = Carbon::parse($primary_school_inclusive_years_to_orig)->format('F Y');
                        $primary_school_inclusive_years_to_2 = Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y');
                        $primary_school_inclusive_years_to_change = "[PRIMARY SCHOOL END YEAR/MONTH: FROM '$primary_school_inclusive_years_to_1' TO '$primary_school_inclusive_years_to_2']";
                    }
                    else{
                        $primary_school_inclusive_years_to_change = NULL;
                    }

                    $sql = EducationalAttainment::where('employee_id',$request->employee_id)
                    ->update([
                        'secondary_school_name' => strtoupper($request->secondary_school_name),
                        'secondary_school_address' => strtoupper($request->secondary_school_address),
                        'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
                        'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
                        'primary_school_name' => strtoupper($request->primary_school_name),
                        'primary_school_address' => strtoupper($request->primary_school_address),
                        'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
                        'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to,
                    ]);

                    if($sql){

                        $result = 'true';
                        $id = $employee->id;

                        if(
                            $request->secondary_school_name != $secondary_school_name_orig ||
                            $request->secondary_school_address != $secondary_school_address_orig ||
                            $request->secondary_school_inclusive_years_from != $secondary_school_inclusive_years_from_orig ||
                            $request->secondary_school_inclusive_years_to != $secondary_school_inclusive_years_to_orig ||
                            $request->primary_school_name != $primary_school_name_orig ||
                            $request->primary_school_address != $primary_school_address_orig ||
                            $request->primary_school_inclusive_years_from != $primary_school_inclusive_years_from_orig ||
                            $request->primary_school_inclusive_years_to != $primary_school_inclusive_years_to_orig
                        ){

                            $employee_logs = new EmployeeLogs;
                            $employee_logs->employee_id = $request->id;
                            $employee_logs->user_id = auth()->user()->id;
                            $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
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

                            $userlogs = new UserLogs;
                            $userlogs->user_id = auth()->user()->id;
                            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EDUCATION INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                                    $secondary_school_name_change
                                                    $secondary_school_address_change
                                                    $secondary_school_inclusive_years_from_change
                                                    $secondary_school_inclusive_years_to_change
                                                    $primary_school_name_change
                                                    $primary_school_address_change
                                                    $primary_school_inclusive_years_from_change
                                                    $primary_school_inclusive_years_to_change
                                                    ";
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
        }
        // EMPLOYEE EDUCATION
        // else{
        //     $employee = EducationalAttainment::where('employee_id',$request->employee_id)->first();
        //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
        //     $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        //     $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        //     if(!$employee){
        //         if(
        //             $request->secondary_school_name
        //          || $request->secondary_school_address
        //          || $request->secondary_school_inclusive_years_from
        //          || $request->secondary_school_inclusive_years_to
        //          || $request->primary_school_name
        //          || $request->primary_school_address
        //          || $request->primary_school_inclusive_years_from
        //          || $request->primary_school_inclusive_years_to
        //         ){
        //             $sql = EducationalAttainmentPending::where('employee_id',$request->employee_id)
        //                 ->create([
        //                     'employee_id' => $emp_id,
        //                     'empno' => $employee_number,
        //                     'secondary_school_name' => strtoupper($request->secondary_school_name),
        //                     'secondary_school_address' => strtoupper($request->secondary_school_address),
        //                     'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
        //                     'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
        //                     'primary_school_name' => strtoupper($request->primary_school_name),
        //                     'primary_school_address' => strtoupper($request->primary_school_address),
        //                     'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
        //                     'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to
        //                 ]);

        //             if($sql){
        //                 if($request->primary_school_name){
        //                     $primary_school_name_logs = "[PRIMARY SCHOOL NAME: ".strtoupper($request->primary_school_name)."]";
        //                 }
        //                 else{
        //                     $primary_school_name_logs = NULL;
        //                 }
        //                 if($request->primary_school_address){
        //                     $primary_school_address_logs = "[PRIMARY SCHOOL ADDRESS: ".strtoupper($request->primary_school_address)."]";
        //                 }
        //                 else{
        //                     $primary_school_address_logs = NULL;
        //                 }
        //                 if($request->primary_school_inclusive_years_from){
        //                     $primary_school_inclusive_years_from_logs = "[PRIMARY SCHOOL START YEAR/MONTH: ".Carbon::parse($request->primary_school_inclusive_years_from)->format('F, Y')."]";
        //                 }
        //                 else{
        //                     $primary_school_inclusive_years_from_logs = NULL;
        //                 }
        //                 if($request->primary_school_inclusive_years_to){
        //                     $primary_school_inclusive_years_to_logs = "[PRIMARY SCHOOL END YEAR/MONTH: ".Carbon::parse($request->primary_school_inclusive_years_to)->format('F, Y')."]";
        //                 }
        //                 else{
        //                     $primary_school_inclusive_years_to_logs = NULL;
        //                 }
        //                 if($request->secondary_school_name){
        //                     $secondary_school_name_logs = "[SECONDARY SCHOOL NAME: ".strtoupper($request->secondary_school_name)."]";
        //                 }
        //                 else{
        //                     $secondary_school_name_logs = NULL;
        //                 }
        //                 if($request->secondary_school_address){
        //                     $secondary_school_address_logs = "[SECONDARY SCHOOL ADDRESS: ".strtoupper($request->secondary_school_address)."]";
        //                 }
        //                 else{
        //                     $secondary_school_address_logs = NULL;
        //                 }
        //                 if($request->secondary_school_inclusive_years_from){
        //                     $secondary_school_inclusive_years_from_logs = "[SECONDARY SCHOOL START YEAR/MONTH: ".Carbon::parse($request->secondary_school_inclusive_years_from)->format('F, Y')."]";
        //                 }
        //                 else{
        //                     $secondary_school_inclusive_years_from_logs = NULL;
        //                 }
        //                 if($request->secondary_school_inclusive_years_to){
        //                     $secondary_school_inclusive_years_to_logs = "[SECONDARY SCHOOL END YEAR/MONTH: ".Carbon::parse($request->secondary_school_inclusive_years_to)->format('F, Y')."]";
        //                 }
        //                 else{
        //                     $secondary_school_inclusive_years_to_logs = NULL;
        //                 }

        //                 $userlogs = new UserLogs;
        //                 $userlogs->user_id = auth()->user()->id;
        //                 $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE EDUCATIONAL INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
        //                                         $primary_school_name_logs
        //                                         $primary_school_address_logs
        //                                         $primary_school_inclusive_years_from_logs
        //                                         $primary_school_inclusive_years_to_logs
        //                                         $secondary_school_name_logs
        //                                         $secondary_school_address_logs
        //                                         $secondary_school_inclusive_years_from_logs
        //                                         $secondary_school_inclusive_years_to_logs
        //                                         ";
        //                 $userlogs->save();
        //             }
        //         }
        //     }
        //     else{
        //         $secondary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_name;
        //         $secondary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_address;
        //         $secondary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_inclusive_years_from;
        //         $secondary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_inclusive_years_to;
        //         $primary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_name;
        //         $primary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_address;
        //         $primary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_inclusive_years_from;
        //         $primary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_inclusive_years_to;

        //         if($request->secondary_school_name != $secondary_school_name_orig){
        //             $secondary_school_name_new = strtoupper($request->secondary_school_name);
        //             $secondary_school_name_change = "[SECONDARY SCHOOL NAME: FROM '$secondary_school_name_orig' TO '$secondary_school_name_new']";
        //         }
        //         else{
        //             $secondary_school_name_change = NULL;
        //         }

        //         if($request->secondary_school_address != $secondary_school_address_orig){
        //             $secondary_school_address_new = strtoupper($request->secondary_school_address);
        //             $secondary_school_address_change = "[SECONDARY SCHOOL ADDRESS: FROM '$secondary_school_address_orig' TO '$secondary_school_address_new']";
        //         }
        //         else{
        //             $secondary_school_address_change = NULL;
        //         }

        //         if($request->secondary_school_inclusive_years_from != $secondary_school_inclusive_years_from_orig){
        //             $secondary_school_inclusive_years_from_1 = Carbon::parse($secondary_school_inclusive_years_from_orig)->format('F Y');
        //             $secondary_school_inclusive_years_from_2 = Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y');
        //             $secondary_school_inclusive_years_from_change = "[SECONDARY SCHOOL START YEAR/MONTH: FROM '$secondary_school_inclusive_years_from_1' TO '$secondary_school_inclusive_years_from_2']";
        //         }
        //         else{
        //             $secondary_school_inclusive_years_from_change = NULL;
        //         }

        //         if($request->secondary_school_inclusive_years_to != $secondary_school_inclusive_years_to_orig){
        //             $secondary_school_inclusive_years_to_1 = Carbon::parse($secondary_school_inclusive_years_to_orig)->format('F Y');
        //             $secondary_school_inclusive_years_to_2 = Carbon::parse($request->secondary_school_inclusive_years_from)->format('F Y');
        //             $secondary_school_inclusive_years_to_change = "[SECONDARY SCHOOL END YEAR/MONTH: FROM '$secondary_school_inclusive_years_to_1' TO '$secondary_school_inclusive_years_to_2']";
        //         }
        //         else{
        //             $secondary_school_inclusive_years_to_change = NULL;
        //         }

        //         if($request->primary_school_name != $primary_school_name_orig){
        //             $primary_school_name_new = strtoupper($request->primary_school_name);
        //             $primary_school_name_change = "[PRIMARY SCHOOL NAME: FROM '$primary_school_name_orig' TO '$primary_school_name_new']";
        //         }
        //         else{
        //             $primary_school_name_change = NULL;
        //         }

        //         if($request->primary_school_address != $primary_school_address_orig){
        //             $primary_school_address_new = strtoupper($request->primary_school_address);
        //             $primary_school_address_change = "[PRIMARY SCHOOL ADDRESS: FROM '$primary_school_address_orig' TO '$primary_school_address_new']";
        //         }
        //         else{
        //             $primary_school_address_change = NULL;
        //         }

        //         if($request->primary_school_inclusive_years_from != $primary_school_inclusive_years_from_orig){
        //             $primary_school_inclusive_years_from_1 = Carbon::parse($primary_school_inclusive_years_from_orig)->format('F Y');
        //             $primary_school_inclusive_years_from_2 = Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y');
        //             $primary_school_inclusive_years_from_change = "[PRIMARY SCHOOL START YEAR/MONTH: FROM '$primary_school_inclusive_years_from_1' TO '$primary_school_inclusive_years_from_2']";
        //         }
        //         else{
        //             $primary_school_inclusive_years_from_change = NULL;
        //         }

        //         if($request->primary_school_inclusive_years_to != $primary_school_inclusive_years_to_orig){
        //             $primary_school_inclusive_years_to_1 = Carbon::parse($primary_school_inclusive_years_to_orig)->format('F Y');
        //             $primary_school_inclusive_years_to_2 = Carbon::parse($request->primary_school_inclusive_years_from)->format('F Y');
        //             $primary_school_inclusive_years_to_change = "[PRIMARY SCHOOL END YEAR/MONTH: FROM '$primary_school_inclusive_years_to_1' TO '$primary_school_inclusive_years_to_2']";
        //         }
        //         else{
        //             $primary_school_inclusive_years_to_change = NULL;
        //         }

        //         $sql = EducationalAttainmentPending::where('employee_id',$request->employee_id)
        //         ->create([
        //             'employee_id' => $emp_id,
        //             'empno' => $employee_number,
        //             'secondary_school_name' => $request->secondary_school_name,
        //             'secondary_school_address' => $request->secondary_school_address,
        //             'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
        //             'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
        //             'primary_school_name' => $request->primary_school_name,
        //             'primary_school_address' => $request->primary_school_address,
        //             'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
        //             'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to,
        //         ]);

        //         if($sql){
        //             $result = 'true';
        //             $id = $employee->id;

        //             if(
        //                 $request->secondary_school_name != $secondary_school_name_orig ||
        //                 $request->secondary_school_address != $secondary_school_address_orig ||
        //                 $request->secondary_school_inclusive_years_from != $secondary_school_inclusive_years_from_orig ||
        //                 $request->secondary_school_inclusive_years_to != $secondary_school_inclusive_years_to_orig ||
        //                 $request->primary_school_name != $primary_school_name_orig ||
        //                 $request->primary_school_address != $primary_school_address_orig ||
        //                 $request->primary_school_inclusive_years_from != $primary_school_inclusive_years_from_orig ||
        //                 $request->primary_school_inclusive_years_to != $primary_school_inclusive_years_to_orig
        //             ){

        //                 $userlogs = new UserLogs;
        //                 $userlogs->user_id = auth()->user()->id;
        //                 $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE EDUCATIONAL INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
        //                                         $secondary_school_name_change
        //                                         $secondary_school_address_change
        //                                         $secondary_school_inclusive_years_from_change
        //                                         $secondary_school_inclusive_years_to_change
        //                                         $primary_school_name_change
        //                                         $primary_school_address_change
        //                                         $primary_school_inclusive_years_from_change
        //                                         $primary_school_inclusive_years_to_change
        //                                         ";
        //                 $userlogs->save();
        //             }
        //         }
        //         else{
        //             $result = 'false';
        //             $id = '';
        //         }
        //         $data = array('result' => $result, 'id' => $id);
        //         return response()->json($data);
        //     }
        // }
    }

    public function updateMedicalHistory(Request $request){
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee = MedicalHistory::where('employee_id',$request->employee_id)->first();

            if(!$employee){
                if($request->past_medical_condition ||
                   $request->allergies ||
                   $request->medication ||
                   $request->psychological_history
                ){
                    $past_medical_condition_orig = MedicalHistory::where('employee_id',$request->id)->first();
                    $allergies_orig = MedicalHistory::where('employee_id',$request->id)->first();
                    $medication_orig = MedicalHistory::where('employee_id',$request->id)->first();
                    $psychological_history_orig = MedicalHistory::where('employee_id',$request->id)->first();

                    $employee = new MedicalHistory;
                    $employee->employee_id = $request->employee_id;
                    if(strpos($request->empno, 'ID') !== false ||
                        strpos($request->empno, 'PL') !== false ||
                        strpos($request->empno, 'AP') !== false ||
                        strpos($request->empno, 'MJ') !== false ||
                        strpos($request->empno, 'NU') !== false){
                        $employee->empno = substr($request->empno, 2);
                    }
                    else{
                        $employee->empno = $request->empno;
                    }
                    $employee->past_medical_condition = strtoupper($request->past_medical_condition);
                    $employee->allergies = strtoupper($request->allergies);
                    $employee->medication = strtoupper($request->medication);
                    $employee->psychological_history = strtoupper($request->psychological_history);
                    $employee->save();

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

                    $employee_logs = new EmployeeLogs;
                    $employee_logs->employee_id = $request->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
                                            $past_medical_condition_change
                                            $allergies_change
                                            $medication_change
                                            $psychological_history_change
                                            ";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $past_medical_condition_change
                                            $allergies_change
                                            $medication_change
                                            $psychological_history_change
                                            ";
                    $userlogs->save();
                }
            }
            else{
                $past_medical_condition_orig = MedicalHistory::where('employee_id',$request->id)->first()->past_medical_condition;
                $allergies_orig = MedicalHistory::where('employee_id',$request->id)->first()->allergies;
                $medication_orig = MedicalHistory::where('employee_id',$request->id)->first()->medication;
                $psychological_history_orig = MedicalHistory::where('employee_id',$request->id)->first()->psychological_history;

                if($request->past_medical_condition != $past_medical_condition_orig){
                    $past_medical_condition_new = $request->past_medical_condition;
                    $past_medical_condition_change = "[PAST MEDICAL CONDITION: FROM '$past_medical_condition_orig' TO '$past_medical_condition_new']";
                }
                else{
                    $past_medical_condition_change = NULL;
                }

                if($request->allergies != $allergies_orig){
                    $allergies_new = $request->allergies;
                    $allergies_change = "[ALLERGIES: FROM '$allergies_orig' TO '$allergies_new']";
                }
                else{
                    $allergies_change = NULL;
                }

                if($request->medication != $medication_orig){
                    $medication_new = $request->medication;
                    $medication_change = "[MEDICATION: FROM '$medication_orig' TO '$medication_new']";
                }
                else{
                    $medication_change = NULL;
                }

                if($request->psychological_history != $psychological_history_orig){
                    $psychological_history_new = $request->psychological_history;
                    $psychological_history_change = "[PSYCHOLOGICAL HISTORY: FROM '$psychological_history_orig' TO '$psychological_history_new']";
                }
                else{
                    $psychological_history_change = NULL;
                }

                $sql = MedicalHistory::where('employee_id',$request->employee_id)
                        ->update([
                            'past_medical_condition' => strtoupper($request->past_medical_condition),
                            'allergies' => strtoupper($request->allergies),
                            'medication' => strtoupper($request->medication),
                            'psychological_history' => strtoupper($request->psychological_history),
                        ]);

                if($sql){

                    $result = 'true';
                    $id = $employee->id;

                    if(
                        $request->past_medical_condition != $past_medical_condition_orig ||
                        $request->allergies != $allergies_orig ||
                        $request->medication != $medication_orig ||
                        $request->psychological_history != $psychological_history_orig
                    ){
                        $employee_logs = new EmployeeLogs;
                        $employee_logs->employee_id = $request->id;
                        $employee_logs->user_id = auth()->user()->id;
                        $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
                                                $past_medical_condition_change
                                                $allergies_change
                                                $medication_change
                                                $psychological_history_change
                                                ";
                        $employee_logs->save();

                        $userlogs = new UserLogs;
                        $userlogs->user_id = auth()->user()->id;
                        $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S MEDICAL HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                                $past_medical_condition_change
                                                $allergies_change
                                                $medication_change
                                                $psychological_history_change
                                                ";
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
        }
        // EMPLOYEE MEDICAL
        // else{
        //     $employee = MedicalHistory::where('employee_id', $request->employee_id)->first();
        //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
        //     $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        //     $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        //     if(!$employee){
        //         if(
        //            $request->past_medical_condition
        //         || $request->allergies
        //         || $request->medication
        //         || $request->psychological_history
        //         ){
        //             $sql = MedicalHistoryPending::where('employee_id',$request->employee_id)
        //             ->create([
        //                 'employee_id' => $emp_id,
        //                 'empno' => $employee_number,
        //                 'past_medical_condition' => strtoupper($request->past_medical_condition),
        //                 'allergies' => strtoupper($request->allergies),
        //                 'medication' => strtoupper($request->medication),
        //                 'psychological_history' => strtoupper($request->psychological_history)
        //             ]);

        //             if($sql){
        //                 if($request->past_medical_condition){
        //                     $past_medical_condition_logs = "[PAST MEDICAL CONDITION: ".strtoupper($request->past_medical_condition)."]";
        //                 }
        //                 else{
        //                     $past_medical_condition_logs = NULL;
        //                 }

        //                 if($request->allergies){
        //                     $allergies_logs = "[ALLERGIES: ".strtoupper($request->allergies)."]";
        //                 }
        //                 else{
        //                     $allergies_logs = NULL;
        //                 }

        //                 if($request->medication){
        //                     $medication_logs = "[MEDICATION: ".strtoupper($request->medication)."]";
        //                 }
        //                 else{
        //                     $medication_logs = NULL;
        //                 }

        //                 if($request->psychological_history){
        //                     $psychological_history_logs = "[PSYCHOLOGICAL HISTORY: ".strtoupper($request->psychological_history)."]";
        //                 }
        //                 else{
        //                     $psychological_history_logs = NULL;
        //                 }

        //                 $userlogs = new UserLogs;
        //                 $userlogs->user_id = auth()->user()->id;
        //                 $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE MEDICAL HISTORY INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
        //                                         $past_medical_condition_logs
        //                                         $allergies_logs
        //                                         $medication_logs
        //                                         $psychological_history_logs
        //                                         ";
        //                 $userlogs->save();
        //             }
        //         }
        //     }
        //     else{
        //         $past_medical_condition_orig = MedicalHistory::where('employee_id',$request->id)->first()->past_medical_condition;
        //         $allergies_orig = MedicalHistory::where('employee_id',$request->id)->first()->allergies;
        //         $medication_orig = MedicalHistory::where('employee_id',$request->id)->first()->medication;
        //         $psychological_history_orig = MedicalHistory::where('employee_id',$request->id)->first()->psychological_history;

        //         if($request->past_medical_condition != $past_medical_condition_orig){
        //             $past_medical_condition_new = strtoupper($request->past_medical_condition);
        //             $past_medical_condition_change = "[PAST MEDICAL CONDITION: FROM '$past_medical_condition_orig' TO '$past_medical_condition_new']";
        //         }
        //         else{
        //             $past_medical_condition_change = NULL;
        //         }

        //         if($request->allergies != $allergies_orig){
        //             $allergies_new = strtoupper($request->allergies);
        //             $allergies_change = "[ALLERGIES: FROM '$allergies_orig' TO '$allergies_new']";
        //         }
        //         else{
        //             $allergies_change = NULL;
        //         }

        //         if($request->medication != $medication_orig){
        //             $medication_new = strtoupper($request->medication);
        //             $medication_change = "[MEDICATION: FROM '$medication_orig' TO '$medication_new']";
        //         }
        //         else{
        //             $medication_change = NULL;
        //         }

        //         if($request->psychological_history != $psychological_history_orig){
        //             $psychological_history_new = strtoupper($request->psychological_history);
        //             $psychological_history_change = "[PSYCHOLOGICAL HISTORY: FROM '$psychological_history_orig' TO '$psychological_history_new']";
        //         }
        //         else{
        //             $psychological_history_change = NULL;
        //         }

        //         $sql = MedicalHistoryPending::where('employee_id',$request->employee_id)
        //             ->create([
        //                 'employee_id' => $emp_id,
        //                 'empno' => $employee_number,
        //                 'past_medical_condition' => strtoupper($request->past_medical_condition),
        //                 'allergies' => strtoupper($request->allergies),
        //                 'medication' => strtoupper($request->medication),
        //                 'psychological_history' => strtoupper($request->psychological_history)
        //             ]);

        //             if($sql){

        //                 $result = 'true';
        //                 $id = $employee->id;

        //                 if(
        //                     $request->past_medical_condition != $past_medical_condition_orig ||
        //                     $request->allergies != $allergies_orig ||
        //                     $request->medication != $medication_orig ||
        //                     $request->psychological_history != $psychological_history_orig
        //                 ){

        //                     $userlogs = new UserLogs;
        //                     $userlogs->user_id = auth()->user()->id;
        //                     $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE MEDICAL HISTORY INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
        //                                             $past_medical_condition_change
        //                                             $allergies_change
        //                                             $medication_change
        //                                             $psychological_history_change
        //                                             ";
        //                     $userlogs->save();
        //                 }
        //             }
        //             else{
        //                 $result = 'false';
        //                 $id = '';
        //             }
        //             $data = array('result' => $result, 'id' => $id);
        //             return response()->json($data);
        //     }
        // }
    }

    public function updateCompensationBenefits(Request $request){
        $employee = CompensationBenefits::where('employee_id',$request->employee_id)->first();
        if(!$employee){
            if( $request->employee_insurance){
                $employee = new CompensationBenefits;
                $employee->employee_id = $request->employee_id;
                $employee->employee_insurance = strtoupper($request->employee_insurance);
                $employee->save();
            }
        }
        else{
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee_details = PersonalInformationTable::where('id', $request->id)->first();
            $employee_insurance_orig = CompensationBenefits::where('employee_id',$request->id)->first()->employee_insurance;

            if($request->employee_insurance != $employee_insurance_orig){
                $employee_insurance_new = $request->employee_insurance;
                $employee_insurance_change = "[HEALTHCARE / BENEFITS: FROM '$employee_insurance_orig' TO '$employee_insurance_new']";
            }
            else{
                $employee_insurance_change = NULL;
            }

            $sql = CompensationBenefits::where('employee_id',$request->employee_id)
            ->update(['employee_insurance' => strtoupper($request->employee_insurance)]);

            if($sql){

                $result = 'true';
                $id = $employee->id;

                if($request->employee_insurance != $employee_insurance_orig){
                    $employee_logs = new EmployeeLogs;
                    $employee_logs->employee_id = $request->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE: $employee_insurance_change";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EDUCATION INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $employee_insurance_change";
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
    }

    public function updateDocuments(Request $request){
        $date = Carbon::now();
        $timestamp = date("ymdHis", strtotime($date));
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee = Document::where('employee_id',$request->employee_id)->first();

        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach ($request->file('memo_file') as $key => $value) {
                $count = Str::random(2);
                $memoFileName = $employee_details->empno.'_Memo_File_'.$timestamp.'_'.$count.'.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name, $memoFileName);

                $memo = new MemoTable;
                $memo->employee_id = $request->employee_id;
                $memo->memo_subject = strtoupper($request->memo_subject[$key]);
                $memo->memo_date = $request->memo_date[$key];
                $memo->memo_penalty = $request->memo_penalty[$key];
                $memo->memo_file = $memoFileName;
                $memo->save();
            }

            if($request->memo_change == 'CHANGED'){
                $memo_update = "[MEMO: LIST OF MEMO HAVE BEEN CHANGED]";
            }
            else{
                $memo_update = NULL;
            }

            if($memo_update){
                $employee_logs = new EmployeeLogs;
                $employee_logs->employee_id = $employee_details->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S MEMO DETAILS $memo_update";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S MEMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $memo_update";
                $userlogs->save();
            }
        }

        if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
            foreach($request->file('evaluation_file') as $key => $value){
                $count = Str::random(2);
                $evaluationFileName =  $employee_details->empno.'_Evaluation_File_'.$timestamp.'_'.$count.'.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$evaluationFileName);

                $evaluation = new EvaluationTable;
                $evaluation->employee_id = $request->employee_id;
                $evaluation->evaluation_reason = strtoupper($request->evaluation_reason[$key]);
                $evaluation->evaluation_date = $request->evaluation_date[$key];
                $evaluation->evaluation_evaluated_by = strtoupper($request->evaluation_evaluated_by[$key]);
                $evaluation->evaluation_file = $evaluationFileName;
                $evaluation->save();
            }

            if($request->evaluation_change == 'CHANGED'){
                $evaluation_update = "[EVALUATION: LIST OF EVALUATION HAVE BEEN CHANGED]";
            }
            else{
                $evaluation_update = NULL;
            }

            if($evaluation_update){
                $employee_logs = new EmployeeLogs;
                $employee_logs->employee_id = $employee_details->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS $evaluation_update";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $evaluation_update";
                $userlogs->save();
            }
        }

        if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
            foreach($request->file('contracts_file') as $key => $value){
                $count = Str::random(2);
                $contractsFileName = $employee_details->empno.'_Contracts_File_'.$timestamp.'_'.$count.'.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$contractsFileName);

                $contracts = new ContractTable;
                $contracts->employee_id = $request->employee_id;
                $contracts->contracts_type = $request->contracts_type[$key];
                $contracts->contracts_date = $request->contracts_date[$key];
                $contracts->contracts_file = $contractsFileName;
                $contracts->save();
            }

            if($request->contracts_change == 'CHANGED'){
                $contracts_update = "[CONTRACT: LIST OF CONTRACTS HAVE BEEN CHANGED]";
            }
            else{
                $contracts_update = NULL;
            }

            if($contracts_update){
                $employee_logs = new EmployeeLogs;
                $employee_logs->employee_id = $employee_details->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS $contracts_update";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $contracts_update";
                $userlogs->save();
            }
        }

        if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
            foreach($request->file('resignation_file') as $key => $value){
                $count = Str::random(2);
                $resignationFileName = $employee_details->empno.'_Resignation_File_'.$timestamp.'_'.$count.'.'.$request->resignation_file[$key]->extension();
                $request->resignation_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resignationFileName);

                $resignation = new ResignationTable;
                $resignation->employee_id = $request->employee_id;
                $resignation->resignation_reason = $request->resignation_reason[$key];
                $resignation->resignation_date = $request->resignation_date[$key];
                $resignation->resignation_file = $resignationFileName;
                $resignation->save();
            }

            if($request->resignation_change == 'CHANGED'){
                $resignation_update = "[RESIGNATION: LIST OF RESIGNATION HAVE BEEN CHANGED]";
            }
            else{
                $resignation_update = NULL;
            }

            if($resignation_update){
                $employee_logs = new EmployeeLogs;
                $employee_logs->employee_id = $employee_details->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS $resignation_update";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $resignation_update";
                $userlogs->save();
            }
        }

        if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
            foreach($request->file('termination_file') as $key => $value){
                $count = Str::random(2);
                $terminationFileName = $employee_details->empno.'_Termination_File_'.$timestamp.'_'.$count.'.'.$request->termination_file[$key]->extension();
                $request->termination_file[$key]->storeAs('public/evaluation/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$terminationFileName);

                $termination = new TerminationTable;
                $termination->employee_id = $request->employee_id;
                $termination->termination_reason = $request->termination_reason[$key];
                $termination->termination_date = $request->termination_date[$key];
                $termination->termination_file = $terminationFileName;
                $termination->save();
            }

            if($request->termination_change == 'CHANGED'){
                $termination_update = "[TERMINATION: LIST OF TERMINATION HAVE BEEN CHANGED]";
            }
            else{
                $termination_update = NULL;
            }

            if($termination_update){
                $employee_logs = new EmployeeLogs;
                $employee_logs->employee_id = $employee_details->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS $termination_update";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $termination_update";
                $userlogs->save();
            }
        }

        if(!$employee){
            $document = new Document;
            $document->employee_id = $request->employee_id;
            if($request->hasFile('barangay_clearance_file')){
                $barangayClearanceFile = $request->file('barangay_clearance_file');
                $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                $barangayClearanceFilename = $employee_details->empno.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
                $barangayClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
                $document->barangay_clearance_file = $barangayClearanceFilename;
            }

            if($request->hasFile('birthcertificate_file')){
                $birthcertificateFile = $request->file('birthcertificate_file');
                $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                $birthcertificateFilename = $employee_details->empno.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
                $birthcertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
                $document->birthcertificate_file = $birthcertificateFilename;
            }

            if($request->hasFile('diploma_file')){
                $diplomaFile = $request->file('diploma_file');
                $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                $diplomaFilename = $employee_details->empno.'_Diploma_File_'.$timestamp.'.'.$diplomaExtension;
                $diplomaFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
                $document->diploma_file = $diplomaFilename;
            }

            if($request->hasFile('medical_certificate_file')){
                $medicalCertificateFile = $request->file('medical_certificate_file');
                $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                $medicalCertificateFilename = $employee_details->empno.'_Medical_Certificate_File_'.$timestamp.'.'.$medicalCertificateExtension;
                $medicalCertificateFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
                $document->medical_certificate_file = $medicalCertificateFilename;
            }

            if($request->hasFile('nbi_clearance_file')){
                $nbiFile = $request->file('nbi_clearance_file');
                $nbiExtension = $nbiFile->getClientOriginalExtension();
                $nbiFilename = $employee_details->empno.'_NBI_Clearance_File_'.$timestamp.'.'.$nbiExtension;
                $nbiFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
                $document->nbi_clearance_file = $nbiFilename;
            }

            if($request->hasFile('pag_ibig_file')){
                $pagibigFile = $request->file('pag_ibig_file');
                $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                $pagibigFilename = $employee_details->empno.'_Pag_ibig_File_'.$timestamp.'.'.$pagibigExtension;
                $pagibigFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
                $document->pag_ibig_file = $pagibigFilename;
            }

            if($request->hasFile('philhealth_file')){
                $philhealthFile = $request->file('philhealth_file');
                $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                $philhealthFilename = $employee_details->empno.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
                $philhealthFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
                $document->philhealth_file = $philhealthFilename;
            }

            if($request->hasFile('police_clearance_file')){
                $policeClearanceFile = $request->file('police_clearance_file');
                $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                $policeClearanceFilename = $employee_details->empno.'_Police_Clearance_File_'.$timestamp.'.'.$policeClearanceExtension;
                $policeClearanceFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
                $document->police_clearance_file = $policeClearanceFilename;
            }

            if($request->hasFile('resume_file')){
                $resumeFile = $request->file('resume_file');
                $resumeExtension = $resumeFile->getClientOriginalExtension();
                $resumeFilename = $employee_details->empno.'_Resume_File_'.$timestamp.'.'.$resumeExtension;
                $resumeFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
                $document->resume_file = $resumeFilename;
            }

            if($request->hasFile('sss_file')){
                $sssFile = $request->file('sss_file');
                $sssExtension = $sssFile->getClientOriginalExtension();
                $sssFilename = $employee_details->empno.'_SSS_File_'.$timestamp.'.'.$sssExtension;
                $sssFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
                $document->sss_file = $sssFilename;
            }

            if($request->hasFile('tor_file')){
                $torFile = $request->file('tor_file');
                $torExtension = $torFile->getClientOriginalExtension();
                $torFilename = $employee_details->empno.'_Transcript_of_Records_File_'.$timestamp.'.'.$torExtension;
                $torFile->storeAs('public/documents/'.$employee_details->empno.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
                $document->transcript_of_records_file = $torFilename;
            }

            $document->save();
            // return response()->json(['message' => 'Document updated successfully']);
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
                $diplomaFilename = $employee_details->empno.'_Diploma_File'.$timestamp.'.'.$diplomaExtension;
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
                $medicalCertificateFilename = $employee_details->empno.'_Medical_Certificate_File'.$timestamp.'.'.$medicalCertificateExtension;
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
                $nbiFilename = $employee_details->empno.'_NBI_Clearance_File'.$timestamp.'.'.$nbiExtension;
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
                $pagibigFilename = $employee_details->empno.'_Pag_ibig_File'.$timestamp.'.'.$pagibigExtension;
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
                $policeClearanceFilename = $employee_details->empno.'_Police_Clearance_File'.$timestamp.'.'.$policeClearanceExtension;
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
                $resumeFilename = $employee_details->empno.'_Resume_File'.$timestamp.'.'.$resumeExtension;
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
                $torFilename = $employee_details->empno.'_Transcript_of_Records_File'.$timestamp.'.'.$torExtension;
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


            if(
            $request->hasFile('barangay_clearance_file')
            || $request->hasFile('birthcertificate_file')
            || $request->hasFile('diploma_file')
            || $request->hasFile('medical_certificate_file')
            || $request->hasFile('nbi_clearance_file')
            || $request->hasFile('pag_ibig_file')
            || $request->hasFile('philhealth_file')
            || $request->hasFile('police_clearance_file')
            || $request->hasFile('resume_file')
            || $request->hasFile('sss_file')
            || $request->hasFile('tor_file')

            ){
                $employee_logs = new EmployeeLogs;
                $employee_logs->employee_id = $employee_details->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S DOCUMENTS
                                        $barangay_clearance_update
                                        $birthcertificate_update
                                        $diploma_update
                                        $medical_certificate_update
                                        $nbi_clearance_update
                                        $pag_ibig_update
                                        $philhealth_update
                                        $police_clearance_update
                                        $resume_update
                                        $sss_update
                                        $tor_update";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S DOCUMENTS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                        $barangay_clearance_update
                                        $birthcertificate_update
                                        $diploma_update
                                        $medical_certificate_update
                                        $nbi_clearance_update
                                        $pag_ibig_update
                                        $philhealth_update
                                        $police_clearance_update
                                        $resume_update
                                        $sss_update
                                        $tor_update";
                $userlogs->save();
            }
        }
    }
}
