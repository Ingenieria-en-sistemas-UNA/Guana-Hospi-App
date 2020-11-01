@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Editar Paciente</p>
    @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('patients.update', $patient->Id_Paciente) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="Nombre_Persona">Nombre:</label>
            <input value="{{ old('Nombre_Persona', $patient->Nombre_Persona) }}" type="text" class="form-control @error('Nombre_Persona') danger @enderror" name="Nombre_Persona"/>
            @error('Nombre_Persona')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Primer_Apellido">Primer Apellido:</label>
                    <input value="{{ old('Primer_Apellido', $patient->Primer_Apellido) }}" type="text" class="form-control @error('Primer_Apellido') danger @enderror" name="Primer_Apellido"/>
                    @error('Primer_Apellido')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Segundo_Apellido">Segundo Apellido:</label>
                    <input value="{{ old('Segundo_Apellido', $patient->Segundo_Apellido) }}" type="text" class="form-control @error('Segundo_Apellido') danger @enderror" name="Segundo_Apellido"/>
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
                    <input value="{{ old('Cedula_Persona', $patient->Cedula_Persona) }}" readonly type="text" class="form-control @error('Cedula_Persona') danger @enderror" name="Cedula_Persona"/>
                    @error('Cedula_Persona')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Edad">Edad:</label>
                    <input value="{{ old('Edad', $patient->Edad) }}" type="text" class="form-control @error('Edad') danger @enderror" name="Edad"/>
                    @error('Edad')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="N_Suguro_Social">N° Seguro Social:</label>
                    <input value="{{ old('Numero_seguro_social', $patient->Numero_Seguro_Social) }}" readonly type="text" class="form-control @error('Numero_seguro_social') danger @enderror" name="Numero_seguro_social"/>
                    @error('Numero_seguro_social')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="Fecha_Ingreso">Facha De Ingreso:</label>
                    <input value="{{ old('Fecha_Ingreso', $patient->Fecha_Ingreso) }}" type="date" class="form-control @error('Fecha_Ingreso') danger @enderror" name="Fecha_Ingreso"/>
                    @error('Fecha_Ingreso')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
    </form>
</div>
@stop
