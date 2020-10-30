@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50 p-5 mt-3">
        <p class="h2">Editar Unidad</p>
        @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
        @endif
        <form method="post" action="{{ route('units.update', $unit->Id_Unidad) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="Nombre_Unidad">Nombre:</label>
                <input value="{{ old('Nombre_Unidad', $unit->Nombre_Unidad) }}" type="text"
                    class="form-control @error('Nombre_Unidad') danger @enderror" name="Nombre_Unidad" />
                @error('Nombre_Unidad')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="Numero_Planta">Numero de planta:</label>
                        <input value="{{ old('Numero_Planta', $unit->Numero_Planta) }}" type="number"
                            class="form-control @error('Primer_Apellido') danger @enderror" name="Numero_Planta" />
                        @error('Numero_Planta')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="Id_Medico">Medico encargado</label>
                        <select value="{{ old('Id_Medico', $unit->Id_Medico) }}" type="text"
                            class="form-control @error('Id_Medico') danger @enderror" name="Id_Medico">
                            @if($unit->Id_Medico)
                                <option value="" >Sin Asignar</option>
                            @else
                                <option value="" selected>Sin Asignar</option>
                            @endif
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->Id_Medico }}" {{ $unit->Id_Medico == $doctor->Id_Medico ? 'selected' : '' }}>
                                {{ $doctor->Cedula_Persona . ' - ' . $doctor->Nombre_Persona . ' ' . $doctor->Primer_Apellido . ' ' . $doctor->Segundo_Apellido }}
                            </option>
                            @endforeach
                        </select>
                        @error('Id_Medico')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Añadir Unidad</button>
        </form>
    </div>
</div>

@stop
