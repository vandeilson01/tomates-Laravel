<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TomatesModel;
use App\Models\PrintsModel;


class Tomates extends Controller
{
    //


    public function inserttime(Request $request){

        $newtime = str_replace('/\.+$/"', "", $request->timer);

        $db = TomatesModel::where('ip', $request->ip)->first();
        
        if(!empty($db)){
            
            $newtime = '23:59:59';

            $newuptime = date('Y/m/d H:i:s');

            TomatesModel::where('ip','<>', 'o')->update([
                'time' => '23:59:59',
                'updated_at' => $newuptime,
                'quantity' => $db->quantity + 1,
            ]);

            return $time;


        }
       

    }

    public function pontos($iduser, $ip){

        TomatesModel::where('id', $iduser)->orWhere('ip', $ip)->count();

    }

    public function tirar(Request $request){

        $id = str_replace('/\.+$/"', "", $request->id);

        $tom = TomatesModel::where('iduser', $id)->first();

        if($id <> 's' && !empty($tom->iduser)){

            if(!empty($tom)){

                $var = ($tom->quantity - $request->tomate);
                
                TomatesModel::where('iduser', $id)->update([
                    'quantity' => $var,
                ]);

            }

            return $var;

        }else{

            $tom = TomatesModel::where('ip', $request->ip)->first();

            $var = $tom->quantity - $request->tomate;

            if(!empty($tom)){
                
                TomatesModel::where('ip', $request->ip)->update([
                    'quantity' => $var,
                ]);

            }

            return $var;
        }

    }

    public function add(Request $request){

        $id = str_replace('/\.+$/"', "", $request->id);
        
        $tomato = TomatesModel::where('iduser', $id)->first();
        $get = TomatesModel::where('iduser', $id)->get();
    
        if(!empty($tomato)){

            foreach($get as $row) {
                $var =  ($row->quantity + $request->tomates);

                TomatesModel::where('iduser', $row->id)->update([
                    'quantity' => $var,
                ]);
            }
          
        }

    }

    public function time($id, $time, $ip){
        

        $id = str_replace('/\.+$/"', "", $request->id);

        $tom = TomatesModel::where('iduser', $id)->first();

        if($id <> 's' && !empty($tom)){

            $var = ($tom->quantity + $time);


            if($var <> 0){

                TomatesModel::where('iduser', $id)->update([
                    'quantity' => $var,
                ]);

            }

            $quanti = 1;

            return $var;
          

        }else{

            $tom = TomatesModel::where('ip', $request->ip)->first();

            $var = ($time->time + $time) ;

            if($var <> 0){

                TomatesModel::where('ip', $request->ip)->update([
                    'quantity' => $var,
                ]);

            }

            $quanti = 1;

            return $var;
        }

    }

    
}
