@php 
    use App\Models\User;
    use App\Models\Inscricao;
@endphp

@extends('admin.layouts.main')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Incrições</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Incrições</li>
    </ol>
  </nav>
</div>

<section class="section dashboard">
  <div class="row">

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="col-lg-8">
      <div class="row">

        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Incrições <span></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ Inscricao::count() }}</h6>
                  <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                </div>
              </div>

            </div>
          </div>

        </div>

        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Incrições | Semana</h5>

              <div id="reportsChart"></div>

              @php

                $segunda = date('d', strtotime('monday this week'));
                $domingo = date('d', strtotime('sunday this week'));


                  $semana = array(
                    'Mon' => 'segunda-feira',
                    'Tue' => 'terca-feira',
                    'Wed' => 'quarta-feira',
                    'Thu' => 'quinta-feira',
                    'Fri' => 'sexta-feira',
                    'Sat' => 'sabado',
                    'Sun' => 'domingo', 
                );




                @endphp

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Inscrição',
                        data: [
                      @php

                      for($i=$segunda;$i<$domingo;$i++){

                        $ins = Inscricao::where('created_at','like', '%'.date('Y-m-').$i.'%');


                        if($ins->count() == 0){
                            // echo '';
                            echo '0,';
                        }else{

                            echo $ins->count().',';

                        }
                        
                      }


                      @endphp ],
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'text',
                        categories: [
                          @php 
                            for($i=$segunda;$i<$domingo;$i++){

                              $ins = Inscricao::where('created_at','like', '%'.date('Y-m-').$i.'%');
                                
                              $dia = date('Y-m-'.$i);

                              echo '"'.$semana[date('D', strtotime($dia))].'", ';

                            }
                          
                          @endphp 
                        ]
                      },
                      tooltip: {
                      
                      }
                    }).render();
                  });
                </script>

            </div>

          </div>
        </div>

        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Inscrições<span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                 
                @foreach(Inscricao::get() as $row)
                  <tr>
                    <th scope="row"><a href="#">{{ $row->id}}</a></th>
                    <td>{{ $row->nome }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                    <td>
                        <form id="del-insc{{ $row->id }}" action="{{ route('inscricao.destroy',$row->id) }}" method="POST">
        
                            <a class="btn btn-info" href="{{ route('inscricao.show',$row->id) }}"><i class="bi bi-check-circle"></i></a>
            
                            <a class="btn btn-primary" href="{{ route('inscricao.edit',$row->id) }}"><i class="bi bi-exclamation-octagon"></i></a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="button" data-id="del-insc{{ $row->id }}" class="but-del btn text-light bg-danger"><i class="bi bi-exclamation-triangle"></i></button>
                        </form>
           
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End Left side columns -->

    <div class="col-lg-4">

      <!-- Budget Report -->
      <div class="card">

        <div class="card-body pb-0">
            <a class="btn btn-info" href="{{ route('inscricao.create',$row->id) }}">Adicionar novo</a>
        </div>
      </div><!-- End Budget Report -->


    </div>

  </div>
</section>

</main>

@endsection