<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\BackUpSQL;
use Illuminate\Support\Facades\Mail;
use DataTables;
use Carbon\Carbon;
use App\Models\{
    Branch,
    Company,
    Children,
    College,
    Contract,
    Department,
    Document,
    PersonalInformationTable,
    WorkInformationTable
};
use App\User;

class BackUpController extends Controller
{
    public function backup(){
        // $branches = Branch::all();
        // if(!$branches->isEmpty()){
        //     $sql_branches = '';
        //     foreach($branches as $branch){
        //         $sql_branches .= "REPLACE INTO `entity03`
        //         (
        //             `entity01`,
        //             `entity02`,
        //             `entity03`,
        //             `entity03_desc`,
        //             `addr1`,
        //             `addr2`,
        //             `contact`,
        //             `email`,
        //             `telnum1`,
        //             `telnum2`
        //         )
        //         VALUES
        //         (
        //             '$branch->entity01',
        //             '$branch->entity02',
        //             '$branch->entity03',
        //             '$branch->entity03_desc'
        //             '$branch->addr1',
        //             '$branch->addr2',
        //             '$branch->contact',
        //             '$branch->email',
        //             '$branch->telnum1',
        //             '$branch->telnum2'
        //         );\n";
        //     }

        //     $branchesBackUpPath = storage_path('app/public/backupsql/branches.sql');
        //     file_put_contents($branchesBackUpPath, $sql_branches);
        // }
        // else{
        //     $branchesBackUpPath = null;
        // }

        // $companies = Company::all();
        // if(!$companies->isEmpty()){
        //     $sql_companies = '';
        //     foreach ($companies as $company){
        //         $sql_companies .= "REPLACE INTO `companies`
        //         (
        //             `id`,
        //             `company_name`,
        //             `entity`,
        //             `created_at`,
        //             `updated_at`
        //         )
        //         VALUES
        //         (
        //             '$company->id',
        //             '$company->company_name',
        //             '$company->entity',
        //             '$company->created_at',
        //             '$company->updated_at'
        //         );\n";
        //     }

        //     $companiesBackUpPath = storage_path('app/public/backupsql/companies.sql');
        //     file_put_contents($companiesBackUpPath, $sql_companies);
        // }
        // else{
        //     $companiesBackUpPath = null;
        // }

        // $children = Children::all();
        // if(!$children->isEmpty()){
        //     $sql_children = '';
        //     foreach($children as $child){
        //         $sql_children .= "REPLACE INTO `children`
        //         (
        //             `id`,
        //             `employee_id`,
        //             `child_name`,
        //             `child_birthday`,
        //             `child_gender`,
        //             `created_at`,
        //             `updated_at`
        //         )
        //         VALUES
        //         (
        //             '$child->id',
        //             '$child->employee_id',
        //             '$child->child_name',
        //             '$child->child_birthday',
        //             '$child->child_gender',
        //             '$child->created_at',
        //             '$child->updated_at'
        //         );\n";
        //     }

        //     $childrenBackUpPath = storage_path('app/public/backupsql/children.sql');
        //     file_put_contents($childrenBackUpPath, $sql_children);
        // }
        // else{
        //     $childrenBackUpPath = null;
        // }

        // $colleges = College::all();
        // if(!$colleges->isEmpty()){
        //     $sql_colleges = '';
        //     foreach($colleges as $college){
        //         $sql_colleges .= "REPLACE INTO `college`
        //         (
        //             `id`,
        //             `employee_id`,
        //             `college_name`,
        //             `college_degree`,
        //             `college_inclusive_years_from`,
        //             `college_inclusive_years_to`,
        //             `created_at`,
        //             `updated_at`
        //         )
        //         VALUES
        //         (
        //             '$college->id',
        //             '$college->employee_id',
        //             '$college->college_name',
        //             '$college->college_degree',
        //             '$college->college_inclusive_years_from',
        //             '$college->college_inclusive_years_to',
        //             '$college->created_at',
        //             '$college->updated_at'
        //         );\n";
        //     }

        //     $collegeBackUpPath = storage_path('app/public/backupsql/colleges.sql');
        //     file_put_contents($collegeBackUpPath, $sql_colleges);
        // }
        // else{
        //     $collegeBackUpPath = null;
        // }

        // $contracts = Contract::all();
        // if(!$contracts->isEmpty()){
        //     $sql_contracts = '';
        //     foreach($contracts as $contract){
        //         $sql_contracts .= "REPLACE INTO `contracts`
        //         (
        //             `id`,
        //             `employee_id`,
        //             `contracts_type`,
        //             `contracts_date`,
        //             `contracts_file`,
        //             `created_at`,
        //             `updated_at`
        //         )
        //         VALUES
        //         (
        //             '$contract->id',
        //             '$contract->employee_id',
        //             '$contract->contracts_type',
        //             '$contract->contracts_date',
        //             '$contract->contracts_file',
        //             '$contract->created_at',
        //             '$contract->updated_at'
        //         );\n";
        //     }

        //     $contractBackUpPath = storage_path('app/public/backupsql/contracts.sql');
        //     file_put_contents($contractBackUpPath, $sql_contracts);
        // }
        // else{
        //     $contractBackUpPath = null;
        // }

        // $departments = Department::all();
        // if(!$departments->isEmpty()){
        //     $sql_departments = '';
        //     foreach($departments as $department){
        //         $sql_departments .= "REPLACE INTO `department`
        //         (
        //             `entity01`,
        //             `deptcode`,
        //             `deptdesc`
        //         )
        //         VALUES
        //         (
        //             '$department->entity01',
        //             '$department->deptcode',
        //             '$department->deptdesc'
        //         );\n";
        //     }

        //     $departmentBackUpPath = storage_path('app/public/backupsql/departments.sql');
        //     file_put_contents($departmentBackUpPath, $sql_departments);
        // }
        // else{
        //     $departmentBackUpPath = null;
        // }

        $documents = Document::all();
        if(!$documents->isEmpty()){
            $sql_documents = '';
            foreach($documents as $document){
                $sql_documents .= "REPLACE INTO `documents`
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
                    '$document->barangay_clearance_file',
                    '$document->birthcertificate_file',
                    '$document->diploma_file',
                    '$document->medical_certificate_file',
                    '$document->nbi_clearance_file',
                    '$document->pag_ibig_file',
                    '$document->philhealth_file',
                    '$document->police_clearance_file',
                    '$document->resume_file',
                    '$document->sss_file',
                    '$document->transcript_of_records_file',
                    '$document->created_at',
                    '$document->updated_at'
                );\n";
            }

            $documentBackUpPath = storage_path('app/public/backupsql/documents.sql');
            file_put_contents($documentBackUpPath, $sql_documents);
            return 'completed';
        }
        else{
            return 'empty';
            $documentBackUpPath = null;
        }

