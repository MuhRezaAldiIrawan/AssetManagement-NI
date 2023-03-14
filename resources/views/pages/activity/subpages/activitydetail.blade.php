{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h4 class="fw-bold py-3 mb-4"><a href="/toll"><span class="text-muted fw-light">Toll / </span></a> Detail Activity <i
                class='bx bx-detail'></i></h4>
        <div class="card">
            <h5 class="card-header">Detail Activity</h5>
            <div class="card-body">
                <div class="row mb-6">
                    <div class="col-md">
                        {{-- <div class="card mb-3"> --}}
                        <div class="row g-0">
                            @foreach ($activitydetail as $d)
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img class="card-img card-img-left" src="{{ asset('storage/' . $d->foto) }}"
                                    alt="Card image" />
                            </div>
                            @endforeach
                            <div class="col-lg">
                                <table class="table table-borderless">
                                    @foreach ($activitydetail as $d)
                                        <tbody>
                                            <div class="accordion-item  m-3 mt-0">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-1"
                                                        aria-controls="accordionIcon-1">
                                                        Tanggal & Kategori Activity
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-1" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>Tanggal Pengajuan  : {{ $d->tanggal  }}</p>
                                                        <p>Kategori  : {{ $d->kategori_activity }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item m-3">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-7"
                                                        aria-controls="accordionIcon-7">
                                                        Shift, Lokasi & Kategori
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-7" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>{{ $d->shift }}</p>
                                                        <p>{{ $d->lokasi }}</p>
                                                        <p>{{ $d->kategori }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item m-3">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-3"
                                                        aria-controls="accordionIcon-3">
                                                        Uraian & Jenis Hardware
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-3" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>{{ $d->j_hardware }}</p>
                                                        <p>{{ $d->u_hardware }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item m-3">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-4"
                                                        aria-controls="accordionIcon-4">
                                                        Uraian & Standart Aplikasi
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-4" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>{{ $d->s_aplikasi }}</p>
                                                        <p>{{ $d->u_aplikasi }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item m-3">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-5"
                                                        aria-controls="accordionIcon-5">
                                                        Uraian & Aplikasi IT & Peralatan Toll
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-5" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>{{ $d->a_it }}</p>
                                                        <p>{{ $d->u_it }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item m-3">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-6"
                                                        aria-controls="accordionIcon-6">
                                                        Catatan & Kondisi Akhir
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-6" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>{{ $d->catatan }}</p>
                                                        <p>{{ $d->kondisi_akhir }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                            {{-- <div class="col-md-8">
                                    @foreach ($activitydetail as $d)
                                    <div class="card-body">
                                        <h7 class="card-title">Jenis Hardware : {{ $d->j_hardware }}</h7>
                                        <h7 class="card-title d-inline">Uraian Hardware : 
                                            <p class="card-text d-inline">{{ $d->u_hardware }}</p>
                                        </h7> 
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                    @endforeach
                                </div> --}}
                        </div>
                        {{-- </div> --}}
                    </div>
                    <div class="demo-inline-spacing d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary m-1">
                            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Edit
                        </button>
                        <button type="button" class="btn btn-danger m-1">
                            <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                        </button>
                        <button type="button" class="btn btn-secondary m-1">
                            <span class="tf-icons bx bx-printer"></span>&nbsp; Print
                        </button>
                        <button type="button" class="btn btn-success m-1">
                            <span class="tf-icons bx bx-select-multiple"></span>&nbsp; Approve
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
