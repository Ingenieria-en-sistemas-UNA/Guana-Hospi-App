@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" id="load-button-dwh" onclick="window.location='{{ route("datawarehouse") }}'">Cargar Datawarehouse</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="delete-button-dwh"onclick="window.location='{{ route("clean_datawarehouse") }}'">Limpiar Datawarehouse</button>
            </div>

    </div>
</div>
<div class="col-sm-12">  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div class="container p-5 card-container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Unidad con más Pacientes</h5>
            <h6 class="card-subtitle mb-2 text-muted">Datawarehouse</h6>
            @if(count($units) > 0)
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Numero Planta</th>
                            <th scope="col">Fecuencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <th scope="row">{{ $unit->id_unidad }}</th>
                                <td>{{ $unit->nombre_unidad }}</td>
                                <td>{{ $unit->numero_planta }}</td>
                                <td>{{ $unit->Cantidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="card-text">No hay recursos</p>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Top 5 de enfermedades atendidas</h5>
            <h6 class="card-subtitle mb-2 text-muted">Datawarehouse</h6>
            @if(count($diseases) > 0)
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre Enfermedad</th>
                            <th scope="col">Fecuencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diseases as $disease)
                            <tr>
                                <th scope="row">{{ $disease->Id_Enfermedad }}</th>
                                <td>{{ $disease->nombre_enfermedad }}</td>
                                <td>{{ $disease->Cantidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="card-text">No hay recursos</p>
            @endif
        </div>
    </div>
    @if(auth()->user()->isAdmin())
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Medico con más intervenciones</h5>
                <h6 class="card-subtitle mb-2 text-muted">Datawarehouse</h6>
                @if(count($doctors) > 0)
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Segundo Apellido</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Frecuencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                                <tr>
                                    <th scope="row">{{ $doctor->codigo_medico }}</th>
                                    <td>{{ $doctor->nombre_persona }}</td>
                                    <td>{{ $doctor->apellido_1 }}</td>
                                    <td>{{ $doctor->apellido_2 }}</td>
                                    <td>{{ $doctor->dni_persona }}</td>
                                    <td>{{ $doctor->Cantidad }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="card-text">No hay recursos</p>
                @endif
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalle de las intervenciones más frecuentes</h5>
            <h6 class="card-subtitle mb-2 text-muted">Datawarehouse</h6>
            @if(count($doctors) > 0)
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tipo de intervención</th>
                            <th scope="col">Tratamiento</th>
                            <th scope="col">Frecuencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipoIntervenciones as $tipoIntervencion)
                            <tr>
                                <th scope="row">{{ $tipoIntervencion->id_tipo_intervencion }}</th>
                                <td>{{ $tipoIntervencion->nombre_tipo_intervencion }}</td>
                                <td>{{ $tipoIntervencion->tratamiento }}</td>
                                <td>{{ $tipoIntervencion->Cantidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="card-text">No hay recursos</p>
            @endif
        </div>
    </div>
</div>
<script>

    const disableButtons = () => {
        document.getElementById('load-button-dwh').disabled = true;
        document.getElementById('delete-button-dwh').disabled = true;
    }
    document.getElementById('load-button-dwh').addEventListener('click', function(e){
        disableButtons();
    })

    document.getElementById('delete-button-dwh').addEventListener('click', function(e){
        disableButtons();
    })
</script>
@stop
