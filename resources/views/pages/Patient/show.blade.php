<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="FullName">Nombre Completo:</label>
                <input readonly
                    value="{{ $patient->Nombre_Persona . ' ' . $patient->Primer_Apellido . ' ' . $patient->Segundo_Apellido }}"
                    type="text" class="form-control" name="FullName" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="dni">Cedula:</label>
                <input readonly value="{{ $patient->Cedula_Persona }}" type="text" class="form-control" name="dni" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="dni">Codigo Seguro Socil:</label>
                <input readonly value="{{ $patient->Numero_Seguro_Social }}" type="text" class="form-control"
                    name="dni" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Historial de Consultas</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex flex-wrap justify-content-center align-items-start">
                @foreach($querys as $query)
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Consulta del {{ $query->Fehca_Consulta }}</strong></h5>
                            <p class="card-text">
                                <strong>Descripcion</strong>: {{ $query->descripcion }}
                            </p>
                        </div>
                        <div class="collapse" id="collapseQuery-{{ $query->Id_Consulta }}">
                            <h5 class="card-title pt-3 pl-3">
                                <strong>Intervenciones:</strong>
                            </h5>
                            <ul class="list-group list-group-flush">
                                @foreach($intervenciones as $intervencion)
                                    @if($intervencion->Id_Consulta == $query->Id_Consulta)
                                        <li class="list-group-item">
                                            {{ $intervencion->Tratamiento }} - Tipo: <strong>{{ $intervencion->Nombre_Tipo_Intervencion }}</strong>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <h5 class="card-title pt-3 pl-3">
                                <strong>Enfermedades Registradas:</strong>
                            </h5>
                            <ul class="list-group list-group-flush">
                                @foreach($diseases as $disease)
                                    @if($disease->Id_Consulta == $query->Id_Consulta)
                                        <li class="list-group-item">
                                            {{ $disease->Nombre_Enfermedad }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body pt-0">
                            <a data-toggle="collapse" href="#collapseQuery-{{ $query->Id_Consulta }}" role="button" aria-expanded="false" aria-controls="collapseQuery-{{ $query->Id_Consulta }}">
                                ver más / menos
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
