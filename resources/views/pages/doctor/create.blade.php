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
                <label for="nombre_persona">Nombre:</label>
                <input value="{{ old('nombre_persona') }}" type="text" class="form-control @error('nombre_persona') danger @enderror" name="nombre_persona"/>
                @error('nombre_persona')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="apellido_1">Primer Apellido:</label>
                        <input value="{{ old('apellido_1') }}" type="text" class="form-control @error('apellido_1') danger @enderror" name="apellido_1"/>
                        @error('apellido_1')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="apellido_2">Segundo Apellido:</label>
                        <input value="{{ old('apellido_2') }}" type="text" class="form-control @error('apellido_2') danger @enderror" name="apellido_2"/>
                        @error('apellido_2')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="dni_persona">Cedula:</label>
                        <input value="{{ old('dni_persona') }}" type="text" class="form-control @error('dni_persona') danger @enderror" name="dni_persona"/>
                        @error('dni_persona')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input value="{{ old('edad') }}" type="number" class="form-control @error('edad') danger @enderror" name="edad"/>
                        @error('edad')
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
