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
                                    name="user_id" id="user_id" value="{{ auth()->user()->id }}" readonly />
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
                                    <option value="Dua">Dua</option>
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