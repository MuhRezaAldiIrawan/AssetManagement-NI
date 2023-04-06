{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Activity /</span>Non Toll Log Activity<i
                class='bx bx-street-view m-1'></i></h5>
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">Non Toll Log Activity</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-primary m-1" data-bs-toggle="modal"
                                data-bs-target="#fullscreenModal"">
                                <span class="tf-icons bx bx-plus"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary m-1" data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                <span class="tf-icons bx bx-printer"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($nontoll->isEmpty())
                    @include('components.emptyfield')
                @else
                    <form action="/nontoll" method="get">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <select id="cari" name="search" class="form-select">
                                    <option value="" selected>Semua Lokasi</option>
                                    @foreach ($lokasi as $l)
                                        <option>{{ $l->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mb-0">
                                <div class="demo-inline-spacing">
                                    <button type="submit" class="btn btn-primary" value="CARI">
                                        <span class="tf-icons bx bx-search"></span>&nbsp; Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive text-wrap mt-3">
                        <table class="table table-bordered table-striped  table-hover display" width="1000px">
                            <thead>
                                <tr class="text-wrap">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Uraian Jenis Hardware</th>
                                    <th class="text-center">Shift</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">user</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" width="21%">Action</th>
                                </tr>
                            </thead>
                            @foreach ($nontoll as $t)
                                <tbody>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $t->tanggal }}</td>
                                    <td>{{ Str::limit($t->u_hardware, 200) }}</td>
                                    <td>{{ $t->shift }}</td>
                                    <td>{{ $t->kategori }}</td>
                                    <td>{{ $t->user_id }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning active">Pending</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-icon btn-success me-1" type="button" data-bs-toggle="modal"
                                            data-bs-target="#basicModalView{{ $t->id }}" aria-expanded="false"
                                            aria-controls="multiCollapseExample2"> <span
                                                class="tf-icons bx bx-qr-scan"></span>
                                        </button>
                                        <a href="/activitydetail/{{ $t->id }}">
                                            <button type="button" class="btn btn-primary">
                                                <span class="tf-icons bx bx-detail"></span>&nbsp; Details
                                            </button>
                                        </a>
                                        <!-- View Modal -->
                                        <div class="modal fade" id="basicModalView{{ $t->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div
                                                        class="modal-body d-flex justify-content-center align-items-center">
                                                        <div class="col-sm-6 col-lg-12 mb-4 ">
                                                            <div class="card">
                                                                <div
                                                                    style="overflow:scroll; max-height: auto; width: 100%  ">
                                                                    <img src="{{ asset('storage/' . $t->foto) }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>
                            @endforeach
                @endif
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Add Data Log Activity Non Toll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{!! url('/nontoll') !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3" hidden>
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">User ID</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-devices"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="user_id" id="user_id" value="{{ auth()->user()->nama }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" hidden>
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kategori
                                Activity</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-devices"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="kategori_activity" id="kategori_activity" aria-label="John Doe"
                                        value="NonToll" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-calendar"></i></span>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        placeholder="DD/MM/YYYY" aria-label="John Doe" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jenis Hardware</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <div class="col-md d-flex align-items-center ">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="PC/Laptop"
                                                name="j_hardware[]" value="PC/Laptop" />
                                            <label class="form-check-label" for="inlineCheckbox1">PC/Laptop</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Server"
                                                name="j_hardware[]" value="Server" />
                                            <label class="form-check-label" for="inlineCheckbox2">Server</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Printer/Periferal"
                                                name="j_hardware[]" value="Printer/Periferal" />
                                            <label class="form-check-label"
                                                for="inlineCheckbox1">Printer/Periferal</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Internet/Jaringan"
                                                name="j_hardware[]" value="Internet/Jaringan" />
                                            <label class="form-check-label"
                                                for="inlineCheckbox2">Internet/Jaringan</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="LTCS/TFI/PCS/RTM/CCTV"
                                                name="j_hardware[]" value="LTCS/TFI/PCS/RTM/CCTV" />
                                            <label class="form-check-label"
                                                for="inlineCheckbox2">LTCS/TFI/PCS/RTM/CCTV</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                            <div class="col-sm-10">
                                <textarea id="u_hardware" name="u_hardware" class="form-control" placeholder="Penjabaran Masalah Hardware"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Standart
                                Aplikasi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <div class="col-md d-flex align-items-center ">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Sistem Operasi"
                                                name="s_aplikasi[]" value="Sistem Operasi" />
                                            <label class="form-check-label" for="Sistem Operasi">Sistem Operasi</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Microsoft Office"
                                                name="s_aplikasi[]" value="Microsoft Office" />
                                            <label class="form-check-label" for="Microsoft Office">Microsoft
                                                Office</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                            <div class="col-sm-10">
                                <textarea name="u_aplikasi" id="u_aplikasi" class="form-control" placeholder="Penjabaran Masalah Sistem"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Aplikasi IT &
                                Peralatan Toll</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <div class="col-md d-flex align-items-center ">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Program LTCS/TFI"
                                                name="a_it[]" value="Program LTCS/TFI" />
                                            <label class="form-check-label" for="Program LTCS/TFI">Program
                                                LTCS/TFI</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Program PCS"
                                                name="a_it[]" value="Program PCS" />
                                            <label class="form-check-label" for="Program PCS">Program PCS</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Program RTM"
                                                name="a_it[]" value="Program RTM" />
                                            <label class="form-check-label" for="Program RTM">Program RTM</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="Program CCTV/VMS"
                                                name="a_it[]" value="Program CCTV/VMS" />
                                            <label class="form-check-label" for="Program CCTV/VMS">Program
                                                CCTV/VMS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                            <div class="col-sm-10">
                                <textarea id="u_it" name="u_it" class="form-control"
                                    placeholder="Penjabaran Masalah Aplikasi IT & Peralatan Toll"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Catatan</label>
                            <div class="col-sm-10">
                                <textarea id="catatan" name="catatan" class="form-control" placeholder="Catatan Tambahan jika Diperlukan"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Shift</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-run "></i></span>
                                    <select class="form-select" id="shift" name="shift">
                                        <option value="Satu">Satu</option>
                                        <option value="Dua2">Dua</option>
                                        <option value="Tiga">Tiga</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Lokasi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-location-plus "></i></span>
                                    <select class="form-select" id="lokasi" name="lokasi"
                                        aria-label="Default select example">
                                        @foreach ($lokasi as $l)
                                            <option value="{{ $l->nama }}">{{ $l->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kategori</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-package "></i></span>
                                    <select class="form-select" id="kategori" name="kategori"
                                        aria-label="Default select example">
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kondisi Akhir</label>
                            <div class="col-sm-10">
                                <textarea id="kondisi_akhir" name="kondisi_akhir" class="form-control" placeholder="kondisi Akhir "></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Biaya</label>
                            <div class="col-sm-10">
                                <input type="number" inputmode="numeric" id="biaya" name="biaya"
                                    class="form-control" placeholder="example : 80.000" required></input>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Foto</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-camera"></i></span>
                                    <input type="file" class="form-control" id="foto" name="foto" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" hidden>
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status</label>
                            <div class="col-sm-10">
                                <input id="status" name="status" class="form-control" value="pending"
                                    readonly></input>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Print Activity -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Print Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="startdate" class="form-label">Start Date</label>
                            <input type="date" id="startdate" name="startdate" class="form-control"
                                placeholder="Tanggal Mulai" />
                        </div>
                        <div class="col mb-0">
                            <label for="enddate" class="form-label">End Date</label>
                            <input type="date" id="enddate" name="enddate" class="form-control"
                                placeholder="Tanggal Berakhir" />
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <a href=""
                            onclick="this.href='/print_activity_nontoll/' + document.getElementById('startdate').value + '/' + document.getElementById('enddate').value "
                            target="_blank">
                            <button type="submit" class="btn btn-primary">Cetak Data Data</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
