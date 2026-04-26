<nav class="dashboard-navbar">
    <div class="nav-left">
        <img src="{{ asset('images/logoweb.png') }}" alt="Long Black Logo" class="nav-logo">
    </div>

    <div class="nav-center">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('pengelolaan') }}" class="{{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
            Kelola Produk
        </a>

        <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
            Profile
        </a>
    </div>

    <div class="nav-right">
        <span>Admin Long Black</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>