        // $personals = PersonalInformationTable::all();
        // if(!$personals->isEmpty()){
        //     $sql_personal = '';
        //     foreach($personals as $personal){
        //         $sql_personal .= "REPLACE INTO `personal_information_tables_copy`
        //         (
        //             `id`,
        //             `empno`,
        //             `last_name`,
        //             `first_name`,
        //             `middle_name`,
        //             `birthday`,
        //             `suffix`,
        //             `stat`,
        //             `shift`,
        //             `nickname`,
        //             `gender`,
        //             `civil_status`,
        //             `cellphone_number`,
        //             `address`,
        //             `ownership`,
        //             `province`,
        //             `city`,
        //             `region`,
        //             `blood_type`,
        //             `height`,
        //             `weight`,
        //             `religion`,
        //             `email_address`,
        //             `telephone_number`,
        //             `spouse_name`,
        //             `spouse_contact_number`,
        //             `spouse_profession`,
        //             `father_name`,
        //             `father_contact_number`,
        //             `father_profession`,
        //             `mother_name`,
        //             `mother_contact_number`,
        //             `mother_profession`,
        //             `emergency_contact_name`,
        //             `emergency_contact_relationship`,
        //             `emergency_contact_number`,
        //             `employee_image`,
        //             `created_at`,
        //             `updated_at`
        //         )
        //         VALUES
        //         (
        //             '$personal->id',
        //             '$personal->empno',
        //             '$personal->last_name',
        //             '$personal->first_name',
        //             '$personal->middle_name',
        //             '$personal->birthday',
        //             '$personal->suffix',
        //             '$personal->stat',
        //             '$personal->shift',
        //             '$personal->nickname',
        //             '$personal->gender',
        //             '$personal->civil_status',
        //             '$personal->cellphone_number',
        //             '$personal->address',
        //             '$personal->ownership',
        //             '$personal->province',
        //             '$personal->city',
        //             '$personal->region',
        //             '$personal->blood_type',
        //             '$personal->height',
        //             '$personal->weight',
        //             '$personal->religion',
        //             '$personal->email_address',
        //             '$personal->telephone_number',
        //             '$personal->spouse_name',
        //             '$personal->spouse_contact_number',
        //             '$personal->spouse_profession',
        //             '$personal->father_name',
        //             '$personal->father_contact_number',
        //             '$personal->father_profession',
        //             '$personal->mother_name',
        //             '$personal->mother_contact_number',
        //             '$personal->mother_profession',
        //             '$personal->emergency_contact_name',
        //             '$personal->emergency_contact_relationship',
        //             '$personal->emergency_contact_number',
        //             '$personal->employee_image',
        //             '$personal->created_at',
        //             '$personal->updated_at'
        //         );\n";
        //     }
        //     $personalBackUpPath = storage_path('app/public/backupsql/personals.sql');
        //     file_put_contents($personalBackUpPath, $sql_personal);
        // }
        // else{
        //     $personalBackUpPath = null;
        // }

