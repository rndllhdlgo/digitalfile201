<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use DB;

class CharacterController extends Controller
{
    public function charactersView(){
        return view('charts.characters');
    }
    public function charactersSave(Request $request){
        $character = new Character;
        $character->character_name = $request->character_name;
        $save = $character->save();

        if($save){
            return 'true';
        }
        else{
            return 'false';
        }
    }
    public function charactersData(){
    
        if(DB::table('characters')->where('id',1)->exists()){//check if any data from table
            $data = Character::select(DB::raw('COUNT(*) as total_characters, character_name'))
            ->groupBy('character_name')->get();

            foreach($data->toArray() as $row){
                $output[] = array(
                    'character_name' => $row['character_name'],
                    'total_characters' => $row['total_characters']
                );
            }
            echo json_encode($output);
        }
    }
}
