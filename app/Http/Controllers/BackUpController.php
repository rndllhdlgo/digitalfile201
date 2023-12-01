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
    Department
};

class BackUpController extends Controller
{
    public function backup(){
        $companies = Company::all();
        if(!$companies->isEmpty()){
            $sql_companies = '';
            foreach ($companies as $company){
                $sql_companies .= "REPLACE INTO `companies`
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
                    '$company->company_name',
                    '$company->entity',
                    '$company->created_at',
                    '$company->updated_at'
                );\n";
            }

            $companiesBackUpPath = storage_path('app/public/backupsql/companies.sql');
            file_put_contents($companiesBackUpPath, $sql_companies);
        }
        else{
            $companiesBackUpPath = null;
        }

        $branches = Branch::all();
        if(!$branches->isEmpty()){
            $sql_branches = '';
            foreach($branches as $branch){
                $sql_branches .= "REPLACE INTO `entity03`
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
                    `telnum2`
                )
                VALUES
                (
                    '$branch->entity01',
                    '$branch->entity02',
                    '$branch->entity03',
                    '$branch->entity03_desc'
                    '$branch->addr1',
                    '$branch->addr2',
                    '$branch->contact',
                    '$branch->email',
                    '$branch->telnum1',
                    '$branch->telnum2'
                );\n";
            }

            $branchesBackUpPath = storage_path('app/public/backupsql/branches.sql');
            file_put_contents($branchesBackUpPath, $sql_branches);
        }
        else{
            $branchesBackUpPath = null;
        }

        $children = Children::all();
        if(!$children->isEmpty()){
            $sql_children = '';
            foreach($children as $child){
                $sql_children .= "REPLACE INTO `children`
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
                    '$child->child_name',
                    '$child->child_birthday',
                    '$child->child_gender',
                    '$child->created_at',
                    '$child->updated_at'
                );\n";
            }

            $childrenBackUpPath = storage_path('app/public/backupsql/children.sql');
            file_put_contents($childrenBackUpPath, $sql_children);
        }
        else{
            $childrenBackUpPath = null;
        }

        $colleges = College::all();
        if(!$colleges->isEmpty()){
            $sql_colleges = '';
            foreach($colleges as $college){
                $sql_colleges .= "REPLACE INTO `college`
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
                    '$college->college_name',
                    '$college->college_degree',
                    '$college->college_inclusive_years_from',
                    '$college->college_inclusive_years_to',
                    '$college->created_at',
                    '$college->updated_at'
                );\n";
            }

            $collegeBackUpPath = storage_path('app/public/backupsql/colleges.sql');
            file_put_contents($collegeBackUpPath, $sql_colleges);
        }
        else{
            $collegeBackUpPath = null;
        }

        $contracts = Contract::all();
        if(!$contracts->isEmpty()){
            $sql_contracts = '';
            foreach($contracts as $contract){
                $sql_contracts .= "REPLACE INTO `contracts`
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
                    '$contract->employee_id',
                    '$contract->contracts_type',
                    '$contract->contracts_date',
                    '$contract->contracts_file',
                    '$contract->created_at',
                    '$contract->updated_at'
                );\n";
            }

            $contractBackUpPath = storage_path('app/public/backupsql/contracts.sql');
            file_put_contents($contractBackUpPath, $sql_contracts);
        }
        else{
            $contractBackUpPath = null;
        }

        $departments = Department::all();
        if(!$departments->isEmpty()){
            $sql_departments = '';
            foreach($departments as $department){
                $sql_departments .= "REPLACE INTO `department`
                (
                    `entity01`,
                    `deptcode`,
                    `deptdesc`
                )
                VALUES
                (
                    '$department->entity01',
                    '$department->deptcode',
                    '$department->deptdesc'
                );\n";
            }

            $departmentBackUpPath = storage_path('app/public/backupsql/departments.sql');
            file_put_contents($departmentBackUpPath, $sql_departments);
        }
        else{
            $departmentBackUpPath = null;
        }

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

        if(!empty($filePaths)){
            Mail::to('hidalgorendell5@gmail.com')->send(new BackUpSQL($filePaths));
            return 'Backup completed and emails sent';
        }
        else{
            return 'No data to backup';
        }
    }
}
