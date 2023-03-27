@extends('./layouts/main')
@section('contenido')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <div class="display-5 text-center">Nuevo registro | Altas y Bajas</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col"></div>
            <div class="col">
                <form action="{{route('crearAB')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card mb-4">
                        <div class="card-header" style="width: 40rem">
                            Registro de gastos y ganancias
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipo" id="floatingSelect" required>
                                    <option selected value="">Selecciona el tipo</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{ucfirst($tipo->tipos)}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Selecciona el tipo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="categoria" id="floatingSelect" required>
                                    <option selected value="">Selecciona la categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{ucfirst($categoria->tipo_categoria)}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Selecciona la categoria</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingForm" placeholder="cantidad" name="cantidad" required>
                                <label for="floatingForm">Cantidad</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="descripcion" placeholder="descripcion" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Descripcion</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-success">Guardar</button>
                        </div>
                        <div class="col">
                            <a href="{{route('AB')}}" class="btn btn-outline-primary"> Regresar </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection