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
use App\Models\Training;
use App\Models\Vocational;
use App\Models\JobHistory;
use App\Models\Memo;
use App\Models\Evaluation;
use App\Models\Contract;
use App\Models\Resignation;
use App\Models\Termination;
use App\Models\PersonalInformationTable;
use App\Models\WorkInformationTable;
use App\Models\Benefits;
use App\Models\EducationalAttainment;
use App\Models\MedicalHistory;
use App\Models\Document;
use App\Models\EmployeeLogs;
use App\Models\WorkLogs;
use App\Models\Secondary;
use App\Models\Primary;
use App\Models\Hmo;
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
    use Logs;

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
        $employee->employee_id    = $request->employee_id;
        $employee->child_name     = strtoupper($request->child_name);
        $employee->child_birthday = date("Y-m-d", strtotime($request->child_birthday));
        $employee->child_gender   = $request->child_gender;
        $employee->save();

        if($request->children_change == 'CHANGED'){
            $children_update = "[CHILDREN: LIST OF CHILDREN DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $children_update = NULL;
        }

        if($children_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S CHILDREN DETAILS $children_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S CHILDREN DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $children_update");
        }
    }

    public function saveCollege(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new College;
        $employee->employee_id                  = $request->employee_id;
        $employee->college_name                 = strtoupper($request->college_name);
        $employee->college_degree               = strtoupper($request->college_degree);
        $employee->college_inclusive_years_from = date("Y-m", strtotime($request->college_inclusive_years_from));
        $employee->college_inclusive_years_to   = date("Y-m", strtotime($request->college_inclusive_years_to));
        $employee->save();

        if($request->college_change == 'CHANGED'){
            $college_update = "[COLLEGE ATTAINMENT: LIST OF COLLEGE ATTAINMENT DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $college_update = NULL;
        }

        if($college_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT DETAILS $college_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S COLLEGE ATTAINMENT DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $college_update");
        }
    }

    public function saveSecondary(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new Secondary;
        $employee->employee_id       = $request->employee_id;
        $employee->secondary_name    = strtoupper($request->secondary_name);
        $employee->secondary_address = strtoupper($request->secondary_address);
        $employee->secondary_from    = date("Y-m", strtotime($request->secondary_from));
        $employee->secondary_to      = date("Y-m", strtotime($request->secondary_to));
        $employee->save();

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

    public function savePrimary(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new Primary;
        $employee->employee_id     = $request->employee_id;
        $employee->primary_name    = strtoupper($request->primary_name);
        $employee->primary_address = strtoupper($request->primary_address);
        $employee->primary_from    = date("Y-m", strtotime($request->primary_from));
        $employee->primary_to      = date("Y-m", strtotime($request->primary_to));
        $employee->save();

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

    public function saveTraining(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new Training;
        $employee->employee_id                   = $request->employee_id;
        $employee->training_name                 = strtoupper($request->training_name);
        $employee->training_title                = strtoupper($request->training_title);
        $employee->training_inclusive_years_from = date("Y-m", strtotime($request->training_inclusive_years_from));
        $employee->training_inclusive_years_to   = date("Y-m", strtotime($request->training_inclusive_years_to));
        $employee->save();

        if($request->training_change == 'CHANGED'){
            $training_update = "[TRAINING: LIST OF TRAINING DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $training_update = NULL;
        }

        if($training_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S TRAINING DETAILS $training_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S TRAINING DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $training_update");
        }
    }

    public function saveVocational(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new Vocational;
        $employee->employee_id = $request->employee_id;
        $employee->vocational_name                 = strtoupper($request->vocational_name);
        $employee->vocational_course               = strtoupper($request->vocational_course);
        $employee->vocational_inclusive_years_from = date("Y-m", strtotime($request->vocational_inclusive_years_from));
        $employee->vocational_inclusive_years_to   = date("Y-m", strtotime($request->vocational_inclusive_years_to));
        $employee->save();

        if($request->vocational_change == 'CHANGED'){
            $vocational_update = "[VOCATIONAL: LIST OF VOCATIONAL DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $vocational_update = NULL;
        }

        if($vocational_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S VOCATIONAL DETAILS $vocational_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S VOCATIONAL DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $vocational_update");
        }
    }

    public function saveJobHistory(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new JobHistory;
        $employee->employee_id              = $request->employee_id;
        $employee->job_company_name         = strtoupper($request->job_company_name);
        $employee->job_description          = strtoupper($request->job_description);
        $employee->job_position             = strtoupper($request->job_position);
        $employee->job_contact_number       = $request->job_contact_number;
        $employee->job_inclusive_years_from = date("Y-m", strtotime($request->job_inclusive_years_from));
        $employee->job_inclusive_years_to   = date("Y-m", strtotime($request->job_inclusive_years_to));
        $employee->save();

        if($request->job_history_change == 'CHANGED'){
            $job_history_update = "[JOB HISTORY: LIST OF JOB HISTORY DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $job_history_update = NULL;
        }

        if($job_history_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S JOB HISTORY DETAILS $job_history_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S JOB HISTORY DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $job_history_update");
        }
    }

    public function saveHmo(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $employee = new Hmo;
        $employee->employee_id      = $request->employee_id;
        $employee->hmo              = strtoupper($request->hmo);
        $employee->coverage         = strtoupper($request->coverage);
        $employee->particulars      = strtoupper($request->particulars);
        $employee->room             = strtoupper($request->room);
        $employee->effectivity_date = date("Y-m-d", strtotime($request->effectivity_date));
        $employee->expiration_date  = date("Y-m-d", strtotime($request->expiration_date));
        $employee->save();

        if($request->hmo_change == 'CHANGED'){
            $hmo_update = "[HMO: LIST OF HMO DETAILS HAVE BEEN CHANGED]";
        }
        else{
            $hmo_update = NULL;
        }

        if($hmo_update){
            $this->save_employee_logs($request->employee_id, "USER UPDATED THIS EMPLOYEE'S HMO DETAILS $hmo_update");
            $this->save_user_logs("USER UPDATED THIS EMPLOYEE'S HMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $hmo_update");
        }
    }
}
