@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Crear Consulta</p>
    @if ($responseError)
    <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('queries.store') }}">
        @csrf
        <!-- -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="Id_Paciente">ID del paciente:</label>
                        <select value="{{ old('Id_Paciente') }}" type="text"
                            class="form-control @error('Id_Paciente') danger @enderror" name="Id_Paciente" />
                            <option value="" selected>Sin Asignar</option>
                        @foreach($patients as $patient)
                        <option value="{{ $patient->Id_Paciente }}">
                            {{ $patient->Id_Paciente . ' - ' . $patient-> }}
                        </option>
                        @endforeach
                    </select>
                        @error('Id_Paciente')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <!-- -->
                <div class="row">
                <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Id_Unidad">Unidad</label>
                    <select value="{{ old('Id_Unidad') }}" type="text"
                        class="form-control @error('Id_Unidad') danger @enderror" name=" Id_Unidad">
                        <option value="" selected>Sin Asignar</option>
                        @foreach($units as $unity)
                        <option value="{{ $unity->Id_Unidad }}">
                            {{ $unity->Nombre_Unidad }}
                        </option>
                        @endforeach
                    </select>
                    @error('Id_Unidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- -->
            <button type="submit" class="btn btn-primary">Añadir Consulta</button>
    </form>
</div>

@stop
