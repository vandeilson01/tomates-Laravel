<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RifasController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\ObterController;
use App\Http\Controllers\Pix;
use App\Http\Controllers\Score;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Pagamentos;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
 
    Route::get('/pontos', function () {
        return view('pontos');
    })->name('pontos');

    Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/controle', function () {
        return view('dashboard_2');
    })->name('controle');
 
    Route::resources(['score' => Score::class]);

    Route::get('/controle', function () {
        return view('dashboard_2');
    })->name('controle');

    Route::get('/meus_pontos', function () {
        return view('meus_pontos');
    })->name('meus_pontos');
    
    
});

Route::post('tomates/{form}', function($form){
  
    return App::call('App\Http\Controllers\Tomates@'.ucfirst($form));
        
});

Route::post('ips/{form}', function($form){
  
    return App::call('App\Http\Controllers\IpsController@'.ucfirst($form));
        
});

Route::post('pontos/{form}', function($form){
  
    return App::call('App\Http\Controllers\Score@'.ucfirst($form));
        
});

Route::post('pay/{form}', function($form){
  
    return App::call('App\Http\Controllers\Pagamentos@'.ucfirst($form));
        
});

Route::get('/api', function () {
    return view('api');
})->name('api');


Route::post('logisn/{form}', function($form){
  
    return App::call('App\Http\Controllers\LoginController@'.ucfirst($form));
        
});

Route::get('logis/{form}', function($form){
  
    return App::call('App\Http\Controllers\LoginController@'.ucfirst($form));
        
});
