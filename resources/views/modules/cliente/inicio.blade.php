@extends('./layouts/main')
@section('contenido')
{{-- {{print($AB)}}
{{print($gasto)}}
{{print($ganancia)}} --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h5 class="display-5 text-center mb-4">Inicio - Altas y Bajas</h5>
                <div class="card mb-4">
                    <div class="card-header" style="width: 40rem">
                      Altas y Bajas
                    </div>
                    <div class="card-body">
                        <h5>Total de ganancias: <span class="bg-success rounded text-white px-2"> $ {{$ganancia}} </span></h5>
                        <h5>Total de gastos: <span class="bg-danger rounded text-white px-2"> $ {{$gasto}} </span></h5>
                    </div>
                  </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection