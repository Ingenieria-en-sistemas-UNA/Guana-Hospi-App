@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Crear Consulta</p>
    @if ($responseError)
    <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('queries.store') }}">
        @csrf
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="@IdPaciente">ID del paciente:</label>
                        <input value="{{ old('@IdPaciente') }}" type="text"
                            class="form-control @error('@IdPaciente') danger @enderror" name="@IdPaciente" />
                        @error('@IdPaciente')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="@@IdUnidad">ID de la unidad:</label>
                        <input value="{{ old('@@IdUnidad') }}" type="text"
                            class="form-control @error('@@IdUnidad') danger @enderror" name="@@IdUnidad" />
                        @error('@@IdUnidad')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">Añadir Consulta</button>
    </form>
</div>

@stop
