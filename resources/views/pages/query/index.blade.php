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
        <button id="button" class="btn btn-success" onclick="window.location='{{ route("queries.create") }}'">Añadir</button>
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
                <th>ID Consulta</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>ID de Paciente</th>
                <th data-width="100">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $queries as $query )
                    <tr>
                        <td>{{$query->Id_Consulta}}</td>
                        <td>{{$query->Fehca_Consulta}}</td>
                        <td>{{$query->descripcion}}</td>
                        <td>{{$query->Id_Paciente}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('queries.edit', $query->Id_Consulta) }}">Editar</a>
                                    <form action="{{route('queries.destroy', $query->Id_Consulta)}}" method="POST">
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