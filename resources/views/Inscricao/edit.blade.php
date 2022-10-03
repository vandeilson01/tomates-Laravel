@php 
    use App\Models\User;
    use App\Models\Rifas;
    use App\Models\RifaUser;
    use App\Models\InscricaoEndereco;
@endphp

@extends('inscricao.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Editar {{$inscricao->name}}</h1>
    </div>

    <div class="row ">
        <div class="col-lg-10 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('controle') }}">Voltar</a>
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
  
    <form action="{{ route('inscricao.update',$inscricao->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="name" value="{{ $inscricao->name }}" class="form-control"  required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" value="{{ $inscricao->email }}" required>
                </div>
            </div>
        

            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Cadastro</strong><br/>
                    <i>{{ date('d/m/Y', strtotime($inscricao->created_at)) }}</i>
                </div>
            </div>

            <input type="hidden" name="updated_at" value="{{ date('Y-m-d') }}" required>

            <div class="col-xs-6 col-sm-6 col-md-6  mt-3 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
   
    </form>

</main>
@endsection