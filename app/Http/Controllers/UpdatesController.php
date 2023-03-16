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
