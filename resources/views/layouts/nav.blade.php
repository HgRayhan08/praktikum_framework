@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand mb-0 h1 text-white"><i class="bi-hexagon-fill me-2"></i> Data
            Master</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <div class="container">
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <hr class="d-md-none text-white-50">
                        <ul class="navbar-nav flex-row flex-wrap ">
                            <li class="nav-item col-2 col-md-auto "><a href="{{ route('home') }}"
                                    class="nav-link text-white @if ($currentRouteName == 'home') active @endif">Home</a>
                            </li>
                            <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}"
                                    class="nav-link text-white @if ($currentRouteName == 'employees.index') active @endif">Employee</a>
                            </li>
                        </ul>
                        <hr class="d-md-none text-white-50">

                    </div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown"
                            class="nav-link border border-light rounded text-white
                        my-2 ms-md-auto dropdown-toggle"
                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre><i class="bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">My Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
