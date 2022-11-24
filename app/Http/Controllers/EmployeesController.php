<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Models\UserLogs;

use App\Models\Children;
use App\Models\College;
use App\Models\Contracts;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\Job;
use App\Models\Memo;
use App\Models\Resignation;
use App\Models\Termination;
use App\Models\Training;
use App\Models\Vocational;
use App\Models\MedicalHistory;

use App\Models\PersonalInformation;
use App\Models\WorkInformation;
use App\Models\CompensationBenefits;
use App\Models\EducationalAttainment;
use App\Models\JobHistory;

use App\Models\MemoInformation;
use App\Models\EvaluationInformation;
use App\Models\ContractsInformation;
use App\Models\ResignationInformation;
use App\Models\TerminationInformation;

use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//For Authentication
    }
    
    // public function listOfEmployees(){
    //     $employees = Employee::all();
    //     return DataTables::of($employees)->make(true);
    // }

    public function listOfEmployees(){
        $employees = PersonalInformation::selectRaw('employee_number, first_name, middle_name, last_name, positions.job_position_name AS employee_position, branches.branch_name AS employee_branch, employee_status')
        ->join('work_information','work_information.employee_id','=','personal_information.id')
        ->join('positions','positions.id','=','work_information.employee_position')
        ->join('branches','branches.id','=','work_information.employee_branch')
        ->get();
        return DataTables::of($employees)->make(true);
    }
    
    // public function childrenDataTable(Request $request){
    //     $children = Children::where('employee_id',$request->employee_id)->get();
    //     return DataTables::of($children)->make(true);
    // }

    public function savePersonalInformation(Request $request){//To save only Work,Personal,School Information Form
        $employee_personal_information = new PersonalInformation;
        $employee_number_logs = $request->employee_number; 
        $employee_first_name_logs = ucwords($request->first_name);
        $employee_last_name_logs = ucwords($request->last_name); 

        $employee_personal_information->employee_number = $employee_number_logs;//Eloquent Syntax/Form
        $employee_personal_information->first_name =  $employee_first_name_logs;
        $employee_personal_information->employee_image = $request->fileName;
        $employee_personal_information->last_name = $employee_last_name_logs;

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
        $sql = $employee_personal_information->save();//To save data
        
        // $id = $employees->id;

        // $result = $sql ? 'true' : 'false';
        if($sql){
            //To save user logs
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED USER: User successfully added new employee with Employee Number: [$employee_number_logs]. Employee Name: [$employee_first_name_logs $employee_last_name_logs]."; //Display logs in home page
            $userlogs->save();

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

    public function saveChildren(Request $request){
        $children = new Children;
        $children->employee_id = $request->employee_id;//use to associate employee id
        $children->child_name = ucwords($request->child_name);
        $children->child_birthday = $request->child_birthday;
        $children->child_gender = $request->child_gender;
        $children->save();
    }

    public function insertImage(Request $request){//This function is to save the image

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();//Get filename with the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);//Get Just filename
            $extension = $request->file('file')->getClientOriginalExtension();//Get just extension
            $fileNameToStore = time().'_'.'employee_image'.'.'.$extension;// Filename to store
            $path = $request->file('file')->storeAs('public/employee_images',$fileNameToStore);//To create folder for images under public folder
        }
        else{
            $fileNameToStore = 'noimage.png';
        }
            return $fileNameToStore;
    }

    public function saveWorkInformation(Request $request){
        $employee_work_information = new WorkInformation;
        $employee_work_information->employee_id = $request->employee_id;
        $employee_work_information->employee_company = $request->employee_company;
        $employee_work_information->employee_branch = $request->employee_branch;
        $employee_work_information->employee_status = $request->employee_status;
        $employee_work_information->employment_origin = $request->employment_origin;
        $employee_work_information->employee_salary = $request->employee_salary;
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
        $employee_college = new College;
        $employee_college->employee_id = $request->employee_id;
        $employee_college->college_name = ucfirst($request->college_name);
        $employee_college->college_degree = ucfirst($request->college_degree);
        $employee_college->college_inclusive_years = $request->college_inclusive_years;
        $employee_college->save();  
    }

    public function saveTraining(Request $request){
        $employee_training = new Training;
        $employee_training->employee_id = $request->employee_id;
        $employee_training->training_name = ucfirst($request->training_name);
        $employee_training->training_title = ucfirst($request->training_title);
        $employee_training->training_inclusive_years = $request->training_inclusive_years;
        $employee_training->save();
    }

    public function saveVocational(Request $request){
        $employee_vocational = new Vocational;
        $employee_vocational->employee_id = $request->employee_id;
        $employee_vocational->vocational_name = ucfirst($request->vocational_name);
        $employee_vocational->vocational_course = ucfirst($request->vocational_course);
        $employee_vocational->vocational_inclusive_years = $request->vocational_inclusive_years;
        $employee_vocational->save();
    }

    public function saveJobHistory(Request $request){
        $employee_job = new JobHistory;
        $employee_job->employee_id = $request->employee_id;
        $employee_job->job_name = ucfirst($request->job_name);
        $employee_job->job_position = ucfirst($request->job_position);
        $employee_job->job_address = ucwords($request->job_address);
        $employee_job->job_contact_details = $request->job_contact_details;
        $employee_job->job_inclusive_years = $request->job_inclusive_years;
        $employee_job->save();
    }

    public function saveMedicalHistory(Request $request){
        if($request->past_medical_condition && $request->allergies && $request->medication && $request->psychological_history){
            $employee_medicalHistory = new MedicalHistory;
            $employee_medicalHistory->employee_id = $request->employee_id;
            $employee_medicalHistory->past_medical_condition = ucwords($request->past_medical_condition);
            $employee_medicalHistory->allergies = ucwords($request->allergies);
            $employee_medicalHistory->medication = $request->medication;
            $employee_medicalHistory->psychological_history = $request->psychological_history;
            $employee_medicalHistory->save();
        } 
    }

    // public function fetch(Request $request){
    //     $employees = PersonalInformation::where('id',$request->id)->first();
    //     return $employees;
    // }

    // public function update(Request $request){
        
    //     $employees = Employee::find($request->id);
    // //Personal Information Tab
    //     $employees->cover_image = $request->fileName;
    //     $employees->first_name = ucwords($request->first_name);
    //     $employees->last_name = ucwords($request->last_name);
    //     $employees->middle_name = ucwords($request->middle_name);
    //     $employees->suffix = ucwords($request->suffix);
    //     $employees->nickname = ucwords($request->nickname);
    //     $employees->birthday = $request->birthday;
    //     $employees->gender = $request->gender;
    //     $employees->civil_status = $request->civil_status;
    //     $employees->street = ucwords($request->street);
    //     $employees->region = $request->region;
    //     $employees->province = $request->province;
    //     $employees->city = $request->city;
    //     $employees->email_address = strtolower($request->email_address);
    //     $employees->telephone_number = $request->telephone_number;
    //     $employees->cellphone_number = $request->cellphone_number;
    //     $employees->spouse_name = ucwords($request->spouse_name);
    //     $employees->spouse_contact_number = $request->spouse_contact_number;
    //     $employees->spouse_profession = ucwords($request->spouse_profession);
    //     $employees->father_name = ucwords($request->father_name);
    //     $employees->father_contact_number = $request->father_contact_number;
    //     $employees->father_profession = ucwords($request->father_profession);
    //     $employees->mother_name = ucwords($request->mother_name);
    //     $employees->mother_contact_number = $request->mother_contact_number;
    //     $employees->mother_profession = ucwords($request->mother_profession);
    //     $employees->emergency_contact_name = ucwords($request->emergency_contact_name);
    //     $employees->emergency_contact_relationship = ucwords($request->emergency_contact_relationship);
    //     $employees->emergency_contact_number = $request->emergency_contact_number;
    // //Work Information Tab
    //     $employees->employee_number = $request->employee_number;
    //     $employees->employee_company = $request->employee_company;
    //     $employees->employee_branch = $request->employee_branch;
    //     $employees->employee_status = $request->employee_status;
    //     $employees->employment_origin = $request->employment_origin;
    //     $employees->employee_shift = $request->employee_shift;
    //     $employees->employee_position = $request->employee_position;
    //     $employees->employee_supervisor = $request->employee_supervisor;
    //     $employees->date_hired = $request->date_hired;
    //     $employees->company_email_address = strtolower($request->company_email_address);
    //     $employees->company_contact_number = $request->company_contact_number;
    //     $employees->sss_number = $request->sss_number;
    //     $employees->pag_ibig_number = $request->pag_ibig_number;
    //     $employees->philhealth_number = $request->philhealth_number;
    //     $employees->tin_number = $request->tin_number;
    //     $employees->account_number = $request->account_number;
    // //Educational and Trainings Background Tab
    //     $employees->secondary_school_name = ucwords($request->secondary_school_name);
    //     $employees->secondary_school_address = ucwords($request->secondary_school_address);
    //     $employees->secondary_school_inclusive_years = $request->secondary_school_inclusive_years;
    //     $employees->primary_school_name = ucwords($request->primary_school_name);
    //     $employees->primary_school_address = ucwords($request->primary_school_address);
    //     $employees->primary_school_inclusive_years = $request->primary_school_inclusive_years;
    //     $sql = $employees->save();

    //     return $sql ? 'true' : 'false';
    // }

    //Check Duplication of Data
    public function checkDuplicate(Request $request){
        return PersonalInformation::where('employee_number',$request->employee_number)->count() > 0 ? 'true': 'false';
    }
    public function checkEmailDuplicate(Request $request){
        return PersonalInformation::where('email_address',$request->email_address)->count() > 0 ? 'true': 'false';
    }
    public function checkTelephoneNumberDuplicate(Request $request){
        return PersonalInformation::where('telephone_number',$request->telephone_number)->count() > 0 ? 'true': 'false';
    }
    public function checkCellphoneNumberDuplicate(Request $request){
        return PersonalInformation::where('cellphone_number',$request->cellphone_number)->count() > 0 ? 'true': 'false';
    }
    public function checkFatherCellphoneNumberDuplicate(Request $request){
        return PersonalInformation::where('father_contact_number',$request->father_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkMotherCellphoneNumberDuplicate(Request $request){
        return PersonalInformation::where('mother_contact_number',$request->mother_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkSpouseCellphoneNumberDuplicate(Request $request){
        return PersonalInformation::where('spouse_contact_number',$request->spouse_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkEmergencyContactNumberDuplicate(Request $request){
        return PersonalInformation::where('emergency_contact_number',$request->emergency_contact_number)->count() > 0 ? 'true': 'false';
    }
    public function checkEmployeeEmailAddressDuplicate(Request $request){
        return WorkInformation::where('company_email_address',$request->company_email_address)->count() > 0 ? 'true': 'false';
    }
    public function checkEmployeeContactNumberDuplicate(Request $request){
        return WorkInformation::where('company_contact_number',$request->company_contact_number)->count() > 0 ? 'true': 'false';
    }

    // public function memoSave(Request $request){
    //     $employee_memo = new Memo;
    //     $employee_memo->employee_id = $request->employee_id;
    //     $employee_memo->memo_subject = ucfirst($request->memo_subject);
    //     $employee_memo->memo_date = $request->memo_date;
    //     $employee_memo->memo_penalty = $request->memo_penalty;
    //     $employee_memo->save();
    // }

    // public function evaluationSave(Request $request){
    //     $employee_evaluation = new Evaluation;
    //     $employee_evaluation->employee_id = $request->employee_id;
    //     $employee_evaluation->evaluation_reason = ucfirst($request->evaluation_reason);
    //     $employee_evaluation->evaluation_date = $request->evaluation_date;
    //     $employee_evaluation->evaluation_evaluated_by = ucwords($request->evaluation_evaluated_by);
    //     $employee_evaluation->save();
    // }

    // public function contractsSave(Request $request){
    //     $employee_contract = new Contracts;
    //     $employee_contract->employee_id = $request->employee_id;
    //     $employee_contract->contracts_type = ucfirst($request->contracts_type);
    //     $employee_contract->contracts_date = $request->contracts_date;
    //     $employee_contract->save();
    // }

    // public function saveMultipleFile(Request $request){
    //     if($request->hasFile('memo_file')){
    //         foreach($request->file('memo_file') as $key => $value){
    //             $memoFileName = time().'_Memo_File.'.$request->memo_file[$key]->extension();
    //             $request->memo_file[$key]->storeAs('public/memo_file',$memoFileName);
                
    //             $memo = new MemoInformation;
    //             $memo->memo_subject = $request->memo_subject[$key];
    //             $memo->memo_date = $request->memo_date[$key];
    //             $memo->memo_penalty = $request->memo_penalty[$key];
    //             $memo->memo_file = $memoFileName;
    //             $memo->save();
    //         }
    //     }
    // }

    public function saveDocuments(Request $request)
    {   
        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $memoFileName = time().'_Memo_File.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/memo_file',$memoFileName);
                
                $memo = new MemoInformation;
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
                $evaluationFileName = time().'_Evaluation_File.'.$request->evaluation_file[$key]->extension();
                $request->evaluation_file[$key]->storeAs('public/evaluation_file',$evaluationFileName);
                
                $evaluation = new EvaluationInformation;
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
                $contractsFileName = time().'_Contracts_File.'.$request->contracts_file[$key]->extension();
                $request->contracts_file[$key]->storeAs('public/contracts_file',$contractsFileName);
                
                $contracts = new ContractsInformation;
                $contracts->employee_id = $request->employee_id;
                $contracts->contracts_type = $request->contracts_type[$key];
                $contracts->contracts_date = $request->contracts_date[$key];
                $contracts->contracts_file = $contractsFileName;
                $contracts->save();
            }
        }

        if($request->resignation_reason && $request->resignation_date && $request->hasFile('resignation_file')){
            foreach($request->file('resignation_file') as $key => $value){
                $resignationFileName = time().'_Resignation_File.'.$request->resignation_file[$key]->extension();
                $request->resignation_file[$key]->storeAs('public/resignation_files',$resignationFileName);
                
                $resignation = new ResignationInformation;
                $resignation->employee_id = $request->employee_id;
                $resignation->resignation_reason = $request->resignation_reason[$key];
                $resignation->resignation_date = $request->resignation_date[$key];
                $resignation->resignation_file = $resignationFileName;
                $resignation->save();
            }
        }

        if($request->termination_reason && $request->termination_date && $request->hasFile('termination_file')){
            foreach($request->file('termination_file') as $key => $value){
                $terminationFileName = time().'_Termination_File.'.$request->termination_file[$key]->extension();
                $request->termination_file[$key]->storeAs('public/termination_files',$terminationFileName);

                $termination = new TerminationInformation;
                $termination->employee_id = $request->employee_id;
                $termination->termination_reason = $request->termination_reason[$key];
                $termination->termination_date = $request->termination_date[$key];
                $termination->termination_file = $terminationFileName;
                $termination->save();
            }
        }
        
        // Save Resignation and Termination File
        // if($request->resignation_letter && $request->resignation_date && $request->hasFile('resignation_file')){
        //     $resignation = new Resignation;
        //     $resignation->employee_id = $request->employee_id;
        //     $resignation->resignation_letter = ucfirst($request->resignation_letter);
        //     $resignation->resignation_date = $request->resignation_date;

        //     $resignationFile = $request->file('resignation_file');
        //     $resignationExtension = $resignationFile->getClientOriginalExtension();
        //     $resignationFileName = time(). '_' . 'Resignation_Letter'. '.' . $resignationExtension;
        //     $resignationFile->storeAs('public/resignationFiles',$resignationFileName);
        //     $resignation->resignation_file = $resignationFileName;
        //     $resignation->save();
        // }

        // if($request->termination_letter && $request->termination_date && $request->hasFile('termination_file')){
        //     $termination = new Termination;
        //     $termination->employee_id = $request->employee_id;
        //     $termination->termination_letter = ucfirst($request->termination_letter);
        //     $termination->termination_date = $request->termination_date;

        //     $terminationFile = $request->file('termination_file');
        //     $terminationExtension = $terminationFile->getClientOriginalExtension();
        //     $terminationFileName = time(). '_' . 'Termination_Letter'. '.' .$terminationExtension;
        //     $terminationFile->storeAs('public/terminationFiles',$terminationFileName);
        //     $termination->termination_file = $terminationFileName;
        //     $termination->save();
        // }
            $document = new Document;
            $document->employee_id = $request->employee_id;
            $birthcertificateFile = $request->file('birthcertificate_file');
            $birthcertificateExtension = $birthcertificateFile->getClientOriginalExtension();
            $birthcertificateFilename = time(). '_' . 'Birth_Certificate'. '.' .$birthcertificateExtension;
            $birthcertificateFile->storeAs('public/documents',$birthcertificateFilename);
            $document->birthcertificate = $birthcertificateFilename;

            $nbiFile = $request->file('nbi_file');
            $nbiExtension = $nbiFile->getClientOriginalExtension();
            $nbiFilename = time(). '_' . 'NBI_Clearance'. '.' .$nbiExtension;
            $nbiFile->storeAs('public/documents',$nbiFilename);
            $document->nbi_clearance = $nbiFilename;

            $barangayClearanceFile = $request->file('barangay_clearance_file');
            $barangayClearanceExtension = $barangayClearanceFile->getClientOriginalExtension();
            $barangayClearanceFilename = time(). '_' . 'Barangay_Clearance'. '.' .$barangayClearanceExtension;
            $barangayClearanceFile->storeAs('public/documents',$barangayClearanceFilename);
            $document->barangay_clearance = $barangayClearanceFilename;

            $policeClearanceFile = $request->file('police_clearance_file');
            $policeClearanceExtension = $policeClearanceFile->getClientOriginalExtension();
            $policeClearanceFilename = time(). '_' . 'Police_Clearance'. '.' .$policeClearanceExtension;
            $policeClearanceFile->storeAs('public/documents',$barangayClearanceFilename);
            $document->police_clearance = $policeClearanceFilename;

            $sssFile = $request->file('sss_file');
            $sssExtension = $sssFile->getClientOriginalExtension();
            $sssFilename = time(). '_' . 'SSS_Form'. '.' . $sssExtension;
            $sssFile->storeAs('public/documents',$sssFilename);
            $document->sss_form = $sssFilename;

            $philhealthFile = $request->file('philhealth_file');
            $philhealthExtension = $philhealthFile->getClientOriginalExtension();
            $philhealthFilename = time(). '_' . 'Philhealth_Form'. '.' .$philhealthExtension;
            $philhealthFile->storeAs('public/documents',$philhealthFilename);
            $document->philhealth_form = $philhealthFilename;

            $pagibigFile = $request->file('pag_ibig_file');
            $pagibigExtension = $pagibigFile->getClientOriginalExtension();
            $pagibigFilename = time(). '_' . 'Pagibig_Form'. '.' .$pagibigExtension;
            $pagibigFile->storeAs('public/documents',$pagibigFilename);
            $document->pag_ibig_form = $pagibigFilename;

            $medicalCertificateFile = $request->file('medical_certificate_file');
            $medicalCertificateExtension = $medicalCertificateFile->getClientOriginalExtension();
            $medicalCertificateFilename = time(). '_' . 'Medical_Certificate'. '.' .$medicalCertificateExtension;
            $medicalCertificateFile->storeAs('public/documents',$medicalCertificateFilename);
            $document->medical_certificate = $medicalCertificateFilename;
            
            $resumeFile = $request->file('resume_file');
            $resumeExtension = $resumeFile->getClientOriginalExtension();
            $resumeFilename = time(). '_' . 'Resume'. '.' . $resumeExtension;
            $resumeFile->storeAs('public/documents',$resumeFilename);
            $document->resume = $resumeFilename;
            
        if($request->hasFile('tor_file')){
            $torFile = $request->file('tor_file');
            $torExtension = $torFile->getClientOriginalExtension();
            $torFilename = time(). '_' . 'Transcript_of_Records'. '.' .$torExtension;
            $torFile->storeAs('public/documents',$torFilename);
            $document->transcript_of_records = $torFilename;
        }

        if($request->hasFile('diploma_file')){
            $diplomaFile = $request->file('diploma_file');
            $diplomaExtension = $diplomaFile->getClientOriginalExtension();
            $diplomaFilename = time(). '_' . 'Diploma'. '.' . $diplomaExtension;
            $diplomaFile->storeAs('public/documents',$diplomaFilename);
            $document->diploma = $diplomaFilename;
        }
            $document->save();
            // return Redirect::to(url()->previous());//Return previous page/url
    }
}