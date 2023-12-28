<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogs;
use App\Models\PersonalInformationTable;
use DataTables;

class QueryController extends Controller
{
    public function query(){
        $data = PersonalInformationTable::select('cellphone_number')
                                            ->groupBy('cellphone_number')
                                            ->havingRaw('COUNT(cellphone_number) > 1')
                                            ->pluck('cellphone_number');

        if ($data->isEmpty()) {
            return 'no duplicates';
        } else {
            return response()->json([
                'duplicates' => $data
            ]);
        }
    }
}
