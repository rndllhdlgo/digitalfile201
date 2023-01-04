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
            'work_information_tables.employment_status')
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
            'house',
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
            'work_information_tables.employee_company',
            'work_information_tables.employee_department',
            'work_information_tables.employee_branch',
            'work_information_tables.employment_status',
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
            'documents.birthcertificate_file',
            'documents.barangay_clearance_file',
            'documents.diploma_file',
            'documents.medical_certificate_file',
            'documents.nbi_clearance_file',
            'documents.pag_ibig_file',
            'documents.philhealth_file',
            'documents.police_clearance_file',
            'documents.resume_file',
            'documents.sss_file',
            'documents.transcript_of_records_file'
            // 'memo_tables.memo_subject'
            )
        ->where('personal_information_tables.id',$request->id)
        ->join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        ->join('compensation_benefits','compensation_benefits.employee_id','personal_information_tables.id')
        ->join('educational_attainments','educational_attainments.employee_id','personal_information_tables.id')        
        ->join('medical_histories','medical_histories.employee_id','personal_information_tables.id')     
        ->join('documents','documents.employee_id','personal_information_tables.id') 
        // ->join('memo_tables','memo_tables.employee_id','personal_information_tables.id') 
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
        $employee = new PersonalInformationTable;

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
        $employee->house = $request->house;
        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->region = $request->region;
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
        $employee->house = $request->house;
        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->region = $request->region;
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
        $employee->employment_status = $request->employment_status;
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
        $employee->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
        $employee->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
        $employee->primary_school_name = $request->primary_school_name;
        $employee->primary_school_address = $request->primary_school_address;
        $employee->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
        $employee->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
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
        $employee_work_information->employment_status = $request->employment_status;
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
        $employee_educational_attainment->secondary_school_inclusive_years_from = $request->secondary_school_inclusive_years_from;
        $employee_educational_attainment->secondary_school_inclusive_years_to = $request->secondary_school_inclusive_years_to;
        $employee_educational_attainment->primary_school_name = $request->primary_school_name;
        $employee_educational_attainment->primary_school_address = $request->primary_school_address;
        $employee_educational_attainment->primary_school_inclusive_years_from = $request->primary_school_inclusive_years_from;
        $employee_educational_attainment->primary_school_inclusive_years_to = $request->primary_school_inclusive_years_to;
        $employee_educational_attainment->save();
    }

    public function saveCollege(Request $request){
        $employee_college = new CollegeTable;
        $employee_college->employee_id = $request->employee_id;
        $employee_college->college_name = ucwords($request->college_name);
        $employee_college->college_degree = ucfirst($request->college_degree);
        $employee_college->college_inclusive_years_from = $request->college_inclusive_years_from;
        $employee_college->college_inclusive_years_to = $request->college_inclusive_years_to;
        $employee_college->save();  
    }

    public function saveTraining(Request $request){
        $employee_training = new TrainingTable;
        $employee_training->employee_id = $request->employee_id;
        $employee_training->training_name = ucfirst($request->training_name);
        $employee_training->training_title = ucfirst($request->training_title);
        $employee_training->training_inclusive_years_from = $request->training_inclusive_years_from;
        $employee_training->training_inclusive_years_to = $request->training_inclusive_years_to;
        $employee_training->save();
    }

    public function saveVocational(Request $request){
        $employee_vocational = new VocationalTable;
        $employee_vocational->employee_id = $request->employee_id;
        $employee_vocational->vocational_name = ucfirst($request->vocational_name);
        $employee_vocational->vocational_course = ucfirst($request->vocational_course);
        $employee_vocational->vocational_inclusive_years_from = $request->vocational_inclusive_years_from;
        $employee_vocational->vocational_inclusive_years_to = $request->vocational_inclusive_years_to;
        $employee_vocational->save();
    }

    public function saveJobHistory(Request $request){
        $employee_job = new JobHistoryTable;
        $employee_job->employee_id = $request->employee_id;
        $employee_job->job_company_name = ucfirst($request->job_company_name);
        $employee_job->job_description = ucfirst($request->job_description);
        $employee_job->job_position = ucfirst($request->job_position);
        $employee_job->job_contact_number = $request->job_contact_number;
        $employee_job->job_inclusive_years_from = $request->job_inclusive_years_from;
        $employee_job->job_inclusive_years_to = $request->job_inclusive_years_to;
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

    public function saveDocuments(Request $request)
    {   
        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $memoFileName = time().rand(1,100).'_Memo_File.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/evaluation_files',$memoFileName);
                
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
                $evaluationFileName = time().rand(1,100).'_Evaluation_File.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation_files',$evaluationFileName);
                
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
                $contractsFileName = time().rand(1,100).'_Contracts_File.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/evaluation_files',$contractsFileName);
                
                $contracts = new ContractTable;
                $contracts->employee_id = $request->employee_id;
                $contracts->contracts_type = $request->contracts_type[$key];
                $contracts->contracts_date = $request->contracts_date[$key];
                $contracts->contracts_file = $contractsFileName;
                $contracts->save();
            }
        }

        if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
            foreach($request->file('resignation_file') as $key => $value){
                $resignationFileName = time().rand(1,100).'_Resignation_File.'.$request->resignation_file[$key]->extension();
                $request->resignation_file[$key]->storeAs('public/evaluation_files',$resignationFileName);
                
                $resignation = new ResignationTable;
                $resignation->employee_id = $request->employee_id;
                $resignation->resignation_reason = $request->resignation_reason[$key];
                $resignation->resignation_date = $request->resignation_date[$key];
                $resignation->resignation_file = $resignationFileName;
                $resignation->save();
            }
        }

        if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
            foreach($request->file('termination_file') as $key => $value){
                $terminationFileName = time().rand(1,100).'_Termination_File.'.$request->termination_file[$key]->extension();
                $request->termination_file[$key]->storeAs('public/evaluation_files',$terminationFileName);

                $termination = new TerminationTable;
                $termination->employee_id = $request->employee_id;
                $termination->termination_reason = $request->termination_reason[$key];
                $termination->termination_date = $request->termination_date[$key];
                $termination->termination_file = $terminationFileName;
                $termination->save();
            }
        }
    
            $document = new Document;
            $document->employee_id = $request->employee_id;
            $barangayClearanceFile = $request->file('barangay_clearance_file');
            $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
            $barangayClearanceFilename = time().rand(1,100).'_Barangay_Clearance_File.'.$barangayClearanceExtension;
            $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
            $document->barangay_clearance_file = $barangayClearanceFilename;

            $birthcertificateFile = $request->file('birthcertificate_file');
            $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
            $birthcertificateFilename = time().rand(1,100).'_Birth_Certificate_File.'.$birthcertificateExtension;
            $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
            $document->birthcertificate_file = $birthcertificateFilename;

        if($request->hasFile('diploma_file')){
            $diplomaFile = $request->file('diploma_file');
            $diplomaExtension = $diplomaFile->getClientOriginalExtension();
            $diplomaFilename = time().rand(1,100).'_Diploma_File.'.$diplomaExtension;
            $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
            $document->diploma_file = $diplomaFilename;
        }

            $medicalCertificateFile = $request->file('medical_certificate_file');
            $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
            $medicalCertificateFilename = time().rand(1,100).'_Medical_Certificate_File.'.$medicalCertificateExtension;
            $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
            $document->medical_certificate_file = $medicalCertificateFilename;

            $nbiFile = $request->file('nbi_clearance_file');
            $nbiExtension = $nbiFile->getClientOriginalExtension();
            $nbiFilename = time().rand(1,100).'_NBI_Clearance_File.'.$nbiExtension;
            $nbiFile->storeAs('public/documents_files',$nbiFilename);
            $document->nbi_clearance_file = $nbiFilename;

            $pagibigFile = $request->file('pag_ibig_file');
            $pagibigExtension = $pagibigFile->getClientOriginalExtension();
            $pagibigFilename = time().rand(1,100).'_Pag_ibig_File.'.$pagibigExtension;
            $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
            $document->pag_ibig_file = $pagibigFilename;

            $philhealthFile = $request->file('philhealth_file');
            $philhealthExtension = $philhealthFile->getClientOriginalExtension();
            $philhealthFilename = time().rand(1,100).'_Philhealth_File.'.$philhealthExtension;
            $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
            $document->philhealth_file = $philhealthFilename;

            $policeClearanceFile = $request->file('police_clearance_file');
            $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
            $policeClearanceFilename = time().rand(1,100).'_Police_Clearance_File.'.$policeClearanceExtension;
            $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
            $document->police_clearance_file = $policeClearanceFilename;

            $resumeFile = $request->file('resume_file');
            $resumeExtension = $resumeFile->getClientOriginalExtension();
            $resumeFilename = time().rand(1,100).'_Resume_File.'.$resumeExtension;
            $resumeFile->storeAs('public/documents_files',$resumeFilename);
            $document->resume_file = $resumeFilename;

            $sssFile = $request->file('sss_file');
            $sssExtension = $sssFile->getClientOriginalExtension();
            $sssFilename = time().rand(1,100).'_SSS_File.'.$sssExtension;
            $sssFile->storeAs('public/documents_files',$sssFilename);
            $document->sss_file = $sssFilename;
            
        if($request->hasFile('tor_file')){
            $torFile = $request->file('tor_file');
            $torExtension = $torFile->getClientOriginalExtension();
            $torFilename = time().rand(1,100).'_Transcript_of_Records_File.'.$torExtension;
            $torFile->storeAs('public/documents_files',$torFilename);
            $document->transcript_of_records_file = $torFilename;
        }
            $document->save();
            sleep(2);
            return Redirect::to(url()->previous());
    }

    public function updateDocuments(Request $request){
            if($request->hasFile('barangay_clearance_file')){
                if(file_exists('storage/documents_files/'.$request->barangay_clearance_filename)){
                    unlink(public_path('storage/documents_files/'.$request->barangay_clearance_filename));
                }

                $barangayClearanceFile = $request->file('barangay_clearance_file');
                $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
                $barangayClearanceFilename = time().rand(1,100).'_Barangay_Clearance.'.$barangayClearanceExtension;
                $barangayClearanceFile->storeAs('public/documents_files',$barangayClearanceFilename);
                $barangay_clearance_file = $barangayClearanceFilename;
            }
            else{
                $barangay_clearance_file = $request->barangay_clearance_filename;
            }

            if($request->hasFile('birthcertificate_file')){
                if(file_exists('storage/documents_files/'.$request->birthcertificate_filename)){
                    unlink(public_path('storage/documents_files/'.$request->birthcertificate_filename));
                }

                $birthcertificateFile = $request->file('birthcertificate_file');
                $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
                $birthcertificateFilename = time().rand(1,100).'_Birth_Certificate.'.$birthcertificateExtension;
                $birthcertificateFile->storeAs('public/documents_files',$birthcertificateFilename);
                $birthcertificate_file = $birthcertificateFilename;
            }
            else{
                $birthcertificate_file = $request->birthcertificate_filename;
            }

            if($request->hasFile('diploma_file')){
                if(file_exists('storage/documents_files/'.$request->diploma_filename)){
                    unlink(public_path('storage/documents_files/'.$request->diploma_filename));
                }

                $diplomaFile = $request->file('diploma_file');
                $diplomaExtension = $diplomaFile->getClientOriginalExtension();
                $diplomaFilename = time().rand(1,100).'_Diploma.'.$diplomaExtension;
                $diplomaFile->storeAs('public/documents_files',$diplomaFilename);
                $diploma_file = $diplomaFilename;
            }
            else{
                $diploma_file = $request->diploma_filename;
            }

            if($request->hasFile('medical_certificate_file')){
                if(file_exists('storage/documents_files/'.$request->medical_certificate_filename)){
                    unlink(public_path('storage/documents_files/'.$request->medical_certificate_filename));
                }

                $medicalCertificateFile = $request->file('medical_certificate_file');
                $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
                $medicalCertificateFilename = time().rand(1,100).'_Medical_Certificate.'.$medicalCertificateExtension;
                $medicalCertificateFile->storeAs('public/documents_files',$medicalCertificateFilename);
                $medical_certificate_file = $medicalCertificateFilename;
            }
            else{
                $medical_certificate_file = $request->medical_certificate_filename;
            }

            if($request->hasFile('nbi_clearance_file')){
                if(file_exists('storage/documents_files/'.$request->nbi_clearance_filename)){
                    unlink(public_path('storage/documents_files/'.$request->nbi_clearance_filename));
                }

                $nbiFile = $request->file('nbi_clearance_file');
                $nbiExtension = $nbiFile->getClientOriginalExtension();
                $nbiFilename = time().rand(1,100).'_NBI_Clearance.'.$nbiExtension;
                $nbiFile->storeAs('public/documents_files',$nbiFilename);
                $nbi_clearance_file = $nbiFilename;
            }
            else{
                $nbi_clearance_file = $request->nbi_clearance_filename;
            }

            if($request->hasFile('pag_ibig_file')){
                if(file_exists('storage/documents_files/'.$request->pag_ibig_filename)){
                    unlink(public_path('storage/documents_files/'.$request->pag_ibig_filename));
                }

                $pagibigFile = $request->file('pag_ibig_file');
                $pagibigExtension = $pagibigFile->getClientOriginalExtension();
                $pagibigFilename = time().rand(1,100).'_Pagibig_Form.'.$pagibigExtension;
                $pagibigFile->storeAs('public/documents_files',$pagibigFilename);
                $pag_ibig_file = $pagibigFilename;
            }
            else{
                $pag_ibig_file = $request->pag_ibig_filename;
            }

            if($request->hasFile('philhealth_file')){
                if(file_exists('storage/documents_files/'.$request->philhealth_filename)){
                    unlink(public_path('storage/documents_files/'.$request->philhealth_filename));
                }
                $philhealthFile = $request->file('philhealth_file');
                $philhealthExtension = $philhealthFile->getClientOriginalExtension();
                $philhealthFilename = time().rand(1,100).'_Philhealth_Form.'.$philhealthExtension;
                $philhealthFile->storeAs('public/documents_files',$philhealthFilename);
                $philhealth_file = $philhealthFilename;
            }
            else{
                $philhealth_file = $request->philhealth_filename;
            }

            if($request->hasFile('police_clearance_file')){
                if(file_exists('storage/documents_files/'.$request->police_clearance_filename)){
                    unlink(public_path('storage/documents_files/'.$request->police_clearance_filename));
                }

                $policeClearanceFile = $request->file('police_clearance_file');
                $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
                $policeClearanceFilename = time().rand(1,100).'_Police_Clearance.'.$policeClearanceExtension;
                $policeClearanceFile->storeAs('public/documents_files',$policeClearanceFilename);
                $police_clearance_file = $policeClearanceFilename;
            }
            else{
                $police_clearance_file = $request->police_clearance_filename;
            }

            if($request->hasFile('resume_file')){
                if(file_exists('storage/documents_files/'.$request->resume_filename)){
                    unlink(public_path('storage/documents_files/'.$request->resume_filename));
                }

                $resumeFile = $request->file('resume_file');
                $resumeExtension = $resumeFile->getClientOriginalExtension();
                $resumeFilename = time().rand(1,100).'_Resume.'.$resumeExtension;
                $resumeFile->storeAs('public/documents_files',$resumeFilename);
                $resume_file = $resumeFilename;
            }
            else{
                $resume_file = $request->resume_filename;
            }

            if($request->hasFile('sss_file')){                
                if(file_exists('storage/documents_files/'.$request->sss_filename)){
                    unlink(public_path('storage/documents_files/'.$request->sss_filename));
                }

                $sssFile = $request->file('sss_file');
                $sssExtension = $sssFile->getClientOriginalExtension();
                $sssFilename = time().rand(1,100).'_SSS_Form.'.$sssExtension;
                $sssFile->storeAs('public/documents_files',$sssFilename);
                $sss_file = $sssFilename;
            }
            else{
                $sss_file = $request->sss_filename;
            }

            if($request->hasFile('resume_file')){
                if(file_exists('storage/documents_files/'.$request->sss_filename)){
                    unlink(public_path('storage/documents_files/'.$request->sss_filename));
                }

                $resumeFile = $request->file('resume_file');
                $resumeExtension = $resumeFile->getClientOriginalExtension();
                $resumeFilename = time().rand(1,100).'_Resume.'.$resumeExtension;
                $resumeFile->storeAs('public/documents_files',$resumeFilename);
                $resume_file = $resumeFilename;
            }
            else{
                $resume_file = $request->resume_filename;
            } 
        
            if($request->hasFile('tor_file')){
                if(file_exists('storage/documents_files/'.$request->transcript_of_records_filename)){
                    unlink(public_path('storage/documents_files/'.$request->transcript_of_records_filename));
                }
                    
                $torFile = $request->file('tor_file');
                $torExtension = $torFile->getClientOriginalExtension();
                $torFilename = time().rand(1,100).'_Transcript_of_Records.'.$torExtension;
                $torFile->storeAs('public/documents_files',$torFilename);
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
            sleep(2);
            return Redirect::to(url()->previous());
    }

    public function saveSample(Request $request){
        $logs = new LogsTable;
        $logs->employee_id = $request->employee_id;
        $logs->sample1 = $request->sample1;
        $logs->sample2 = $request->sample2;
        $logs->sample3 = $request->sample3;
        $logs->save();
    }

    public function logs_data(Request $request){
        return DataTables::of(LogsTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function college_data(Request $request){
        return DataTables::of(CollegeTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function children_data(Request $request){
        return DataTables::of(ChildrenTable::where('employee_id',$request->id)->get())->make(true);
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

    public function memo_data(Request $request){
        return DataTables::of(MemoTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function logs_delete(Request $request){
        $logs_id = explode(",", $request->id);
        foreach($logs_id as $id){
            LogsTable::where('id', $id)->delete();
        }
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
}