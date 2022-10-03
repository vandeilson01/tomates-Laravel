@php 
    use App\Http\Controllers\Role;

    Role::userip();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>
            window.Laravel = {!! json_encode([
                'csrf' => csrf_token(),
                'pusher' => [
                    'key' => config('broadcasting.connections.pusher.key'),
                    'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                ],
                'user' => auth()->check() ? auth()->user()->id : '',
            ]) !!}
        </script>

        <title>Tomates</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link href="tomato.svg" rel="icon">
        <link href="tomato.svg" rel="apple-touch-icon">

        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="back/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="back/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="back/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="back/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="back/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="back/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="back/vendor/simple-datatables/style.css" rel="stylesheet">

        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet">
        <link href="back/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}" defer></script>

        @livewireStyles
        
    </head>
    <body>
        @include('admin.includes.header')
        @include('admin.includes.menu')

        @yield('content')
        
        @include('admin.includes.footer')
    </body>
</html>
