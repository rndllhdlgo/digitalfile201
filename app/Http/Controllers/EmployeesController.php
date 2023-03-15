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

use App\Models\EmployeeStatus;
use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    
    public function employee_status(){
        if(PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->where('status','PENDING')->first()){
            return 'PENDING';
        }
    }

    public function logs_reload(){
        if(LogsTable::count() == 0){
            return 'NULL';
        }
        $data_update = LogsTable::latest('updated_at')->first()->updated_at;
        return $data_update;
    }

    public function employee_history_reload(){
        if(History::count() == 0){
            return 'NULL';
        }
        $data_update = History::latest('updated_at')->first()->updated_at;
        return $data_update;
    }

    public function listOfEmployees(Request $request){
        if($request->filter == 'probationary'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Probationary')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'regular'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Regular')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'part_time'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Part Time')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'agency'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Agency')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'intern'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status'
                )
                ->where('work_information_tables.employment_status','Intern')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->get();
        }
        else if($request->filter == 'incomplete'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status',
                'employee_status.employee_status'
                )
                ->where('employee_status.employee_status','Incomplete')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->leftJoin('employee_status','employee_status.employee_id','personal_information_tables.id')
                ->get();
        }
        else{
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'branches.branch_name AS employee_branch',
                'work_information_tables.employment_status',
                'employee_status.employee_status'
                )
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('branches','branches.id','work_information_tables.employee_branch')
                ->leftJoin('employee_status','employee_status.employee_id','personal_information_tables.id')
                ->get();
            }
        return DataTables::of($employees)->make(true);
    }

    public function employeeFetch(Request $request){
        $employees = PersonalInformationTable::select(
                    'personal_information_tables.id',
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
                    'work_information_tables.employee_number',
                    'work_information_tables.date_hired',
                    'work_information_tables.employee_shift',
                    'work_information_tables.employee_company',
                    'work_information_tables.employee_branch',
                    'work_information_tables.employee_department',
                    'work_information_tables.employee_position',
                    'work_information_tables.employment_status',
                    'work_information_tables.employment_origin',
                    'work_information_tables.hmo_number',
                    'work_information_tables.sss_number',
                    'work_information_tables.pag_ibig_number',
                    'work_information_tables.philhealth_number',
                    'work_information_tables.tin_number',
                    'work_information_tables.account_number',
                    'work_information_tables.company_email_address',
                    'work_information_tables.company_contact_number',
                    'educational_attainments.secondary_school_name',
                    'educational_attainments.secondary_school_address',
                    'educational_attainments.secondary_school_inclusive_years_from',
                    'educational_attainments.secondary_school_inclusive_years_to',
                    'educational_attainments.primary_school_name',
                    'educational_attainments.primary_school_address',
                    'educational_attainments.primary_school_inclusive_years_from',
                    'educational_attainments.primary_school_inclusive_years_to',
                    'medical_histories.past_medical_condition',
                    'medical_histories.allergies',
                    'medical_histories.medication',
                    'medical_histories.psychological_history',
                    'documents.barangay_clearance_file',
                    'documents.birthcertificate_file',
                    'documents.diploma_file',
                    'documents.medical_certificate_file',
                    'documents.nbi_clearance_file',
                    'documents.pag_ibig_file',
                    'documents.philhealth_file',
                    'documents.police_clearance_file',
                    'documents.resume_file',
                    'documents.sss_file',
                    'documents.transcript_of_records_file',
                    'compensation_benefits.employee_salary',
                    'compensation_benefits.employee_incentives',
                    'compensation_benefits.employee_overtime_pay',
                    'compensation_benefits.employee_bonus',
                    'compensation_benefits.employee_insurance')
        ->where('personal_information_tables.id',$request->id)
        ->leftJoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->leftJoin('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')
        ->leftJoin('medical_histories','medical_histories.employee_id','personal_information_tables.id')  
        ->leftJoin('documents','documents.employee_id','personal_information_tables.id')  
        ->leftJoin('compensation_benefits','compensation_benefits.employee_id','personal_information_tables.id')  
        ->get();
        return DataTables::of($employees)->toJson();
    }

    // public function insertImage(Request $request){
    //     $employeeImageFile = $request->file('employee_image');
    //     $employeeImageExtension = $employeeImageFile->getClientOriginalExtension();
    //     $employeeImageFileName = strftime("%m-%d-%Y-%H-%M-%S").'_Employee_Image.'.$employeeImageExtension;
    //     $employeeImageFile->storeAs('public/employee_images',$employeeImageFileName);
    //     return $employeeImageFileName;
    // }

    public function insertImage(Request $request){
        $imageData = $request->input('image_data');
        $extension = explode('/', mime_content_type($imageData))[1];
        $imageData = str_replace('data:image/'.$extension.';base64,', '', $imageData);
        $imageData = base64_decode($imageData);
        $filePath = storage_path('app/public/employee_images/'.$request->employee_image);
        file_put_contents($filePath, $imageData);
        return $request->employee_image;
    }

    public function savePersonalInformation(Request $request){
        $employee = new PersonalInformationTable;
        $employee->empno = $request->empno;
        $employee->employee_image = $request->employee_image == 'N\A' ? '' : $request->employee_image;
        $employee->first_name =  strtoupper($request->first_name);
        $employee->last_name = strtoupper($request->last_name); 
        $employee->middle_name = strtoupper($request->middle_name);
        $employee->suffix = strtoupper($request->suffix);
        $employee->nickname = (!$request->nickname) ? strtoupper($request->first_name) : strtoupper($request->nickname);
        $employee->birthday = $request->birthday;
        $employee->address = strtoupper($request->address);
        $employee->gender = $request->gender;
        $employee->ownership = $request->ownership;
        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->region = $request->region;
        $employee->height = $request->height;
        $employee->weight = $request->weight;
        $employee->religion = strtoupper($request->religion);
        $employee->civil_status = $request->civil_status;
        $employee->email_address = strtolower($request->email_address);
        $employee->telephone_number = $request->telephone_number;
        $employee->cellphone_number = $request->cellphone_number;
        $employee->spouse_name = strtoupper($request->spouse_name);
        $employee->spouse_contact_number = $request->spouse_contact_number;
        $employee->spouse_profession = strtoupper($request->spouse_profession);
        $employee->father_name = strtoupper($request->father_name);
        $employee->father_contact_number = $request->father_contact_number;
        $employee->father_profession = strtoupper($request->father_profession);
        $employee->mother_name = strtoupper($request->mother_name);
        $employee->mother_contact_number = $request->mother_contact_number;
        $employee->mother_profession = strtoupper($request->mother_profession);
        $employee->emergency_contact_name = strtoupper($request->emergency_contact_name);
        $employee->emergency_contact_relationship = strtoupper($request->emergency_contact_relationship);
        $employee->emergency_contact_number = $request->emergency_contact_number;
        $sql = $employee->save();
        
        if($sql){
            $result = 'true';
            $id = $employee->id;
        }
        else{
            $result = 'false';
            $id = '';
        }

        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function saveWorkInformation(Request $request){
        $employee = new WorkInformationTable;
        $employee->employee_id = $request->employee_id;
        $employee->employee_number = $request->employee_number;
        $employee->employee_company = $request->employee_company;
        $employee->employee_department = $request->employee_department;
        $employee->employee_branch = $request->employee_branch;
        $employee->employment_status = $request->employment_status;
        $employee->employment_origin = $request->employment_origin;
        $employee->employee_shift = $request->employee_shift;
        $employee->employee_position = $request->employee_position;
        $employee->date_hired = $request->date_hired;
        $employee->company_email_address = $request->company_email_address;
        $employee->company_contact_number = $request->company_contact_number;
        $employee->hmo_number = $request->hmo_number;
        $employee->sss_number = $request->sss_number;
        $employee->pag_ibig_number = $request->pag_ibig_number;
        $employee->philhealth_number = $request->philhealth_number;
        $employee->tin_number = $request->tin_number;
        $employee->account_number = $request->account_number;
        $employee->save();
    }

    public function saveChildren(Request $request){
        $children = new ChildrenTable;
        $children->employee_id = $request->employee_id;
        $children->child_name = strtoupper($request->child_name);
        $children->child_birthday = $request->child_birthday;
        $children->child_gender = $request->child_gender;
        $children->save();
    }

    public function saveEducationalAttainment(Request $request){
        $employee = new EducationalAttainment;
        $employee->employee_id = $request->employee_id;
        $employee->secondary_school_name = strtoupper($request->secondary_school_name);
        $employee->secondary_school_address = strtoupper($request->secondary_school_address);
        $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
        $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
        $employee->primary_school_name = strtoupper($request->primary_school_name);
        $employee->primary_school_address = strtoupper($request->primary_school_address);
        $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
        $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
        $employee->save();
    }

    public function saveCollege(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new CollegeTable;
            $employee->employee_id = $request->employee_id;
            $employee->college_name = strtoupper($request->college_name);
            $employee->college_degree = strtoupper($request->college_degree);
            $employee->college_inclusive_years_from = $request->college_inclusive_years_from;
            $employee->college_inclusive_years_to = $request->college_inclusive_years_to;
            $sql = $employee->save(); 

            if($request->college_change == 'CHANGED'){
                $college_update = "[COLLEGE ATTAINMENT: LIST OF COLLEGE ATTAINMENT HAVE BEEN CHANGED]";
            }
            else{
                $college_update = NULL;
            }            

            if($sql){
                $result = 'true';
                $id = $employee->id;
    
                if($request->college_change == 'CHANGED'){
                    $employee_logs = new LogsTable;
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
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
        else{
            $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
            $employee = new CollegeTablePending;
            $employee->employee_id = $emp_id;
            $employee->college_name = strtoupper($request->college_name);
            $employee->college_degree = strtoupper($request->college_degree);
            $employee->college_inclusive_years_from = $request->college_inclusive_years_from;
            $employee->college_inclusive_years_to = $request->college_inclusive_years_to;
            $sql = $employee->save(); 

            if($sql){
                $result = 'true';
                $id = $employee->id;
    
                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->employee_id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER HAS REQUESTED UPDATES FOR THE COLLEGE ATTAINMENT INFORMATION DETAILS OF THIS EMPLOYEE";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE COLLEGE ATTAINMENT INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
                $userlogs->save();
                
            }
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
    }

    public function saveTraining(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new TrainingTable;
            $employee->employee_id = $request->employee_id;
            $employee->training_name = strtoupper($request->training_name);
            $employee->training_title = strtoupper($request->training_title);
            $employee->training_inclusive_years_from = $request->training_inclusive_years_from;
            $employee->training_inclusive_years_to = $request->training_inclusive_years_to;
            $sql = $employee->save();

            if($request->training_change == 'CHANGED'){
                $training_update = "[TRAINING: LIST OF TRAINING/S HAVE BEEN CHANGED]";
            }
            else{
                $training_update = NULL;
            }

            if($sql){
                $result = 'true';
                $id = $employee->id;
        
                if($request->training_change == 'CHANGED'){
                    $employee_logs = new LogsTable;
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
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
        else{
            $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
            $employee = new TrainingTablePending;
            $employee->employee_id = $emp_id;
            $employee->training_name = strtoupper($request->training_name);
            $employee->training_title = strtoupper($request->training_title);
            $employee->training_inclusive_years_from = $request->training_inclusive_years_from;
            $employee->training_inclusive_years_to = $request->training_inclusive_years_to;
            $sql = $employee->save();

            if($sql){
                $result = 'true';
                $id = $employee->id;

                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->employee_id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER HAS REQUESTED UPDATES FOR THE TRAINING INFORMATION DETAILS OF THIS EMPLOYEE";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE TRAINING INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
                $userlogs->save();
            }
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
    }

    public function saveVocational(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new VocationalTable;
            $employee->employee_id = $request->employee_id;
            $employee->vocational_name = strtoupper($request->vocational_name);
            $employee->vocational_course = strtoupper($request->vocational_course);
            $employee->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
            $employee->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
            $sql = $employee->save();

            if($request->vocational_change == 'CHANGED'){
                $vocational_update = "[VOCATIONAL: LIST OF VOCATIONAL/S HAVE BEEN CHANGED]";
            }
            else{
                $vocational_update = NULL;
            }

            if($sql){
                $result = 'true';
                $id = $employee->id;
        
                if($request->vocational_change == 'CHANGED'){
                    $employee_logs = new LogsTable;
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
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
        else{
            $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
            $employee = new VocationalTablePending;
            $employee->employee_id = $emp_id;
            $employee->vocational_name = strtoupper($request->vocational_name);
            $employee->vocational_course = strtoupper($request->vocational_course);
            $employee->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
            $employee->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
            $sql = $employee->save(); 

            if($sql){
                $result = 'true';
                $id = $employee->id;

                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->employee_id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER HAS REQUESTED UPDATES FOR THE VOCATIONAL INFORMATION DETAILS OF THIS EMPLOYEE";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE VOCATIONAL ATTAINMENT INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
                $userlogs->save();
            }
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
    }

    public function saveJobHistory(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new JobHistoryTable;
            $employee->employee_id = $request->employee_id;
            $employee->job_company_name = strtoupper($request->job_company_name);
            $employee->job_description = strtoupper($request->job_description);
            $employee->job_position = strtoupper($request->job_position);
            $employee->job_contact_number = $request->job_contact_number;
            $employee->job_inclusive_years_from = $request->job_inclusive_years_from;
            $employee->job_inclusive_years_to = $request->job_inclusive_years_to;
            $sql = $employee->save();

            if($request->job_history_change == 'CHANGED'){
                $job_history_update = "[JOB HISTORY: LIST OF JOB HISTORY HAVE BEEN CHANGED]";
            }
            else{
                $job_history_update = NULL;
            }

            if($sql){
                $result = 'true';
                $id = $employee->id;

                if($request->job_history_change == 'CHANGED'){
                    $employee_logs = new LogsTable;
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
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
        else{
            $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
            $employee = new JobHistoryTablePending;
            $employee->employee_id = $emp_id;
            $employee->job_company_name = strtoupper($request->job_company_name);
            $employee->job_description = strtoupper($request->job_description);
            $employee->job_position = strtoupper($request->job_position);
            $employee->job_contact_number = $request->job_contact_number;
            $employee->job_inclusive_years_from = $request->job_inclusive_years_from;
            $employee->job_inclusive_years_to = $request->job_inclusive_years_to;
            $sql = $employee->save();

            if($sql){
                $result = 'true';
                $id = $employee->id;

                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $request->employee_id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER HAS REQUESTED UPDATES FOR THE JOB HISTORY INFORMATION DETAILS OF THIS EMPLOYEE";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE JOB HISTORY INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
                    $userlogs->save();
            }
            else{
                $result = 'false';
                $id = '';
            }
            $data = array('result' => $result, 'id' => $id);
            return response()->json($data);
        }
    }

    public function saveMedicalHistory(Request $request){
        if($request->past_medical_condition && $request->allergies && $request->medication && $request->psychological_history){
            $employee = new MedicalHistory;
            $employee->employee_id = $request->employee_id;
            $employee->past_medical_condition = strtoupper($request->past_medical_condition);
            $employee->allergies = strtoupper($request->allergies);
            $employee->medication = strtoupper($request->medication);
            $employee->psychological_history = strtoupper($request->psychological_history);
            $employee->save();
        } 
    }

    public function saveCompensationBenefits(Request $request){

        if($request->employee_salary && $request->employee_incentives && $request->employee_overtime_pay && $request->employee_bonus && $request->employee_insurance){
            $employee = new CompensationBenefits;
            $employee->employee_id = $request->employee_id;
            $employee->employee_salary = $request->employee_salary;
            $employee->employee_incentives = $request->employee_incentives;
            $employee->employee_overtime_pay = $request->employee_overtime_pay;
            $employee->employee_bonus = $request->employee_bonus;
            $employee->employee_insurance = strtoupper($request->employee_insurance);
            $employee->save();
        }

        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;

        $userlogs = new UserLogs;
        $userlogs->user_id = auth()->user()->id;
        $userlogs->activity = "ADDED USER: USER SUCCESSFULLY ADDED NEW EMPLOYEE: [Employee Number: $employee_number] [Employee Name: $employee_details->first_name $employee_details->middle_name $employee_details->last_name]";
        $userlogs->save();
    }

    public function updatePersonalInformation(Request $request){
        if($request->filename_delete){
            if(file_exists('storage/employee_images/'.$request->filename_delete)){
                unlink('storage/employee_images/'.$request->filename_delete);
            }
        }
        $employee = PersonalInformationTable::find($request->id);
        $employee->employee_image = $request->employee_image == 'N\A' ? '' : $request->employee_image;
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
        $father_name_orig = PersonalInformationTable::where('id', $request->id)->first()->father_name;
        $father_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->father_contact_number;
        $father_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->father_profession;
        $mother_name_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_name;
        $mother_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_contact_number;
        $mother_profession_orig = PersonalInformationTable::where('id', $request->id)->first()->mother_profession;
        $emergency_contact_name_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_name;
        $emergency_contact_relationship_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_relationship;
        $emergency_contact_number_orig = PersonalInformationTable::where('id', $request->id)->first()->emergency_contact_number;
        
        $employee_image_update = $request->employee_image_change == 'CHANGED' ? '[IMAGE CHANGE: USER MODIFY IMAGE OF THIS EMPLOYEE]' : null;

        if(strtoupper($request->first_name) != $first_name_orig){
            $first_name_new = strtoupper($request->first_name);
            $first_name_change = "[FIRST NAME: FROM '$first_name_orig' TO '$first_name_new']";
        }
        else{
            $first_name_change = NULL;
        }

        if(strtoupper($request->middle_name) != $middle_name_orig){
            $middle_name_new = strtoupper($request->middle_name);
            $middle_name_change = "[MIDDLE NAME: FROM '$middle_name_orig' TO '$middle_name_new']";
        }
        else{
            $middle_name_change = NULL;
        }

        if(strtoupper($request->last_name) != $last_name_orig){
            $last_name_new = strtoupper($request->last_name);
            $last_name_change = "[LAST NAME: FROM '$last_name_orig' TO '$last_name_new']";
        }
        else{
            $last_name_change = NULL;
        }
        
        if(strtoupper($request->suffix) != $suffix_orig){
            $suffix_new = strtoupper($request->suffix);
            $suffix_change = "[SUFFIX: FROM '$suffix_orig' TO '$suffix_new']";
        }
        else{
            $suffix_change = NULL;
        }

        if(strtoupper($request->nickname) != $nickname_orig){
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
            $gender_change = "[GENDER: FROM '$gender_orig' TO '$gender_new']";
        }
        else{
            $gender_change = NULL;
        }

        if($request->address != $address_orig){
            $address_new = $request->address;
            $address_change = "[ADDRESS: FROM '$address_orig' TO '$address_new']";
        }
        else{
            $address_change = NULL;
        }

        if($request->ownership != $ownership_orig){
            $ownership_new = $request->ownership;
            $ownership_change = "[OWNERSHIP: FROM '$ownership_orig' TO '$ownership_new']";
        }
        else{
            $ownership_change = NULL;
        }

        if($request->province != $province_orig){
            $province_new = $request->province;
            $province_change = "[PROVINCE: FROM '$province_orig' TO '$province_new']";
        }
        else{
            $province_change = NULL;
        }

        if($request->city != $city_orig){
            $city_new = $request->city;
            $city_change = "[CITY: FROM '$city_orig' TO '$city_new']";
        }
        else{
            $city_change = NULL;
        }

        if($request->region != $region_orig){
            $region_new = $request->region;
            $region_change = "[REGION: FROM '$region_orig' TO '$region_new']";
        }
        else{
            $region_change = NULL;
        }

        if($request->height != $height_orig){
            $height_new = $request->height;
            $height_change = "[HEIGHT: FROM '$height_orig' TO '$height_new']";
        }
        else{
            $height_change = NULL;
        }

        if($request->weight != $weight_orig){
            $weight_new = $request->weight;
            $weight_change = "[WEIGHT: FROM '$weight_orig' TO '$weight_new']";
        }
        else{
            $weight_change = NULL;
        }

        if(strtoupper($request->religion) != $religion_orig){
            $religion_new = strtoupper($request->religion);
            $religion_change = "[RELIGION: FROM '$religion_orig' TO '$religion_new']";
        }
        else{
            $religion_change = NULL;
        }

        if($request->civil_status != $civil_status_orig){
            $civil_status_new = $request->civil_status;
            $civil_status_change = "[CIVIL STATUS: FROM '$civil_status_orig' TO '$civil_status_new']";
        }
        else{
            $civil_status_change = NULL;
        }

        if($request->email_address != $email_address_orig){
            $email_address_new = $request->email_address;
            $email_address_change = "[EMAIL ADDRESS: FROM '$email_address_orig' TO '$email_address_new']";
        }
        else{
            $email_address_change = NULL;
        }

        if($request->telephone_number != $telephone_number_orig){
            $telephone_number_new = $request->telephone_number;
            $telephone_number_change = "[TELEPHONE NUMBER: FROM '$telephone_number_orig' TO '$telephone_number_new']";
        }
        else{
            $telephone_number_change = NULL;
        }

        if($request->cellphone_number != $cellphone_number_orig){
            $cellphone_number_new = $request->cellphone_number;
            $cellphone_number_change = "[CELLPHONE NUMBER: FROM '$cellphone_number_orig' TO '$cellphone_number_new']";
        }
        else{
            $cellphone_number_change = NULL;
        }

        if(strtoupper($request->father_name) != $father_name_orig){
            $father_name_new = strtoupper($request->father_name);
            $father_name_change = "[FATHER'S NAME: FROM '$father_name_orig' TO '$father_name_new']";
        }
        else{
            $father_name_change = NULL;
        }

        if($request->father_contact_number != $father_contact_number_orig){
            $father_contact_number_new = $request->father_contact_number;
            $father_contact_number_change = "[FATHER'S CONTACT NUMBER: FROM '$father_contact_number_orig' TO '$father_contact_number_new']";
        }
        else{
            $father_contact_number_change = NULL;
        }

        if(strtoupper($request->father_profession) != $father_profession_orig){
            $father_profession_new = strtoupper($request->father_profession);
            $father_profession_change = "[FATHER'S PROFESSION: FROM '$father_profession_orig' TO '$father_profession_new']";
        }
        else{
            $father_profession_change = NULL;
        }

        if(strtoupper($request->mother_name) != $mother_name_orig){
            $mother_name_new = strtoupper($request->mother_name);
            $mother_name_change = "[MOTHER'S MAIDEN NAME: FROM '$mother_name_orig' TO '$mother_name_new']";
        }
        else{
            $mother_name_change = NULL;
        }

        if($request->mother_contact_number != $mother_contact_number_orig){
            $mother_contact_number_new = $request->mother_contact_number;
            $mother_contact_number_change = "[MOTHER'S CONTACT NUMBER: FROM '$mother_contact_number_orig' TO '$mother_contact_number_new']";
        }
        else{
            $mother_contact_number_change = NULL;
        }

        if(strtoupper($request->mother_profession) != $mother_profession_orig){
            $mother_profession_new = strtoupper($request->mother_profession);
            $mother_profession_change = "[MOTHER'S PROFESSION: FROM '$mother_profession_orig' TO '$mother_profession_new']";
        }
        else{
            $mother_profession_change = NULL;
        }

        if(strtoupper($request->emergency_contact_name) != $emergency_contact_name_orig){
            $emergency_contact_name_new = strtoupper($request->emergency_contact_name);
            $emergency_contact_name_change = "[EMERGENCY CONTACT NAME: FROM '$emergency_contact_name_orig' TO '$emergency_contact_name_new']";
        }
        else{
            $emergency_contact_name_change = NULL;
        }

        if(strtoupper($request->emergency_contact_relationship) != $emergency_contact_relationship_orig){
            $emergency_contact_relationship_new = strtoupper($request->emergency_contact_relationship);
            $emergency_contact_relationship_change = "[EMERGENCY CONTACT RELATIONSHIP: FROM '$emergency_contact_relationship_orig' TO '$emergency_contact_relationship_new']";
        }
        else{
            $emergency_contact_relationship_change = NULL;
        }

        if($request->emergency_contact_number != $emergency_contact_number_orig){
            $emergency_contact_number_new = $request->emergency_contact_number;
            $emergency_contact_number_change = "[EMERGENCY CONTACT NUMBER: FROM '$emergency_contact_number_orig' TO '$emergency_contact_number_new']";
        }
        else{
            $emergency_contact_number_change = NULL;
        }

        if(auth()->user()->user_level != 'EMPLOYEE'){
            $sql = PersonalInformationTable::find($request->id)
            ->update([
                'employee_image' => $request->employee_image,
                'first_name' => strtoupper($request->first_name),
                'middle_name' => strtoupper($request->middle_name),
                'last_name' => strtoupper($request->last_name),
                'suffix' => strtoupper($request->suffix),
                'nickname' => strtoupper($request->nickname),
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'address' => $request->address,
                'ownership' => $request->ownership,
                'province' => $request->province,
                'city' => $request->city,
                'region' => $request->region,
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
                'emergency_contact_number' => $request->emergency_contact_number
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
                $request->emergency_contact_number != $emergency_contact_number_orig ||
                $request->employee_image_change == 'CHANGED'
            ){
                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER HAS UPDATED THE PERSONAL INFORMATION DETAILS OF THIS EMPLOYEE 
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
                                        $father_name_change 
                                        $father_contact_number_change 
                                        $father_profession_change 
                                        $mother_name_change 
                                        $mother_contact_number_change 
                                        $mother_profession_change 
                                        $emergency_contact_name_change 
                                        $emergency_contact_relationship_change 
                                        $emergency_contact_number_change
                                        $employee_image_update
                                        ";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER SUCCESSFULLY UPDATED THE PERSONAL INFORMATION DETAILS OF THIS EMPLOYEE ($first_name_orig $middle_name_orig $last_name_orig) 
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
                                       $father_name_change 
                                       $father_contact_number_change 
                                       $father_profession_change 
                                       $mother_name_change
                                       $mother_contact_number_change 
                                       $mother_profession_change 
                                       $emergency_contact_name_change 
                                       $emergency_contact_relationship_change 
                                       $emergency_contact_number_change
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
        else{
            $empno = PersonalInformationTable::where('id',$request->id)->first()->empno;
            $sql = PersonalInformationTablePending::
                create([
                'empno' => $empno,
                'employee_image' => $request->employee_image,
                'first_name' => strtoupper($request->first_name),
                'middle_name' => strtoupper($request->middle_name),
                'last_name' => strtoupper($request->last_name),
                'suffix' => strtoupper($request->suffix),
                'nickname' => strtoupper($request->nickname),
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'address' => $request->address,
                'ownership' => $request->ownership,
                'province' => $request->province,
                'city' => $request->city,
                'region' => $request->region,
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
                'emergency_contact_number' => $request->emergency_contact_number
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
                $request->emergency_contact_number != $emergency_contact_number_orig ||
                $request->employee_image_change == 'CHANGED'
            ){
                $employee_logs = new LogsTable;
                $employee_logs->employee_id = $request->id;
                $employee_logs->user_id = auth()->user()->id;
                $employee_logs->logs = "USER HAS REQUESTED UPDATES FOR THE PERSONAL INFORMATION DETAILS OF THIS EMPLOYEE 
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
                                        $father_name_change 
                                        $father_contact_number_change 
                                        $father_profession_change 
                                        $mother_name_change 
                                        $mother_contact_number_change 
                                        $mother_profession_change 
                                        $emergency_contact_name_change 
                                        $emergency_contact_relationship_change 
                                        $emergency_contact_number_change
                                        $employee_image_update
                                        ";
                $employee_logs->save();

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE PERSONAL INFORMATION DETAILS OF THIS EMPLOYEE ($first_name_orig $middle_name_orig $last_name_orig) 
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
                                       $father_name_change 
                                       $father_contact_number_change 
                                       $father_profession_change 
                                       $mother_name_change
                                       $mother_contact_number_change 
                                       $mother_profession_change 
                                       $emergency_contact_name_change 
                                       $emergency_contact_relationship_change 
                                       $emergency_contact_number_change
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
    }

    public function updateWorkInformation(Request $request){
        $employee = WorkInformationTable::where('employee_id',$request->employee_id)->first();
        $employee_number_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_number;
        $date_hired_orig = WorkInformationTable::where('employee_id', $request->id)->first()->date_hired;
        $employee_shift_orig = WorkInformationTable::where('employee_id', $request->id)->first()->employee_shift;
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

        if($request->employee_number != $employee_number_orig){
            $employee_number_new = $request->employee_number;
            $employee_number_change = "[EMPLOYEE NUMBER: FROM '$employee_number_orig' TO '$employee_number_new']";
        }
        else{
            $employee_number_change = NULL;
        }

        if($request->date_hired != $date_hired_orig){
            $date_hired1 = Carbon::parse($date_hired_orig)->format('F d, Y');
            $date_hired2 = Carbon::parse($request->date_hired)->format('F d, Y');
            $date_hired_change = "[DATE HIRED: FROM '$date_hired1' TO '$date_hired2']";
        }
        else{
            $date_hired_change = NULL;
        }
        
        if($request->employee_shift != $employee_shift_orig){
            $employee_shift_orig = Shift::where('id', $employee_shift_orig)->first();
            $employee_shift_new = Shift::where('id', $request->employee_shift)->first();
            $employee_shift_change = "[SHIFT: FROM '$employee_shift_orig->shift_code $employee_shift_orig->shift_working_hours 'with BREAK-TIME' $employee_shift_orig->shift_break_time' TO '$employee_shift_new->shift_code $employee_shift_new->shift_working_hours $employee_shift_new->shift_break_time']";
        }
        else{
            $employee_shift_change = NULL;
        }

        if($request->employee_company != $employee_company_orig){
            $employee_company_orig = Company::where('id', $employee_company_orig)->first()->company_name;
            $employee_company_new = Company::where('id', $request->employee_company)->first()->company_name;
            $employee_company_change = "[COMPANY: FROM '$employee_company_orig' TO '$employee_company_new']";
        }
        else{
            $employee_company_change = NULL;
        }

        if($request->employee_branch != $employee_branch_orig){
            $employee_branch_orig = Branch::where('id', $employee_branch_orig)->first()->branch_name;
            $employee_branch_new = Branch::where('id', $request->employee_branch)->first()->branch_name;
            $employee_branch_change = "[BRANCH: FROM '$employee_branch_orig' TO '$employee_branch_new']";
        }
        else{
            $employee_branch_change = NULL;
        }

        if($request->employee_department != $employee_department_orig){
            $employee_department_orig = Department::where('id', $employee_department_orig)->first()->department;
            $employee_department_new = Department::where('id', $request->employee_department)->first()->department;
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

        $sql = WorkInformationTable::where('employee_id',$request->employee_id)
            ->update([
                'employee_number' => $request->employee_number,
                'date_hired' => $request->date_hired,
                'employee_shift' => $request->employee_shift,
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
                $request->employee_number != $employee_number_orig ||
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
                $request->employee_department != $employee_department_orig ||
                $request->employee_shift != $employee_shift_orig
                ){
                // $employee_number = WorkInformationTable::where('id', $request->id)->first()->employee_number;
                $employee_details = PersonalInformationTable::where('id', $request->id)->first();
                $userlogs = new LogsTable;
                $userlogs->employee_id = $request->id;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->logs = "USER HAS UPDATED THE WORK INFORMATION DETAILS OF THIS EMPLOYEE 
                                    $employee_number_change 
                                    $date_hired_change 
                                    $employee_shift_change 
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
                $userlogs->history = "UPDATED DETAILS 
                                      $employee_number_change 
                                      $date_hired_change 
                                      $employee_company_change 
                                      $employee_shift_change 
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
                                        $employee_number_change 
                                        $date_hired_change 
                                        $employee_shift_change 
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

    public function updateEducationalAttainment(Request $request){
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
                $employee = new EducationalAttainment;
                $employee->employee_id = $request->employee_id;
                $employee->secondary_school_name = $request->secondary_school_name;
                $employee->secondary_school_address = $request->secondary_school_address;
                $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
                $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
                $employee->primary_school_name = $request->primary_school_name;
                $employee->primary_school_address = $request->primary_school_address;
                $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
                $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
                $employee->save();
            }
        }
        else{
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee_details = PersonalInformationTable::where('id', $request->id)->first();
            $secondary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_name;
            $secondary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_address;
            $secondary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_inclusive_years_from;
            $secondary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first()->secondary_school_inclusive_years_to;
            $primary_school_name_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_name;
            $primary_school_address_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_address;
            $primary_school_inclusive_years_from_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_inclusive_years_from;
            $primary_school_inclusive_years_to_orig = EducationalAttainment::where('employee_id', $request->id)->first()->primary_school_inclusive_years_to;

            if($request->secondary_school_name != $secondary_school_name_orig){
                $secondary_school_name_new = $request->secondary_school_name;
                $secondary_school_name_change = "[SECONDARY SCHOOL NAME: FROM '$secondary_school_name_orig' TO '$secondary_school_name_new']";
            }
            else{
                $secondary_school_name_change = NULL;
            }

            if($request->secondary_school_address != $secondary_school_address_orig){
                $secondary_school_address_new = $request->secondary_school_address;
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
            //
            if($request->primary_school_name != $primary_school_name_orig){
                $primary_school_name_new = $request->primary_school_name;
                $primary_school_name_change = "[PRIMARY SCHOOL NAME: FROM '$primary_school_name_orig' TO '$primary_school_name_new']";
            }
            else{
                $primary_school_name_change = NULL;
            }

            if($request->primary_school_address != $primary_school_address_orig){
                $primary_school_address_new = $request->primary_school_address;
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

            if(auth()->user()->user_level != 'EMPLOYEE'){
                $sql = EducationalAttainment::where('employee_id',$request->employee_id)
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

                        $employee_logs = new LogsTable;
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
            else{
                $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
                $sql = EducationalAttainmentPending::where('employee_id',$request->employee_id)
                ->create([
                    'employee_id' => $emp_id,
                    'secondary_school_name' => $request->secondary_school_name,
                    'secondary_school_address' => $request->secondary_school_address,
                    'secondary_school_inclusive_years_from' => $request->secondary_school_inclusive_years_from,
                    'secondary_school_inclusive_years_to' => $request->secondary_school_inclusive_years_to,
                    'primary_school_name' => $request->primary_school_name,
                    'primary_school_address' => $request->primary_school_address,
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

                        $employee_logs = new LogsTable;
                        $employee_logs->employee_id = $request->id;
                        $employee_logs->user_id = auth()->user()->id;
                        $employee_logs->logs = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE EDUCATIONAL INFORMATION DETAILS OF THIS EMPLOYEE
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
                        $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE EDUCATIONAL INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) 
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
    }

    // public function updateJobHistory(Request $request){
    //     $employee = JobHistoryTable::where('employee_id',$request->employee_id)->first();
    //     $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
    //     $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
    //     $job_history_update = $request->job_history_change == 'CHANGED' ? '[JOB HISTORY: LIST OF JOB HISTORY/S HAVE BEEN CHANGED]' : null;

    //     if($job_history_update){
    //         $result = 'true';
    //         $id = $employee->id;

    //         if($request->job_history_change == 'CHANGED'){
    //             $employee_logs = new LogsTable;
    //             $employee_logs->employee_id = $request->id;
    //             $employee_logs->user_id = auth()->user()->id;
    //             $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
    //                                     $job_history_update
    //                                     ";
    //             $employee_logs->save();

    //             $userlogs = new UserLogs;
    //             $userlogs->user_id = auth()->user()->id;
    //             $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EDUCATION INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) $job_history_update";
    //             $userlogs->save();
    //         }
    //     }
    //     else{
    //         $result = 'false';
    //         $id = '';
    //     }
    //     $data = array('result' => $result, 'id' => $id);
    //     return response()->json($data);
    // }

    public function updateMedicalHistory(Request $request){
        $employee = MedicalHistory::where('employee_id',$request->employee_id)->first();
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            if(!$employee){
                if($request->past_medical_condition ||
                   $request->allergies ||
                   $request->medication ||
                   $request->psychological_history
                ){
                    $employee = new MedicalHistory;
                    $employee->employee_id = $request->employee_id;
                    $employee->past_medical_condition = $request->past_medical_condition;
                    $employee->allergies = $request->allergies;
                    $employee->medication = $request->medication;
                    $employee->psychological_history = $request->psychological_history;
                    $save = $employee->save();
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

                if(auth()->user()->user_level != 'EMPLOYEE'){
                        $sql = MedicalHistory::where('employee_id',$request->employee_id)
                        ->update([
                            'past_medical_condition' => $request->past_medical_condition,
                            'allergies' => $request->allergies,
                            'medication' => $request->medication,
                            'psychological_history' => $request->psychological_history,
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
                            $employee_logs = new LogsTable;
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
                else{
                    $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
                    $sql = MedicalHistoryPending::create([
                        'employee_id' => $emp_id,
                        'past_medical_condition' => $request->past_medical_condition,
                        'allergies' => $request->allergies,
                        'medication' => $request->medication,
                        'psychological_history' => $request->psychological_history,
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
                            $employee_logs = new LogsTable;
                            $employee_logs->employee_id = $request->id;
                            $employee_logs->user_id = auth()->user()->id;
                            $employee_logs->logs = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE MEDICAL HISTORY INFORMATION DETAILS OF THIS EMPLOYEE
                                                    $past_medical_condition_change
                                                    $allergies_change
                                                    $medication_change
                                                    $psychological_history_change
                                                    ";
                            $employee_logs->save();

                            $userlogs = new UserLogs;
                            $userlogs->user_id = auth()->user()->id;
                            $userlogs->activity = "USER SUCCESSFULLY REQUESTED UPDATES FOR THE MEDICAL HISTORY INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) 
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
    }

    public function updateCompensationBenefits(Request $request){
        $employee = CompensationBenefits::where('employee_id',$request->employee_id)->first();
        if(!$employee){
            if($request->employee_salary
            || $request->employee_incentives
            || $request->employee_overtime_pay
            || $request->employee_bonus
            || $request->employee_insurance){
                $employee = new CompensationBenefits;
                $employee->employee_id = $request->employee_id;
                $employee->employee_salary = $request->employee_salary;
                $employee->employee_incentives = $request->employee_incentives;
                $employee->employee_overtime_pay = $request->employee_overtime_pay;
                $employee->employee_bonus = $request->employee_bonus;
                $employee->employee_insurance = $request->employee_insurance;
                $employee->save();
            }
        }
        else{
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee_details = PersonalInformationTable::where('id', $request->id)->first();
            $employee_salary_orig = CompensationBenefits::where('employee_id',$request->id)->first()->employee_salary;
            $employee_incentives_orig = CompensationBenefits::where('employee_id',$request->id)->first()->employee_incentives;
            $employee_overtime_pay_orig = CompensationBenefits::where('employee_id',$request->id)->first()->employee_overtime_pay;
            $employee_bonus_orig = CompensationBenefits::where('employee_id',$request->id)->first()->employee_bonus;
            $employee_insurance_orig = CompensationBenefits::where('employee_id',$request->id)->first()->employee_insurance;

            if($request->employee_salary != $employee_salary_orig){
                $employee_salary_new = $request->employee_salary;
                $employee_salary_change = "[SALARY: FROM '$employee_salary_orig' TO '$employee_salary_new']";
            }
            else{
                $employee_salary_change = NULL;
            } 

            if($request->employee_incentives != $employee_incentives_orig){
                $employee_incentives_new = $request->employee_incentives;
                $employee_incentives_change = "[INCENTIVES: FROM '$employee_incentives_orig' TO '$employee_incentives_new']";
            }
            else{
                $employee_incentives_change = NULL;
            } 

            if($request->employee_overtime_pay != $employee_overtime_pay_orig){
                $employee_overtime_pay_new = $request->employee_overtime_pay;
                $employee_overtime_pay_change = "[OVERTIME PAY: FROM '$employee_overtime_pay_orig' TO '$employee_overtime_pay_new']";
            }
            else{
                $employee_overtime_pay_change = NULL;
            } 

            if($request->employee_bonus != $employee_bonus_orig){
                $employee_bonus_new = $request->employee_bonus;
                $employee_bonus_change = "[BONUS: FROM '$employee_bonus_orig' TO '$employee_bonus_new']";
            }
            else{
                $employee_bonus_change = NULL;
            } 

            if($request->employee_insurance != $employee_insurance_orig){
                $employee_insurance_new = $request->employee_insurance;
                $employee_insurance_change = "[HEALTHCARE / BENEFITS: FROM '$employee_insurance_orig' TO '$employee_insurance_new']";
            }
            else{
                $employee_insurance_change = NULL;
            } 

            $update = CompensationBenefits::where('employee_id',$request->employee_id)
            ->update([
                'employee_salary' => $request->employee_salary,
                'employee_incentives' => $request->employee_incentives,
                'employee_overtime_pay' => $request->employee_overtime_pay,
                'employee_bonus' => $request->employee_bonus,
                'employee_insurance' => $request->employee_insurance
            ]);

            if($update){
            
                $result = 'true';
                $id = $employee->id;

                if(
                    $request->employee_salary != $employee_salary_orig ||
                    $request->employee_incentives != $employee_incentives_orig ||
                    $request->employee_overtime_pay != $employee_overtime_pay_orig ||
                    $request->employee_bonus != $employee_bonus_orig ||
                    $request->employee_insurance != $employee_insurance_orig
                ){
                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $request->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER UPDATES DETAILS OF THIS EMPLOYEE:
                                            $employee_salary_change
                                            $employee_incentives_change
                                            $employee_overtime_pay_change
                                            $employee_bonus_change
                                            $employee_insurance_change
                                            ";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EDUCATION INFORMATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number) 
                                            $employee_salary_change
                                            $employee_incentives_change
                                            $employee_overtime_pay_change
                                            $employee_bonus_change
                                            $employee_insurance_change
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

    public function saveDocuments(Request $request){
            $date = Carbon::now();
            $timestamp = date("ymdHis", strtotime($date));
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();

        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $memoFileName = $employee_number.'_Memo_File_'.$timestamp.'.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$memoFileName);
                
                $memo = new MemoTable;
                $memo->employee_id = $request->employee_id;
                $memo->memo_subject = $request->memo_subject[$key];
                $memo->memo_date = $request->memo_date[$key];
                $memo->memo_penalty = $request->memo_penalty[$key];
                $memo->memo_file = $memoFileName;
                $memo->save();
            }
        }

        if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
            foreach($request->file('evaluation_file') as $key => $value){
                $evaluationFileName = $employee_number.'_Evaluation_File_'.$timestamp.'.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$evaluationFileName);
                
                $evaluation = new EvaluationTable;
                $evaluation->employee_id = $request->employee_id;
                $evaluation->evaluation_reason = $request->evaluation_reason[$key];
                $evaluation->evaluation_date = $request->evaluation_date[$key];
                $evaluation->evaluation_evaluated_by = $request->evaluation_evaluated_by[$key];
                $evaluation->evaluation_file = $evaluationFileName;
                $evaluation->save();
            }
        }

        if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
            foreach($request->file('contracts_file') as $key => $value){
                $contractsFileName = $employee_number.'_Contracts_File_'.$timestamp.'.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$contractsFileName);
                
                $contracts = new ContractTable;
                $contracts->employee_id = $request->employee_id;
                $contracts->contracts_type = $request->contracts_type[$key];
                $contracts->contracts_date = $request->contracts_date[$key];
                $contracts->contracts_file = $contractsFileName;
                $contracts->save();
            }
        }
    
            $document = new Document;
            $document->employee_id = $request->employee_id;

        if($request->hasFile('barangay_clearance_file')){
            $barangayClearanceFile = $request->file('barangay_clearance_file');
            $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
            $barangayClearanceFilename = $employee_number.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
            $barangayClearanceFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
            $document->barangay_clearance_file = $barangayClearanceFilename;
        }

        if($request->hasFile('birthcertificate_file')){
            $birthcertificateFile = $request->file('birthcertificate_file');
            $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
            $birthcertificateFilename = $employee_number.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
            $birthcertificateFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
            $document->birthcertificate_file = $birthcertificateFilename;
        }
            
        if($request->hasFile('diploma_file')){
            $diplomaFile = $request->file('diploma_file');
            $diplomaExtension = $diplomaFile->getClientOriginalExtension();
            $diplomaFilename = $employee_number.'_Diploma_File_'.$timestamp.'.'.$diplomaExtension;
            $diplomaFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
            $document->diploma_file = $diplomaFilename;
        }

        if($request->hasFile('medical_certificate_file')){
            $medicalCertificateFile = $request->file('medical_certificate_file');
            $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
            $medicalCertificateFilename = $employee_number.'_Medical_Certificate_File_'.$timestamp.'.'.$medicalCertificateExtension;
            $medicalCertificateFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
            $document->medical_certificate_file = $medicalCertificateFilename;
        }

        if($request->hasFile('nbi_clearance_file')){
            $nbiFile = $request->file('nbi_clearance_file');
            $nbiExtension = $nbiFile->getClientOriginalExtension();
            $nbiFilename = $employee_number.'_NBI_Clearance_File_'.$timestamp.'.'.$nbiExtension;
            $nbiFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
            $document->nbi_clearance_file = $nbiFilename;
        }

        if($request->hasFile('pag_ibig_file')){
            $pagibigFile = $request->file('pag_ibig_file');
            $pagibigExtension = $pagibigFile->getClientOriginalExtension();
            $pagibigFilename = $employee_number.'_Pag_ibig_File_'.$timestamp.'.'.$pagibigExtension;
            $pagibigFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
            $document->pag_ibig_file = $pagibigFilename;
        }
            
        if($request->hasFile('philhealth_file')){
            $philhealthFile = $request->file('philhealth_file');
            $philhealthExtension = $philhealthFile->getClientOriginalExtension();
            $philhealthFilename = $employee_number.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
            $philhealthFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
            $document->philhealth_file = $philhealthFilename;
        }
            
        if($request->hasFile('police_clearance_file')){
            $policeClearanceFile = $request->file('police_clearance_file');
            $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
            $policeClearanceFilename = $employee_number.'_Police_Clearance_File_'.$timestamp.'.'.$policeClearanceExtension;
            $policeClearanceFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
            $document->police_clearance_file = $policeClearanceFilename;
        }

        if($request->hasFile('resume_file')){
            $resumeFile = $request->file('resume_file');
            $resumeExtension = $resumeFile->getClientOriginalExtension();
            $resumeFilename = $employee_number.'_Resume_File_'.$timestamp.'.'.$resumeExtension;
            $resumeFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
            $document->resume_file = $resumeFilename;
        }

        if($request->hasFile('sss_file')){
            $sssFile = $request->file('sss_file');
            $sssExtension = $sssFile->getClientOriginalExtension();
            $sssFilename = $employee_number.'_SSS_File_'.$timestamp.'.'.$sssExtension;
            $sssFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
            $document->sss_file = $sssFilename;
        }
            
        if($request->hasFile('tor_file')){
            $torFile = $request->file('tor_file');
            $torExtension = $torFile->getClientOriginalExtension();
            $torFilename = $employee_number.'_Transcript_of_Records_File_'.$timestamp.'.'.$torExtension;
            $torFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
            $document->transcript_of_records_file = $torFilename;
        }
            $document->save();
            sleep(2);
            return Redirect::to(url()->previous());
    }

    public function updateDocuments(Request $request){
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $date = Carbon::now();
            $timestamp = date("ymdHis", strtotime($date));
            $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
            $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
            $employee = Document::where('employee_id',$request->employee_id)->first();
            
            if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
                $MemoCountBefore = MemoTable::where('employee_id', $request->employee_id)->count();
                foreach($request->file('memo_file') as $key => $value){
                    $memoFileName = $employee_number.'_Memo_File_'.$timestamp.'.'.$request->memo_file[$key]->extension();
                    $request->memo_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$memoFileName);
                    
                    $memo = new MemoTable;
                    $memo->employee_id = $request->employee_id;
                    $memo->memo_subject = $request->memo_subject[$key];
                    $memo->memo_date = $request->memo_date[$key];
                    $memo->memo_penalty = $request->memo_penalty[$key];
                    $memo->memo_file = $memoFileName;
                    $memo->save();
                }

                $MemoCountAfter = MemoTable::where('employee_id', $request->employee_id)->count();

                if($MemoCountBefore != $MemoCountAfter){
                    $memo_update = "[MEMO HAS BEEN CHANGED]";
                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $employee_details->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S MEMO DETAILS
                                            $memo_update";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S MEMO DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $memo_update";
                    $userlogs->save();
                }
            }

            if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
                $EvaluationCountBefore = EvaluationTable::where('employee_id', $request->employee_id)->count();
                foreach($request->file('evaluation_file') as $key => $value){
                    $evaluationFileName =  $employee_number.'_Evaluation_File_'.$timestamp.'.'.$request->evaluation_file[$key]->extension();
                    $request->evaluation_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$evaluationFileName);
                    
                    $evaluation = new EvaluationTable;
                    $evaluation->employee_id = $request->employee_id;
                    $evaluation->evaluation_reason = $request->evaluation_reason[$key];
                    $evaluation->evaluation_date = $request->evaluation_date[$key];
                    $evaluation->evaluation_evaluated_by = $request->evaluation_evaluated_by[$key];
                    $evaluation->evaluation_file = $evaluationFileName;
                    $evaluation->save();
                }
                $EvaluationCountAfter = EvaluationTable::where('employee_id',$request->employee_id)->count();
            
                if($EvaluationCountBefore != $EvaluationCountAfter){
                    $evaluation_update = "[EVALUATION HAS BEEN CHANGED]";
                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $employee_details->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EVALUATION DETAILS
                                            $evaluation_update";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S EVALUATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $evaluation_update";
                    $userlogs->save();
                }
            }

            if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
                $ContractsCountBefore = ContractTable::where('employee_id',$request->employee_id)->count();
                foreach($request->file('contracts_file') as $key => $value){
                    $contractsFileName = $employee_number.'_Contracts_File_'.$timestamp.'.'.$request->contracts_file[$key]->extension();
                    $request->contracts_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$contractsFileName);
                    
                    $contracts = new ContractTable;
                    $contracts->employee_id = $request->employee_id;
                    $contracts->contracts_type = $request->contracts_type[$key];
                    $contracts->contracts_date = $request->contracts_date[$key];
                    $contracts->contracts_file = $contractsFileName;
                    $contracts->save();
                }
                $ContractsCountAfter = EvaluationTable::where('employee_id',$request->employee_id)->count();

                if($ContractsCountBefore != $ContractsCountAfter){
                    $contracts_update = "[CONTRACTS HAS BEEN CHANGED]";
                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $employee_details->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS
                                            $contracts_update";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S CONTRACTS DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $contracts_update";
                    $userlogs->save();
                }
            }
            
            if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
                $ResignationCountBefore = ResignationTable::where('employee_id',$request->employee_id)->count();
                foreach($request->file('resignation_file') as $key => $value){
                    $resignationFileName = $employee_number.'_Resignation_File_'.$timestamp.'.'.$request->resignation_file[$key]->extension();
                    $request->resignation_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resignationFileName);
                    
                    $resignation = new ResignationTable;
                    $resignation->employee_id = $request->employee_id;
                    $resignation->resignation_reason = $request->resignation_reason[$key];
                    $resignation->resignation_date = $request->resignation_date[$key];
                    $resignation->resignation_file = $resignationFileName;
                    $resignation->save();
                }
                $ResignationCountAfter = ResignationTable::where('employee_id',$request->employee_id)->count();

                if($ResignationCountBefore != $ResignationCountAfter){
                    $resignation_update = "[RESIGNATION HAS BEEN CHANGED]";
                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $employee_details->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS
                                            $resignation_update";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S RESIGNATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $resignation_update";
                    $userlogs->save();
                }
            }

            if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
                $TerminationCountBefore = TerminationTable::where('employee_id',$request->employee_id)->count();
                foreach($request->file('termination_file') as $key => $value){
                    $terminationFileName = time().rand(1,100).'_Termination_File.'.$request->termination_file[$key]->extension();
                    $request->termination_file[$key]->storeAs('public/evaluation/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$terminationFileName);

                    $termination = new TerminationTable;
                    $termination->employee_id = $request->employee_id;
                    $termination->termination_reason = $request->termination_reason[$key];
                    $termination->termination_date = $request->termination_date[$key];
                    $termination->termination_file = $terminationFileName;
                    $termination->save();
                }
                $TerminationCountAfter = TerminationTable::where('employee_id',$request->employee_id)->count();

                if($TerminationCountBefore != $TerminationCountAfter){
                    $termination_update = "[TERMINATION HAS BEEN CHANGED]";
                    $employee_logs = new LogsTable;
                    $employee_logs->employee_id = $employee_details->id;
                    $employee_logs->user_id = auth()->user()->id;
                    $employee_logs->logs = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S TERMINATION DETAILS
                                            $termination_update";
                    $employee_logs->save();

                    $userlogs = new UserLogs;
                    $userlogs->user_id = auth()->user()->id;
                    $userlogs->activity = "USER SUCCESSFULLY UPDATED THIS EMPLOYEE'S TERMINATION DETAILS ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)
                                            $termination_update";
                    $userlogs->save();
                }
            }
            
            if(!$employee){
                $document = new Document;
                $document->employee_id = $request->employee_id;
                if($request->hasFile('barangay_clearance_file')){
                    $barangayClearanceFile = $request->file('barangay_clearance_file');
                    $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                    $barangayClearanceFilename = $employee_number.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
                    $barangayClearanceFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
                    $document->barangay_clearance_file = $barangayClearanceFilename;
                }
                
                if($request->hasFile('birthcertificate_file')){
                    $birthcertificateFile = $request->file('birthcertificate_file');
                    $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                    $birthcertificateFilename = $employee_number.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
                    $birthcertificateFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
                    $document->birthcertificate_file = $birthcertificateFilename;
                }

                if($request->hasFile('diploma_file')){
                    $diplomaFile = $request->file('diploma_file');
                    $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                    $diplomaFilename = $employee_number.'_Diploma_File_'.$timestamp.'.'.$diplomaExtension;
                    $diplomaFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
                    $document->diploma_file = $diplomaFilename;
                }

                if($request->hasFile('medical_certificate_file')){
                    $medicalCertificateFile = $request->file('medical_certificate_file');
                    $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                    $medicalCertificateFilename = $employee_number.'_Medical_Certificate_File_'.$timestamp.'.'.$medicalCertificateExtension;
                    $medicalCertificateFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
                    $document->medical_certificate_file = $medicalCertificateFilename;
                }

                if($request->hasFile('nbi_clearance_file')){
                    $nbiFile = $request->file('nbi_clearance_file');
                    $nbiExtension = $nbiFile->getClientOriginalExtension();
                    $nbiFilename = $employee_number.'_NBI_Clearance_File_'.$timestamp.'.'.$nbiExtension;
                    $nbiFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
                    $document->nbi_clearance_file = $nbiFilename;
                }

                if($request->hasFile('pag_ibig_file')){
                    $pagibigFile = $request->file('pag_ibig_file');
                    $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                    $pagibigFilename = $employee_number.'_Pag_ibig_File_'.$timestamp.'.'.$pagibigExtension;
                    $pagibigFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
                    $document->pag_ibig_file = $pagibigFilename;
                }
                
                if($request->hasFile('philhealth_file')){
                    $philhealthFile = $request->file('philhealth_file');
                    $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                    $philhealthFilename = $employee_number.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
                    $philhealthFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
                    $document->philhealth_file = $philhealthFilename;
                }

                if($request->hasFile('police_clearance_file')){
                    $policeClearanceFile = $request->file('police_clearance_file');
                    $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                    $policeClearanceFilename = $employee_number.'_Police_Clearance_File_'.$timestamp.'.'.$policeClearanceExtension;
                    $policeClearanceFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
                    $document->police_clearance_file = $policeClearanceFilename;
                }
                
                if($request->hasFile('resume_file')){
                    $resumeFile = $request->file('resume_file');
                    $resumeExtension = $resumeFile->getClientOriginalExtension();
                    $resumeFilename = $employee_number.'_Resume_File_'.$timestamp.'.'.$resumeExtension;
                    $resumeFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
                    $document->resume_file = $resumeFilename;
                }

                if($request->hasFile('sss_file')){
                    $sssFile = $request->file('sss_file');
                    $sssExtension = $sssFile->getClientOriginalExtension();
                    $sssFilename = $employee_number.'_SSS_File_'.$timestamp.'.'.$sssExtension;
                    $sssFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
                    $document->sss_file = $sssFilename;
                }
                
                if($request->hasFile('tor_file')){
                    $torFile = $request->file('tor_file');
                    $torExtension = $torFile->getClientOriginalExtension();
                    $torFilename = $employee_number.'_Transcript_of_Records_File_'.$timestamp.'.'.$torExtension;
                    $torFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
                    $document->transcript_of_records_file = $torFilename;
                }
                $document->save();
                
                sleep(2);
                return Redirect::to(url()->previous());
            }
            else{
                $document_orig = Document::where('employee_id', $request->employee_id)->first();
                
                if($request->hasFile('barangay_clearance_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->barangay_clearance_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->barangay_clearance_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->barangay_clearance_file);

                    $barangayClearanceFile = $request->file('barangay_clearance_file');
                    $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                    $barangayClearanceFilename = $employee_number.'_Barangay_Clearance_File_'.$timestamp.'.'.$barangayClearanceExtension;
                    $barangayClearanceFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$barangayClearanceFilename);
                    $barangay_clearance_file = $barangayClearanceFilename;
                }
                else{
                    $barangay_clearance_file = $request->barangay_clearance_filename;
                }

                if($request->hasFile('birthcertificate_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->birthcertificate_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->birthcertificate_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->birthcertificate_file);

                    $birthcertificateFile = $request->file('birthcertificate_file');
                    $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                    $birthcertificateFilename = $employee_number.'_Birth_Certificate_File_'.$timestamp.'.'.$birthcertificateExtension;
                    $birthcertificateFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$birthcertificateFilename);
                    $birthcertificate_file = $birthcertificateFilename;
                }
                else{
                    $birthcertificate_file = $request->birthcertificate_filename;
                }

                if($request->hasFile('diploma_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->diploma_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->diploma_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->diploma_file);

                    $diplomaFile = $request->file('diploma_file');
                    $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                    $diplomaFilename = $employee_number.'_Diploma_File'.$timestamp.'.'.$diplomaExtension;
                    $diplomaFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$diplomaFilename);
                    $diploma_file = $diplomaFilename;
                }
                else{
                    $diploma_file = $request->diploma_filename;
                }

                if($request->hasFile('medical_certificate_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->medical_certificate_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->medical_certificate_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->medical_certificate_file);

                    $medicalCertificateFile = $request->file('medical_certificate_file');
                    $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                    $medicalCertificateFilename = $employee_number.'_Medical_Certificate_File'.$timestamp.'.'.$medicalCertificateExtension;
                    $medicalCertificateFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$medicalCertificateFilename);
                    $medical_certificate_file = $medicalCertificateFilename;
                }
                else{
                    $medical_certificate_file = $request->medical_certificate_filename;
                }

                if($request->hasFile('nbi_clearance_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->nbi_clearance_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->nbi_clearance_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->nbi_clearance_file);

                    $nbiFile = $request->file('nbi_clearance_file');
                    $nbiExtension = $nbiFile->getClientOriginalExtension();
                    $nbiFilename = $employee_number.'_NBI_Clearance_File'.$timestamp.'.'.$nbiExtension;
                    $nbiFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$nbiFilename);
                    $nbi_clearance_file = $nbiFilename;
                }
                else{
                    $nbi_clearance_file = $request->nbi_clearance_filename;
                }

                if($request->hasFile('pag_ibig_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->pag_ibig_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->pag_ibig_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->pag_ibig_file);

                    $pagibigFile = $request->file('pag_ibig_file');
                    $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                    $pagibigFilename = $employee_number.'_Pag_ibig_File'.$timestamp.'.'.$pagibigExtension;
                    $pagibigFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$pagibigFilename);
                    $pag_ibig_file = $pagibigFilename;
                }
                else{
                    $pag_ibig_file = $request->pag_ibig_filename;
                }
                
                if($request->hasFile('philhealth_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->philhealth_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->philhealth_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->philhealth_file);

                    $philhealthFile = $request->file('philhealth_file');
                    $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                    $philhealthFilename = $employee_number.'_Philhealth_File_'.$timestamp.'.'.$philhealthExtension;
                    $philhealthFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$philhealthFilename);
                    $philhealth_file = $philhealthFilename;
                }
                else{
                    $philhealth_file = $request->philhealth_filename;
                }

                if($request->hasFile('police_clearance_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->police_clearance_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->police_clearance_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->police_clearance_file);

                    $policeClearanceFile = $request->file('police_clearance_file');
                    $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                    $policeClearanceFilename = $employee_number.'_Police_Clearance_File'.$timestamp.'.'.$policeClearanceExtension;
                    $policeClearanceFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$policeClearanceFilename);
                    $police_clearance_file = $policeClearanceFilename;
                }
                else{
                    $police_clearance_file = $request->police_clearance_filename;
                }

                if($request->hasFile('resume_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->resume_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->resume_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->resume_file);

                    $resumeFile = $request->file('resume_file');
                    $resumeExtension = $resumeFile->getClientOriginalExtension();
                    $resumeFilename = $employee_number.'_Resume_File'.$timestamp.'.'.$resumeExtension;
                    $resumeFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$resumeFilename);
                    $resume_file = $resumeFilename;
                }
                else{
                    $resume_file = $request->resume_filename;
                }

                if($request->hasFile('sss_file')){                
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->sss_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->sss_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->sss_file);

                    $sssFile = $request->file('sss_file');
                    $sssExtension = $sssFile->getClientOriginalExtension();
                    $sssFilename = $employee_number.'_SSS_File_'.$timestamp.'.'.$sssExtension;
                    $sssFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$sssFilename);
                    $sss_file = $sssFilename;
                }
                else{
                    $sss_file = $request->sss_filename;
                }

                if($request->hasFile('tor_file')){
                    if(file_exists('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->transcript_of_records_filename)){
                        unlink('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$request->transcript_of_records_filename);
                    }
                    Storage::delete('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name.'/'.$document_orig->transcript_of_records_file);
                        
                    $torFile = $request->file('tor_file');
                    $torExtension = $torFile->getClientOriginalExtension();
                    $torFilename = $employee_number.'_Transcript_of_Records_File'.$timestamp.'.'.$torExtension;
                    $torFile->storeAs('public/documents/'.$employee_number.'_'.$employee_details->last_name.'_'.$employee_details->first_name,$torFilename);
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
                    $diploma_update = "[DIPLOMA FILE HAVE BEEN CHANGED]";
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
                    $employee_logs = new LogsTable;
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
            sleep(2);
            return Redirect::to(url()->previous());
        }
    }

    public function children_data(Request $request){
        return DataTables::of(ChildrenTable::where('employee_id',$request->id)->get())->make(true);
    }
    public function history_data(Request $request){
        $employee_work_history_logs = History::selectRaw(
            'history_logs.id,
            history_logs.history,
            history_logs.created_at AS date,
            DATE_FORMAT(history_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
        ->where('employee_id',$request->id)
        ->orderBy('history_logs.id', 'DESC')
        ->get();
        return DataTables::of($employee_work_history_logs)->make(true);
    }

    public function college_data(Request $request){
        return DataTables::of(CollegeTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function training_data(Request $request){
        return DataTables::of(TrainingTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function vocational_data(Request $request){
        return DataTables::of(VocationalTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function job_history_data(Request $request){
        return DataTables::of(JobHistoryTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function job_history_summary_data(Request $request){
        return JobHistoryTable::where('employee_id',$request->id)->get();
    }

    public function memo_data(Request $request){
        return DataTables::of(MemoTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function evaluation_data(Request $request){
        return DataTables::of(EvaluationTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function contracts_data(Request $request){
        return DataTables::of(ContractTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function resignation_data(Request $request){
        return DataTables::of(ResignationTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function termination_data(Request $request){
        return DataTables::of(TerminationTable::where('employee_id',$request->id)->get())->make(true);
    }
    
    public function logs_data(Request $request){
        $logs = LogsTable::selectRaw(
                        'users.id AS user_id,
                        logs_tables.id,
                        users.name AS username,
                        users.user_level,
                        logs_tables.created_at AS date,
                        DATE_FORMAT(logs_tables.created_at, "%b. %d, %Y, %h:%i %p") AS datetime,
                        logs_tables.logs')
            ->where('employee_id',$request->id)
            ->join('users', 'users.id','user_id')
            ->orderBy('logs_tables.id', 'DESC')
            ->get();
        return DataTables::of($logs)->make(true);
    }  

    public function college_delete(Request $request){
        $college_id = explode(",", $request->id);
        foreach($college_id as $id){
            CollegeTable::where('id', $id)->delete();
        }
    }
    
    public function children_delete(Request $request){
        $children_id = explode(",", $request->id);
        foreach($children_id as $id){
            ChildrenTable::where('id', $id)->delete();
        }
    }

    public function training_delete(Request $request){
        $training_id = explode(",", $request->id);
        foreach($training_id as $id){
            TrainingTable::where('id', $id)->delete();
        }
    }

    public function vocational_delete(Request $request){
        $vocational_id = explode(",", $request->id);
        foreach($vocational_id as $id){
            VocationalTable::where('id', $id)->delete();
        }
    }

    public function job_history_delete(Request $request){
        $job_history_id = explode(",", $request->id);
        foreach($job_history_id as $id){
            JobHistoryTable::where('id', $id)->delete();
        }
    }

    public function memo_delete(Request $request){
        $memo_id = explode(",", $request->id);
        foreach($memo_id as $id){
            MemoTable::where('id', $id)->delete();
        }
    }

    public function evaluation_delete(Request $request){
        $evaluation_id = explode(",", $request->id);
        foreach($evaluation_id as $id){
            EvaluationTable::where('id', $id)->delete();
        }
    }

    public function contracts_delete(Request $request){
        $contracts_id = explode(",", $request->id);
        foreach($contracts_id as $id){
            ContractTable::where('id', $id)->delete();
        }
    }

    public function resignation_delete(Request $request){
        $resignation_id = explode(",", $request->id);
        foreach($resignation_id as $id){
            ResignationTable::where('id', $id)->delete();
        }
    }

    public function termination_delete(Request $request){
        $termination_id = explode(",", $request->id);
        foreach($termination_id as $id){
            TerminationTable::where('id', $id)->delete();
        }
    }

    public function duplicate_personal_info(Request $request){
        if(PersonalInformationTable::where('email_address',$request->email_address)->count() > 0){
            return 'duplicate_email_address';
        }
    }
    public function duplicate_work_info(Request $request){
        if(WorkInformationTable::where('employee_number',$request->employee_number)->count() > 0){
            return 'duplicate_employee_number';
        }
        else if(WorkInformationTable::where('company_email_address',$request->company_email_address)->count() > 0){
            return 'duplicate_company_email_address';
        }
    }

    public function upload_picture(Request $request)
    {
        return view('subpages.upload_picture')->render();
    }
}