@extends('inscricao.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-10 mt-3 mb-4">
            <div class="pull-left">
                <h2>Simples CRUD</h2>
            </div>
        </div>
        <div class="col-lg-2 mt-3 mb-4">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('inscricao.create') }}">Novo Cliente</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-2">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th width="280px">Ações</th>
        </tr>
        <tr>
      
        @foreach($inscricao as $client)
        <tr>
            <td>{{ $client->nome }}</td>
            <td>{{ $client->email }}</td>
        </tr>
        @endforeach
    </table>
  
    {!! $inscricao->links() !!}
      
@endsection