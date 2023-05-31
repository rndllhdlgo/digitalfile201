<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

use App\Models\EmployeeStatus;
use DataTables;
use Str;

class SaveController extends Controller
{
    public function insertImage(Request $request){
        $imageData = $request->input('image_data');
        $extension = explode('/', mime_content_type($imageData))[1];
        $imageData = str_replace('data:image/'.$extension.';base64,', '', $imageData);
        $imageData = base64_decode($imageData);
        $filePath = storage_path('app/public/employee_images/'.$request->employee_image);
        file_put_contents($filePath, $imageData);
        return $request->employee_image;
    }

    public function saveChildren(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        $employee = new Children;
        $employee->employee_id = $request->employee_id;
        $employee->child_name = strtoupper($request->child_name);
        $employee->child_birthday = $request->child_birthday;
        $employee->child_gender = $request->child_gender;
        $employee->save();

        if($request->children_change == 'CHANGED'){
            $children_update = "[CHILDREN: LIST OF CHILDREN DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $children_update = NULL;
        }

        if($children_update == 'CHANGED'){
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

    public function saveCollege(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new College;
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

            $employee->college_name = strtoupper($request->college_name);
            $employee->college_degree = strtoupper($request->college_degree);
            $employee->college_inclusive_years_from = $request->college_inclusive_years_from;
            $employee->college_inclusive_years_to = $request->college_inclusive_years_to;
            $employee->save();

            if($request->college_change == 'CHANGED'){
                $college_update = "[COLLEGE ATTAINMENT: LIST OF COLLEGE ATTAINMENT HAVE BEEN CHANGED]";
            }
            else{
                $college_update = NULL;
            }

            if($college_update == 'CHANGED'){
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
        // else{
        //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
        //     $employee = new CollegeTablePending;
        //     $employee->employee_id = $emp_id;
        //     $employee->empno = $request->empno;
        //     $employee->college_name = strtoupper($request->college_name);
        //     $employee->college_degree = strtoupper($request->college_degree);
        //     $employee->college_inclusive_years_from = $request->college_inclusive_years_from;
        //     $employee->college_inclusive_years_to = $request->college_inclusive_years_to;
        //     $employee->save();

        //     $userlogs = new UserLogs;
        //     $userlogs->user_id = auth()->user()->id;
        //     $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE COLLEGE ATTAINMENT INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
        //     $userlogs->save();
        // }
    }

    public function saveTraining(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new Training;
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
            $employee->training_name = strtoupper($request->training_name);
            $employee->training_title = strtoupper($request->training_title);
            $employee->training_inclusive_years_from = $request->training_inclusive_years_from;
            $employee->training_inclusive_years_to = $request->training_inclusive_years_to;
            $employee->save();

            if($request->training_change == 'CHANGED'){
                $training_update = "[TRAINING: LIST OF TRAINING HAVE BEEN CHANGED]";
            }
            else{
                $training_update = NULL;
            }

            if($training_update == 'CHANGED'){
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
        // else{
        //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
        //     $employee = new TrainingTablePending;
        //     $employee->employee_id = $emp_id;
        //     $employee->empno = $request->empno;
        //     $employee->training_name = strtoupper($request->training_name);
        //     $employee->training_title = strtoupper($request->training_title);
        //     $employee->training_inclusive_years_from = $request->training_inclusive_years_from;
        //     $employee->training_inclusive_years_to = $request->training_inclusive_years_to;
        //     $employee->save();

        //     $userlogs = new UserLogs;
        //     $userlogs->user_id = auth()->user()->id;
        //     $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE TRAINING INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
        //     $userlogs->save();
        // }
    }

    public function saveVocational(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new Vocational;
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
            $employee->vocational_name = strtoupper($request->vocational_name);
            $employee->vocational_course = strtoupper($request->vocational_course);
            $employee->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
            $employee->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
            $employee->save();

            if($request->vocational_change == 'CHANGED'){
                $vocational_update = "[VOCATIONAL: LIST OF VOCATIONAL HAVE BEEN CHANGED]";
            }
            else{
                $vocational_update = NULL;
            }

            if($vocational_update == 'CHANGED'){
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
        // else{
        //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
        //     $employee = new VocationalTablePending;
        //     $employee->employee_id = $emp_id;
        //     $employee->empno = $request->empno;
        //     $employee->vocational_name = $request->vocational_name;
        //     $employee->vocational_course = $request->vocational_course;
        //     $employee->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
        //     $employee->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
        //     $employee->save();

        //     $userlogs = new UserLogs;
        //     $userlogs->user_id = auth()->user()->id;
        //     $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE VOCATIONAL ATTAINMENT INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
        //     $userlogs->save();
        // }
    }

    public function saveJobHistory(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new JobHistory;
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
            $employee->job_company_name = strtoupper($request->job_company_name);
            $employee->job_description = strtoupper($request->job_description);
            $employee->job_position = strtoupper($request->job_position);
            $employee->job_contact_number = $request->job_contact_number;
            $employee->job_inclusive_years_from = $request->job_inclusive_years_from;
            $employee->job_inclusive_years_to = $request->job_inclusive_years_to;
            $employee->save();

            if($request->job_history_change == 'CHANGED'){
                $job_history_update = "[JOB HISTORY: LIST OF JOB HISTORY HAVE BEEN CHANGED]";
            }
            else{
                $job_history_update = NULL;
            }

            if($job_history_update == 'CHANGED'){
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
        // else{
        //     $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
        //     $employee = new JobHistoryTablePending;
        //     $employee->employee_id = $emp_id;
        //     $employee->empno = $request->empno;
        //     $employee->job_company_name = $request->job_company_name;
        //     $employee->job_description = $request->job_description;
        //     $employee->job_position = $request->job_position;
        //     $employee->job_contact_number = $request->job_contact_number;
        //     $employee->job_inclusive_years_from = $request->job_inclusive_years_from;
        //     $employee->job_inclusive_years_to = $request->job_inclusive_years_to;
        //     $employee->save();

        //     $userlogs = new UserLogs;
        //     $userlogs->user_id = auth()->user()->id;
        //     $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE JOB HISTORY INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
        //     $userlogs->save();
        // }
    }
}
