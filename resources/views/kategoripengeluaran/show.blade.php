@vite('resources/sass/app.scss')
      <div class="container mt-5">
    </div>
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 rounded-3 col-xl-4 border" style="background-color: #FDDDCB">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail Kategori Pengeluaran</h4>
                </div>
                <hr style="border: 3px solid #CA3B44;">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <h5>{{ $kategorikeluars->nama_kategori }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="nominal" class="form-label">Kode Kategori</label>
                        <h5>{{ $kategorikeluars->kode_kategori }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <h5>{{ $kategorikeluars->deskripsi }}</h5>
                    </div>

                </div>
                <hr style="border: 3px solid #CA3B44;">
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('kategoripengeluaran.index') }}" class="btn btn-danger btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
