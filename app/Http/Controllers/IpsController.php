<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpsModel;
use App\Models\PacotesModel;
use App\Models\TomatesModel;
use App\Http\Controllers\Tomates;

class IpsController extends Controller
{
    //
    
    public static function newip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function add($ip){

        $ips = IpsModel::where('ip', $ip)->first();
        if(empty($ips)){
            if($ip <> 0) {

                TomatesModel::insert([
                    'ip' => $ip,
                    'created_at' => date('Y/m/d H:i:s'),
                    'quantity' => 5,
                ]);
    
            }
        }

    }


    public function addnew(Request $request){

        $ips = IpsModel::where('ip',  $request->ip)->first();

        if(empty($ips) && $request->ip <> 0){


            TomatesModel::insert([
                'ip' => $request->ip,
                'created_at' => date('Y/m/d H:i:s'),
                'quantity' => 5,
            ]);

            IpsModel::insert([
                'ip' => $request->ip,
            ]);

            IpsModel::insert([
                'ip' => $request->ip,
            ]);

            IpsModel::where('ip',  $request->ip)->update([
                'keyuser' => md5(time()),
                'date' => date('Y/m/d'),
            ]);


        }

    }

    public function ip($id, $pontos2, $ips){
        
        $ip = IpsModel::where('ip', $ips)->first();

        if(!empty($ip)){

            $quanti = 5;

            Tomates::add($id, $quanti, newip());

        }

    }


    public static function equalsuser($user, $ips){
        
        $ip = IpsModel::where('ip', $ips)->first();

        if(!empty($ip)){

            IpsModel::update([
                'user' => $user
            ]);
            
        }

    }


    public static function equalsip($user, $ips){
        
        $ip = IpsModel::where('user', $user)->first();

        if(!empty($ip)){

            $ip::update([
                'ip' => $ips
            ]);
            
        }

    }
}
