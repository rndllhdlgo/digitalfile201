<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Benefits;
use App\Models\Children;
use App\Models\College;
use DataTables;
class BackUpController extends Controller
{
    public function backup(){
        $data_benefits = Benefits::all();
        if(!$data_benefits->isEmpty()){
            $sql_benefits = '';
            foreach($data_benefits as $data_benefit){
                $sql_benefits .= "REPLACE INTO `benefits`
                (
                    `id`,
                    `employee_id`,
                    `employee_insurance`,
                    `created_at`,
                    `updated_at`
                )
                VALUES
                (
                    '$data_benefit->id',
                    '$data_benefit->employee_id',
                    '$data_benefit->employee_insurance',
                    '$data_benefit->created_at',
                    '$data_benefit->updated_at'
                );\n";
            }
            $benefits = Storage::disk('public')->put('backup/benefits.sql', $sql_benefits);
        }

        $data_children = Children::all();
        if(!$data_children->isEmpty()){
            $sql_children = '';
            foreach($data_children as $data_child){
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
                    '$data_child->id',
                    '$data_child->employee_id',
                    '$data_child->child_name',
                    '$data_child->child_birthday',
                    '$data_child->child_gender',
                    '$data_child->created_at',
                    '$data_child->updated_at'
                );\n";
            }
            $children = Storage::disk('public')->put('backup/children.sql', $sql_children);
        }
    }
}
