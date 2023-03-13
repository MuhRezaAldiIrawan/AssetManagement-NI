{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Activity /</span>Log Activity Toll<i
                class='bx bx-street-view m-1'></i></h5>
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">Log Activity</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-primary m-1" data-bs-toggle="modal"
                                data-bs-target="#fullscreenModal"">
                                <span class="tf-icons bx bx-plus"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary m-1">
                                <span class="tf-icons bx bx-printer"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="text-wrap">
                    <table class="table table-bordered table-striped nowrap table-hover display" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian Jenis Hardware</th>
                                <th>Shift</th>
                                <th>Kategori</th>
                                <th>user</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Add Data Log Activity Toll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{!! url('/toll') !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kategori
                                Activity</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-devices"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="kategori_activity" id="kategori_activity" aria-label="John Doe" />
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
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-calendar"></i></span>
                                    <input type="text" class="form-control" id="j_hardware" name="j_hardware"
                                        placeholder="Jenis Hardwarwe" aria-label="John Doe" />
                                    {{-- <div class="col-md d-flex align-items-center ">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">PC/Laptop</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" />
                                            <label class="form-check-label" for="inlineCheckbox2">Server</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">Printer/Periferal</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" />
                                            <label class="form-check-label"
                                                for="inlineCheckbox2">Internet/Jaringan</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" />
                                            <label class="form-check-label"
                                                for="inlineCheckbox2">LTCS/TFI/PCS/RTM/CCTV</label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                            <div class="col-sm-10">
                                <input id="u_hardware" name="u_hardware" class="form-control"
                                    placeholder="Penjabaran Masalah Hardware"></input>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Standart
                                Aplikasi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <div class="col-md d-flex align-items-center ">
                                        <input type="text" class="form-control" id="s_aplikasi" name="s_aplikasi"
                                            placeholder="Jenis Hardwarwe" />
                                        {{-- <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">Sistem Operasi</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" />
                                            <label class="form-check-label" for="inlineCheckbox2">Microsoft Office</label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                            <div class="col-sm-10">
                                <input  name="u_aplikasi" id="u_aplikasi" class="form-control" placeholder="Penjabaran Masalah Sistem"
                                    ></input>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Aplikasi IT &
                                Peralatan Toll</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <div class="col-md d-flex align-items-center ">
                                        <input  name="a_it" id="a_it" class="form-control" placeholder="Penjabaran Masalah Sistem"
                                        ></input>
                                        {{-- <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">Program LTCS/TFI</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" />
                                            <label class="form-check-label" for="inlineCheckbox2">Program PCS</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">Program RTM</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" />
                                            <label class="form-check-label" for="inlineCheckbox2">Program CCTV/VMS</label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                            <div class="col-sm-10">
                                <input id="u_it" name="u_it" class="form-control"
                                    placeholder="Penjabaran Masalah Aplikasi IT & Peralatan Toll" ></input>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Catatan</label>
                            <div class="col-sm-10">
                                <input id="catatan" name="catatan" class="form-control" placeholder="Catatan Tambahan jika Diperlukan"></input>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Shift</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-run "></i></span>
                                    <select class="form-select" id="shift" name="shift">
                                        <option selected disabled>Open this select menu</option>
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
                                        <option selected>Open this select menu</option>
                                        <option value="Satu">Satu</option>
                                        <option value="Dua">Dua</option>
                                        <option value="Tiga">Tiga</option>
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
                                        <option selected>Open this select menu</option>
                                        <option value="Satu">Satu</option>
                                        <option value="Dua">Dua</option>
                                        <option value="Tiga">Tiga</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kondisi Akhir</label>
                            <div class="col-sm-10">
                                <input id="kondisi_akhir" name="kondisi_akhir" class="form-control"
                                    placeholder="kondisi Akhir " 
                                    ></input>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Foto</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-camera"></i></span>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                // scrollX: true
                scrollY: 400,
                // deferRender: true,
                // responsive: true,
                // fixedHeader: true,
                // colReorder: true,
                // dom: 'Bfrtip',
                // autoFill: true
                // buttons: [
                //     'copy', 'excel', 'pdf'
                // ]
                // rowReorder: true,
                // paginate: true,
                // scrollY: true,
                // responsive: true,
            });
        });
    </script>
@endsection
