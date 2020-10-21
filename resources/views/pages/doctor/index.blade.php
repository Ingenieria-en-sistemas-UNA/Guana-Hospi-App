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
        <button id="button" class="btn btn-success" onclick="window.location='{{ route("doctors.create") }}'">Añadir</button>
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
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th data-width="100">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $doctors as $doctor )
                    <tr>
                        <td>{{$doctor->Id_Medico}}</td>
                        <td>{{$doctor->Codigo_Medico}}</td>
                        <td>{{$doctor->Nombre_Persona}}</td>
                        <td>{{$doctor->Primer_Apellido . ' ' . $doctor->Segundo_Apellido}}</td>
                        <td>{{$doctor->Cedula_Persona}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('doctors.edit', $doctor->Id_Medico) }}">Editar</a>
                                    <form action="{{route('doctors.destroy',$doctor->Id_Medico)}}" method="POST">
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
