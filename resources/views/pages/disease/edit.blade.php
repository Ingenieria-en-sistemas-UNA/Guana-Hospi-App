@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50 p-5 mt-3">
        <p class="h2">Crear Enfermedad</p>
        @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
        @endif
        <form method="post" action="{{ route('diseases.update', $disease->Id_Enfermedad) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="Nombre_Enfermedad">Nombre Enfermedad:</label>
                <input value="{{ old('Nombre_Enfermedad', $disease->Nombre_Enfermedad) }}" type="text"
                    class="form-control @error('Nombre_Enfermedad') danger @enderror" name="Nombre_Enfermedad" />
                @error('Nombre_Enfermedad')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Enfermedad</button>
        </form>
    </div>
</div>

@stop
