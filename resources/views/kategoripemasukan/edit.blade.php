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
        <<form action="{{ route('kategoripemasukan.update',['kategoripemasukan' => $kategorimasuks->id]) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kategori_id" id="kategori_id" value="{{ $kategorimasuks->kategori_id }}">
    @method('put')
        @csrf
    <div class="row justify-content-center">
        <div class="p-5 rounded-3 border col-xl-6" style="background-color: #FDDDCB">
            <div class="mb-3 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3"/></g></svg>
                <h4>Edit Kategori Pemasukan</h4>
            </div>
            <hr style="border: 3px solid #CA3B44;">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="namakategori" class="form-label">Nama Kategori</label>
                    <input class="form-control @error('namakategori') is-invalid @enderror" type="text" name="namakategori" id="namakategori" value="{{ $errors->any() ? old('namakategori') : $kategorimasuks->nama_kategori }}" placeholder="Enter nama kategori">
                    @error('namakategori')
                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>
                <div class="col-md-6 mb-3">
                    <label for="kodekategori" class="form-label">Kode Kategori</label>
                    <input class="form-control @error('kodekategori') is-invalid @enderror" type="text" name="kodekategori" id="kodekategori" value="{{ $errors->any() ? old('kodekategori') : $kategorimasuks->kode_kategori }}" placeholder="Enter Kode kategori">
                    @error('kodekategori')
                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="floatingTextarea">Deskripsi</label>
                    <textarea class="form-control @error('email') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" id="deskripsi" >{{ $errors->any() ? old('email') : $kategorimasuks->deskripsi }}</textarea>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

    </div>
            </div>
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
