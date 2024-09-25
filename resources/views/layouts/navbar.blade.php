<ul class="navbar-nav ms-auto">
    @if(Auth::check())
        @if(Auth::user()->is_admin)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Admin Dashboard</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">User Dashboard</a>
            </li>
        @endif
        <!-- Common links -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    @else
        <!-- Guest links -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
    @endif
</ul>
