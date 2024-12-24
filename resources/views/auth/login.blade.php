@php
    $currentRouteName = Route::currentRouteName();
@endphp

<head>
    <link rel="icon" href="{{ Vite::asset('resources/images/diary_uang.png') }}">
</head>

@vite('resources/sass/app.scss')
<nav class="navbar shadow navbar-expand-lg">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand mb-0 h1">
            <img class="img-fluid me-4" src="{{ Vite::asset('resources/images/Group 55.png') }}" alt="main logo">
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <hr class="d-md-none text-white-50">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">&ensp;&ensp;|&ensp;&ensp;</a>
                            </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link  active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               <i class="bi-person-circle me-2"></i>{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profile') }}" class="dropdown-item"><i class="bi-person-circle me-1"></i> My Profile</a>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="bi bi-lock-fill me-1"></i>
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
<section class="vh-100 gradient-custom" id="gradient3">
    <div class="container py-5 h-50">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-5">
          <div class="card bg-light text-dark" style="border-radius: 30px;">
            <div class="card-body p-5 text-center">
                <img class="img-fluid" src="{{ Vite::asset('resources/images/Diary Uang.png') }}" alt="main logo" width="250" height="50">
                <hr>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-outline form-white mb-4">
                        <label for="email" class="form-label text-md-end">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Emailmu" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Passwordmu" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <hr>
                    <button class="btn btn-danger btn-lg px-5"  type="submit">{{ __('Log In') }}</button>
                </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@vite('resources/js/app.js')

