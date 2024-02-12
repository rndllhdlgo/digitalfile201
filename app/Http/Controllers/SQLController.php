<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

use App\Models\{
    PersonalInformationTable,
    WorkInformationTable,
    Branch,
    Children,
    College,
    Company,
    Contract,
    Department,
    Document,
    EmployeeLogs,
    Evaluation,
    Hmo,
    JobHistory
};

use App\User;
use DataTables;
use Str;

class SQLController extends Controller
{
    public function sqlbackup(){
        // \"$last_name\",
        // $college_name   = str_replace('"', "'", $college->college_name);
        $empty_files     = array();
        $completed_files = array();
        $personals = PersonalInformationTable::all();
        if(!$personals->isEmpty()){
            $sql_personals = '';
            foreach($personals as $personal){
                $last_name              = str_replace('"', "'", $personal->last_name);
                $first_name             = str_replace('"', "'", $personal->first_name);
                $middle_name            = str_replace('"', "'", $personal->middle_name);
                $nickname               = str_replace('"', "'", $personal->nickname);
                $address                = str_replace('"', "'", $personal->address);
                $height                 = str_replace('"', "'", $personal->height);
                $weight                 = str_replace('"', "'", $personal->weight);
                $spouse_name            = str_replace('"', "'", $personal->spouse_name);
                $spouse_profession      = str_replace('"', "'", $personal->spouse_profession);
                $father_name            = str_replace('"', "'", $personal->father_name);
                $father_profession      = str_replace('"', "'", $personal->father_profession);
                $mother_name            = str_replace('"', "'", $personal->mother_name);
                $mother_profession      = str_replace('"', "'", $personal->mother_profession);
                $emergency_contact_name = str_replace('"', "'", $personal->emergency_contact_name);
                $sql_personals .= "REPLACE INTO `personal_information_tables_copy`
                (
                    `id`,
                    `empno`,
                    \"$last_name\",
                    \"$first_name\",
                    \"$middle_name\",
                    `birthday`,
                    `suffix`,
                    `stat`,
                    `shift`,
                    \"$nickname\",
                    `gender`,
                    `civil_status`,
                    `cellphone_number`,
                    \"$address\",
                    `ownership`,
                    `province`,
                    `city`,
                    `region`,
                    `blood_type`,
                    \"$height\",
                    \"$weight\",
                    `religion`,
                    `email_address`,
                    `telephone_number`,
                    \"$spouse_name\",
                    `spouse_contact_number`,
                    \"$spouse_profession\",
                    \"$father_name\",
                    `father_contact_number`,
                    \"$father_profession\",
                    \"$mother_name\",
                    `mother_contact_number`,
                    \"$mother_profession\",
                    \"$emergency_contact_name\",
                    `emergency_contact_relationship`,
                    `emergency_contact_number`,
                    `employee_image`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$personal->id',
                    '$personal->empno',
                    '$personal->last_name',
                    '$personal->first_name',
                    '$personal->middle_name',
                    '$personal->birthday',
                    '$personal->suffix',
                    '$personal->stat',
                    '$personal->shift',
                    '$personal->nickname',
                    '$personal->gender',
                    '$personal->civil_status',
                    '$personal->cellphone_number',
                    '$personal->address',
                    '$personal->ownership',
                    '$personal->province',
                    '$personal->city',
                    '$personal->region',
                    '$personal->blood_type',
                    '$personal->height',
                    '$personal->weight',
                    '$personal->religion',
                    '$personal->email_address',
                    '$personal->telephone_number',
                    '$personal->spouse_name',
                    '$personal->spouse_contact_number',
                    '$personal->spouse_profession',
                    '$personal->father_name',
                    '$personal->father_contact_number',
                    '$personal->father_profession',
                    '$personal->mother_name',
                    '$personal->mother_contact_number',
                    '$personal->mother_profession',
                    '$personal->emergency_contact_name',
                    '$personal->emergency_contact_relationship',
                    '$personal->emergency_contact_number',
                    '$personal->employee_image',
                    '$personal->created_at',
                    '$personal->updated_at',
                );\n";
            }

            $personalsPath = storage_path('app/public/backupsql/personals.sql');
            file_put_contents($personalsPath, $sql_personals);
            array_push($completed_files, "PERSONAL");
        }
        else{
            array_push($empty_files, "PERSONAL");
        }

        $works = WorkInformationTable::all();
        if(!$works->isEmpty()){
            $sql_works = '';
            foreach($works as $work){
                $sql_works .= "REPLACE INTO `work_information_tables_copy`
                (
                    `id`,
                    `employee_id`,
                    `employee_number`,
                    `employee_company`,
                    `employee_department`,
                    `employee_branch`,
                    `employment_status`,
                    `employment_origin`,
                    `employee_shift`,
                    `employee_position`,
                    `date_hired`,
                    `civil_status`,
                    `company_email_address`,
                    `company_contact_number`,
                    `hmo_number`,
                    `sss_number`,
                    `pag_ibig_number`,
                    `philhealth_number`,
                    `tin_number`,
                    `account_number`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$work->id',
                    '$work->employee_id',
                    '$work->employee_number',
                    '$work->employee_company',
                    '$work->employee_department',
                    '$work->employee_branch',
                    '$work->employment_status',
                    '$work->employment_origin',
                    '$work->employee_shift',
                    '$work->employee_position',
                    '$work->date_hired',
                    '$work->civil_status',
                    '$work->company_email_address',
                    '$work->company_contact_number',
                    '$work->hmo_number',
                    '$work->sss_number',
                    '$work->pag_ibig_number',
                    '$work->philhealth_number',
                    '$work->tin_number',
                    '$work->account_number',
                    '$work->created_at',
                    '$work->updated_at'
                );\n";
            }

            $worksPath = storage_path('app/public/backupsql/works.sql');
            file_put_contents($worksPath, $sql_works);
            array_push($completed_files, "WORK");
        }
        else{
            array_push($empty_files, "WORK");
        }

        $branches = Branch::all();
        if(!$branches->isEmpty()){
            $sql_branches = '';
            foreach($branches as $branch){
                $entity03_desc = str_replace('"', "'", $branch->entity03_desc);
                $addr1         = str_replace('"', "'", $branch->addr1);
                $addr2         = str_replace('"', "'", $branch->addr2);
                $contact       = str_replace('"', "'", $branch->contact);
                $sql_branches .= "REPLACE INTO `entity03_copy`
                (
                    `entity01`,
                    `entity02`,
                    `entity03`,
                    `entity03_desc`,
                    `addr1`,
                    `addr2`,
                    `contact`,
                    `email`,
                    `telnum1`,
                    `telnum2`,
                )
                VALUES
                (
                    '$branch->entity01',
                    '$branch->entity02',
                    '$branch->entity03',
                    \"$entity03_desc\",
                    \"$addr1\",
                    \"$addr2\",
                    \"$contact\",
                    '$branch->email',
                    '$branch->telnum1',
                    '$branch->telnum2'
                );\n";
            }

            $branchesPath = storage_path('app/public/backupsql/branches.sql');
            file_put_contents($branchesPath, $sql_branches);
            array_push($completed_files, "BRANCHES");
        }
        else{
            array_push($empty_files, "BRANCHES");
        }

        $children = Children::all();
        if(!$children->isEmpty()){
            $sql_children = '';
            foreach($children as $child){
                $child_name = str_replace('"', "'", $child->child_name);
                $sql_children .= "REPLACE INTO `children_copy`
                (
                    `id`,
                    `employee_id`,
                    `child_name`,
                    `child_birthday`,
                    `child_gender`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$child->id',
                    '$child->employee_id',
                    \"$child_name\",
                    '$child->child_birthday',
                    '$child->child_gender',
                    '$child->created_at',
                    '$child->updated_at'
                );\n";
            }

            $childrenPath = storage_path('app/public/backupsql/children.sql');
            file_put_contents($childrenPath, $sql_children);
            array_push($completed_files, "CHILDREN");
        }
        else{
            array_push($empty_files, "CHILDREN");
        }

        $colleges = College::all();
        if(!$colleges->isEmpty()){
            $sql_colleges = '';
            foreach($colleges as $college){
                $college_name   = str_replace('"', "'", $college->college_name);
                $college_degree = str_replace('"', "'", $college->college_degree);
                $sql_colleges .= "REPLACE INTO `college_copy`
                (
                    `id`,
                    `employee_id`,
                    `college_name`,
                    `college_degree`,
                    `college_inclusive_years_from`,
                    `college_inclusive_years_to`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$college->id',
                    '$college->employee_id',
                    \"$college_name\",
                    \"$college_degree\",
                    '$college->college_inclusive_years_from',
                    '$college->college_inclusive_years_to',
                    '$college->created_at',
                    '$college->updated_at'
                );\n";
            }

            $collegePath = storage_path('app/public/backupsql/college.sql');
            file_put_contents($collegePath, $sql_colleges);
            array_push($completed_files, "COLLEGE");
        }
        else{
            array_push($empty_files, "COLLEGE");
        }

        $companies = Company::all();
        if(!$companies->isEmpty()){
            $sql_companies = '';
            foreach($companies as $company){
                $company_name = str_replace('"', "'", $company->company_name);
                $sql_companies .= "REPLACE INTO `companies_copy`
                (
                    `id`,
                    `company_name`,
                    `entity`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$company->id',
                    \"$company_name\",
                    '$company->created_at',
                    '$company->updated_at'
                );\n";
            }

            $companyPath = storage_path('app/public/backupsql/companies.sql');
            file_put_contents($companyPath, $sql_companies);
            array_push($completed_files, "COMPANY");
        }
        else{
            array_push($empty_files, "COMPANY");
        }

        $contracts = Contract::all();
        if(!$contracts->isEmpty()){
            $sql_contracts = '';
            foreach($contracts as $contract){
                $contracts_type = str_replace('"', "'", $contract->contracts_type);
                $contracts_file = str_replace('"', "'", $contract->contracts_file);
                $sql_contracts .= "REPLACE INTO `contracts_copy`
                (
                    `id`,
                    `employee_id`,
                    `contracts_type`,
                    `contracts_date`,
                    `contracts_file`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$contract->id',
                    \"$contracts_type\",
                    '$contract->contracts_date',
                    \"$contracts_file\",
                    '$contract->created_at',
                    '$contract->updated_at'
                );\n";
            }

            $contractPath = storage_path('app/public/backupsql/contracts.sql');
            file_put_contents($contractPath, $sql_contracts);
            array_push($completed_files, "CONTRACTS");
        }
        else{
            array_push($empty_files, "CONTRACTS");
        }

        $departments = Department::all();
        if(!$departments->isEmpty()){
            $sql_departments = '';
            foreach($departments as $department){
                $deptdesc = str_replace('"', "'", $department->deptdesc);
                $sql_departments .= "REPLACE INTO `departments_copy`
                (
                    `entity01`,
                    `deptcode`,
                    `deptdesc`
                )
                VALUES
                (
                    '$department->entity01',
                    '$department->deptcode',
                    \"$deptdesc\",
                );\n";
            }

            $departmentPath = storage_path('app/public/backupsql/departments.sql');
            file_put_contents($departmentPath, $sql_departments);
            array_push($completed_files, "DEPARTMENTS");
        }
        else{
            array_push($empty_files, "DEPARTMENTS");
        }

        $documents = Document::all();
        if(!$documents->isEmpty()){
            $sql_documents = '';
            foreach($documents as $document){
                $barangay_clearance_file    = str_replace('"', "'", $document->barangay_clearance_file);
                $birthcertificate_file      = str_replace('"', "'", $document->birthcertificate_file);
                $diploma_file               = str_replace('"', "'", $document->diploma_file);
                $medical_certificate_file   = str_replace('"', "'", $document->medical_certificate_file);
                $nbi_clearance_file         = str_replace('"', "'", $document->nbi_clearance_file);
                $pag_ibig_file              = str_replace('"', "'", $document->pag_ibig_file);
                $philhealth_file            = str_replace('"', "'", $document->philhealth_file);
                $police_clearance_file      = str_replace('"', "'", $document->police_clearance_file);
                $resume_file                = str_replace('"', "'", $document->resume_file);
                $sss_file                   = str_replace('"', "'", $document->sss_file);
                $transcript_of_records_file = str_replace('"', "'", $document->transcript_of_records_file);
                $sql_documents .= "REPLACE INTO `documents_copy`
                (
                    `id`,
                    `employee_id`,
                    `barangay_clearance_file`,
                    `birthcertificate_file`,
                    `diploma_file`,
                    `medical_certificate_file`,
                    `nbi_clearance_file`,
                    `pag_ibig_file`,
                    `philhealth_file`,
                    `police_clearance_file`,
                    `resume_file`,
                    `sss_file`,
                    `transcript_of_records_file`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$document->id',
                    '$document->employee_id',
                    \"$barangay_clearance_file\",
                    \"$birthcertificate_file\",
                    \"$diploma_file\",
                    \"$medical_certificate_file\",
                    \"$nbi_clearance_file\",
                    \"$pag_ibig_file\",
                    \"$philhealth_file\",
                    \"$police_clearance_file\",
                    \"$resume_file\",
                    \"$sss_file\",
                    \"$transcript_of_records_file\",
                    '$document->created_at',
                    '$document->updated_at'
                );\n";
            }

            $documentPath = storage_path('app/public/backupsql/documents.sql');
            file_put_contents($documentPath, $sql_documents);
            array_push($completed_files, "DOCUMENTS");
        }
        else{
            array_push($empty_files, "DOCUMENTS");
        }

        $emplogs = EmployeeLogs::all();
        if(!$emplogs->isEmpty()){
            $sql_emplogs = '';
            foreach($emplogs as $emplog){
                $username = str_replace('"', "'", $emplog->username);
                $role     = str_replace('"', "'", $emplog->role);
                $activity = str_replace('"', "'", $emplog->activity);
                $sql_emplogs .= "REPLACE INTO `employee_logs_copy`
                (
                    `id`,
                    `employee_id`,
                    `username`,
                    `role`,
                    `activity`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$emplog->id',
                    '$emplog->employee_id',
                    \"$username\",
                    \"$role\",
                    \"$activity\",
                    '$emplog->created_at',
                    '$emplog->updated_at'
                );\n";
            }

            $emplogPath = storage_path('app/public/backupsql/emplogs.sql');
            file_put_contents($emplogPath, $sql_emplogs);
            array_push($completed_files, "EMPLOYEE LOGS");
        }
        else{
            array_push($empty_files, "EMPLOYEE LOGS");
        }

        $evaluations = Evaluation::all();
        if(!$evaluations->isEmpty()){
            $sql_evaluations = '';
            foreach($evaluations as $evaluation){
                $evaluation_reason       = str_replace('"', "'", $evaluation->evaluation_reason);
                $evaluation_evaluated_by = str_replace('"', "'", $evaluation->evaluation_evaluated_by);
                $evaluation_file         = str_replace('"', "'", $evaluation->evaluation_file);
                $sql_evaluations .= "REPLACE INTO `evaluations_copy`
                (
                    `id`,
                    `employee_id`,
                    `evaluation_reason`,
                    `evaluation_date`,
                    `evaluation_evaluated_by`,
                    `evaluation_file`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$evaluation->id',
                    '$evaluation->employee_id',
                    \"$evaluation_reason\",
                    \"$evaluation_evaluated_by\",
                    \"$evaluation_file\",
                    '$evaluation->created_at',
                    '$evaluation->updated_at'
                );\n";
            }

            $evaluationPath = storage_path('app/public/backupsql/evaluation.sql');
            file_put_contents($evaluationPath, $sql_evaluations);
            array_push($completed_files, "EVALUATIONS");
        }
        else{
            array_push($empty_files, "EVALUATIONS");
        }

        $hmos = Hmo::all();
        if(!$hmos->isEmpty()){
            $sql_hmos = '';
            foreach($hmos as $hmo){
                $hmo_name    = str_replace('"', "'", $hmo->hmo);
                $coverage    = str_replace('"', "'", $hmo->coverage);
                $particulars = str_replace('"', "'", $hmo->particulars);
                $room        = str_replace('"', "'", $hmo->room);
                $sql_hmos .= "REPLACE INTO `hmo_copy`
                (
                    `id`,
                    `employee_id`,
                    `hmo`,
                    `coverage`,
                    `particulars`,
                    `room`,
                    `effectivity_date`,
                    `expiration_date`,
                    `status`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$hmo->id',
                    '$hmo->employee_id',
                    \"$hmo_name\",
                    \"$coverage\",
                    \"$particulars\",
                    \"$room\",
                    '$hmo->effectivity_date',
                    '$hmo->expiration_date',
                    '$hmo->status',
                    '$hmo->created_at',
                    '$hmo->updated_at'
                );\n";
            }

            $hmoPath = storage_path('app/public/backupsql/hmo.sql');
            file_put_contents($hmoPath, $sql_hmos);
            array_push($completed_files, "HMO");
        }
        else{
            array_push($empty_files, "HMO");
        }

        $job_histories = JobHistory::all();
        if(!$job_histories->isEmpty()){
            $job_histories = '';
            foreach($job_histories as $job_history){
                $job_company_name   = str_replace('"', "'", $job_history->job_company_name);
                $job_description    = str_replace('"', "'", $job_history->job_description);
                $job_position       = str_replace('"', "'", $job_history->job_position);
                $job_contact_number = str_replace('"', "'", $job_history->job_contact_number);
                $job_histories .= "REPLACE INTO `job_histories_copy`
                (
                    `id`,
                    `employee_id`,
                    `job_company_name`,
                    `job_description`,
                    `job_position`,
                    `job_contact_number`,
                    `job_inclusive_years_from`,
                    `job_inclusive_years_to`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$job_history->id',
                    '$job_history->employee_id',
                    \"$job_company_name\",
                    \"$job_description\",
                    \"$job_position\",
                    \"$job_contact_number\",
                    '$job_history->job_inclusive_years_from',
                    '$job_history->job_inclusive_years_to',
                    '$hmo->created_at',
                    '$hmo->updated_at'
                );\n";
            }

            $jobhistoryPath = storage_path('app/public/backupsql/jobhistory.sql');
            file_put_contents($jobhistoryPath, $sql_jobhistory);
            array_push($completed_files, "JOB HISTORY");
        }
        else{
            array_push($empty_files, "JOB HISTORY");
        }

        return response()->json([
            'Completed Files' => $completed_files,
            'Empty Files'     => $empty_files
        ]);

        // return nl2br("Completed Files: " . implode(', ', $completed_files) . "\n Empty Files: " . implode(', ', $empty_files));
    }
}