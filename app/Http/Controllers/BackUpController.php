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
    College
};

class BackUpController extends Controller
{
    // public function backup(){
    //     $companies = Company::all();
    //     if(!$companies->isEmpty()){
    //         $sql_companies = '';
    //         foreach($companies as $company){
    //             $sql_companies .= "REPLACE INTO `companies`
    //             (
    //                 `id`,
    //                 `company_name`,
    //                 `entity`,
    //                 `created_at`,
    //                 `updated_at`
    //             )
    //             VALUES
    //             (
    //                 '$company->id',
    //                 '$company->company_name',
    //                 '$company->entity',
    //                 '$company->created_at',
    //                 '$company->updated_at'
    //             );\n";
    //         }

    //         $companiesBackUpPath = storage_path('app/public/backupsql/companies.sql');
    //         file_put_contents($companiesBackUpPath, $sql_companies);

    //         Mail::to('hidalgorendell5@gmail.com')->send(new BackUpSQL($companiesBackUpPath));

    //         return 'Backup completed and email sent';
    //     }
    //     else{
    //         return 'no data';
    //     }

    //     $branches = Branches::all();
    //     if(!$branches->isEmpty()){
    //         $sql_branches = '';
    //         foreach($branches as $branch){
    //             $sql_branches .= "REPLACE INTO `branches`
    //             (
    //                 `id`,
    //                 `branch_name`,
    //                 `created_at`,
    //                 `updated_at`
    //             )
    //             VALUES
    //             (
    //                 '$branch->id',
    //                 '$branch->branch_name',
    //                 '$branch->created_at',
    //                 '$branch->updated_at'
    //             );\n";
    //         }

    //         $branchesBackUpPath = storage_path('app/public/backupsql/branches.sql');
    //         file_put_contents($branchesBackUpPath, $sql_branches);

    //         Mail::to('hidalgorendell5@gmail.com')->send(new BackUpSQL($branchesBackUpPath));

    //         return 'Backup completed and email sent';
    //     }
    //     else{
    //         return 'no data';
    //     }
    // }

    public function backup(){
        return 'Maintenance';
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
                $sql_branches .= "REPLACE INTO `branches`
                (
                    `id`,
                    `branch_name`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$branch->id',
                    '$branch->branch_name',
                    '$branch->created_at',
                    '$branch->updated_at'
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

        if(!empty($filePaths)){
            Mail::to('hidalgorendell5@gmail.com')->send(new BackUpSQL($filePaths));
            return 'Backup completed and emails sent';
        }
        else{
            return 'No data to backup';
        }
    }
}
