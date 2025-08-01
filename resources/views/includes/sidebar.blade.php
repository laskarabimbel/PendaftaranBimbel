<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/icon.png') }}" width="80" height="45" alt="icon">
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/icon.png') }}" width="64" height="36" alt="icon">
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @can('admin')
        <li class="menu-header">Administrator</li>
        <li class="{{ Route::is('user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-users"></i>
                <span>Kelola User</span>
            </a>
        </li>
        <li class="{{ Route::is('pendaftaran*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pendaftaran.index') }}">
                <i class="fas fa-file-alt"></i>
                <span>Kelola Pendaftaran</span>
            </a>
        </li>
        @endcan
    </ul>
</aside>