<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use App\Models\Benefits;
use App\Models\Branch;
use App\Models\Children;
use App\Models\College;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Department;
use App\Models\Document;
use App\Models\EmployeeLogs;
use App\Models\Evaluation;
use App\Models\JobHistory;
use App\Models\MedicalHistory;
use App\Models\Memo;
use App\Models\PersonalInformationTable;
use App\Models\Position;
use App\Models\Resignation;
use App\Models\Shift;
use App\Models\Termination;
use App\Models\Training;
use App\Models\UserLogs;
use App\Models\Vocational;
use App\Models\WorkInformationTable;
use App\Models\WorkLogs;
use DataTables;
use Str;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function employees_data(Request $request){
        try{
            if($request->filter == 'regular'){
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
                        $query->where('employment_status','Regular');
                    })
                    ->orderBy('stat','DESC')
                    ->orderBy('last_name','ASC')
                    ->get();
            }
            else if($request->filter == 'probationary'){
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
                        $query->where('employment_status','Probationary');
                    })
                    ->orderBy('stat','DESC')
                    ->orderBy('last_name','ASC')
                    ->get();
            }
            else if($request->filter == 'agency'){
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
                        $query->where('employment_status','Agency');
                    })
                    ->orderBy('stat','DESC')
                    ->orderBy('last_name','ASC')
                    ->get();
            }
            else if($request->filter == 'male'){
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
                    ->where('personal_information_tables.gender','Male')
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
                                'date_hired')
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
                                'department' => function ($query){
                                    $query->select('deptcode','deptdesc');
                                }
                            ])
                            ->with([
                                'company' => function ($query){
                                    $query->select('entity','company_name');
                                }
                            ]);
                        }
                    ])
                    ->orderBy('stat','DESC')
                    ->orderBy('last_name','ASC')
                    ->get();
            }
            return DataTables::of($employees)->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table employees not found'], 500);
        }
    }

    public function employee_fetch(Request $request){
        try{
            $employees = PersonalInformationTable::select(
                'update_stat',
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
                'documents.transcript_of_records_file')
            ->where('personal_information_tables.id', $request->id)
            ->leftJoin('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
            ->leftJoin('medical_histories','medical_histories.employee_id','personal_information_tables.id')
            ->leftJoin('documents','documents.employee_id','personal_information_tables.id')
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
        catch(QueryException $e){
            return response()->json(['error' => 'Fetch Error'], 500);
        }
    }

    public function update_stat(Request $request){
        if($request->action == 'view'){
            PersonalInformationTable::where('id', $request->id)->update(['update_stat' => '1']);
        }
        else if($request->action == 'update' || $request->action == 'back'){
            PersonalInformationTable::where('id', $request->id)->update(['update_stat' => '0']);
        }
    }

    public function upload_picture(Request $request){
        return view('subpages.upload_picture')->render();
    }

    public function duplicateCheck(Request $request){
        $table_name  = $request->table_name;
        $column_name = $request->column_name;
        $value       = $request->value;

        $results = DB::table($table_name)
                    ->select($column_name)
                    ->where($column_name, $value)
                    ->count();
        return $results > 0 ? 'true' : 'false';
    }
}