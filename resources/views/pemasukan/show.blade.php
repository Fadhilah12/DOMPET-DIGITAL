@vite('resources/sass/app.scss')
      <div class="container mt-5">
    </div>
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 rounded-3 col-xl-4 border" style="background-color: #FDDDCB">
                <div class="mb-3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><rect width="36" height="36" x="6" y="6" rx="3"/><path d="M13 13h8v8h-8z"/><path stroke-linecap="round" d="M27 13h8m-8 7h8m-22 8h22m-22 7h22"/></g></svg>
                    <h4>Detail Pemasukan</h4>
                </div>
                <hr style="border: 3px solid #CA3B44;">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <h5>{{ $pemasukan->kategorimasuk->nama_kategori }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <h5>{{ 'Rp'.'.'.$pemasukan->nominal }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <h5>{{ $pemasukan->deskripsi }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="tgl pemasukan" class="form-label">Tanggal</label>
                        <h5>{{ $pemasukan->tanggal_pemasukan }}</h5>
                    </div>
                </div>
                <hr style="border: 3px solid #CA3B44;">
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('pemasukan.index') }}" class="btn btn-danger btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
