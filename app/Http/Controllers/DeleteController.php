<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\traits\Logs;
use App\Models\Children;
use App\Models\College;
use App\Models\Contract;
use App\Models\Evaluation;
use App\Models\JobHistory;
use App\Models\Memo;
use App\Models\PersonalInformationTable;
use App\Models\Resignation;
use App\Models\Training;
use App\Models\EmployeeLogs;
use App\Models\UserLogs;
use App\Models\Vocational;
use App\Models\WorkInformationTable;
use App\Models\Secondary;
use App\Models\Primary;

class DeleteController extends Controller
{
    use Logs;

    public function children_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $children_id = explode(",", $request->id);
        if($children_id){
            foreach($children_id as $id){
                Children::where('id', $id)->delete();
            }
        }

        if($request->children_change == 'CHANGED'){
            $children_update = "[CHILDREN INFO: LIST OF CHILDREN INFO HAVE BEEN CHANGED]";
        }
        else{
            $children_update = NULL;
        }

        if($children_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S CHILDREN DETAILS $children_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S CHILDREN DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $children_update");
        }
    }

    public function college_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $college_id = explode(",", $request->id);
        if($college_id){
            foreach($college_id as $id){
                College::where('id', $id)->delete();
            }
        }

        if($request->college_change == 'CHANGED'){
            $college_update = "[COLLEGE ATTAINMENT: LIST OF COLLEGE ATTAINMENT HAVE BEEN CHANGED]";
        }
        else{
            $college_update = NULL;
        }

        if($college_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT DETAILS $college_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $college_update");
        }
    }

    public function secondary_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $secondary_id = explode(",", $request->id);
        if($secondary_id){
            foreach($secondary_id as $id){
                Secondary::where('id', $id)->delete();
            }
        }

        if($request->secondary_change == 'CHANGED'){
            $secondary_update = "[SECONDARY SCHOOL: LIST OF SECONDARY SCHOOL DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $secondary_update = NULL;
        }

        if($secondary_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S SECONDARY SCHOOL DETAILS $secondary_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S SECONDARY SCHOOL DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $secondary_update");
        }
    }

    public function primary_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $primary_id = explode(",", $request->id);
        if($primary_id){
            foreach($primary_id as $id){
                Primary::where('id', $id)->delete();
            }
        }

        if($request->primary_change == 'CHANGED'){
            $primary_update = "[PRIMARY SCHOOL: LIST OF PRIMARY SCHOOL DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $primary_update = NULL;
        }

        if($primary_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S PRIMARY SCHOOL DETAILS $primary_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S PRIMARY SCHOOL DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $primary_update");
        }
    }

    public function training_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $training_id = explode(",", $request->id);
        if($training_id){
            foreach($training_id as $id){
                Training::where('id', $id)->delete();
            }
        }

        if($request->training_change == 'CHANGED'){
            $training_update = "[TRAINING: LIST OF TRAINING HAVE BEEN CHANGED]";
        }
        else{
            $training_update = NULL;
        }

        if($training_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S TRAINING DETAILS $training_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S TRAINING DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $training_update");
        }
    }

    public function vocational_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $vocational_id = explode(",", $request->id);
        if($vocational_id){
            foreach($vocational_id as $id){
                Vocational::where('id', $id)->delete();
            }
        }

        if($request->vocational_change == 'CHANGED'){
            $vocational_update = "[VOCATIONAL: LIST OF VOCATIONAL HAVE BEEN CHANGED]";
        }
        else{
            $vocational_update = NULL;
        }

        if($vocational_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S VOCATIONAL DETAILS $vocational_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S VOCATIONAL DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $vocational_update");
        }
    }

    public function job_history_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $job_history_id = explode(",", $request->id);
        if($job_history_id){
            foreach($job_history_id as $id){
                JobHistory::where('id', $id)->delete();
            }
        }

        if($request->job_history_change == 'CHANGED'){
            $job_history_update = "[JOB HISTORY: LIST OF JOB HISTORY HAVE BEEN CHANGED]";
        }
        else{
            $job_history_update = NULL;
        }

        if($job_history_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S JOB HISTORY DETAILS $job_history_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S JOB HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $job_history_update");
        }
    }

    public function memo_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $memo_id = explode(",", $request->id);
        if($memo_id){
            foreach($memo_id as $id){
                Memo::where('id', $id)->delete();
            }
        }

        if($request->memo_change == 'CHANGED'){
            $memo_update = "[MEMO: LIST OF MEMO HAVE BEEN CHANGED]";
        }
        else{
            $memo_update = NULL;
        }

        if($memo_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S MEMO DETAILS $memo_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S MEMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $memo_update");
        }
    }

    public function evaluation_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $evaluation_id = explode(",", $request->id);
        if($evaluation_id){
            foreach($evaluation_id as $id){
                Evaluation::where('id', $id)->delete();
            }
        }

        if($request->evaluation_change == 'CHANGED'){
            $evaluation_update = "[EVALUATION: LIST OF EVALUATION HAVE BEEN CHANGED]";
        }
        else{
            $evaluation_update = NULL;
        }

        if($evaluation_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS $evaluation_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S EVALUATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $evaluation_update");
        }
    }

    public function contracts_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $contracts_id = explode(",", $request->id);
        if($contracts_id){
            foreach($contracts_id as $id){
                Contract::where('id', $id)->delete();
            }
        }

        if($request->contracts_change == 'CHANGED'){
            $contracts_update = "[CONTRACT: LIST OF CONTRACT HAVE BEEN CHANGED]";
        }
        else{
            $contracts_update = NULL;
        }

        if($contracts_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S CONTRACT DETAILS $contracts_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S CONTRACT DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $contracts_update");
        }
    }

    public function resignation_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $resignation_id = explode(",", $request->id);
        if($resignation_id){
            foreach($resignation_id as $id){
                Resignation::where('id', $id)->delete();
            }
        }

        if($request->resignation_change == 'CHANGED'){
            $resignation_update = "[RESIGNATION: LIST OF RESIGNATION HAVE BEEN CHANGED]";
        }
        else{
            $resignation_update = NULL;
        }

        if($resignation_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS $resignation_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $resignation_update");
        }
    }

    public function termination_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $termination_id = explode(",", $request->id);
        if($termination_id){
            foreach($termination_id as $id){
                Termination::where('id', $id)->delete();
            }
        }

        if($request->termination_change == 'CHANGED'){
            $termination_update = "[TERMINATION: LIST OF TERMINATION HAVE BEEN CHANGED]";
        }
        else{
            $termination_update = NULL;
        }

        if($termination_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS $termination_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S TERMINATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $termination_update");
        }
    }
}