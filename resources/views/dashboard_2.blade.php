@php 
    use App\Models\User;
    use App\Http\Controllers\InscricaoController;
    use App\Models\TomatesModel;
    use App\Models\IpsModel;

    use Illuminate\Support\Facades\DB;

@endphp

@extends('admin.layouts.main')

@section('content')

<main id="main" class="main">



<div class="pagetitle">
  <h1>Controle</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Ínicio</a></li>
      <li class="breadcrumb-item active">Controle</li>
    </ol>
  </nav>
</div>




<section class="section dashboard">
  <div class="row">

     
   

       <div class="col-lg-12">
      <div class="row">           
        

        
         <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Tomates</h5>

              <div class="d-flex align-items-center">
                
                <div class="ps-3">

                @php 

              
                $e = !empty(DB::table('scores')) ? 100 : 0;

                @endphp
                <h6>{{ $e }}</h6>

                </div>
              </div>
            </div>

          </div>
        </div>
        
        <div class="col-xxl-4 col-xl-6">

          <div class="card info-card customers-card">


            <div class="card-body">
              <h5 class="card-title">Jogadas em Lula</h5>

              <div class="d-flex align-items-center">
                
                <div class="ps-3">
                  @php 

                  $r = !empty(DB::table('scores')->sum('pontos2')) ? DB::table('scores')->sum('pontos2') : 0;

                  @endphp
                  <h6>{{ $r }}</h6>

                </div>
              </div>

            </div>
          </div>

        </div> 

        <div class="col-xxl-4 col-xl-6">

          <div class="card info-card customers-card">


            <div class="card-body">
              <h5 class="card-title">Jogadas em Bolsonaro</h5>

              <div class="d-flex align-items-center">
                
                <div class="ps-3">
                  @php 

                    $c = !empty(DB::table('scores')->sum('pontos')) ? DB::table('scores')->sum('pontos') : 0;

                  @endphp
                  <h6>{{ $c }}</h6>

                </div>
              </div>

            </div>
          </div>

        </div> 

        
    <div class="col-xxl-4 col-xl-6">

<div class="card">
  
  <div class="card-body">
    <h5 class="card-title">Hoje | <b class="text-primary">{{ date('d/m') }}</b></h5>

    <div class="activity">

      <div class="activity-item d-flex">
        <div class="activite-label">{{ DB::table('tomates')->where('created_at','like','%'.date('Y-m-d').'%')->count();}}</div>
        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
        <div class="activity-content">
          Tomates Hoje
        </div>
      </div>


      <div class="activity-item d-flex">
        <div class="activite-label">{{ DB::table('users')->where('created_at','like','%'.date('Y-m-d').'%')->count();}}</div>
        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
        <div class="activity-content">
          Usuários Cadastrados
        </div>
      </div>


    </div>

  </div>
</div>

</div>

        
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Cadastros(Semanal) <span> <?php echo date('d/m/Y')?></span></h5>

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
              
                      $ins = DB::table('users')->where('created_at','like', '%'.date('Y-m-').$i.'%');


                      if($ins->count() == 0){
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

                            $ins = DB::table('users')->where('created_at','like', '%'.date('Y-m-').$i.'%');
                              
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



      </div>
    </div>


  

</section>

</main>

@endsection