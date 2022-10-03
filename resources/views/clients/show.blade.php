@php 

use App\Models\Inscricao;
use App\Models\InscricaoEndereco;
use App\Models\RifaUser;

@endphp
@extends('clients.layout')
   
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h2>{{ $clients->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users') }}">Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row justify-content-center">
        <div class=" col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Nome:</strong>
                <p class="form-control">{{ $clients->name }}</p>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Email:</strong>
                <p class="form-control">{{ $clients->email }}</p>
            </div>
        </div>

        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Incrições em Rifas:</strong>
                @php 
                    $rifas = Inscricao::where('email', $clients->email)->get();

                    foreach($rifas as $frow){
                        echo '<p class="form-control"><a>Rifa:'.$frow->id_rifa.'</a><br/>';
                        echo '<a>Número escolhido:'.$frow->numeros_escolhidos.'</a></p>';
                    }
                @endphp
            </div>
        </div>


       
