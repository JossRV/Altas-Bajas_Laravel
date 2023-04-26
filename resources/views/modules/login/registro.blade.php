@extends('layouts/login/main')
@section('contenido')
<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <div class="display-4">Registrate</div>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <form action="{{route('agregar')}}" method="POST">
                @csrf
                @method('post')
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control mb-3">
                <label for="">Contraseña</label>
                <input type="password" name="password" class="form-control mb-3">
                <button class="btn btn-outline-dark">Registrar</button>
                <a href="{{route('login')}}" class="btn btn-outline-danger">Cancelar</a>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection