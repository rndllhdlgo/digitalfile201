<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
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
        if(WorkLogs::count() == 0){
            return 'NULL';
        }
        $data_update = WorkLogs::latest('updated_at')->first()->updated_at;
        return $data_update;
    }

    public function employees_data(Request $request){
        if($request->filter == 'regular'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'empno',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
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
                ->where('work_information_tables.employment_status','Regular')
                ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
                ->leftjoin('positions','positions.id','work_information_tables.employee_position')
                ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
                ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'probationary'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'empno',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
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
                'empno',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
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
                'empno',
                'work_information_tables.employee_number',
                'first_name',
                'middle_name',
                'last_name',
                'positions.job_position_name AS employee_position',
                'entity03.entity03_desc AS employee_branch',
                'work_information_tables.employment_status',
                'companies.company_name AS employee_company',
                'entity',
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
                'empno',
                'first_name',
                'middle_name',
                'last_name',
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
                ->with([
                    'work_information' => function ($query){
                        $query->select('employee_id',
                            'employee_number',
                            'employee_position',
                            'employee_branch',
                            'employment_status',
                            'employee_company',
                            'employee_department',
                            'date_hired'
                        )
                        ->with([
                            'position' => function ($query){
                                $query->select('id','job_position_name');
                            }
                        ])
                        ->with([
                            'branch' => function ($query){
                                $query->select('entity03','entity03_desc');
                            }
                        ])
                        ->with([
                            'company' => function ($query){
                                $query->select('entity','company_name');
                            }
                        ])
                        ->with([
                            'department' => function ($query){
                                $query->select('deptcode','deptdesc');
                            }
                        ]);
                    }
                ])
                ->where('personal_information_tables.gender','Female')
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'active'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'empno',
                'first_name',
                'middle_name',
                'last_name',
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
                ->with([
                    'work_information' => function ($query){
                        $query->select('employee_id',
                            'employee_number',
                            'employee_position',
                            'employee_branch',
                            'employment_status',
                            'employee_company',
                            'employee_department',
                            'date_hired'
                        )
                        ->with([
                            'position' => function ($query){
                                $query->select('id','job_position_name');
                            }
                        ])
                        ->with([
                            'branch' => function ($query){
                                $query->select('entity03','entity03_desc');
                            }
                        ])
                        ->with([
                            'company' => function ($query){
                                $query->select('entity','company_name');
                            }
                        ])
                        ->with([
                            'department' => function ($query){
                                $query->select('deptcode','deptdesc');
                            }
                        ]);
                    }
                ])
                ->whereHas('work_information', function ($query) {
                    $query->whereNotIn('employment_status', ['RESIGNED', 'TERMINATED', 'RETIRED']);
                })
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else if($request->filter == 'inactive'){
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'empno',
                'first_name',
                'middle_name',
                'last_name',
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
                ->with([
                    'work_information' => function ($query){
                        $query->select('employee_id',
                            'employee_number',
                            'employee_position',
                            'employee_branch',
                            'employment_status',
                            'employee_company',
                            'employee_department',
                            'date_hired'
                        )
                        ->with([
                            'position' => function ($query){
                                $query->select('id','job_position_name');
                            }
                        ])
                        ->with([
                            'branch' => function ($query){
                                $query->select('entity03','entity03_desc');
                            }
                        ])
                        ->with([
                            'company' => function ($query){
                                $query->select('entity','company_name');
                            }
                        ])
                        ->with([
                            'department' => function ($query){
                                $query->select('deptcode','deptdesc');
                            }
                        ]);
                    }
                ])
                ->whereHas('work_information', function ($query) {
                    $query->whereIn('employment_status', ['RESIGNED', 'TERMINATED', 'RETIRED']);
                })
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        else{
            $employees = PersonalInformationTable::select(
                'personal_information_tables.id',
                'empno',
                'first_name',
                'middle_name',
                'last_name',
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
                ->with([
                    'work_information' => function ($query){
                        $query->select('employee_id',
                            'employee_number',
                            'employee_position',
                            'employee_branch',
                            'employment_status',
                            'employee_company',
                            'employee_department',
                            'date_hired'
                        )
                        ->with([
                            'position' => function ($query){
                                $query->select('id','job_position_name');
                            }
                        ])
                        ->with([
                            'branch' => function ($query){
                                $query->select('entity03','entity03_desc');
                            }
                        ])
                        ->with([
                            'company' => function ($query){
                                $query->select('entity','company_name');
                            }
                        ])
                        ->with([
                            'department' => function ($query){
                                $query->select('deptcode','deptdesc');
                            }
                        ]);
                    }
                ])
                ->orderBy('stat','DESC')
                ->orderBy('last_name','ASC')
                ->get();
        }
        return DataTables::of($employees)
        // ->addColumn('employee_department', function (PersonalInformationTable $employee){
        //     $dept = Department::select('deptdesc')->where('deptcode',$employee->employee_department)->first();
        //     if($dept){
        //         return $dept->deptdesc;
        //     }
        //     return 'NONE';
        // })
        // ->addColumn('employee_number', function (PersonalInformationTable $employee){
        //     if($employee->entity == 001){
        //         return 'ID'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 002){
        //         return 'PL'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 003){
        //         return 'AP'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 004){
        //         return 'MJ'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 005){
        //         return 'NU'.$employee->employee_number;
        //     }
        //     else{
        //         return $employee->empno;
        //     }
        // })
        ->make(true);

        // else{
        //     $employees = PersonalInformationTable::select(
        //         'personal_information_tables.id',
        //         'empno',
        //         'work_information_tables.employee_number',
        //         'first_name',
        //         'middle_name',
        //         'last_name',
        //         'positions.job_position_name AS employee_position',
        //         'entity03.entity03_desc AS employee_branch',
        //         'work_information_tables.employment_status',
        //         'companies.company_name AS employee_company',
        //         'entity',
        //         'work_information_tables.employee_department',
        //         'work_information_tables.date_hired',
        //         'email_address',
        //         'cellphone_number',
        //         'telephone_number',
        //         'gender',
        //         'civil_status',
        //         'birthday',
        //         'religion',
        //         'province',
        //         'city',
        //         'region',
        //         'blood_type',
        //         'stat'
        //         )
        //         ->leftjoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        //         ->leftjoin('positions','positions.id','work_information_tables.employee_position')
        //         ->leftjoin('entity03','entity03.entity03','work_information_tables.employee_branch')
        //         ->leftjoin('companies','companies.entity','work_information_tables.employee_company')
        //         ->orderBy('stat','DESC')
        //         ->orderBy('last_name','ASC')
        //         ->get();
        // }
        // return DataTables::of($employees)
        // ->addColumn('employee_department', function (PersonalInformationTable $employee){
        //     $dept = Department::select('deptdesc')->where('deptcode',$employee->employee_department)->first();
        //     if($dept){
        //         return $dept->deptdesc;
        //     }
        //     return 'NONE';
        // })
        // ->addColumn('employee_number', function (PersonalInformationTable $employee){
        //     if($employee->entity == 001){
        //         return 'ID'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 002){
        //         return 'PL'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 003){
        //         return 'AP'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 004){
        //         return 'MJ'.$employee->employee_number;
        //     }
        //     else if($employee->entity == 005){
        //         return 'NU'.$employee->employee_number;
        //     }
        //     else{
        //         return $employee->empno;
        //     }
        // })
        // ->make(true);
    }

    public function employee_fetch(Request $request){
        $employees = PersonalInformationTable::select(
                    'personal_information_tables.id',
                    'personal_information_tables.empno',
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
                    'benefits.employee_insurance')
        ->where('personal_information_tables.id',$request->id)
        ->leftJoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->leftJoin('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')
        ->leftJoin('medical_histories','medical_histories.employee_id','personal_information_tables.id')
        ->leftJoin('documents','documents.employee_id','personal_information_tables.id')
        ->leftJoin('benefits','benefits.employee_id','personal_information_tables.id')
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
            else{
                return $employee->empno;
            }
        })
        ->toJson();
    }

    public function upload_picture(Request $request){
        return view('subpages.upload_picture')->render();
    }

    public function checkDuplicate(Request $request){
        $columnName = $request->inputColumn;
        $inputValue = $request->inputValue;

        if(Schema::hasColumn('work_information_tables', $columnName)){
            if(WorkInformationTable::where($columnName, $inputValue)->count() > 0){
                return 'true';
            }
            else{
                return 'false';
            }
        }
        else if(Schema::hasColumn('personal_information_tables', $columnName)){
            if(PersonalInformationTable::where($columnName, $inputValue)->count() > 0){
                return 'true';
            }
            else{
                return 'false';
            }
        }
        else{
            return 'column_not_found';
        }
    }
}