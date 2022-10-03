<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PontosModel;
use App\Http\Controllers\IpsController;

class Score extends Controller
{

    public function ver(Request $request){

    }

    public function insertscore(Request $request){

        $a = PontosModel::where('ip', $request->ip)->first();
       
        if(empty($a)){

            PontosModel::insert([
                'keys2' => md5(time()),
                'pontos' => 0,
                'pontos2' => 0,
                'ip' => $request->ip,
                'print' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NUll,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
        
    }

    public function tirar1(Request $request){


        $id = str_replace('/\.+$/"', "", $request->id);

        $ponto = PontosModel::where('userid', $id)->first();

        if($id <> 's' && !empty($ponto->userid)){
           

                $var = !empty($ponto->pontos2) ? ($ponto->pontos2 - $request->pontos) : 0;

                if($var <> 0){

                    PontosModel::where('userid', $id)->update([
                        'pontos' => $var,
                    ]);

                }

                return $var;
          

        }else{

            $ponto = PontosModel::where('ip', $request->ip)->first();

            
                $var = !empty($ponto->pontos2) ? ($ponto->pontos2 - $request->pontos) : 0;

                if($var <> 0){

                    PontosModel::where('ip', $request->ip)->update([
                        'pontos2' => $var,
                    ]);

                }

                return $var;
        }

    }

    public function add1(Request $request){
        
       
        $id = str_replace('/\.+$/"', "", $request->id);

        $ponto = PontosModel::where('userid', $id)->first();

        if($id <> 's' && !empty($ponto->userid)){
           
            if(!empty($ponto)){

                $var = ($ponto->pontos2 + $request->pontos);

                PontosModel::where('userid', $id)->update([
                    'pontos2' => $var,
                ]);

                return $var;

            }

          
        }else{

            $ponto = PontosModel::where('ip', $request->ip)->first();

            if(!empty($ponto)){

                $var = ($ponto->pontos2 + $request->pontos);

                PontosModel::where('ip', $request->ip)->update([
                    'pontos2' => $var,
                ]);

                return $var;

            }

          
        }
        

    }


    public function tirar2(Request $request){

        $id = str_replace('/\.+$/"', "", $request->id);

        $ponto = PontosModel::where('userid', $id)->first();

        if($id <> 's' && !empty($ponto->userid)){
        
            if(!empty($ponto)){

                $var = ($ponto->pontos - $request->pontos);

                PontosModel::where('userid', $id)->update([
                    'pontos' => $var,
                ]);

                return $var;

            }

        }else{

            $ponto = PontosModel::where('ip', $request->ip)->first();

            
            if(!empty($ponto)){

                $var = ($ponto->pontos - $request->pontos);

                PontosModel::where('ip', $request->ip)->update([
                    'pontos' => $var,
                ]);

                return $var;

            }

          
        }

    }

    public function add2(Request $request){

        $id = str_replace('/\.+$/"', "", $request->id);

        $ponto = PontosModel::where('userid', $id)->first();

        if(!empty($ponto)){

            $var = ($ponto->pontos + $request->pontos);

            PontosModel::where('userid', $id)->update([
                'pontos' => $var,
            ]);

            return $var;


        }else{

            $ponto = PontosModel::where('ip', $request->ip)->first();
            
            if(!empty($ponto)){

                $var = ($ponto->pontos + $request->pontos);

                PontosModel::where('ip', $request->ip)->update([
                    'pontos' => $var,
                ]);

                return $var;

            }

          
        }
     
    }


    public function index()
    {
        
        $pontos = PontosModel::get();
   
        return view('pontos.index', compact('pontos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pontos = PontosModel::get();
        return view('pontos.create', compact('pontos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        PontosModel::insert([
            'userid' => $request->input('userid'),
            'pontos2' => $request->input('pontos2'),
            'pontos' => $request->input('pontos'),
            'keys2' => md5(time()),
            'ip' => $request->input('ip'),
            'updated_at' => date('Y-m-d'),
        ]);

        return redirect()->route('pontos')
                        ->with('success','Cliente adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $pontos = PontosModel::where('id', $id)->first();
       
        return view('pontos.show',compact('pontos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pontos = PontosModel::where('id', $id)->first();
     
        
        return view('pontos.edit',compact('pontos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      
        PontosModel::where('id',$id)->update([
            'pontos2' => $request->input('pontos2'),
            'pontos' => $request->input('pontos'),
            'ip' => $request->input('ip'),
            'updated_at' => date('Y-m-d'),
        ]);

   
        return redirect()->route('pontos')
                        ->with('success','Cliente modificado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PontosModel::where('id', $id)->delete();
      
        return redirect()->route('pontos')
                        ->with('success','Cliente deletado com sucesso.');
    }

}
