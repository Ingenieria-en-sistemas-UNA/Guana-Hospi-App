@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Editar Medico</p>
    @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('doctors.update', $medico->Id_Medico) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="Nombre_Persona">Nombre:</label>
            <input value="{{ old('Nombre_Persona', $medico->Nombre_Persona) }}" type="text" class="form-control @error('Nombre_Persona') danger @enderror" name="Nombre_Persona"/>
            @error('Nombre_Persona')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Primer_Apellido">Primer Apellido:</label>
                    <input value="{{ old('Primer_Apellido', $medico->Primer_Apellido) }}" type="text" class="form-control @error('Primer_Apellido') danger @enderror" name="Primer_Apellido"/>
                    @error('Primer_Apellido')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Segundo_Apellido">Segundo Apellido:</label>
                    <input value="{{ old('Segundo_Apellido', $medico->Segundo_Apellido) }}" type="text" class="form-control @error('Segundo_Apellido') danger @enderror" name="Segundo_Apellido"/>
                    @error('Segundo_Apellido')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Cedula_Persona">Cedula:</label>
                    <input value="{{ old('Cedula_Persona', $medico->Cedula_Persona) }}" readonly type="text" class="form-control @error('Cedula_Persona') danger @enderror" name="Cedula_Persona"/>
                    @error('Cedula_Persona')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Edad">Edad:</label>
                    <input value="{{ old('Edad', $medico->Edad) }}" type="text" class="form-control @error('Edad') danger @enderror" name="Edad"/>
                    @error('Edad')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Nombre_Persona">Seleccione las Especialidades (⇧ + click):</label>
                    <select multiple name="specialities[]" class="form-control" id="specialities">
                        <option value="" @if(count($specialitiesMedico) == 0) selected @endif>Sin Especialidad</option>
                        @foreach($specialities as $speciality)
                            @php $isSelected = false; @endphp
                            @foreach($specialitiesMedico as $specialityRepository)
                                @php
                                    if($speciality->Id_Especialidad == $specialityRepository->Id_Especialidad){
                                        $isSelected = true;
                                        break;
                                    }
                                @endphp
                            @endforeach
                            <option value="{{ $speciality->Id_Especialidad }}" @if($isSelected) selected @endif>{{ $speciality->Nombre_Especialidad }}</option>
                        @endforeach
                    </select>
                    @error('Nombre_Persona')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Codigo_Medico">Codigo:</label>
                    <input value="{{ old('Codigo_Medico', $medico->Codigo_Medico) }}" readonly type="text" class="form-control @error('Codigo_Medico') danger @enderror" name="Codigo_Medico"/>
                    @error('Codigo_Medico')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Medico</button>
    </form>
</div>
@stop
