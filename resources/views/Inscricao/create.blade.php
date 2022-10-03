@php 
    use App\Models\User;
@endphp

@extends('inscricao.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Nova inscrição</h1>
        <!-- <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item  active"><a href="{{ route('inscricoes') }}">Inscrições</a></li>
            </ol>
        </nav> -->
    </div>
    
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('inscricoes') }}">Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!</strong> Ocorreram alguns problemas com sua entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('inscricao.store') }}" class="mb-5" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome"  class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control"  placeholder="exemplo@email.com" required>
                </div>
            </div>
            <!-- <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Rifas:</strong>
                    <input type="text" name="rifas" class="form-control"  placeholder="exemplo@email.com" required>
                </div>
            </div> -->
            <!-- <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Telefone:</strong>
                    <input type="tel" name="telefone" class="form-control"  placeholder="(DDD) 9 0000-0000" required>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
                <strong>Endereço:</strong>
            </div>

            <div class="form-group">
                <strong>Estado:</strong>
                    <input name="estado" type="text" class="form-control">
            </div>

            <div class="form-group">
                <strong>Cidade:</strong>
                    <input name="cidade" type="text" class="form-control">
            </div>

            <div class="form-group">
                <strong>Endereço:</strong>
                    <input name="endereco" type="text" class="form-control">
            </div>

            <div class="form-group">
                <strong>CEP:</strong>
                    <input name="cep" type="text" class="form-control">
            </div>

            <div class="form-group">
                <strong>Complemento:</strong>
                    <input name="complemento" type="text" class="form-control">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
            <div class="form-group">
                <strong>Status de Pagamento:</strong>

                <select class="form-select" name="status_pagamento" aria-label="Default select example">
                    <option selected>Selecione</option>
                    <option value="aguadando">Aguardando</option>
                    <option value="confirmacao">Confirmação</option>
                    <option value="negado">Negado</option>
                </select>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
            <div class="form-group">
                <strong>Números Escolhidos:</strong>
                <input type="text" name="numeros_escolhidos" class="form-control" required>
            </div>
        </div>


        <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
            <div class="form-group">
                <strong>Arquivo de pagamento:</strong>
                <input type="file" name="arquivo_pagamento" class="form-control" >
            </div>
        </div> -->

<!-- 
        <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
            <div class="form-group">
                <strong>Cadastro:</strong>
                <input type="date" name="created_at" class="form-control" required>
            </div>
        </div> -->


            <div class="col-xs-6 col-sm-6 col-md-6  mt-3 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
   
   
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function add(){
    var new_chq_no = parseInt($('#total_chq').val())+1;
    var new_input="<input type='text' class='form-control mt-2' name='number["+new_chq_no+"]'  placeholder='(DDD) 9 1234-5678' id='new_"+new_chq_no+"'>";
    $('#new_chq').append(new_input);
    $('#total_chq').val(new_chq_no)
    }
    function remove(){
    var last_chq_no = $('#total_chq').val();
    if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
    }
    }
</script>
</main>
@endsection