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
    Children
};

use App\User;
use DataTables;
use Str;

class SQLController extends Controller
{
    public function sqlbackup(){
        // \"$last_name\",
        $random          = Str::random(4);
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

        echo nl2br("Completed Files: " . implode(', ', $completed_files) . "\n Empty Files: " . implode(', ', $empty_files));
    }
}