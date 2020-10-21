<li class="nav-item">
    <a class="nav-link {{ request()->is('home') ? 'active' : ''}}" href="{{ url('/') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('doctors') ? 'active' : ''}}" href="{{ url('doctors') }}">{{ __('Medicos') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('users') ? 'active' : ''}}" href="{{ url('users') }}">{{ __('Usuarios') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('consultations') ? 'active' : ''}}" href="{{ url('consultations') }}">{{ __('Consultas') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('patients') ? 'active' : ''}}" href="{{ url('patients') }}">{{ __('Pacientes') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('specialties') ? 'active' : ''}}" href="{{ url('specialties') }}">{{ __('Especialidades') }}</a>
</li>
