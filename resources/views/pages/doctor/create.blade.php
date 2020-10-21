@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50 p-5 mt-3">
        <p class="h2">Crear Medico</p>
        @if ($responseError)
            <div class="alert alert-danger">{{ $responseError }}</div>
        @endif
        <form method="post" action="{{ route('doctors.store') }}">
            @csrf
            <div class="form-group">
                <label for="Nombre_Persona">Nombre:</label>
                <input value="{{ old('Nombre_Persona') }}" type="text" class="form-control @error('Nombre_Persona') danger @enderror" name="Nombre_Persona"/>
                @error('Nombre_Persona')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="Primer_Apellido">Primer Apellido:</label>
                        <input value="{{ old('Primer_Apellido') }}" type="text" class="form-control @error('Primer_Apellido') danger @enderror" name="Primer_Apellido"/>
                        @error('Primer_Apellido')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="Segundo_Apellido">Segundo Apellido:</label>
                        <input value="{{ old('Segundo_Apellido') }}" type="text" class="form-control @error('Segundo_Apellido') danger @enderror" name="Segundo_Apellido"/>
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
                        <input value="{{ old('Cedula_Persona') }}" type="text" class="form-control @error('Cedula_Persona') danger @enderror" name="Cedula_Persona"/>
                        @error('Cedula_Persona')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="Edad">Edad:</label>
                        <input value="{{ old('Edad') }}" type="text" class="form-control @error('Edad') danger @enderror" name="Edad"/>
                        @error('Edad')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="codigo_medico">Codigo:</label>
                        <input value="{{ old('codigo_medico') }}" type="text" class="form-control @error('codigo_medico') danger @enderror" name="codigo_medico"/>
                        @error('codigo_medico')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Añadir Medico</button>
        </form>
    </div>
</div>

@stop