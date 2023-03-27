@extends('./layouts/main')
@section('contenido')
{{-- {{$AB}} --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h5 class="display-5 text-center mb-4">Eliminar - Altas y Bajas</h5>
                <div class="card mb-4">
                    <div class="card-header alert alert-danger" style="width: 30rem">
                        Informacion del registro
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><b>Categoria:</b> {{ucfirst($AB->tipo_categoria)}}</li>
                            <li><b>Tipo:</b> {{ucfirst($AB->tipos)}}</li>
                            <li><b>Cantidad:</b> $ {{$AB->cantidad}}</li>
                            <li><b>Descripcion:</b> {{$AB->descripcion}}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('destroyAB',$AB->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger mx-1">Eliminar</button>
                            <a href="{{route('AB')}}" class="btn btn-outline-primary mx-1">Cancelar</a>
                        </form>
                    </div>
                  </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection