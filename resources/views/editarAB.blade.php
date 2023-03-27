@extends('./layouts/main')
@section('contenido')
{{-- {{$AB}} --}}
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <div class="display-5 text-center">Editar registro | Altas y Bajas</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col"></div>
            <div class="col">
                <form action="{{route('actualizarAB',$AB->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-4">
                        <div class="card-header" style="width: 40rem">
                            Edicion de gastos y ganancias
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipo" id="floatingSelect" required disabled>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{$tipo->id}}" @if($tipo->id==$AB->tipo) selected @endif>{{ucfirst($tipo->tipos)}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Selecciona el tipo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="categoria" id="floatingSelect" required disabled>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}" @if($categoria->id==$AB->categoria) selected @endif>{{ucfirst($categoria->tipo_categoria)}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Selecciona la categoria</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingForm" placeholder="cantidad" value="{{$AB->cantidad}}" name="cantidad" required>
                                <label for="floatingForm">Cantidad</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="descripcion" placeholder="descripcion" id="floatingTextarea">{{$AB->descripcion}}</textarea>
                                <label for="floatingTextarea">Descripcion</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-success">Actualizar</button>
                        </div>
                        <div class="col">
                            <a href="{{route('AB')}}" class="btn btn-outline-primary"> Cancelar </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection