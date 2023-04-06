{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Welcome {{ auth()->user()->nama }} 🎉</h5>
                        <p class="mb-4">
                            Kamu Punya <span class="fw-bold">{{ $jumlahactivity }}</span> Tambahan Permintaan Activity
                        </p>

                        <a href="/toll" class="btn btn-sm btn-outline-primary">View Activity</a>
                    </div>
                </div>
                <div class="col-sm-5 text-end text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('img/illustrations/man-with-laptop-light.png') }}" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class=""> --}}
        <div class="row">
            <div class=" col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('img/icons/unicons/car1.png') }}" alt="chart success"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h2 class="fw-semibold d-block mb-1">{{ $mayor }}</h2>
                        <h4 class="card-title mb-2">Kerusakan Mayor</h4>
                        <small class="text-success fw-semibold">bulan ini <i class="bx bx-up-arrow-alt"></i> +{{ $stockDiffMayor }}</small>
                    </div>
                </div>
            </div>
            <div class=" col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('img/icons/unicons/fix.png') }}" alt="chart success"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h2 class="fw-semibold d-block mb-1">{{ $perbaikan }}</h2>
                        <h4 class="card-title mb-2">Perbaikan</h4>
                        <small class="text-success fw-semibold">bulan ini <i class="bx bx-up-arrow-alt"></i> +{{ $stockDiffPerbaikan }}</small>
                    </div>
                </div>
            </div>
            <div class=" col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('img/icons/unicons/cycle.png') }}" alt="chart success"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h2 class="fw-semibold d-block mb-1">{{ $pergantian }}</h2>
                        <h4 class="card-title mb-2">Pergantian</h4>
                        <small class="text-success fw-semibold">bulan ini <i class="bx bx-up-arrow-alt"></i> +{{ $stockDiffPergantian }}</small>
                    </div>
                </div>
            </div>
            <div class=" col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('img/icons/unicons/minor.png') }}" alt="chart success"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h2 class="fw-semibold d-block mb-1">{{ $minor }}</h2>
                        <h4 class="card-title mb-2">Penanganan Minor</h4>
                        <small class="text-success fw-semibold">bulan ini <i class="bx bx-up-arrow-alt"></i> +{{ $stockDiffMinor }}</small>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection
