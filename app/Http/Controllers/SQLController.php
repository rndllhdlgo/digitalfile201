<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use App\Models\{
    PersonalInformationTable,
    WorkInformationTable,
    Secondary
};
use App\User;
use DataTables;

class SQLController extends Controller
{
    public function sqlbackup(){
        $empty_files     = array();
        $completed_files = array();
        $personals = PersonalInformationTable::all();
        if(!$personals->isEmpty()){
            $sql_personals = '';
            foreach($personals as $personal){
                $sql_personals .= "REPLACE INTO `personal_information_tables_copy`
                (
                    `id`,
                    `empno`,
                    `last_name`,
                    `first_name`,
                    `middle_name`,
                    `birthday`,
                    `suffix`,
                    `stat`,
                    `shift`,
                    `nickname`,
                    `gender`,
                    `civil_status`,
                    `cellphone_number`,
                    `address`,
                    `ownership`,
                    `province`,
                    `city`,
                    `region`,
                    `blood_type`,
                    `height`,
                    `weight`,
                    `religion`,
                    `email_address`,
                    `telephone_number`,
                    `spouse_name`,
                    `spouse_contact_number`,
                    `spouse_profession`,
                    `father_name`,
                    `father_contact_number`,
                    `father_profession`,
                    `mother_name`,
                    `mother_contact_number`,
                    `mother_profession`,
                    `emergency_contact_name`,
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
                    `gender`,
                    `civil_status`,
                    `cellphone_number`,
                    `address`,
                    `ownership`,
                    `province`,
                    `city`,
                    `region`,
                    `blood_type`,
                    `height`,
                    `weight`,
                    `religion`,
                    `email_address`,
                    `telephone_number`,
                    `spouse_name`,
                    `spouse_contact_number`,
                    `spouse_profession`,
                    `father_name`,
                    `father_contact_number`,
                    `father_profession`,
                    `mother_name`,
                    `mother_contact_number`,
                    `mother_profession`,
                    `emergency_contact_name`,
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

        echo nl2br("Completed Files: " . implode(', ', $completed_files) . "\n Empty Files: " . implode(', ', $empty_files));
    }
}