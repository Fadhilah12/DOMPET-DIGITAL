@extends('layouts.app')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <br>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Kategori Pengeluaran</h1>
                    <br>
                    <div class="col-lg-3 col-xl-2">
                        <div class="d-grid gap-2">
                            <a href="{{ route('kategoripengeluaran.create') }}" class="btn btn-success rounded-pill" style="background-color: #58B079">Tambah Kategori pengeluaran</a>
                        </div>
                        <br>
                    </div>
                    <div class="table-responsive border p-3 rounded-3" style="background-color: #FDDDCB">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="employeeTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>kode kategori</th>
                                    <th>deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoripengeluaran as $kategorikeluars)
                                <tr>
                                    <td>{{ $kategorikeluars->id }}</td>
                                    <td>{{ $kategorikeluars->nama_kategori }}</td>
                                    <td>{{ $kategorikeluars->kode_kategori	}}</td>
                                    <td>{{ $kategorikeluars->deskripsi }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('kategoripengeluaran.edit', ['kategoripengeluaran'=>$kategorikeluars->id]) }}" class="btn btn-outline-dark btn-sm
                                                me-2"><i class="bi-pencil-square"></i></a>
                                                <a href="{{ route('kategoripengeluaran.show', ['kategoripengeluaran'=>$kategorikeluars->id]) }}"  class="btn btn-outline-dark btn-sm
                                                    me-2" ><i class="bi bi-file-earmark-text" method="POST"></i></a>
                                            </div>
                                            <form action="{{ route('kategoripengeluaran.destroy',['kategoripengeluaran' =>$kategorikeluars->id]) }}" method="POST"> @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm me-2"><i class="bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
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
