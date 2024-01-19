<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid px-5 py-3 shadow">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link fw-medium" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium" aria-current="page" href="{{ route('index') }}">Contacts</a>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link fst-italic fw-medium" aria-current="page"
                            href="#">{{ ucwords(auth()->user()->name) }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn fw-medium">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page" href="{{ route('login') }}">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page" href="{{ route('register') }}">Registration</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
