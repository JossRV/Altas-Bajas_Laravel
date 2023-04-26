@extends('layouts/login/main')
@section('contenido')
<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <div class="display-4">Inicia session</div>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <form action="{{route('logeo')}}" method="POST">
                @csrf
                @method('post')
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control mb-3">
                <label for="">Contraseña</label>
                <input type="password" name="password" class="form-control mb-3">
                <button class="btn btn-outline-dark">Ingresar</button>
                <a href="{{route('registro')}}" class="btn btn-outline-primary">Registrarse</a>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection