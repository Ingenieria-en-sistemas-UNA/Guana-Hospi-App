<li class="nav-item">
    <a class="nav-link {{ request()->is('home') ? 'active' : 'text-white'}}" href="{{ url('/') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('doctors') ? 'active' : 'text-white'}}" href="{{ url('doctors') }}">{{ __('Medicos') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('users') ? 'active' : 'text-white'}}" href="{{ url('users') }}">{{ __('Usuarios') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('units') ? 'active' : 'text-white'}}" href="{{ url('units') }}">{{ __('Unidades') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('patients') ? 'active' : 'text-white'}}" href="{{ url('patients') }}">{{ __('Pacientes') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('specialities') ? 'active' : 'text-white'}}" href="{{ url('specialities') }}">{{ __('Especialidades') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('diseases') ? 'active' : 'text-white'}}" href="{{ url('diseases') }}">{{ __('Enfermedades') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">{{ __('Cerrar Sesión') }}</a>
</li>
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
