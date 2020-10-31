@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Crear Medico</p>
    @if ($responseError)
    <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('doctors.store') }}">
        @csrf
        <div class="form-group">
            <label for="Nombre_Persona">Nombre:</label>
            <input value="{{ old('Nombre_Persona') }}" type="text"
                class="form-control @error('Nombre_Persona') danger @enderror" name="Nombre_Persona" />
            @error('Nombre_Persona')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Primer_Apellido">Primer Apellido:</label>
                    <input value="{{ old('Primer_Apellido') }}" type="text"
                        class="form-control @error('Primer_Apellido') danger @enderror" name="Primer_Apellido" />
                    @error('Primer_Apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Segundo_Apellido">Segundo Apellido:</label>
                    <input value="{{ old('Segundo_Apellido') }}" type="text"
                        class="form-control @error('Segundo_Apellido') danger @enderror" name="Segundo_Apellido" />
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
                    <input value="{{ old('Cedula_Persona') }}" type="text"
                        class="form-control @error('Cedula_Persona') danger @enderror" name="Cedula_Persona" />
                    @error('Cedula_Persona')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Edad">Edad:</label>
                    <input value="{{ old('Edad') }}" type="text"
                        class="form-control @error('Edad') danger @enderror" name="Edad" />
                    @error('Edad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Codigo_Medico">Codigo:</label>
                    <input value="{{ old('Codigo_Medico') }}" type="text"
                        class="form-control @error('Codigo_Medico') danger @enderror" name="Codigo_Medico" />
                    @error('Codigo_Medico')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Añadir Medico</button>
    </form>
</div>

@stop
