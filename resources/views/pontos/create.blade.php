@php 
    use App\Models\User;
@endphp

@extends('rifas.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Nova Rifa</h1>
        <!-- <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item  active"><a href="{{ route('rifas') }}">Rifas</a></li>
            </ol>
        </nav> -->
    </div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- <div class="pull-left">
            <h2>Nova Rifas</h2>
        </div> -->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('rifas') }}">Voltar</a>
        </div>
    </div>
</div>
   
@if($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!</strong> Ocorreram alguns problemas com sua entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('rifa.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
  
    <div class="row">
         <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Prêmio:</strong>
                    <input type="text" name="premio" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Valor:</strong>
                    <input type="text" name="valor" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Banner:</strong>
                    <input type="file" name="banner" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Imagens(s):</strong>

                    <input type="file" class="form-control mt-3"  name="images[]" id="number" multiple>

                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Link Youtube:</strong>
                    <input type="text" name="link_youtube" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Data do sorteio:</strong>
                    <input type="date" name="data_sorteio" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Status:</strong>
                    <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected>Selecione</option>
                            <option value="ativa">Ativa</option>
                            <option value="fechado">Fechado</option>
                            <option value="concluida">Concluída</option>
                        </select>
                    </div>
            </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Vencedor:</strong>
                    <input type="text" name="vencedor" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Link da Rifa:</strong>
                    <input type="text" name="link_rifa" class="form-control" required>
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6  mt-3 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
   
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function add(){
    var new_chq_no = parseInt($('#total_chq').val())+1;
    var new_input="<input type='file' class='form-control mt-2' name='number["+new_chq_no+"]'  placeholder='(DDD) 9 1234-5678' id='new_"+new_chq_no+"'>";
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

