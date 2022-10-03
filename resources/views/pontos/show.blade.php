@php 
    use App\Models\User;
@endphp

@extends('pontos.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
    @php 

        $r = !empty( $pontos->userid) ? User::where('id', $pontos->userid)->first()->name : 'Visitante';


    @endphp
        <h1>{{ $r }}</h1>
      
    </div>

    <section class="section dashboard">
        <div class="row ">
            <div class="col-lg-10 margin-tb">
                <!-- <div class="pull-left">
                    <h2>Vendo pontos</h2>
                </div> -->
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('pagamentos') }}">Voltar</a>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Nome</strong>
                    <input type="text" name="premio" value="{{ $r }}" class="form-control" class="mb-5">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Ip</strong>
                    <input type="text" name="valor" class="form-control" value="{{ $pontos->ip }}" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Pontos em Lula</strong>
                    <br/>
                    <input type="text" name="valor" class="form-control" value="{{ $pontos->pontos2 }}" required>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Pontos em Bolsonaro</strong>
                    <br/>
                    <input type="text" name="valor" class="form-control" value="{{ $pontos->pontos }}" required>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6  mt-3">
                <div class="form-group">
                    <strong>Primeiro Acesso</strong>
                    <br/>
                    <input type="text" name="valor" class="form-control" value="{{ date('d/m/Y', strtotime($pontos->created_at)) }}" required>
                </div>
            </div>

        </div>
    </section>

</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    function add(){
        var new_chq_no = parseInt($('#total_chq').val())+1;
        var new_input="<input type='file' class='form-control mt-2' name='number["+new_chq_no+"]'  placeholder='(DDD) 9 1234-5678' id='number' data-id='new_"+new_chq_no+"'>";
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

@endsection