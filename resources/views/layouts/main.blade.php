<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="{{asset('img/arriba-abajo.png')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titulo}}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/datatable5.css') }}">
</head>
<body>
    @include('sweetalert::alert')
    @include('../shared/nav')
    @yield('contenido')
    <script src="{{asset('datatable/jquery.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{asset('datatable/jqueryta.js')}}"></script>
    <script src="{{asset('datatable/datatable.js')}}"></script>
    <script src="{{asset('datatable/main.js')}}"></script>
</body>
</html>