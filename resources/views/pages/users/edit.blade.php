@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50 p-5 mt-3">
        <p class="h2">Editar Usuario</p>
        @if ($responseError)
        <div class="alert alert-danger">{{ $responseError }}</div>
        @endif
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input id="email" type="email" required class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">{{ __('Contraseña') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
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
                            autocomplete="new-password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
</div>

@stop
