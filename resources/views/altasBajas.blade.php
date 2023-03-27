@extends('./layouts/main')
@section('contenido')
{{-- {{$AB}} --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="display-5 text-center mb-4">Informacion | Altas y Bajas</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <a href="{{route('nuevoAB')}}" class="btn btn-outline-dark">Nuevo registro</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <table class="table table-hovered text-center" id="registros">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($AB as $altaBaja)
                            <tr>
                                <td>{{ucfirst($altaBaja->tipos)}}</td>
                                <td>{{ucfirst($altaBaja->tipo_categoria)}}</td>
                                <td>$ {{ucfirst($altaBaja->cantidad)}}</td>
                                <td>{{ucfirst($altaBaja->descripcion)}}</td>
                                <td>{{ucfirst($altaBaja->created_at)}}</td>
                                <td>
                                    <a href="{{route('editarAB',$altaBaja->id)}}" class="btn btn-outline-warning">Editar</a>
                                </td>
                                <td>
                                    <a href="{{route('eliminarAB',$altaBaja->id)}}" class="btn btn-outline-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection