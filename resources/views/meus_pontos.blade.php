@php 
    use App\Models\User;
    //use App\Models\PacotesModel;
    use App\Models\PixModel;
    use App\Models\PacotesModel;
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
  <h1>Pagamentos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Ínicio</a></li>
      <li class="breadcrumb-item active">Pagamentos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Pagamentos <span></span></h5>

              <div class="d-flex align-items-center">
                <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div> -->
                <div class="ps-3">
                  <h6>{{ PixModel::where('iduser',  Auth::user()->id)->count() }}</h6>
                  <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                </div>
              </div>

            </div>
          </div>

        </div>


        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Pix Feitos<span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                 
                @foreach(PixModel::where('iduser',  Auth::user()->id)->where('iduser',  Auth::user()->id)->get() as $row)
                  <tr>@php 
                  $m  = User::where('id', $row->iduser)->first()->name;
                  $name = !empty($row->iduser) ? $m : 'Visitante'
                  @endphp
                    <th scope="row"><a href="#">{{ $row->id}}</a></th>
                    <td>{{ $name }}</td>
                    <td>{{ $row->ip }}</td>
                    <td>{{ $row->quamtity }}</td>
                    <td>
                    <td>
                        <form id="del-user{{ $row->id }}" action="{{ route('pix.destroy',$row->id) }}" method="POST">
        
                            <a class="btn btn-info" href="{{ route('pix.show',$row->id) }}"><i class="bi bi-check-circle"></i></a>
            
                           {{-- <a class="btn btn-primary" href="{{ route('pix.edit',$row->id) }}"><i class="bi bi-exclamation-octagon"></i></a>--}}
        
                            @csrf
                            @method('DELETE')
            
                            {{-- <button type="button" data-id="del-user{{ $row->id }}" class="but-del btn text-light bg-danger"><i class="bi bi-exclamation-triangle"></i></button> --}}
                        </form>
           
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>

</main><!-- End #main -->

@endsection