@php 
    use App\Models\User;
@endphp

@extends('scores.layout')

@section('content')

<main id="main" class="main" >

    <div class="pagetitle">
        <h1>Editar {{ $scores->premio }}</h1>
        <!-- <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item  active"><a href="{{ route('scores') }}">scores</a></li>
            </ol>
        </nav> -->
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <!-- <div class="pull-left">
                <h2>Editar Rifa</h2>
            </div> -->
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('scores') }}">Voltar</a>
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
  
    <form action="{{ route('scores.update',$scores->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
         <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Nome</strong>
                    @php 

                        $r = !empty( $pontos->userid) ? User::where('id', $pontos->userid)->first()->name : 'Visitante';


                    @endphp
                    <input type="text" name="premio" value="{{   }}" class="form-control" class="mb-5">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Ip</strong>
                    <input type="text" name="valor" class="form-control" value="{{ $pontos->valor }}" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Pontos em Lulas</strong>
                    <br/>
                    <input type="text" name="valor" class="form-control" value="{{ $pontos->quantity }}" required>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Pontos em Bolsonaro</strong>
                    <br/>
                    <input type="text" name="valor" class="form-control" value="{{ $pontos->ip }}" required>
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
        var new_input="<input type='file' class='form-control mt-2' name='number["+new_chq_no+"]' id='number' data-id='new_"+new_chq_no+"'>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no)
    }
    function remove(){
        var last_chq_no = $('#total_chq').val();
        if(last_chq_no>1){
            $('#number').attr('data-id','new_'+last_chq_no).remove();
            $('#total_chq').val(last_chq_no-1);
        }
    }
</script>

</main>
@endsection