@php
    $currentRouteName = Route::currentRouteName();
@endphp

@extends('layouts.app')
@section('content')

<body>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-5" style="text-align: center">Dashboard</h1>
                    <br>
                    @if(auth()->check() && auth()->user()->role === 'User')
                    <div class="column" style="margin-left: 37%">
                        <div class="col-xl-5 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Saldo Anda saat ini</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp. {{ $total }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Uang masuk</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp. {{  $saldomasuks }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Uang keluar</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp. {{   $saldokeluars }}</div>
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