        // $works = WorkInformationTable::all();
        // if(!$works->isEmpty()){
        //     $sql_works = '';
        //     foreach($works as $work){
        //         $sql_works .= "REPLACE INTO `work_information_tables`
        //         (
        //             `id`,
        //             `employee_id`,
        //             `employee_number`,
        //             `employee_company`,
        //             `employee_department`,
        //             `employee_branch`,
        //             `employment_status`,
        //             `employment_origin`,
        //             `employee_shift`,
        //             `employee_position`,
        //             `employee_supervisor`,
        //             `date_hired`,
        //             `company_email_address`,
        //             `company_contact_number`,
        //             `hmo_number`,
        //             `sss_number`,
        //             `pag_ibig_number`,
        //             `philhealth_number`,
        //             `tin_number`,
        //             `account_number`,
        //             `created_at`,
        //             `updated_at`
        //         )
        //         VALUES
        //         (
        //             '$work->id',
        //             '$work->employee_id',
        //             '$work->employee_number',
        //             '$work->employee_company',
        //             '$work->employee_department',
        //             '$work->employee_branch',
        //             '$work->employment_status',
        //             '$work->employment_origin',
        //             '$work->employee_shift',
        //             '$work->employee_position',
        //             '$work->employee_supervisor',
        //             '$work->date_hired',
        //             '$work->company_email_address',
        //             '$work->company_contact_number',
        //             '$work->hmo_number',
        //             '$work->sss_number',
        //             '$work->pag_ibig_number',
        //             '$work->philhealth_number',
        //             '$work->tin_number',
        //             '$work->account_number',
        //             '$work->created_at',
        //             '$work->updated_at'
        //         );\n";
        //     }

        //     $workBackUpPath = storage_path('app/public/backupsql/works.sql');
        //     file_put_contents($workBackUpPath, $sql_works);
        // }
        // else{
        //     $workBackUpPath = null;
        // }

        $filePaths = [];
        if($companiesBackUpPath !== null){
            $filePaths[] = $companiesBackUpPath;
        }
        if($branchesBackUpPath !== null){
            $filePaths[] = $branchesBackUpPath;
        }
        if($childrenBackUpPath !== null){
            $filePaths[] = $childrenBackUpPath;
        }
        if($collegeBackUpPath !== null){
            $filePaths[] = $collegeBackUpPath;
        }
        if($contractBackUpPath !== null){
            $filePaths[] = $contractBackUpPath;
        }
        if($departmentBackUpPath !== null){
            $filePaths[] = $departmentBackUpPath;
        }
        if($personalBackUpPath !== null){
            $filePaths[] = $personalBackUpPath;
        }
        if($workBackUpPath !== null){
            $filePaths[] = $workBackUpPath;
        }

        if(!empty($filePaths)){
            // Mail::to('hidalgorendell5@gmail.com')->send(new BackUpSQL($filePaths));
            return 'Backup completed and emails sent';
        }
        else{
            return 'No data to backup';
        }
    }
}
