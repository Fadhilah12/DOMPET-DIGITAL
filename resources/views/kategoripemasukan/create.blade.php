@php
    $currentRouteName = Route::currentRouteName();
@endphp

@vite('resources/sass/app.scss')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">Diary Uang</a>
        <!-- Sidebar Toggle-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
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


    <div class="container-sm mt-5">
        <form action="{{ route('kategoripemasukan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 rounded-3 border col-xl-6" style="background-color: #FDDDCB">

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                        @endif --}}

                        <div class="mb-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><path fill="currentColor" d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"/><path fill="currentColor" d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"/></svg>
                            <h4>Tambah Kategori Pemasukan</h4>
                        </div>
                        <hr style="border: 3px solid #CA3B44;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="namakategori" class="form-label">Nama Kategori</label>
                                <input class="form-control" type="text" name="namakategori" id="namakategori" value="" placeholder="Masukkan Kategori">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kodekategori" class="form-label">Kode Kategori</label>
                                <input class="form-control" type="text" name="kodekategori" id="kodekategori" value="" placeholder="Masukkan Kode">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="floatingTextarea">Deskripsi</label>
                                <textarea class="form-control" placeholder="Tuliskan Deskripsi Kategori" name="deskripsi" id="deskripsi"></textarea>
                            </div>
                        </div>
                        <hr style="border: 3px solid #CA3B44;">
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('kategoripemasukan.index') }}" class="btn btn-danger btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-success btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
