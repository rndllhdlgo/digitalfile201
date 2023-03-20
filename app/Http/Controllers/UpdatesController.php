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

use DataTables;

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
        // )->where('status','!=','APPROVED')
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

        if($current_image !== $new_image){
            unlink('storage/employee_images/'.$current_image);
        }

        $sql = PersonalInformationTable::where('empno',$request->empno)->first()
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
            // PersonalInformationTablePending::where('empno',$request->empno)->first()
            // ->update([
            //     'status' => 'APPROVED'
            // ]);
            // sleep(2);
            // PersonalInformationTablePending::where('empno', $request->empno)->delete();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function update_educational_attainment(Request $request){

        $employee_educational = EducationalAttainment::where('empno',$request->empno)->first();
        $employee_id = PersonalInformationTable::where('empno', $request->empno)->value('id');

        if(!$employee_educational){
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
            }
        }
        else{
            $sql = EducationalAttainment::where('empno',$request->empno)->first()
            ->update([
                'secondary_school_name' => $request->secondary_school_name,
                'secondary_school_address' => $request->secondary_school_address,
                'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
                'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
                'primary_school_name' => $request->primary_school_name,
                'primary_school_address' => $request->primary_school_address,
                'primary_school_inclusive_years_from' => $request->primary_school_inclusive_years_from,
                'primary_school_inclusive_years_to' => $request->primary_school_inclusive_years_to,
            ]);
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
}
