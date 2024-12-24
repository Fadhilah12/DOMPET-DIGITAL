@php
    $currentRouteName = Route::currentRouteName();
@endphp

@extends('layouts.app')
@section('content')

    <body>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="mt-5 fw-bold fs-1" style="text-align: center">Dashboard</div>
                    <br>
                    @if (auth()->check() && auth()->user()->role === 'User')
                        <div class="row">
                            <div class="col-md-4 text-white text-center">
                                <div>
                                    <div class="card text-white mb-4" style="background-color: #0077C2">
                                        <div class="card-body fw-bold fs-3">SALDO</div>
                                        <div class="bi bi-cash-coin mb-3 fa-3x"></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="fs-3 fw-bold ">Rp. {{ $total }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-white text-center">
                                <div>
                                    <div class="card text-white mb-4" style="background-color: #00BFFF">
                                        <div class="card-body fw-bold fs-3">UANG MASUK</div>
                                        <div class="bi bi-box-arrow-in-down mb-3 fa-3x"></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="text-white fs-3 fw-bold ">Rp. {{ $saldomasuks }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-white text-center">
                                <div>
                                    <div class="card mb-4" style="background-color: #c8ffff">
                                        <div class="card-body fw-bold fs-3">UANG KELUAR</div>
                                        <div class="class=bi bi-box-arrow-in-up mb-3 fa-3x"></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="fs-3 fw-bold ">Rp. {{ $saldokeluars }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
        </div>
    </body>
@endsection
@vite('resources/js/app.js')
@push('scripts')
    {{-- <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script> --}}
@endpush
