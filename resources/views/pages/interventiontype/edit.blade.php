@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50 p-5 mt-3">
        <p class="h2">Editar Tipo De Intervención</p>
        @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
        @endif
        <form method="post" action="{{route('interventionTypes.update', $interventiontypes->Id_Tipo_Intervencion)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="Nombre_Intervencion">Nombre Del Tipo de Intervención:</label>
                <input value="{{ old('Nombre_Intervencion', $interventiontypes->Nombre_Tipo_Intervencion) }}" type="text"
                    class="form-control @error('Nombre_Intervencion') danger @enderror" name="Nombre_Intervencion" />
                @error('Nombre_Intervencion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Intervención</button>
        </form>
    </div>
</div>

@stop
