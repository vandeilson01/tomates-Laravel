<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\Phone;
use App\Models\IpsModel;
use App\Models\PhoneClient;
use App\Models\TomatesModel;
use App\Models\Type;
use App\Models\TypeClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\IpsController;
use App\Models\PontosModel;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public static function ipuser(){

        $a = PontosModel::where('ip', IpsController::newip())->first();
       
        if(!isset($a)){

            PontosModel::insert([
                'keys2' => md5(time()),
                'pontos' => 0,
                'pontos2' => 0,
                'ip' => IpsController::newip(),
                'print' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NUll,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

        }
        
    }


    public static function iptomates(){

      
            TomatesModel::insert([
                'ip' => IpsController::newip(),
                'created_at' => date('Y/m/d H:i:s'),
                'quantity' => 5,
                'time' => '23:59:59',
            ]);
        
    }


    public static function ipscores(){
        $a = PontosModel::where('ip', IpsController::newip())->first();
       
        if(empty($a)){

            PontosModel::insert([
                'keys2' => md5(time()),
                'ip' => IpsController::newip(),
                'pontos' => 0,
                'pontos2' => 0,
            ]);
        }
        
    }


    public static function iptomatesuser(){

       

        if(isset(Auth::user()->id)){

            TomatesModel::where('iduser', Auth::user()->id)->update([
                'ip' => IpsController::newip(),
                'iduser' => Auth::user()->id,
                'quantity' => 100,
            ]);

            TomatesModel::where('ip',  IpsController::newip())->update([
                'ip' => IpsController::newip(),
                'iduser' => Auth::user()->id,
                'quantity' => 100,
            ]);
        }

    
        TomatesModel::where('ip',IpsController::newip())->update([
            'quantity' => 100,
        ]);
    
        
    }


    public static function userip(){

        $a = PontosModel::where('userid', Auth::user()->id)->first();
       
        if(!isset($a)){

            PontosModel::insert([
                'keys2' => md5(time()),
                'pontos' => 0,
                'pontos2' => 0,
                'ip' => IpsController::newip(),
                'userid' => Auth::user()->id,
                'print' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NUll,
                'created_at' => date('Y-m-d H:i:s'),
            ]);


            TomatesModel::where('iduser', Auth::user()->id)->update([
                'ip' => IpsController::newip(),
                'created_at' => date('Y/m/d H:i:s'),
            ]);

            IpsModel::insert([
                'user' => Auth::user()->id,
                'ip' => IpsController::newip(),
            ]);
        }
        
    }

}
