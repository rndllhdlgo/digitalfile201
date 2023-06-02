<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children;
use App\Models\College;
use App\Models\Contract;
use App\Models\Evaluation;
use App\Models\EmployeeLogs;
use App\Models\JobHistory;
use App\Models\Memo;
use App\Models\PersonalInformationTable;
use App\Models\Resignation;
use App\Models\Training;
use App\Models\UserLogs;
use App\Models\Vocational;
use App\Models\WorkInformationTable;

class DeleteController extends Controller{

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
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT DETAILS $college_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $college_update";
            $userlogs->save();
        }
    }

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
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S CHILDREN DETAILS $children_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S CHILDREN DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $children_update";
            $userlogs->save();
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
            $training_update = "[TRAINING: LIST OF TRAINING/S HAVE BEEN CHANGED]";
        }
        else{
            $training_update = NULL;
        }

        if($training_update){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S TRAINING DETAILS $training_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S TRAINING DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $training_update";
            $userlogs->save();
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
            $vocational_update = "[VOCATIONAL: LIST OF VOCATIONAL/S HAVE BEEN CHANGED]";
        }
        else{
            $vocational_update = NULL;
        }

        if($vocational_update){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S VOCATIONAL DETAILS $vocational_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S VOCATIONAL DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $vocational_update";
            $userlogs->save();
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
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S JOB HISTORY DETAILS $job_history_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S JOB HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $job_history_update";
            $userlogs->save();
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
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $employee_details->id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER UPDATED THIS EMPLOYEE'S CONTRACT DETAILS $contracts_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER UPDATED THIS EMPLOYEE'S CONTRACT DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $contracts_update";
            $userlogs->save();
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
}