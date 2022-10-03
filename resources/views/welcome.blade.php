@php 
    use App\Http\Controllers\IpsController;
    use App\Http\Controllers\Score;
    use App\Http\Controllers\Tomates;
    use App\Http\Controllers\Role;
    use Illuminate\Support\Facades\DB;
   
    $user = 's';

    if(Auth::user()){
        $user = Auth::user()->id;
    }
    
    $ip = IpsController::newip();


    Role::ipuser();
    Role::iptomates();
    Role::iptomatesuser();
    Role::ipscores();

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tomates</title>
        <link href="tomato.svg" rel="icon">
        <link href="tomato.svg" rel="apple-touch-icon">


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <base target="_blank" /><link rel="stylesheet" href="css/style.css">
        <style>

            body{
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
                

            body {
                font-family: 'Nunito', sans-serif;
            }

            #staticBackdropLabel{
                text-transform: uppercase;
                font-weight: 700;
            }

            #exTab1 .tab-content {
            color : white;
            padding : 5px 15px;
            }

            #exTab2 h3 {
            color : white;
            padding : 5px 15px;
            }


            #exTab1 .nav-pills > li > a {
            border-radius: 0;
            }


            #exTab3 .nav-pills > li > a {
            border-radius: 4px 4px 0 0 ;
            }

            #exTab3 .tab-content {
            color : white;
            background-color: #428bca;
            padding : 5px 15px;
            }

            .bi{
                font-size: 40px;
            }

            
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    </head>
    <body>
        
            <section id="wrapper">
        <div id="title">
        </div>
        <div id="info-screen" class="hidden">
            <div id="info-shade"></div>
            <div id="info-text"></div>
        </div>
        
        <div id="touch-layer"></div>
        <div id="particles"></div>
        <div class="from-to-values"></div>
        <div id="ring-screen">
            <div id="ring">
            <div id="ring-active">
                <div id="ring-fill"></div>
            </div>
            </div>
        </div>

        <div id="points">
            <div id="point">
                <?php 

                if($user <> 's'){
                    $db = DB::table('scores');
                    $quantity3 = !empty($db->sum('pontos')) ? $db->sum('pontos') : 0;

                    echo $quantity3;
                }else{
                    $db = DB::table('scores');
                    $quantity3 = !empty($db->sum('pontos')) ? $db->sum('pontos') : 0;

                    echo $quantity3;
                }
              
                 ?>
            </div>
            <div id="point2">
                <?php 
                   if($user <> 's'){
                    $db = DB::table('scores');
                    $quantity2 = !empty($db->sum('pontos2')) ? $db->sum('pontos2') : 0;

                    echo $quantity2;
                }else{
                    $db = DB::table('scores');
                    $quantity2 = !empty($db->sum('pontos2')) ? $db->sum('pontos2') : 0;

                    echo $quantity2;
                }
              
                 ?>
            </div>
        </div>

        
        <div id="screen" class="gradient-background">
            
            <div id="target-container">
            <div id="target"></div>
            <div id="target2"></div>
            </div>
        
            
            <div class="timer" style="display: flex">
            <a style="font-size: 20px;"> Recarregue a página para mais tomates!</a>
               

        </div>
            </div>
            <div id="ball"></div>
            <div class="balltwo"></div>
            
            <div id="output"></div>
            <div class="size"><span class="pt-1 mt-5"><strong>
                <?php 

                if($user == 's'){

                    $db = DB::table('tomates')->where('ip', $ip)->first();
                    $quantity = !empty($db) ? $db->quantity : 0;

                    echo $quantity;
                    
                }else{

                    $db = DB::table('tomates')->where('iduser', $user)->first();
                    $quantity = !empty($db) ? $db->quantity : 0;

                    echo $quantity;
                }
              
                 ?>
            </strong>x</span></div>
            
        </div>

        <div class="back"></div>
        <!-- captura -->
        <div id="capture-screen" class="gradient-background hidden">
            <div id="capture-status" class="hidden">
            </div>
            <div id="poof-container" class="hidden">
            <div id="poof"></div>
            </div>
            <div id="capture-confetti"></div>
            <div id="capture-ball"></div>
            <div id="capture-ball-button-container" class="hidden">
            <div id="capture-ball-button"></div>
            </div>
        </div>

       

        <div class="compar">
            <ul>
                @php 
                if($user == 's') {
                echo '<li>
                        <a>
                            <button type="button" class="border-0  rounded-0 btn btn-danger login">
                                <i class="bi bi-person-circle"></i>
                            </button>
                        </a>
                    </li>';
                }else{
                    echo '<li>
                            <a class="dropdown">
                                

                                <div class="dropdown">
                                    <a style="width: 70px;height: 70px;" class="border-0 overflow text-center rounded-0 btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- <i style="font-size: 20px;" class="bi bi-person-circle"></i> -->
                                            '.Auth::user()->name.'
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="/controle">Controle</a></li>
                                        <li><a class="dropdown-item sair">Sair</a></li>
                                    </ul>
                                </div>
                            </a>
                        </li>';

                }
                @endphp
                
            </ul>
        </div>

        </section>

        <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Acesse e Jogue mais</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="exTab1" class="container">	
                        <ul  class="nav nav-pills list-group">
                            <li class="list-group-item list-group-item-action active">
                                <a class=" p-2 text-dark" style="font-weight: 700; " href="#40a" data-toggle="tab">Entrar</a>
                            </li>
                            <li>
                                <a class="list-group-item list-group-item-action p-2 text-dark" style="font-weight: 700; " href="#5a" data-toggle="tab">Criar Login </a>
                            </li>
                            
                        </ul>

                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="40a">
                                
                                
                                <form>
                                    <div class="data text-danger mt-3 mt-1"></div>

                                    <div class="form-group  mt-4">
                                        <label class="text-dark mb-1" for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" name="emails" id="emails" aria-describedby="emailHelp" placeholder="Enter email">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group  mt-4">
                                        <label class="text-dark mb-1" for="exampleInputPassword1">Senha</label>
                                        <input type="password" class="form-control" name="passwords" id="passwords" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> -->
                                    <div class="flex items-center justify-end mt-4">
                                    <!-- 
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkedlogin">
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                           Aceitar <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('termos') }}">
                                            Termos e política
                                        </a>
                                        </label>
                                    </div> -->
                                        
                                       
                                    </div>
                                    <button type="button" class="btn btn-primary but mt-4 ">Entrar</button>
                                </form>

                            </div>
                            <div class="tab-pane" id="5a">
                          
          
                                <form>
                                    <div class="data-a text-danger mt-3 mt-1"></div>
                                    <div class="form-group mt-4">
                                        <label class="text-dark" for="namew">Nome</label>
                                        <input id="namew" class="form-control block mt-1 w-full" type="text" name="namew" :value="old('name')" required autofocus autocomplete="name" />
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="text-dark" for="emailw">Email</label>
                                        <input id="emailw" class="form-control block mt-1 w-full" type="email" name="emailw" :value="old('email')" required />
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="text-dark" for="passwordw">Senha</label>
                                        <input id="passwordw" class="form-control block mt-1 w-full" type="password" name="passwordw" required autocomplete="new-password" />
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="text-dark" for="password_confirmationw">Confirmar Senha</label>
                                        <input id="password_confirmationw" class="form-control block mt-1 w-full" type="password" name="password_confirmationw" required autocomplete="new-password" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">

                                       
                                    </div>

                                    <div class="flex items-center justify-end mt-4">

                                    
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#40a" data-toggle="tab">
                                            Tem um Login?
                                        </a>

                                        <button type="button" class="btn btn-primary but-a ml-4">
                                            Registrar
                                        </button>
                                    </div>
                                </form>
    


                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-secondary text-light" data-bs-dismiss="modal">Sair</button>
                </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.js"></script>
        <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/374756/zingtouch.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js" integrity="sha512-OqcrADJLG261FZjar4Z6c4CfLqd861A3yPNMb+vRQ2JwzFT49WT4lozrh3bcKxHxtDTgNiqgYbEUStzvZQRfgQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js" integrity="sha512-5XAS7mhslf6oGjLxzmY4iYfFwDGf8G1ZBeWdymR/+y8ZCvPWwI3Ff+WrS+kabqYdIEwYaLEnJhsuymZxgrneQg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <input type="hidden" value id="p">

        <script>


            $('.login').on('click', function() {
                $('#modalLogin').modal('show');
            });

            $('.sair').on('click', function() {
                window.location.href = '/logis/logout';
            });

             $('.but').on('click', function() {
            
                $.ajax({
                    type: 'POST',
                    url: 'logisn/authenticate',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: $('#emails').val(),
                        password: $('#passwords').val(),
                    },
                    success: function(data){
                        if(data == 'location'){
                            location.reload(true);
                        }else{
                            $('.data').text(data);
                        }
                    
                    }
                });

            });

            $('.but-a').on('click', function() {
            
                $.ajax({
                    type: 'POST',
                    url: 'logisn/register',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        names: $('#namew').val(),
                        email: $('#emailw').val(),
                        password: $('#passwordw').val(),
                        password_confirmation: $('#password_confirmationw').val(),
                    },
                    success: function(data){
                        if(data == 'location'){
                            location.reload(true);
                        }else{
                            $('.data-a').text(data);
                        }
                    }
                });
            
        });


            var Screen = {
                height: window.innerHeight,
                width: window.innerWidth
            };
            var MAX_VELOCITY = Screen.height * 0.009;
            var Resources = {
                pokeball: '../tomato.png',
                pokeballActive: '../tomato.png',
                pokeballClosed: '../tomato.png'
            };

            var numberOfParticules = 30;
            var colors = ['#e0101e', '#e0101e', '#a18586', '#e0101e'];


            var Ball = {
                id: 'ball',
                size: 110,
                x: 0,
                y: 0,
                inMotion: false,
                moveBall: function(x, y) {
                    Ball.x = x;
                    Ball.y = y;
                    var BallElement = document.getElementById(Ball.id);
                    BallElement.style.top = Ball.y + 'px';
                    BallElement.style.left = Ball.x + 'px';
                },
                getElement() {
                    return document.getElementById(Ball.id);
                },
                resetBall: function() {
                    Ball.moveBall(Screen.width / 2 - (Ball.size / 2), Screen.height - (Ball.size + 10));
                    var BallElement = document.getElementById(Ball.id);
                    BallElement.style.transform = "";
                    BallElement.style.width = BallElement.style.height = Ball.size + 'px';
                    BallElement.style.backgroundImage = "url('../tomato.png')";
                    Ball.inMotion = false;
                    
                },
                savePosition: function() {
                    var ballEle = document.getElementById('ball');
                    var ballRect = ballEle.getBoundingClientRect();
                    ballEle.style.transform = "";
                    ballEle.style.top = ballRect.top + 'px';
                    ballEle.style.left = ballRect.left + 'px';
                    ballEle.style.height = ballEle.style.width = ballRect.width + 'px';
                
                }
            };


            resetState();

            window.onresize = function() {
                Screen.height = window.innerHeight;
                Screen.width = window.innerWidth;
                MAX_VELOCITY = Screen.height * 0.009;
                resetState();
            }


            var touchElement = document.getElementById('touch-layer');
            var touchRegion = new ZingTouch.Region(touchElement);
            var CustomSwipe = new ZingTouch.Swipe({
                escapeVelocity: 0.1
            })

            var CustomPan = new ZingTouch.Pan();
            var endPan = CustomPan.end;
            CustomPan.end = function(inputs) {
                setTimeout(function() {
                    if (Ball.inMotion === false) {
                        Ball.resetBall();
                    }
                }, 100);
                return endPan.call(this, inputs);
            }

            touchRegion.bind(touchElement, CustomPan, function(e) {
                Ball.moveBall(e.detail.events[0].x - Ball.size / 2, e.detail.events[0].y - Ball.size / 2);
            });

            touchRegion.bind(touchElement, CustomSwipe, function(e) {
                Ball.inMotion = true;
                var screenEle = document.getElementById('screen');
                var screenPos = screenEle.getBoundingClientRect();
                var angle = e.detail.data[0].currentDirection;
                var rawVelocity = velocity = e.detail.data[0].velocity;
                velocity = (velocity > MAX_VELOCITY) ? MAX_VELOCITY : velocity;

                var scalePercent = Math.log(velocity + 1) / Math.log(MAX_VELOCITY + 1);
                var destinationY = (Screen.height - (Screen.height * scalePercent)) + screenPos.top;
                var movementY = destinationY - e.detail.events[0].y;

                var translateYValue = -0.75 * Screen.height * scalePercent;
                var translateXValue = 1 * (90 - angle) * -(translateYValue / 100);

                anime.remove('#ring-fill');

                anime({
                        targets: ['#ball'],
                        translateX: {
                            duration: 300,
                            value: translateXValue,
                            easing: 'easeOutSine'
                        },
                        translateY: {
                            value: movementY * 1.25 + 'px',
                            duration: 300,
                            easing: 'easeOutSine'
                        },
                        scale: {
                            value: 1 - (0.5 * scalePercent),
                            easing: 'easeInSine',
                            duration: 300
                        },
                        complete: function() {
                            if (movementY < 0) {
                                throwBall(movementY, translateXValue, scalePercent);
                            } else {
                                setTimeout(resetState, 400);
                            }
                        }
                    })
                    //End
            });

            function throwBall(movementY,translateXValue, scalePercent){
                Ball.savePosition();
                anime({
                    targets: ['#ball'],
                    translateY: {
                        value: movementY * -0.5 + 'px',
                        duration: 400,
                        easing: 'easeInOutSine'
                    },
                    translateX: {
                        value: -translateXValue * 0.25,
                        duration: 400,
                        easing: 'linear'
                    },
                    scale: {
                        value: 1 - (0.25 * scalePercent),
                        easing: 'easeInSine',
                        duration: 400
                    },
                    complete: determineThrowResult
                })
            }

            function determineThrowResult() {
                var targetCoords2 = getCenterCoords('target');
                var targetCoords = getCenterCoords('target2');
                var ballCoords = getCenterCoords('ball');

                var radius2 = document.getElementById('target').getBoundingClientRect().width / 2;
                var radius = document.getElementById('target2').getBoundingClientRect().width / 2;
                if (ballCoords.x > targetCoords.x - radius &&
                    ballCoords.x < targetCoords.x + radius &&
                    ballCoords.y > targetCoords.y - radius &&
                    ballCoords.y < targetCoords.y + radius) {

                    Ball.savePosition();
                    var ballOrientation = (ballCoords.x < targetCoords.x) ? -1 : 1;
                 

                    var ballEle = Ball.getElement();
                    var ballRect = ballEle.getBoundingClientRect();
                    var particleLeft;
                    var particleRight;
                    var palette = [
                        '#c22921',
                        '#c22921',
                        '#c22921',
                        '#c22921'
                    ];

                    var point2 = document.querySelector('#point2');
    
                    var valor2 = point2.textContent;
                    point2.innerHTML = (valor2 - 1) + 2;

                <?php 
                    if(!empty($user)) {
                    }
                ?>

                $.ajax({
                    type: 'POST',
                    url: 'pontos/add1',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: '<?php echo $user ?>',
                        ip: '<?php echo $ip ?>',
                        pontos: 1,
                    },
                    success: function(data){
                    
                    }
                });


                var particleContainer = document.getElementById('particles');

                    for (var i = 0; i < 100; i++) {
                        var particleEle = document.createElement('div');
                        particleEle.className = 'particle';
                        particleEle.setAttribute('id', 'particle-' + i);
                        particleLeft = getRandNum(-17, 18) + ballCoords.x;
                        particleEle.style.left = particleLeft + 'px';
                        particleRight = getRandNum(-17, 18) + ballCoords.y;
                        particleEle.style.top = particleRight + 'px';
                        particleEle.style.backgroundColor = 'red';
                        
                        particleContainer.appendChild(particleEle);
                        anime({
                            targets: ['#particle-' + i],
                            translateX: {
                                value: ballRect.left - particleLeft,
                                delay: 100 + (i * 10)
                            },
                            translateY: {
                                value: ballRect.top + (Ball.size / 3) - particleRight,
                                delay: 100 + (i * 10),
                            },
                            opacity: {
                                duration: Infinity,
                                easing: 'easeInSine'
                            }
                        });
                    }
                    setTimeout(resetState, 400);

                    
                    var a  = document.querySelector('.size span strong');
                    var ball = document.querySelector('#ball');
                    var valor = a.textContent;
                    a.innerHTML = valor - 1;
                    let b = valor - 1;

                    $.ajax({
                        type: 'POST',
                        url: 'tomates/tirar',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: '<?php echo $user ?>',
                            ip: '<?php echo $ip ?>',
                            tomate: 1,
                        },
                        success: function(data){
                        
                        }
                    });


                    if(a.textContent <= 0){

                        <?php 
                            if($user <> 's') {
                              
                            }else{
                                echo " document.querySelector('.balltwo').style.display = 'block';
                                document.querySelector('.balltwo').addEventListener('click', function(event) {
                                    $('#modalLogin').modal('show');
                                
                                });";
                            }
                        ?>

                        a.innerHTML = 0;
                        var ball = document.querySelector('#ball');
                        ball.style.display = 'none';
                       
                    }else{
                        var ball = document.querySelector('#ball');
                        ball.style.display = 'block';
                    }
                    
                    
                } else {
                    setTimeout(resetState, 400);
                }



                if (ballCoords.x > targetCoords2.x - radius2 &&
                    ballCoords.x < targetCoords2.x + radius2 &&
                    ballCoords.y > targetCoords2.y - radius2 &&
                    ballCoords.y < targetCoords2.y + radius2) {

                    Ball.savePosition();
                    var ballOrientation = (ballCoords.x < targetCoords2.x) ? -1 : 1;

                    var ballEle = Ball.getElement();
                    var ballRect = ballEle.getBoundingClientRect();
                    var particleLeft;
                    var particleRight;
                    var palette = [
                        '#c22921',
                        '#c22921',
                        '#c22921',
                        '#c22921'
                    ];

                    var point = document.querySelector('#point');
    
                    var valor = point.textContent;
                    point.innerHTML = (valor - 1) + 2;


                    $.ajax({
                        type: 'POST',
                        url: 'pontos/add2',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: '<?php echo $user ?>',
                            ip: '<?php echo $ip ?>',
                            pontos: 1,
                        },
                        success: function(data){
                        
                        }
                    });
                
                    
                    <?php 
                        if(!empty($user)) {
                        
                        }
                    ?>


                    var particleContainer = document.getElementById('particles');

                    for (var i = 0; i < 100; i++) {
                        var particleEle = document.createElement('div');
                        particleEle.className = 'particle';
                        particleEle.setAttribute('id', 'particle-' + i);
                        particleLeft = getRandNum(-17, 18) + ballCoords.x;
                        particleEle.style.left = particleLeft + 'px';
                        particleRight = getRandNum(-17, 18) + ballCoords.y;
                        particleEle.style.top = particleRight + 'px';
                        particleEle.style.backgroundColor = 'red';

                        particleContainer.appendChild(particleEle);

                        
                        anime({
                            targets: ['#particle-' + i],
                            translateX: {
                                value: ballRect.left - particleLeft,
                                delay: 100 + (i * 10)
                            },
                            translateY: {
                                value: ballRect.top + (Ball.size / 3) - particleRight,
                                delay: 100 + (i * 10),
                            },
                            opacity: {
                                delay: 100 + (i * 10),
                                duration: Infinity,
                                easing: 'easeInSine'
                            }
                        });
                    }
                    setTimeout(resetState, 10);

                    var a  = document.querySelector('.size span strong');
                    var ball = document.querySelector('#ball');
                    var valor = a.textContent;
                    a.innerHTML = valor - 1;
                    let b = valor - 1;

                    $.ajax({
                        type: 'POST',
                        url: 'tomates/tirar',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: '<?php echo $user ?>',
                            ip: '<?php echo $ip ?>',
                            tomate: 1,
                        },
                        success: function(data){
                        
                        }
                    });

                 

                    if(a.textContent <= 0){
                        <?php 
                            if($user <> 's') {
                               
                            }else{
                                echo " document.querySelector('.balltwo').style.display = 'block';
                                document.querySelector('.balltwo').addEventListener('click', function(event) {
                                    $('#modalLogin').modal('show');
                                
                                });";
                            }
                        ?>
                        a.innerHTML = 0;
                        ball.style.display = 'none';
                    }else{
                        ball.style.display = 'block';
                    }

                } else {
                    setTimeout(resetState, 10);
                }
            }


            function emitParticlesToPokeball() {
                var particles = [];
                var targetEle = getCenterCoords('target');
                var targetEle2 = getCenterCoords('target2');
                var ballEle = Ball.getElement();
                var ballRect = ballEle.getBoundingClientRect();
                var particleLeft;
                var particleRight;
                var palette = [
                    '#2196F3',
                    '#2196F3',
                    '#2196F3',
                    '#2196F3'
                ]
                var particleContainer = document.getElementById('particles');
                for (var i = 0; i < 100; i++) {
                    var particleEle = document.createElement('div');
                    particleEle.className = 'particle';
                    particleEle.setAttribute('id', 'particle-' + i);
                    particleLeft = getRandNum(-60, 60) + targetEle.x;
                    particleEle.style.left = particleLeft + 'px';
                    particleRight = getRandNum(-60, 60) + targetEle.y;
                    particleEle.style.top = particleRight + 'px';
                    particleEle.style.backgroundColor = 'red';
                  
                    
                    particleContainer.appendChild(particleEle);
                    anime({
                        targets: ['#particle-' + i],
                        translateX: {
                            value: ballRect.left - particleLeft,
                            delay: 100 + (i * 10)
                        },
                        translateY: {
                            value: ballRect.top + (Ball.size / 3) - particleRight,
                            delay: 100 + (i * 10),
                        },
                        opacity: {
                            delay: 100 + (i * 10),
                            duration: 800,
                            easing: 'easeInSine'
                        }
                    });
                  
                }
                setTimeout(function() {
                    var ball = Ball.getElement();
                    ball.style.backgroundImage = "url('../tomato.png')";
                    document.getElementById('particles').innerHTML = "";
                    Ball.savePosition();

                    anime({
                        targets: ['#ball'],
                        translateY: {
                            value: "800px",
                            delay: 100,
                            duration: 100,
                            easing: 'linear'
                        },
                        complete: function() {
                        }
                    });
                    setTimeout(function() {
                        animateCaptureState();
                        resetState();
                    }, 750);

                }, 1000);
            }



            function animateCaptureState() {
                var ballContainer = document.getElementById('capture-screen');
                ballContainer.classList.toggle('hidden');

                var duration = 500;
                anime({
                    targets: ['#capture-ball'],
                    rotate: 40,
                    duration: duration,
                    easing: 'easeInOutBack',
                    loop: true,
                    direction: 'alternate'
                });

                var ringRect = (document.getElementById('ring-active')).getBoundingClientRect();
                var successRate = ((150 - ringRect.width) / 150) * 100;
                var seed = getRandNum(0, 100);
                setTimeout(function() {

                    anime.remove('#capture-ball');

                    if (seed < Math.floor(successRate)) {
                        var captureBall = document.getElementById('capture-ball');
                        var buttonContainer = document.getElementById('capture-ball-button-container');
                        buttonContainer.classList.toggle('hidden');

                        //Captured
                        var captureStatus = document.getElementById('capture-status');
                        captureStatus.classList.toggle('hidden');
                        captureStatus.innerHTML = "You caught Omanyte!"
                        makeItRainConfetti();

                        anime({
                            targets: ['#capture-ball-button-container'],
                            opacity: {
                                duration: 800,
                                easing: 'easeInSine'
                            },
                            complete: function() {
                                setTimeout(function() {
                                    var ballContainer = document.getElementById('capture-screen');
                                    ballContainer.classList.toggle('hidden');
                                    var buttonContainer = document.getElementById('capture-ball-button-container');
                                    buttonContainer.classList.toggle('hidden');
                                    buttonContainer.style.opacity = "";
                                    document.getElementById('capture-status').classList.toggle('hidden');
                                }, 800);
                            }
                        });

                    } else {
                        var poofContainer = document.getElementById('poof-container');
                        poofContainer.classList.toggle('hidden');

                        var captureStatus = document.getElementById('capture-status');
                        captureStatus.innerHTML = "Omanyte Escaped!"
                        captureStatus.classList.toggle('hidden');

                        anime({
                            targets: ['#poof'],
                            scale: {
                                value: 200,
                                delay: 400,
                                easing: 'linear',
                                duration: 200
                            },
                            complete: function() {
                                var ballContainer = document.getElementById('capture-screen');
                                ballContainer.classList.toggle('hidden');

                                var poofEle = document.getElementById('poof');
                                poofEle.style.transform = "";
                                var poofContainer = document.getElementById('poof-container');
                                poofContainer.classList.toggle('hidden');

                                var captureStatus = document.getElementById('capture-status');
                                captureStatus.classList.toggle('hidden');
                            }
                        })
                    }
                }, duration * 6);

            }


            function makeItRainConfetti() {
                for (var i = 0; i < 100; i++) {
                    var particleContainer = document.getElementById('capture-confetti');
                    var particleEle = document.createElement('div');
                    particleEle.className = 'particle';
                    particleEle.setAttribute('id', 'particle-' + i);
                    particleLeft = window.innerWidth / 2;
                    particleEle.style.left = particleLeft + 'px';
                    particleTop = window.innerHeight / 2;
                    particleEle.style.top = particleTop + 'px';
                    
                    
                    
                    particleContainer.appendChild(particleEle);
                    anime({
                        targets: ['#particle-' + i],
                        translateX: {
                            value: ((getRandNum(0, 2)) ? -1 : 1) * getRandNum(0, window.innerWidth / 2),
                            delay: 100
                        },
                        translateY: {
                            value: ((getRandNum(0, 2)) ? -1 : 1) * getRandNum(0, window.innerHeight / 2),
                            delay: 100,
                        },
                        opacity: {
                            duration: 800,
                            easing: 'easeInSine'
                        },
                        complete: function() {
                           
                        }
                    });
                }
            }

            function toggleInfoScreen() {
                var infoScreen = document.getElementById('info-screen');
                var infoButton = document.getElementById('info-button');
                infoScreen.classList.toggle('hidden');
                infoButton.innerHTML = (infoScreen.className === 'hidden') ? "?" : 'X';
            }

           
            function resetState() {
                Ball.resetBall();
                document.getElementById('target').style.opacity = 1;
                document.getElementById('target2').style.opacity = 1;
            }

            function getCenterCoords(elementId) {
                var rect = document.getElementById(elementId).getBoundingClientRect();
                return {
                    x: rect.left + rect.width / 2,
                    y: rect.top + rect.height / 2
                };
            }

            function getRandNum(min, max) {
                return Math.floor(Math.random() * (max - min)) + min;
            }

        
            function newip() {
             
                $.ajax({
                    type: 'POST',
                    url: 'ips/addnew',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        ip: '<?php echo $ip ?>',
                    },
                    success: function(data){
                       
                    }
                });
            }


            <?php 
                $db = DB::table('tomates')->where('ip', $ip)->first();
                echo 'tempo("'.$db->time.'")';
            ?>

            //gravar novo ip
            <?php 
                IpsController::add($ip);
            ?>
          

          newip();

              
        </script>
        <script>
      

            var a  = document.querySelector('.size span strong');
            var ball = document.querySelector('#ball')
            if(a.textContent == 0){

                <?php 
                    if($user <> 's') {
                      
                    }else{
                        echo " document.querySelector('.balltwo').style.display = 'block';
                         document.querySelector('.balltwo').addEventListener('click', function(event) {
                            $('#modalLogin').modal('show');
                        
                        });";
                    }
                ?>
                // alert('Você não tem tomates.');
                a.innerHTML = 0;
                ball.style.display = 'none';
            }else{
                ball.style.display = 'block';
            };


            $.ajax({
                type: 'POST',
                url: 'pontos/insertscore',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    ip: '<?php echo $ip ?>',
                },
                success: function(data){
                    
                }
            });



            
             $.ajax({        
                type: 'POST',
                url: 'tomates/inserttime',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    ip: '<?php echo $ip ?>',
                    timer: valor,
                },
                success: function(data){
                
                }
            });  
        </script>

       
    </body>
</html>
