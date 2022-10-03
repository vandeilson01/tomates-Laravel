@php 
    use App\Models\User;
    use App\Models\TomatesModel;
    use App\Models\PontosModel;
@endphp

@extends('admin.layouts.main')

@section('content')

<main id="main" class="main">

@if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Pontos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Pontos <span></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ PontosModel::count() }}</h6>

                </div>
              </div>

            </div>
          </div>

        </div> -->

  

        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Pontos<span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  @php
                    $name = !empty($row->userid) ? PontosModel::where('id', $row->userid)->first()->name : 'Visitante'
                  @endphp
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Lula</th>
                    <th scope="col">Bolsonaro</th>
                  </tr>
                </thead>
                <tbody>
                 
                @foreach(PontosModel::get() as $row)
                  <tr>
                    <th scope="row">{{ $row->id}}</th>
                    <td>{{ $name }}</td>
                    <td>{{ $row->ip }}</td>
                    <td>{{ $row->pontos2 }}</td>
                    <td>{{ $row->pontos }}</td>
                    
                  </tr>
                @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div>

      </div>
    </div>

    {{-- <div class="col-lg-4">
      <div class="card">
        <div class="card-body pb-0">
            <a class="btn btn-info" href="{{ route('score.create',$row->id) }}">Adicionar novo</a>
        </div>
      </div>
    </div> --}}

  </div>
</section>

</main><!-- End #main -->

@endsection