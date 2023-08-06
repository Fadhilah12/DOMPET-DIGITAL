@php
    $currentRouteName = Route::currentRouteName();
@endphp

@vite('resources/sass/app.scss')
    <div class="container-sm mt-5">
        <form action="{{ route('pengeluaran.update',['pengeluaran' => $pengeluaran->id]) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pengeluaran_id" id="pengeluaran_id" value="{{ $pengeluaran->pemasukan_id }}">
            @method('put')
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif --}}

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Pengeluaran</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select">
                                @foreach ($kategorikeluar as $kategori_id)
                                <option value="{{ $kategori_id->id }}" {{$pengeluaran->kategorikeluar_id == $kategori_id->id ?'selected' : '' }}>{{ $kategori_id->kode_kategori.' -'.$kategori_id->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input class="form-control @error('nominal') is-invalid @enderror"  type="number" name="nominal" id="nominal" value="{{ $errors->any() ? old('nominal') : $pengeluaran->nominal }}" placeholder="Enter Nominal">
                            @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="floatingTextarea" class="form-label">Deskripsi</label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ $errors->any() ? old('deskripsi') :$pengeluaran->deskripsi }}" placeholder="Enter nama deskripsi">
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
                            <input class="form-control @error('tanggal_pengeluaran') is-invalid @enderror" type="datetime-local" name="tanggal_pengeluaran" id="tanggal_pengeluaran" value="{{ $errors->any() ? old('tanggal_pengeluaran', date('Y-m-d\TH:i', strtotime($pengeluaran->tanggal_pengeluaran))) : date('Y-m-d\TH:i') }}" placeholder="Enter tanggal_pengeluaran">
                            @error('tanggal_pengeluaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="struk" class="form-label">Struk Pengeluaran</label>
                            @if ($pengeluaran->original_filename)
                                <h5>{{ $pengeluaran->original_filename }}</h5>
                                <a href="{{ route('pengeluarans.downloadFile', ['pengeluaranId' => $pengeluaran->id]) }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-download me-1"></i> Download Struk
                                </a>
                            @else
                                <h5>Tidak ada</h5>
                            @endif
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('pengeluaran.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
