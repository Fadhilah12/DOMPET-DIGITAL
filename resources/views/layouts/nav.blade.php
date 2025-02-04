@php
    $currentRouteName = Route::currentRouteName();
@endphp
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-light bg-white" style="box-shadow: 1px 1px 8px rgba(54, 54, 54, 0.8)">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">
        <img src="{{ Vite::asset('resources/images/diary_uang.png') }}" width="100" height="75">
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-justify" style="font-size: 35px;"></i></i></button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li> <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-danger" style="background-color: #00619a" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading text-white">Dashboard</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div><div class="text-white">
                            Dashboard
                        </div>
                    </a>
                    <div class="sb-sidenav-menu-heading text-white">Manajemen</div>
                    @if(auth()->check() && auth()->user()->role === 'Admin')
                    <a class="nav-link active collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                        <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                        <div class="sb-sidenav-menu-heading text-white">Manajemen Kategori</div>
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link @if($currentRouteName == 'saldo.index') active @endif" href="{{ route('kategoripemasukan.index') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                                <div class="sb-sidenav-menu text-white">Kategori Pemasukan</div></a>

                            <a class="nav-link @if($currentRouteName == 'saldo.index') active @endif" href="{{ route('kategoripengeluaran.index') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                                <div class="sb-sidenav-menu text-white">Kategori Pengeluaran</div></a>

                        </nav>
                    </div>
                    @endif
                    @if(auth()->check() && auth()->user()->role === 'User')
                    <a class="nav-link active collapsed @if($currentRouteName == 'pemasukan.index') active @endif" href="{{ route('pemasukan.index') }}"  data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">


                        <div class="sb-sidenav-menu ms-3 text-white">Manajemen pemasukan</div>
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="bi bi-caret-down-fill px-2"></i></div>
                    </a>
                    <a class="nav-link active collapsed @if($currentRouteName == 'saldo.index') active @endif" href="{{ route('pengeluaran.index') }}" aria-expanded="false" aria-controls="collapsePages">

                        <div class="sb-sidenav-menu ms-3 text-white">Manajemen pengeluaran</div>
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="bi bi-caret-down-fill px-2"></i></div>
                    </a>
                    @endif
            </div>
        </nav>
    </div>
