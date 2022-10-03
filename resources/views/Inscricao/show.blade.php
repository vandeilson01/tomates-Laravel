@php 
    use App\Models\User;
    use App\Models\Rifas;
    use App\Models\RifaUser;
    use App\Models\Inscricao;
    use App\Models\InscricaoEndereco;
@endphp

@extends('inscricao.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ $inscricao->name }}</h1>
        <!-- <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item  active"><a href="{{ route('inscricoes') }}">Incrições</a></li>
            </ol>
        </nav> -->
    </div>

 

    <div class="row ">
        <div class="col-lg-10 margin-tb">
            <!-- <div class="pull-left">
                <h2>Vendo Incrição</h2>
            </div> -->
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('controle') }}">Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row ">
        <div class=" col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nome:</strong>
                <p class="form-control">{{ $inscricao->name }}</p>
            </div>
        </div>
        <div class="col-xs-10 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <p class="form-control">{{ $inscricao->email }}</p>
            </div>
        </div>

        <!-- <div class="col-xs-10 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Telefone:</strong>
                <p class="form-control">{{ $inscricao->telefone }}</p>
            </div>
        </div> -->
        <!-- <div class="col-xs-10 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Endereço:</strong>
            </div>

            @php 
                $endereco = InscricaoEndereco::where('id', $inscricao->endereco)->get();
            @endphp

            @foreach($endereco as $rows)
                <div class="form-group">
                    <strong>Estado:</strong>
                    <p class="form-control">{{ $rows->estado }}</p>
                </div>

                <div class="form-group">
                    <strong>Cidade:</strong>
                    <p class="form-control">{{ $rows->cidade }}</p>
                </div>

                <div class="form-group">
                    <strong>Endereço:</strong>
                    <p class="form-control">{{ $rows->endereco }}</p>
                </div>

                <div class="form-group">
                    <strong>CEP:</strong>
                    <p class="form-control">{{ $rows->cep }}</p>
                </div>

                <div class="form-group">
                    <strong>Complemento:</strong>
                    <p class="form-control">{{ $rows->complemento }}</p>
                </div>
            @endforeach
        </div> -->

            <!-- <div class="col-xs-10 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status de Pagamento:</strong>
                    <p class="form-control">{{ $inscricao->status_pagamento }}</p>
                </div>
            </div>

            <div class="col-xs-10 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Números Escolhidos:</strong>
                    <p class="form-control">{{ $inscricao->numeros_escolhidos }}</p>
                </div>
            </div>

            <div class="col-xs-10 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Arquivo de pagamento:</strong>
                    <p class="form-control"><a class="w-50" href="{{ url('uploads/pagamentos/'.$inscricao->arquivo_pagamento) }}">arquivo</a></p>
                </div>
            </div> -->

            <div class="col-xs-10 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Cadastro:</strong>
                    <p class="form-control">{{ date('d/m/Y H:i', strtotime($inscricao->created_at)) }}</p>
                </div>
            </div>
        </div>
    </div>

</main>


@endsection