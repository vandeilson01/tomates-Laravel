@php 
    use App\Models\User;
    use App\Models\Rifas;
    use App\Http\Controllers\RifasController;
    use App\Models\RifaUser;
    use App\Models\Inscricao;
    use App\Models\ImagensRifa;
@endphp

@extends('admin.layouts.main')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Notificação</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Notificação</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
     
      @if(Auth::user()->hasRole('user'))                 
        
         <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">

            <div class="card-body">

            @if(isset(Auth::user()->unreadNotifications))
                @foreach(Auth::user()->unreadNotifications as $notification)
                  <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                    <strong>{{ $notification->data['mensagem'] }}</strong>
                    <button type="button" class="btn-close btn-close-white text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endforeach
            @endif

          </div>
        </div><!-- End Sales Card -->

     
      @endif

      @if(Auth::user()->hasRole('admin'))

      <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">

            <div class="card-body">

            <a href="#" id="mark-all" class="btn bg-secondary text-light mt-2 mb-3 ">Marcar Todas</a>

            @if(isset(Auth::user()->unreadNotifications))
                @foreach(Auth::user()->unreadNotifications as $notification)
                  <div class="alert alert-dark bg-dark text-light border-0 alert-dismissible fade show" role="alert">

                    
                    <strong>{{ $notification->data['mensagem'] }} | 
                      @if(isset($notification->data['rifas']))
                       {{ Rifas::where('id', $notification->data['rifas']['id'])->first()->premio }}
                      @endif

                      @if(isset($notification->data['user']))
                       {{ User::where('id', $notification->data['user']['id'])->first()->name }}
                      @endif

                      @if(isset($notification->data['inscricao']))
                       {{ Inscricao::where('id', $notification->data['inscricao']['id'])->first()->nome }}
                      @endif
                    </strong>
                    
                    <a href="#" class="btn-close btn-close-light text-light mark-as-read" data-id="{{ $notification->id }}" data-bs-dismiss="alert" aria-label="Close">X</a>
                   
                  </div>
                @endforeach
            @endif

            
            </div>

          </div>
        </div><!-- End Sales Card -->

    </div><!-- End Right side columns -->

  </div>

  @endif
</section>

</main><!-- End #main -->

@endsection