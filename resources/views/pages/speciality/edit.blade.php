@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50 p-5 mt-3">
        <p class="h2">Editar Especialidad</p>
        @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
        @endif
        <form method="post" action="{{ route('specialities.update', $speciality->Id_Especialidad) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="Nombre_Especialidad">Nombre Especialidad:</label>
                <input value="{{ old('Nombre_Especialidad', $speciality->Nombre_Especialidad) }}" type="text"
                    class="form-control @error('Nombre_Especialidad') danger @enderror" name="Nombre_Especialidad" />
                @error('Nombre_Especialidad')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Especialidad</button>
        </form>
    </div>
</div>

@stop
