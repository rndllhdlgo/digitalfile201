<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformationTable;
use App\Models\WorkInformationTable;

use App\Models\CollegeTable;
use App\Models\ChildrenTable;
use App\Models\TrainingTable;
use App\Models\VocationalTable;
use App\Models\JobHistoryTable;
use App\Models\MemoTable;
use App\Models\EvaluationTable;

use App\Models\EmployeeLogs;
use App\Models\UserLogs;


class DeleteController extends Controller{

    public function college_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $college_id = explode(",", $request->id);
        if($college_id){
            foreach($college_id as $id){
                CollegeTable::where('id', $id)->delete();
            }
        }

        if($request->college_change == 'CHANGED'){
            $college_update = "[COLLEGE ATTAINMENT: LIST OF COLLEGE ATTAINMENT HAVE BEEN CHANGED]";
        }
        else{
            $college_update = NULL;
        }

        if($request->college_change == 'CHANGED'){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT INFORMATION DETAILS $college_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $college_update";
            $userlogs->save();
        }
    }

    public function children_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $children_id = explode(",", $request->id);
        if($children_id){
            foreach($children_id as $id){
                ChildrenTable::where('id', $id)->delete();
            }
        }

        if($request->children_change == 'CHANGED'){
            $children_update = "[CHILDREN INFO: LIST OF CHILDREN INFO HAVE BEEN CHANGED]";
        }
        else{
            $children_update = NULL;
        }

        if($request->children_change == 'CHANGED'){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S CHILDREN INFORMATION DETAILS $children_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S CHILDREN INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $children_update";
            $userlogs->save();
        }
    }

    public function training_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $training_id = explode(",", $request->id);
        if($training_id){
            foreach($training_id as $id){
                TrainingTable::where('id', $id)->delete();
            }
        }

        if($request->training_change == 'CHANGED'){
            $training_update = "[TRAINING: LIST OF TRAINING/S HAVE BEEN CHANGED]";
        }
        else{
            $training_update = NULL;
        }

        if($request->training_change == 'CHANGED'){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S TRAINING INFORMATION DETAILS $training_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S TRAINING INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $training_update";
            $userlogs->save();
        }
    }

    public function vocational_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $vocational_id = explode(",", $request->id);
        if($vocational_id){
            foreach($vocational_id as $id){
                VocationalTable::where('id', $id)->delete();
            }
        }

        if($request->vocational_change == 'CHANGED'){
            $vocational_update = "[VOCATIONAL: LIST OF VOCATIONAL/S HAVE BEEN CHANGED]";
        }
        else{
            $vocational_update = NULL;
        }

        if($request->vocational_change == 'CHANGED'){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S VOCATIONAL INFORMATION DETAILS $vocational_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S VOCATIONAL INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $vocational_update";
            $userlogs->save();
        }
    }

    public function job_history_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $job_history_id = explode(",", $request->id);
        if($job_history_id){
            foreach($job_history_id as $id){
                JobHistoryTable::where('id', $id)->delete();
            }
        }

        if($request->job_history_change == 'CHANGED'){
            $job_history_update = "[JOB HISTORY: LIST OF JOB HISTORY HAVE BEEN CHANGED]";
        }
        else{
            $job_history_update = NULL;
        }

        if($request->job_history_change == 'CHANGED'){
            $employee_logs = new EmployeeLogs;
            $employee_logs->employee_id = $request->employee_id;
            $employee_logs->user_id = auth()->user()->id;
            $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S JOB HISTORY INFORMATION DETAILS $job_history_update";
            $employee_logs->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S JOB HISTORY INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $job_history_update";
            $userlogs->save();
        }
    }

    public function memo_delete(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $memo_id = explode(",", $request->id);
        if($memo_id){
            foreach($memo_id as $id){
                MemoTable::where('id', $id)->delete();
            }
        }

        if($request->memo_change == 'CHANGED'){
            $memo_update = "[MEMO: LIST OF MEMO HAVE BEEN CHANGED]";
        }
        else{
            $memo_update = NULL;
        }

        if($request->memo_change == 'CHANGED'){
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
                EvaluationTable::where('id', $id)->delete();
            }
        }

        if($request->evaluation_change == 'CHANGED'){
            $evaluation_update = "[EVALUATION: LIST OF EVALUATION HAVE BEEN CHANGED]";
        }
        else{
            $evaluation_update = NULL;
        }

        if($request->evaluation_change == 'CHANGED'){
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
}