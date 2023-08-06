@php
    $currentRouteName = Route::currentRouteName();
@endphp

@vite('resources/sass/app.scss')
    <div class="container-sm mt-5">
        <form action="{{ route('kategoripengeluaran.update',['kategoripengeluaran' => $kategorikeluars->id]) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kategori_id" id="kategori_id" value="{{ $kategorikeluars->kategori_id }}">
    @method('put')
        @csrf
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 border col-xl-6">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Edit Employee</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="namakategori" class="form-label">Nama Kategori</label>
                    <input class="form-control @error('namakategori') is-invalid @enderror" type="text" name="namakategori" id="namakategori" value="{{ $errors->any() ? old('namakategori') : $kategorikeluars->nama_kategori }}" placeholder="Enter nama kategori">
                    @error('namakategori')
                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>
                <div class="col-md-6 mb-3">
                    <label for="kodekategori" class="form-label">Kode kategori</label>
                    <input class="form-control @error('kodekategori') is-invalid @enderror" type="text" name="kodekategori" id="kodekategori" value="{{ $errors->any() ? old('kodekategori') : $kategorikeluars->kode_kategori }}" placeholder="Enter Kode kategori">
                    @error('kodekategori')
                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="floatingTextarea">Deskripsi</label>
                    <textarea class="form-control @error('email') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" id="deskripsi" >{{ $errors->any() ? old('email') : $kategorikeluars->deskripsi }}</textarea>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 d-grid">
                    <a href="{{ route('kategoripengeluaran.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
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
