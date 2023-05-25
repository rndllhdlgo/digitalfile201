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

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logs_reload(){
        if(EmployeeLogs::count() == 0){
            return 'NULL';
        }
        $data_update = employee_logs::latest('updated_at')->first()->updated_at;
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
        if($request->filter == 'regular'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->where('work_information_tables.employment_status','Regular')
                ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->join('positions','positions.id','work_information_tables.employee_position')
                ->join('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'probationary'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->where('work_information_tables.employment_status','Probationary')
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
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
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->where('work_information_tables.employment_status','Agency')
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'male'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->where('personal_information_tables.gender','Male')
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'female'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->where('personal_information_tables.gender','Female')
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'active'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->whereNotIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'inactive'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->whereIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
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
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
                // 'department.deptdesc AS employee_department',
                'work_information_tables.employee_department',
                'work_information_tables.date_hired',
                'email_address',
                'cellphone_number',
                'telephone_number',
                'gender',
                'civil_status',
                'birthday',
                'religion',
                'province',
                'city',
                'region',
                'blood_type',
                'stat'
                )
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                // ->leftjoin('department','department.deptcode','work_information_tables.employee_department')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
            }
        return DataTables::of($employees)
        ->addColumn('employee_department', function (PersonalInformationTable $employee){
            $dept = Department::select('deptdesc')->where('deptcode',$employee->employee_department)->first();
            if($dept){
                return $dept->deptdesc;
            }
            return 'NONE';
        })
        ->addColumn('employee_number', function (PersonalInformationTable $employee){
            if($employee->entity == 001){
                return 'ID'.$employee->employee_number;
            }
            else if($employee->entity == 002){
                return 'PL'.$employee->employee_number;
            }
            else if($employee->entity == 003){
                return 'AP'.$employee->employee_number;
            }
            else if($employee->entity == 004){
                return 'MJ'.$employee->employee_number;
            }
            else if($employee->entity == 005){
                return 'NU'.$employee->employee_number;
            }
        })
        ->make(true);
    }

    public function employeeFetch(Request $request){
        $employees = PersonalInformationTable::select(
                    'personal_information_tables.id',
                    'desc',
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
                    'blood_type',
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
                    'entity',
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
        ->leftJoin('shift','shift.shift','personal_information_tables.shift')
        ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
        ->get();
        return DataTables::of($employees)
        ->addColumn('employee_number', function (PersonalInformationTable $employee){
            if($employee->entity == 001){
                return 'ID'.$employee->employee_number;
            }
            else if($employee->entity == 002){
                return 'PL'.$employee->employee_number;
            }
            else if($employee->entity == 003){
                return 'AP'.$employee->employee_number;
            }
            else if($employee->entity == 004){
                return 'MJ'.$employee->employee_number;
            }
            else if($employee->entity == 005){
                return 'NU'.$employee->employee_number;
            }
        })
        ->toJson();
    }

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
        $employee = new ChildrenTable;
        $employee->employee_id = $request->employee_id;
        $employee->child_name = strtoupper($request->child_name);
        $employee->child_birthday = $request->child_birthday;
        $employee->child_gender = $request->child_gender;
        $employee->save();

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

    public function saveCollege(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new CollegeTable;
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
            $employee = new TrainingTable;
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
            $employee = new VocationalTable;
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
        else{
            $emp_id = PersonalInformationTablePending::where('empno',auth()->user()->emp_number)->first()->id;
            $employee = new VocationalTablePending;
            $employee->employee_id = $emp_id;
            $employee->empno = $request->empno;
            $employee->vocational_name = $request->vocational_name;
            $employee->vocational_course = $request->vocational_course;
            $employee->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
            $employee->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
            $employee->save();

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER HAS REQUESTED UPDATES FOR THE VOCATIONAL ATTAINMENT INFORMATION DETAILS OF THIS EMPLOYEE ($employee_details->first_name $employee_details->middle_name $employee_details->last_name with Employee No.$employee_number)";
            $userlogs->save();
        }
    }

    public function saveJobHistory(Request $request){
        $employee_details = PersonalInformationTable::where('id', $request->employee_id)->first();
        $employee_number = WorkInformationTable::where('employee_id', $request->employee_id)->first()->employee_number;
        if(auth()->user()->user_level != 'EMPLOYEE'){
            $employee = new JobHistoryTable;
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

    public function upload_picture(Request $request){
        return view('subpages.upload_picture')->render();
    }
}