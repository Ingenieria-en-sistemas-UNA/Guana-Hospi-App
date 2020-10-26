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
        <button id="button" class="btn btn-success" onclick="window.location='{{ route("units.create") }}'">Añadir</button>
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
                <th>Nombre de la Unidad</th>
                <th>Numero de planta</th>
                <th data-width="100">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $units as $unit )
                    <tr>
                        <td>{{$unit->Id_Unidad}}</td>
                        <td>{{$unit->Nombre_Unidad}}</td>
                        <td>{{$unit->Numero_Planta}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('units.edit', $unit->Id_Unidad) }}">Editar</a>
                                    <form action="{{route('units.destroy',$unit->Id_Unidad)}}" method="POST">
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
