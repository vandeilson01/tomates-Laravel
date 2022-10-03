@php 
    use App\Models\Rifas;
    use App\Models\User;
    use App\Http\Controllers\RifasController;
    use App\Http\Controllers\InscricaoController;
    use App\Models\RifaUser;
    use App\Models\Inscricao;
    use App\Models\ImagensRifa;

    use Illuminate\Support\Facades\DB;
@endphp

@extends('admin.layouts.main')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Rifas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Rifas</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

      <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Rifas <span></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ Inscricao::where('email','<>', Auth::user()->email)->count() }}</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->


       


           <!-- Recent Sales -->
           <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title"> Seu histórico de Rifas <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Prêmio</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Seus números</th>
                    <th scope="col">Vencedor</th>
                    <th scope="col">Data do sorteio</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>

                @foreach(Rifas::get() as $row)
                  <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->valor }}</td>
                    <td>@php  
                      foreach(Inscricao::where('email', Auth::user()->email)->where('id_rifa', $row->id)->get() as $krow){
                          echo $krow->id.' |';
                      } 
                    @endphp</td>
                    <td>{{ $row->vencedor }}</td>
                    <td>{{ $row->data_sorteio }}</td>
                    <td><span class="badge bg-warning">{{ $row->status }}</span></td>
                  </tr>
                @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->
        </div>
    </div>

  </div>
</section>

</main><!-- End #main -->

@endsection