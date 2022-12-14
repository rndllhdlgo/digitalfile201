<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\UserLogs;
use App\Models\ChildrenTable;
use App\Models\CollegeTable;
use App\Models\TrainingTable;
use App\Models\VocationalTable;
use App\Models\JobHistoryTable;
use App\Models\MemoTable;
use App\Models\EvaluationTable;
use App\Models\ContractTable;
use App\Models\ResignationTable;
use App\Models\TerminationTable;
use App\Models\PersonalInformationTable;
use App\Models\WorkInformationTable;
use App\Models\CompensationBenefits;
use App\Models\EducationalAttainment;
use App\Models\MedicalHistory;
use App\Models\Document;
use App\Models\LogsInfo;
use App\Models\LogsTable;
use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//For Authentication
    }
    
    // public function listOfEmployees(){
    //     $employees = PersonalInformationTable::all();
    //     return DataTables::of($employees)->make(true);
    // }

    public function listOfEmployees(Request $request){
        $employees = PersonalInformationTable::select(
            'personal_information_tables.id',
            'work_information_tables.employee_number',
            'first_name',
            'middle_name', 
            'last_name', 
            'positions.job_position_name AS employee_position', 
            'branches.branch_name AS employee_branch', 
            'work_information_tables.employee_status')
        ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->join('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')
        // ->join('compensation_benefits','compensation_benefits.employee_id','personal_information_tables.id')
        ->join('positions','positions.id','work_information_tables.employee_position')
        ->join('branches','branches.id','work_information_tables.employee_branch')
        ->get();
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
            'street',
            'region',
            'province',
            'city',
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
            'work_information_tables.employee_company',
            'work_information_tables.employee_department',
            'work_information_tables.employee_branch',
            'work_information_tables.employee_status',
            'work_information_tables.employment_origin',
            'work_information_tables.employee_shift',
            'work_information_tables.employee_supervisor',
            'work_information_tables.employee_position',
            'work_information_tables.date_hired',
            'work_information_tables.company_email_address',
            'work_information_tables.company_contact_number',
            'work_information_tables.sss_number',
            'work_information_tables.pag_ibig_number',
            'work_information_tables.philhealth_number',
            'work_information_tables.tin_number',
            'work_information_tables.account_number',
            'compensation_benefits.employee_salary',
            'compensation_benefits.employee_incentives',
            'compensation_benefits.employee_overtime_pay',
            'compensation_benefits.employee_bonus',
            'compensation_benefits.employee_insurance',
            'educational_attainments.secondary_school_name',
            'educational_attainments.secondary_school_address',
            'educational_attainments.secondary_school_inclusive_years',
            'educational_attainments.primary_school_name',
            'educational_attainments.primary_school_address',
            'educational_attainments.primary_school_inclusive_years',
            'medical_histories.past_medical_condition',
            'medical_histories.allergies',
            'medical_histories.medication',
            'medical_histories.psychological_history'
            )
        ->where('personal_information_tables.id',$request->id)
        ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->join('compensation_benefits','compensation_benefits.employee_id','personal_information_tables.id')
        ->join('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')        
        ->join('medical_histories','medical_histories.employee_id','personal_information_tables.id')        
        ->get();

        return DataTables::of($employees)->toJson();
    }
    // public function childrenDataTable(Request $request){
    //     $children = Children::where('employee_id',$request->employee_id)->get();
    //     return DataTables::of($children)->make(true);
    // }

    // public function collegeDataTable(Request $request){
    //     return DataTables::of(CollegeTable::where('employee_id',$request->employee_id)->get())->make(true);
    // }

    public function savePersonalInformation(Request $request){
        $employee_personal_information = new PersonalInformationTable;

        $employee_personal_information->employee_image = $request->employee_image == 'N\A' ? '' : $request->employee_image;
        $employee_personal_information->first_name =  ucwords($request->first_name);
        $employee_personal_information->last_name = ucwords($request->last_name); 
        $employee_personal_information->middle_name = ucwords($request->middle_name);
        
        $employee_personal_information->suffix = ucwords($request->suffix);
        $employee_personal_information->nickname = ucwords($request->nickname);
        $employee_personal_information->birthday = $request->birthday;
        $employee_personal_information->gender = $request->gender;
        $employee_personal_information->civil_status = $request->civil_status;
        $employee_personal_information->street = ucwords($request->street);
        $employee_personal_information->region = $request->region;
        $employee_personal_information->province = $request->province;
        $employee_personal_information->city = $request->city;
        $employee_personal_information->height = $request->height;
        $employee_personal_information->weight = $request->weight;
        $employee_personal_information->religion = ucwords($request->religion);
        $employee_personal_information->email_address = strtolower($request->email_address);
        $employee_personal_information->telephone_number = $request->telephone_number;
        $employee_personal_information->cellphone_number = $request->cellphone_number;
        $employee_personal_information->spouse_name = ucwords($request->spouse_name);
        $employee_personal_information->spouse_contact_number = $request->spouse_contact_number;
        $employee_personal_information->spouse_profession = ucwords($request->spouse_profession);
        $employee_personal_information->father_name = ucwords($request->father_name);
        $employee_personal_information->father_contact_number = $request->father_contact_number;
        $employee_personal_information->father_profession = ucwords($request->father_profession);
        $employee_personal_information->mother_name = ucwords($request->mother_name);
        $employee_personal_information->mother_contact_number = $request->mother_contact_number;
        $employee_personal_information->mother_profession = ucwords($request->mother_profession);
        $employee_personal_information->emergency_contact_name = ucwords($request->emergency_contact_name);
        $employee_personal_information->emergency_contact_relationship = ucwords($request->emergency_contact_relationship);
        $employee_personal_information->emergency_contact_number = $request->emergency_contact_number;
        $sql = $employee_personal_information->save();
        
        
        if($sql){
            // $userlogs = new UserLogs;
            // $userlogs->user_id = auth()->user()->id;
            // $userlogs->activity = "ADDED USER: User successfully added new employee with Employee Number: [$employee_number_logs]. Employee Name: [$employee_personal_information->first_name $employee_personal_information->middle_name $employee_personal_information->last_name]."; //Display logs in home page
            // $userlogs->save();

            $result = 'true';
            $id = $employee_personal_information->id;
        }
        else{
            $result = 'false';
            $id = '';
        }

        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function updatePersonalInformation(Request $request){
        if($request->filename_delete){
            unlink(public_path('storage/employee_images/'.$request->filename_delete));
        }

        $employee = PersonalInformationTable::find($request->get('id'));

        $employee->employee_image = $request->employee_image == 'N\A' ? '' : $request->employee_image;
        $employee->first_name =  ucwords($request->first_name);
        $employee->last_name = ucwords($request->last_name); 
        $employee->middle_name = ucwords($request->middle_name);
        
        $employee->suffix = ucwords($request->suffix);
        $employee->nickname = ucwords($request->nickname);
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->civil_status = $request->civil_status;
        $employee->street = ucwords($request->street);
        $employee->region = $request->region;
        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->height = $request->height;
        $employee->weight = $request->weight;
        $employee->religion = ucwords($request->religion);
        $employee->email_address = strtolower($request->email_address);
        $employee->telephone_number = $request->telephone_number;
        $employee->cellphone_number = $request->cellphone_number;
        $employee->spouse_name = ucwords($request->spouse_name);
        $employee->spouse_contact_number = $request->spouse_contact_number;
        $employee->spouse_profession = ucwords($request->spouse_profession);
        $employee->father_name = ucwords($request->father_name);
        $employee->father_contact_number = $request->father_contact_number;
        $employee->father_profession = ucwords($request->father_profession);
        $employee->mother_name = ucwords($request->mother_name);
        $employee->mother_contact_number = $request->mother_contact_number;
        $employee->mother_profession = ucwords($request->mother_profession);
        $employee->emergency_contact_name = ucwords($request->emergency_contact_name);
        $employee->emergency_contact_relationship = ucwords($request->emergency_contact_relationship);
        $employee->emergency_contact_number = $request->emergency_contact_number;
        $sql = $employee->save();

        if($sql){
            // $userlogs = new UserLogs;
            // $userlogs->user_id = auth()->user()->id;
            // $userlogs->activity = "ADDED USER: User successfully added new employee with Employee Number: [$employee_number_logs]. Employee Name: [$employee_personal_information->first_name $employee_personal_information->middle_name $employee_personal_information->last_name]."; //Display logs in home page
            // $userlogs->save();

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

    public function updateWorkInformation(Request $request){
        $employee = WorkInformationTable::find($request->get('id'));
        $employee->employee_id = $request->employee_id;
        $employee->employee_number = $request->employee_number;
        $employee->employee_company = $request->employee_company;
        $employee->employee_department = $request->employee_department;
        $employee->employee_branch = $request->employee_branch;
        $employee->employee_status = $request->employee_status;
        $employee->employment_origin = $request->employment_origin;
        $employee->employee_shift = $request->employee_shift;
        $employee->employee_position = $request->employee_position;
        $employee->employee_supervisor = $request->employee_supervisor;
        $employee->date_hired = $request->date_hired;
        $employee->company_email_address = $request->company_email_address;
        $employee->company_contact_number = $request->company_contact_number;
        $employee->sss_number = $request->sss_number;
        $employee->pag_ibig_number = $request->pag_ibig_number;
        $employee->philhealth_number = $request->philhealth_number;
        $employee->tin_number = $request->tin_number;
        $employee->account_number = $request->account_number;
        $employee->save();
    }

    public function updateCompensationBenefits(Request $request){
        $employee = CompensationBenefits::find($request->get('id'));
        $employee->employee_id = $request->employee_id;
        $employee->employee_salary = $request->employee_salary;
        $employee->employee_incentives = $request->employee_incentives;
        $employee->employee_overtime_pay = $request->employee_overtime_pay;
        $employee->employee_bonus = $request->employee_bonus;
        $employee->employee_insurance = $request->employee_insurance;
        $employee->save();
    }

    public function updateEducationalAttainment(Request $request){
        $employee =  EducationalAttainment::find($request->get('id'));
        $employee->employee_id = $request->employee_id;
        $employee->secondary_school_name = $request->secondary_school_name;
        $employee->secondary_school_address = $request->secondary_school_address;
        $employee->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employee->primary_school_name = $request->primary_school_name;
        $employee->primary_school_address = $request->primary_school_address;
        $employee->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $employee->save();
    }

    public function updateMedicalHistory(Request $request){
        $employee = MedicalHistory::find($request->get('id'));
        $employee->employee_id = $request->employee_id;
        $employee->past_medical_condition = ucwords($request->past_medical_condition);
        $employee->allergies = ucwords($request->allergies);
        $employee->medication = ucwords($request->medication);
        $employee->psychological_history = ucwords($request->psychological_history);
        $employee->save();
    }
    
    public function saveChildren(Request $request){
        $children = new ChildrenTable;
        $children->employee_id = $request->employee_id;
        $children->child_name = ucwords($request->child_name);
        $children->child_birthday = $request->child_birthday;
        $children->child_gender = $request->child_gender;
        $children->save();
    }

    public function insertImage(Request $request){

        $employeeImageFile = $request->file('employee_image');
        $employeeImageExtension = $employeeImageFile->getClientOriginalExtension();
        $employeeImageFileName = time().rand(1,100).'_Employee_Image.'.$employeeImageExtension;
        $employeeImageFile->storeAs('public/employee_images',$employeeImageFileName);
        
        return $employeeImageFileName;
    }

    public function saveWorkInformation(Request $request){
        $employee_work_information = new WorkInformationTable;
        $employee_work_information->employee_id = $request->employee_id;
        $employee_work_information->employee_number = $request->employee_number;
        $employee_work_information->employee_company = $request->employee_company;
        $employee_work_information->employee_department = $request->employee_department;
        $employee_work_information->employee_branch = $request->employee_branch;
        $employee_work_information->employee_status = $request->employee_status;
        $employee_work_information->employment_origin = $request->employment_origin;
        $employee_work_information->employee_shift = $request->employee_shift;
        $employee_work_information->employee_position = $request->employee_position;
        $employee_work_information->employee_supervisor = $request->employee_supervisor;
        $employee_work_information->date_hired = $request->date_hired;
        $employee_work_information->company_email_address = $request->company_email_address;
        $employee_work_information->company_contact_number = $request->company_contact_number;
        $employee_work_information->sss_number = $request->sss_number;
        $employee_work_information->pag_ibig_number = $request->pag_ibig_number;
        $employee_work_information->philhealth_number = $request->philhealth_number;
        $employee_work_information->tin_number = $request->tin_number;
        $employee_work_information->account_number = $request->account_number;
        $employee_work_information->save();
    }

    public function saveCompensationBenefits(Request $request){
        $employee_compensationBenefits = new CompensationBenefits;
        $employee_compensationBenefits->employee_id = $request->employee_id;
        $employee_compensationBenefits->employee_salary = $request->employee_salary;
        $employee_compensationBenefits->employee_incentives = $request->employee_incentives;
        $employee_compensationBenefits->employee_overtime_pay = $request->employee_overtime_pay;
        $employee_compensationBenefits->employee_bonus = $request->employee_bonus;
        $employee_compensationBenefits->employee_insurance = $request->employee_insurance;
        $employee_compensationBenefits->save();
    }

    public function saveEducationalAttainment(Request $request){
        $employee_educational_attainment = new EducationalAttainment;
        $employee_educational_attainment->employee_id = $request->employee_id;
        $employee_educational_attainment->secondary_school_name = $request->secondary_school_name;
        $employee_educational_attainment->secondary_school_address = $request->secondary_school_address;
        $employee_educational_attainment->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
        $employee_educational_attainment->primary_school_name = $request->primary_school_name;
        $employee_educational_attainment->primary_school_address = $request->primary_school_address;
        $employee_educational_attainment->primary_school_inclusive_years = $request->primary_school_inclusive_years;
        $employee_educational_attainment->save();
    }

    public function saveCollege(Request $request){
        $employee_college = new CollegeTable;
        $employee_college->employee_id = $request->employee_id;
        $employee_college->college_name = ucfirst($request->college_name);
        $employee_college->college_degree = ucfirst($request->college_degree);
        $employee_college->college_inclusive_years = $request->college_inclusive_years;
        $employee_college->save();  
    }

    public function saveTraining(Request $request){
        $employee_training = new TrainingTable;
        $employee_training->employee_id = $request->employee_id;
        $employee_training->training_name = ucfirst($request->training_name);
        $employee_training->training_title = ucfirst($request->training_title);
        $employee_training->training_inclusive_years = $request->training_inclusive_years;
        $employee_training->save();
    }

    public function saveVocational(Request $request){
        $employee_vocational = new VocationalTable;
        $employee_vocational->employee_id = $request->employee_id;
        $employee_vocational->vocational_name = ucfirst($request->vocational_name);
        $employee_vocational->vocational_course = ucfirst($request->vocational_course);
        $employee_vocational->vocational_inclusive_years = $request->vocational_inclusive_years;
        $employee_vocational->save();
    }

    public function saveJobHistory(Request $request){
        $employee_job = new JobHistoryTable;
        $employee_job->employee_id = $request->employee_id;
        $employee_job->job_name = ucfirst($request->job_name);
        $employee_job->job_position = ucfirst($request->job_position);
        $employee_job->job_address = ucwords($request->job_address);
        $employee_job->job_contact_details = $request->job_contact_details;
        $employee_job->job_inclusive_years = $request->job_inclusive_years;
        $employee_job->save();
    }

    public function saveMedicalHistory(Request $request){
        // if($request->past_medical_condition && $request->allergies && $request->medication && $request->psychological_history){
            $employee_medicalHistory = new MedicalHistory;
            $employee_medicalHistory->employee_id = $request->employee_id;
            $employee_medicalHistory->past_medical_condition = ucwords($request->past_medical_condition);
            $employee_medicalHistory->allergies = ucwords($request->allergies);
            $employee_medicalHistory->medication = ucwords($request->medication);
            $employee_medicalHistory->psychological_history = ucwords($request->psychological_history);
            $employee_medicalHistory->save();
        // } 
    }

    public function checkDuplicate(Request $request){
        // return WorkInformationTable::where('employee_number',$request->employee_number)->count() > 0 ? 'true': 'false';
        if(WorkInformationTable::where('employee_number',$request->employee_number)->count() > 0){
            return 'duplicate_employee_number';
        }
        else if(PersonalInformationTable::where('email_address',$request->email_address)->count() > 0){
            return 'duplicate_email_address';
        }
        else if(PersonalInformationTable::where('telephone_number',$request->telephone_number)->count() > 0){
            return 'duplicate_telephone_number';
        }
        else if(PersonalInformationTable::where('cellphone_number',$request->cellphone_number)->count() > 0){
            return 'duplicate_cellphone_number';
        }
        else if(PersonalInformationTable::where('father_contact_number',$request->father_contact_number)->count() > 0){
            return 'duplicate_father_contact_number';
        }
        else if(PersonalInformationTable::where('mother_contact_number',$request->mother_contact_number)->count() > 0){
            return 'duplicate_mother_contact_number';
        }
        else if(PersonalInformationTable::where('spouse_contact_number',$request->spouse_contact_number)->count() > 0){
            return 'duplicate_spouse_contact_number';
        }
        else if(PersonalInformationTable::where('emergency_contact_number',$request->spouse_contact_number)->count() > 0){
            return 'duplicate_contact_number';
        }
        else if(WorkInformationTable::where('company_email_address',$request->company_email_address)->count() > 0){
            return 'duplicate_company_email_address';
        }
        else if(WorkInformationTable::where('company_contact_number',$request->company_contact_number)->count() > 0){
            return 'duplicate_company_contact_number';
        }
    }

    // public function saveDocuments(Request $request)
    // {   
    //     if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
    //         foreach($request->file('memo_file') as $key => $value){
    //             $memoFileName = time().rand(1,100).'_Memo_File.'.$request->memo_file[$key]->extension();
    //             $request->memo_file[$key]->storeAs('public/evaluation_files',$memoFileName);
                
    //             $memo = new MemoTable;
    //             $memo->employee_id = $request->employee_id;
    //             $memo->memo_subject = $request->memo_subject[$key];
    //             $memo->memo_date = $request->memo_date[$key];
    //             $memo->memo_penalty = $request->memo_penalty[$key];
    //             $memo->memo_file = $memoFileName;
    //             $memo->save();
    //         }
    //     }

    //     if($request->evaluation_reason && $request->evaluation_date && $request->evaluation_evaluated_by && $request->hasFile('evaluation_file')){
    //         foreach($request->file('evaluation_file') as $key => $value){
    //             $evaluationFileName = time().rand(1,100).'_Evaluation_File.'.$request->evaluation_file[$key]->extension();
    //             $request->evaluation_file[$key]->storeAs('public/evaluation_files',$evaluationFileName);
                
    //             $evaluation = new EvaluationTable;
    //             $evaluation->employee_id = $request->employee_id;
    //             $evaluation->evaluation_reason = $request->evaluation_reason[$key];
    //             $evaluation->evaluation_date = $request->evaluation_date[$key];
    //             $evaluation->evaluation_evaluated_by = $request->evaluation_evaluated_by[$key];
    //             $evaluation->evaluation_file = $evaluationFileName;
    //             $evaluation->save();
    //         }
    //     }

    //     if($request->contracts_type && $request->contracts_date && $request->hasFile('contracts_file')){
    //         foreach($request->file('contracts_file') as $key => $value){
    //             $contractsFileName = time().rand(1,100).'_Contracts_File.'.$request->contracts_file[$key]->extension();
    //             $request->contracts_file[$key]->storeAs('public/evaluation_files',$contractsFileName);
                
    //             $contracts = new ContractTable;
    //             $contracts->employee_id = $request->employee_id;
    //             $contracts->contracts_type = $request->contracts_type[$key];
    //             $contracts->contracts_date = $request->contracts_date[$key];
    //             $contracts->contracts_file = $contractsFileName;
    //             $contracts->save();
    //         }
    //     }

    //     if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
    //         foreach($request->file('resignation_file') as $key => $value){
    //             $resignationFileName = time().rand(1,100).'_Resignation_File.'.$request->resignation_file[$key]->extension();
    //             $request->resignation_file[$key]->storeAs('public/evaluation_files',$resignationFileName);
                
    //             $resignation = new ResignationTable;
    //             $resignation->employee_id = $request->employee_id;
    //             $resignation->resignation_reason = $request->resignation_reason[$key];
    //             $resignation->resignation_date = $request->resignation_date[$key];
    //             $resignation->resignation_file = $resignationFileName;
    //             $resignation->save();
    //         }
    //     }

    //     if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
    //         foreach($request->file('termination_file') as $key => $value){
    //             $terminationFileName = time().rand(1,100).'_Termination_File.'.$request->termination_file[$key]->extension();
    //             $request->termination_file[$key]->storeAs('public/evaluation_files',$terminationFileName);

    //             $termination = new TerminationTable;
    //             $termination->employee_id = $request->employee_id;
    //             $termination->termination_reason = $request->termination_reason[$key];
    //             $termination->termination_date = $request->termination_date[$key];
    //             $termination->termination_file = $terminationFileName;
    //             $termination->save();
    //         }
    //     }
    
    //         $document = new Document;
    //         $document->employee_id = $request->employee_id;
    //         $birthcertificateFile = $request->file('birthcertificate_file');
    //         $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
    //         $birthcertificateFilename = time().rand(1,100).'_Birth_Certificate.'.$birthcertificateExtension;
    //         $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
    //         $document->birthcertificate = $birthcertificateFilename;

    //         $nbiFile = $request->file('nbi_file');
    //         $nbiExtension = $nbiFile->getClientOriginalExtension();
    //         $nbiFilename = time().rand(1,100).'_NBI_Clearance.'.$nbiExtension;
    //         $nbiFile->storeAs('public/documents_files',$nbiFilename);
    //         $document->nbi_clearance = $nbiFilename;

    //         $barangayClearanceFile = $request->file('barangay_clearance_file');
    //         $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
    //         $barangayClearanceFilename = time().rand(1,100).'_Barangay_Clearance.'.$barangayClearanceExtension;
    //         $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
    //         $document->barangay_clearance = $barangayClearanceFilename;

    //         $policeClearanceFile = $request->file('police_clearance_file');
    //         $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
    //         $policeClearanceFilename = time().rand(1,100).'_Police_Clearance.'.$policeClearanceExtension;
    //         $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
    //         $document->police_clearance = $policeClearanceFilename;

    //         $sssFile = $request->file('sss_file');
    //         $sssExtension = $sssFile->getClientOriginalExtension();
    //         $sssFilename = time().rand(1,100).'_SSS_Form.'.$sssExtension;
    //         $sssFile->storeAs('public/documents_files',$sssFilename);
    //         $document->sss_form = $sssFilename;

    //         $philhealthFile = $request->file('philhealth_file');
    //         $philhealthExtension = $philhealthFile->getClientOriginalExtension();
    //         $philhealthFilename = time().rand(1,100).'_Philhealth_Form.'.$philhealthExtension;
    //         $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
    //         $document->philhealth_form = $philhealthFilename;

    //         $pagibigFile = $request->file('pag_ibig_file');
    //         $pagibigExtension = $pagibigFile->getClientOriginalExtension();
    //         $pagibigFilename = time().rand(1,100).'_Pagibig_Form.'.$pagibigExtension;
    //         $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
    //         $document->pag_ibig_form = $pagibigFilename;

    //         $medicalCertificateFile = $request->file('medical_certificate_file');
    //         $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
    //         $medicalCertificateFilename = time().rand(1,100).'_Medical_Certificate.'.$medicalCertificateExtension;
    //         $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
    //         $document->medical_certificate = $medicalCertificateFilename;
            
    //         $resumeFile = $request->file('resume_file');
    //         $resumeExtension = $resumeFile->getClientOriginalExtension();
    //         $resumeFilename = time().rand(1,100).'_Resume.'.$resumeExtension;
    //         $resumeFile->storeAs('public/documents_files',$resumeFilename);
    //         $document->resume = $resumeFilename;
            
    //     if($request->hasFile('tor_file')){
    //         $torFile = $request->file('tor_file');
    //         $torExtension = $torFile->getClientOriginalExtension();
    //         $torFilename = time().rand(1,100).'_Transcript_of_Records.'.$torExtension;
    //         $torFile->storeAs('public/documents_files',$torFilename);
    //         $document->transcript_of_records = $torFilename;
    //     }

    //     if($request->hasFile('diploma_file')){
    //         $diplomaFile = $request->file('diploma_file');
    //         $diplomaExtension = $diplomaFile->getClientOriginalExtension();
    //         $diplomaFilename = time().rand(1,100).'_Diploma.'.$diplomaExtension;
    //         $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
    //         $document->diploma = $diplomaFilename;
    //     }
    //         $document->save();
    //         return Redirect::to(url()->previous());
    //         // return view('pages.employees');
    // }

    public function viewLogs(Request $request){ //Blade
        return view('try.logs');
    }

    public function saveLogs(Request $request){
        $logs = new LogsInfo; //logs_sample_tables
        $logs->fName = $request->fName;
        $logs->mName = $request->mName;
        $logs->lName = $request->lName;
        $save = $logs->save();
        if($save){
            $result = 'true';
            $id = $logs->id;
        }
        else{
            $result = 'false';
            $id = '';
        }

        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function saveSample(Request $request){
        $logs = new LogsTable;
        $logs->employee_id = $request->employee_id;
        $logs->sample1 = $request->sample1;
        $logs->sample2 = $request->sample2;
        $logs->sample3 = $request->sample3;
        $logs->save();
    }
}