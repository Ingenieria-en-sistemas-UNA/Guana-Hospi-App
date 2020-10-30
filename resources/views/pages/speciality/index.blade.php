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
        <button id="button" class="btn btn-success" onclick="window.location='{{ route("specialities.create") }}'">Añadir</button>
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
                <th>Especialidad</th>
                <th data-width="100">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $specialities as $specialty )
                    <tr>
                        <td>{{$specialty->Id_Especialidad}}</td>
                        <td>{{$specialty->Nombre_Especialidad}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('specialities.edit', $specialty->Id_Especialidad) }}">Editar</a>
                                    <form action="{{route('specialities.destroy', $specialty->Id_Especialidad)}}" method="POST">
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
