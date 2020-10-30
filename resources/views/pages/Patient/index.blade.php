@extends('layouts.default')
@section('content')
<div class="container">
    <div class="col-sm-12">  @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @endif
    </div>
    <div class="col-sm-12">  @if(session()->get('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
      @endif
    </div>
    <div id="toolbar">
    <button id="button" class="btn btn-success" onclick="window.location='{{ route("patients.create") }}'">Añadir</button>
    </div>
    <div class="table-responsive">
        <table
            class="table"
            data-toggle="table"
            data-pagination="true"
            data-toolbar="#toolbar"
            data-height="460"
            data-search="true">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Numero Seguro Social</th>
                <th>Fecha de ingreso</th>
                <th>Dni Persona</th>
                <th data-width="100">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $patients as $patient)
                <tr>
                    <td>{{$patient->Id_Paciente}}</td>
                    <td>{{$patient->Numero_Seguro_Social}}</td>
                    <td>{{$patient->Fecha_Ingreso}}</td>
                    <td>{{$patient->Cedula_Persona}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Opciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('patients.edit', $patient->Id_Paciente) }} ">Editar</a>
                            <form action="{{ route('patients.destroy', $patient->Id_Paciente) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item">Eliminar</button>
                                </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>

@stop
