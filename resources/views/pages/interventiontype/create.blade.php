@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Crear Tipo De Intervención</p>
    @if ($responseError)
    <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('interventionTypes.store') }}">
        @csrf
        <div class="form-group">
            <label for="Nombre_Intervencion">Nombre De La Intervención:</label>
            <input value="{{ old('Nombre_Intervencion') }}" type="text"
                class="form-control @error('Nombre_Intervencion') danger @enderror" name="Nombre_Intervencion" />
            @error('Nombre_Intervencion')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Añadir Tipo De Intervención</button>
    </form>
</div>

@stop
