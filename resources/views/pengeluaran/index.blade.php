@php
    $currentRouteName = Route::currentRouteName();
@endphp

@extends('layouts.app')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <h1 class="mt-4">Pengeluaran</h1>
                    <br>
                    <div class="col-lg-3 col-xl-2">
                        <div class="d-grid gap-2">
                            <a href="{{ route('pengeluaran.create') }}" class="btn btn-success rounded-pill" style="background-color: #58B079">Tambah Pengeluaran</a>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-lg-9 col-xl-6">
                        </div>
                        <div class="col-lg-3 col-xl-6">
                            <ul class="list-inline mb-0 float-end">
                                <li class="list-inline-item">
                                    <a href="{{ route('pemasukan.exportExcel1') }}" class="btn btn-outline-success">
                                        <i class="bi bi-download me-1"></i> to Excel
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">
                                    <a href="{{ route('pemasukan.exportPdf') }}" class="btn btn-outline-danger">
                                        <i class="bi bi-download me-1"></i> to PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div>
                    <div class="table-responsive border p-3 rounded-3" style="background-color: #FDDDCB">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Nominal</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 1;
                            @endphp
                                @foreach ($pengeluaran as $pengeluarans)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $pengeluarans->kategorikeluar->nama_kategori }}</td>
                                    <td>{{ $pengeluarans->nominal	}}</td>
                                    <td>{{ $pengeluarans->deskripsi }}</td>
                                    <td>{{ $pengeluarans->tanggal_pengeluaran }}</td>
                                    <td>
                                        <div class="d-flex">
                                            {{-- Show --}}
                                            <a href="{{ route('pengeluaran.show', ['pengeluaran'=>$pengeluarans->id]) }}"  class="btn btn-outline-dark btn-sm me-2" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="6 4 35 40"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><rect width="36" height="36" x="6" y="6" rx="3"/><path d="M13 13h8v8h-8z"/><path stroke-linecap="round" d="M27 13h8m-8 7h8m-22 8h22m-22 7h22"/></g></svg>
                                            </a>
                                            {{-- Edit --}}
                                            <a href="{{ route('pengeluaran.edit', ['pengeluaran'=>$pengeluarans->id])  }}" class="btn btn-outline-dark btn-sm me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="6 2 15 20"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3"/></g></svg>
                                            </a>
                                            </div>
                                            {{-- Hapus --}}
                                            <form action="{{ route('pengeluaran.destroy',['pengeluaran' =>$pengeluarans->id]) }}" method="POST"> @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="30 20 200 200"><path fill="currentColor" d="M216 48h-36V36a28 28 0 0 0-28-28h-48a28 28 0 0 0-28 28v12H40a12 12 0 0 0 0 24h4v136a20 20 0 0 0 20 20h128a20 20 0 0 0 20-20V72h4a12 12 0 0 0 0-24ZM100 36a4 4 0 0 1 4-4h48a4 4 0 0 1 4 4v12h-56Zm88 168H68V72h120Zm-72-100v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0Zm48 0v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0Z"/></svg>
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @php
                                $counter++;
                            @endphp
                                @endforeach
                                </tbody>
                            </table>
                    </div>
            </main>
        </div>
    </div>
    @endsection
        {{-- @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush --}}

    @push('scripts')
    <script type="module">
        $(document).ready(function() {

            ...

            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
