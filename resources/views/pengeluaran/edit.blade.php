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
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3"/></g></svg>
                        <h4>Edit Pengeluaran</h4>
                    </div>
                    <hr style="border: 3px solid #CA3B44;">
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
                            <label for="tanggal_pengeluaran" class="form-label">Tanggal</label>
                            <input class="form-control @error('tanggal_pengeluaran') is-invalid @enderror" type="datetime-local" name="tanggal_pengeluaran" id="tanggal_pengeluaran" value="{{ $errors->any() ? old('tanggal_pengeluaran', date('Y-m-d\TH:i', strtotime($pengeluaran->tanggal_pengeluaran))) : date('Y-m-d\TH:i') }}" placeholder="Enter tanggal_pengeluaran">
                            @error('tanggal_pengeluaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>


                    </div>
                    <hr style="border: 3px solid #CA3B44;">
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
