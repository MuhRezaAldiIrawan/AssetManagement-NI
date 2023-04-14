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
                                        style="width:250px" alt="Card image" />
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
                                                        <p>Tanggal Pengajuan : {{ $d->tanggal }}</p>
                                                        <p>Kategori : {{ $d->kategori_activity }} </p>
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
                                                        <p>Shift : {{ $d->shift }}</p>
                                                        <p>Lokasi :{{ $d->lokasi }}</p>
                                                        <p>Kategori :{{ $d->kategori }}</p>
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
                                                        <p>Jenis Hardware : </p>
                                                        <?php $counter = 1; ?>
                                                        @foreach ($activitydetail as $item)
                                                            @foreach (explode(',', $item->j_hardware) as $hardware)
                                                                {{ $counter }}. {{ $hardware }}<br>
                                                                <?php $counter++; ?>
                                                            @endforeach
                                                        @endforeach
                                                        <p class="mt-3">Uraian Hardware : </p>
                                                        <p>{{ $d->u_hardware }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item m-3">
                                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                                    id="accordionIconOne">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionIcon-8"
                                                        aria-controls="accordionIcon-8">
                                                        Uraian & GTO
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-8" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">

                                                    <div class="accordion-body">
                                                        <p>GTO : </p>
                                                        <?php $counter = 1; ?>
                                                        @foreach ($activitydetail as $item)
                                                            @foreach (explode(',', $item->gto) as $hardware)
                                                                {{ $counter }}. {{ $hardware }}<br>
                                                                <?php $counter++; ?>
                                                            @endforeach
                                                        @endforeach
                                                        <p class="mt-3">Uraian Hardware : </p>
                                                        <p>{{ $d->u_gto }}</p>
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
                                                        <p>Standart Aplikasi : </p>
                                                        <?php $counter = 1; ?>
                                                        @foreach ($activitydetail as $item)
                                                            @foreach (explode(',', $item->s_aplikasi) as $hardware)
                                                                {{ $counter }}. {{ $hardware }}<br>
                                                                <?php $counter++; ?>
                                                            @endforeach
                                                        @endforeach
                                                        <p class="mt-3">Uraian Standart Aplikasi : </p>
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
                                                        <P>Aplikasi IT : </P>
                                                        <?php $counter = 1; ?>
                                                        @foreach ($activitydetail as $item)
                                                            @foreach (explode(',', $item->a_it) as $hardware)
                                                                {{ $counter }}. {{ $hardware }}<br>
                                                                <?php $counter++; ?>
                                                            @endforeach
                                                        @endforeach
                                                        <p class="mt-3">Uraian Aplikasi IT</p>
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
                                                        Catatan & Kondisi Akhir dan Biaya
                                                    </button>
                                                </h2>

                                                <div id="accordionIcon-6" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionIcon">
                                                    <div class="accordion-body">
                                                        <p>{{ $d->catatan }}</p>
                                                        <p>{{ $d->kondisi_akhir }}</p>
                                                        <p>Rp. {{ $d->biaya }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="demo-inline-spacing d-flex justify-content-end ">
                                                @if ($d->kategori_activity == 'pengembangan')
                                                    <a href="/print_detail_pengembangan/{{ $d->id }}" target="_blank">
                                                        <button type="button" class="btn btn-secondary m-1">
                                                            <span class="tf-icons bx bx-printer"></span>&nbsp; Print
                                                        </button>
                                                    </a>
                                                @else
                                                    <a href="/print_detail/{{ $d->id }}" target="_blank">
                                                        <button type="button" class="btn btn-secondary m-1">
                                                            <span class="tf-icons bx bx-printer"></span>&nbsp; Print
                                                        </button>
                                                    </a>
                                                @endif
                                                @can('accept')
                                                    @if (auth()->user()->role == 'atasan it' && $d->status == 'pending')
                                                        <form action="{!! url('/activitydetail/rejected/' . $d->id) !!}" method="POST">
                                                            @csrf
                                                            <input id="id" name="id" class="form-control"
                                                                value="{{ $d->id }}" readonly hidden></input>
                                                            <input id="status" name="status" class="form-control"
                                                                value="rejected" readonly hidden></input>
                                                            <button type="submit" class="btn btn-danger m-1">
                                                                <span class="tf-icons bx bx-trash"></span>&nbsp; Rejected
                                                            </button>
                                                        </form>
                                                        <form action="{!! url('/activitydetail/atasanit/' . $d->id) !!}" method="POST">
                                                            @csrf
                                                            <input id="first_review_id" name="first_review_id"
                                                                class="form-control" value="{{ auth()->user()->id }}"
                                                                readonly hidden></input>
                                                            <button type="submit" class="btn btn-success m-1">
                                                                <span class="tf-icons bx bx-select-multiple"></span>&nbsp;
                                                                Approve
                                                            </button>
                                                        </form>
                                                    @elseif(auth()->user()->role == 'it' && $d->status == 'pending')
                                                        <form action="{!! url('/activitydetail/rejected/' . $d->id) !!}" method="POST">
                                                            @csrf
                                                            <input id="id" name="id" class="form-control"
                                                                value="{{ $d->id }}" readonly hidden></input>
                                                            <input id="status" name="status" class="form-control"
                                                                value="rejected" readonly hidden></input>
                                                            <button type="submit" class="btn btn-danger m-1">
                                                                <span class="tf-icons bx bx-trash"></span>&nbsp; Rejected
                                                            </button>
                                                        </form>
                                                        <form action="{!! url('/activitydetail/pengecekanit/' . $d->id) !!}" method="POST">
                                                            @csrf
                                                            <input id="second_review_id" name="second_review_id"
                                                                class="form-control" value="{{ auth()->user()->id }}"
                                                                readonly hidden></input>
                                                            <button type="submit" class="btn btn-success m-1">
                                                                <span class="tf-icons bx bx-select-multiple"></span>&nbsp;
                                                                Approve
                                                            </button>
                                                        </form>
                                                    @elseif(auth()->user()->role == 'superadmin' && $d->status == 'pending')
                                                        <form action="{!! url('/activitydetail/rejected/' . $d->id) !!}" method="POST">
                                                            @csrf
                                                            <input id="id" name="id" class="form-control"
                                                                value="{{ $d->id }}" readonly hidden></input>
                                                            <input id="status" name="status" class="form-control"
                                                                value="rejected" readonly hidden></input>
                                                            <button type="submit" class="btn btn-danger m-1">
                                                                <span class="tf-icons bx bx-trash"></span>&nbsp; Rejected
                                                            </button>
                                                        </form>
                                                        <form action="{!! url('/activitydetail/pengecekanit/' . $d->id) !!}" method="POST">
                                                            @csrf
                                                            <input id="second_review" name="second_review"
                                                                class="form-control" value="{{ auth()->user()->id }}"
                                                                readonly hidden></input>
                                                            <button type="submit" class="btn btn-success m-1">
                                                                <span class="tf-icons bx bx-select-multiple"></span>&nbsp;
                                                                Approve
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endcan
                                            </div>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 
    @php
        $j_hardware = json_decode($activitydetail[0]->j_hardware);
        $s_aplikasi = json_decode($activitydetail[0]->s_aplikasi);
        $a_it = json_decode($activitydetail[0]->a_it);
    @endphp

    <!-- Add Modal -->
    <div class="modal fade" id="approve" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Add Data Log Activity Toll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($activitydetail as $d)
                        <form action="{!! url('/activitydetail/update') !!}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Input ID</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-devices"></i></span>
                                        <input type="text" class="form-control" name="kategori_activity"
                                            id="kategori_activity" value="{{ $d->id }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kategori
                                    Activity</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-devices"></i></span>
                                        <input type="text" class="form-control" name="kategori_activity"
                                            id="kategori_activity" value="{{ $d->kategori_activity }}" readonly />
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
                                            value="{{ $d->tanggal }}" aria-label="John Doe" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jenis
                                    Hardware</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <div class="col-md d-flex align-items-center ">
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="PC/Laptop"
                                                    name="j_hardware[]" value="PC/Laptop"
                                                    {{ in_array('PC/Laptop', $j_hardware) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="inlineCheckbox1">PC/Laptop</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Server"
                                                    name="j_hardware[]" value="Server"
                                                    {{ in_array('Server', $j_hardware) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="inlineCheckbox2">Server</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Printer/Periferal"
                                                    name="j_hardware[]" value="Printer/Periferal"
                                                    {{ in_array('Printer/Periferal', $j_hardware) ? 'checked' : '' }} />
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">Printer/Periferal</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Internet/Jaringan"
                                                    name="j_hardware[]" value="Internet/Jaringan"
                                                    {{ in_array('Internet/Jaringan', $j_hardware) ? 'checked' : '' }} />
                                                <label class="form-check-label"
                                                    for="inlineCheckbox2">Internet/Jaringan</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox"
                                                    id="LTCS/TFI/PCS/RTM/CCTV" name="j_hardware[]"
                                                    value="LTCS/TFI/PCS/RTM/CCTV"
                                                    {{ in_array('LTCS/TFI/PCS/RTM/CCTV', $j_hardware) ? 'checked' : '' }} />
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
                                    <textarea id="u_hardware" name="u_hardware" class="form-control" placeholder="Penjabaran Masalah Hardware">{{ $d->u_hardware }}</textarea>
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
                                                    name="s_aplikasi[]" value="Sistem Operasi"
                                                    {{ in_array('Sistem Operasi', $s_aplikasi) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="Sistem Operasi">Sistem
                                                    Operasi</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Microsoft Office"
                                                    name="s_aplikasi[]" value="Microsoft Office"
                                                    {{ in_array('Microsoft Office', $s_aplikasi) ? 'checked' : '' }} />
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
                                    <textarea name="u_aplikasi" id="u_aplikasi" class="form-control" placeholder="Penjabaran Masalah Sistem">{{ $d->u_aplikasi }}</textarea>
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
                                                    name="a_it[]" value="Program LTCS/TFI"
                                                    {{ in_array('Program LTCS/TFI', $a_it) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="Program LTCS/TFI">Program
                                                    LTCS/TFI</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Program PCS"
                                                    {{ in_array('Program PCS', $a_it) ? 'checked' : '' }} name="a_it[]"
                                                    value="Program PCS" />
                                                <label class="form-check-label" for="Program PCS">Program PCS</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Program RTM"
                                                    {{ in_array('Program RTM', $a_it) ? 'checked' : '' }} name="a_it[]"
                                                    value="Program RTM" />
                                                <label class="form-check-label" for="Program RTM">Program RTM</label>
                                            </div>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Program CCTV/VMS"
                                                    {{ in_array('Program CCTV/VMS', $a_it) ? 'checked' : '' }}
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
                                        placeholder="Penjabaran Masalah Aplikasi IT & Peralatan Toll">{{ $d->u_it }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Catatan</label>
                                <div class="col-sm-10">
                                    <textarea id="catatan" name="catatan" class="form-control" placeholder="Catatan Tambahan jika Diperlukan">{{ $d->catatan }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Shift</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-run "></i></span>
                                        <select class="form-select" id="shift" name="shift">
                                            @foreach ($activitydetail as $key => $value)
                                                <option value="{{ $value->shift }}"
                                                    {{ $value->shift == 'Satu' ? 'selected' : '' }}>{{ $value->shift }}
                                                </option>
                                                <option value="{{ $value->shift }}"
                                                    {{ $value->shift == 'Dua' ? 'selected' : '' }}>{{ $value->shift }}
                                                </option>
                                                <option value="{{ $value->shift }}"
                                                    {{ $value->shift == 'Tiga' ? 'selected' : '' }}>{{ $value->shift }}
                                                </option>
                                            @endforeach
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
                                            @foreach ($activitydetail as $key => $value)
                                                <option value="{{ $value->shift }}"
                                                    {{ $value->shift == 'Satu' ? 'selected' : '' }}>{{ $value->shift }}
                                                </option>
                                                <option value="{{ $value->shift }}"
                                                    {{ $value->shift == 'Dua' ? 'selected' : '' }}>{{ $value->shift }}
                                                </option>
                                                <option value="{{ $value->shift }}"
                                                    {{ $value->shift == 'Tiga' ? 'selected' : '' }}>{{ $value->shift }}
                                                </option>
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
                                            @foreach ($activitydetail as $key => $value)
                                                <option value="{{ $value->kategori }}"
                                                    {{ $value->shift == 'Satu' ? 'selected' : '' }}>
                                                    {{ $value->kategori }}</option>
                                                <option value="{{ $value->kategori }}"
                                                    {{ $value->shift == 'Dua' ? 'selected' : '' }}>
                                                    {{ $value->kategori }}</option>
                                                <option value="{{ $value->kategori }}"
                                                    {{ $value->shift == 'Tiga' ? 'selected' : '' }}>
                                                    {{ $value->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kondisi
                                    Akhir</label>
                                <div class="col-sm-10">
                                    <textarea id="kondisi_akhir" name="kondisi_akhir" class="form-control" placeholder="kondisi Akhir ">{{ $d->kondisi_akhir }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Foto</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-camera"></i></span>
                                        <input type="file" class="form-control" id="foto" name="foto" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status</label>
                                <div class="col-sm-10">
                                    <input id="status" name="status" class="form-control" value="approve"
                                        readonly></input>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
@endsection
