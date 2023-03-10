{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span>All Userl<i
                class='bx bx-street-view m-1'></i></h5>
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">All User</h4>
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
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Actions</th>
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
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Add Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  action="{!! url('/alluser') !!}" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="nama" name="nama" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="email@gmail.com" />
                                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Password</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-email" class="input-group-text"><i
                                        class='bx bx-key'></i></span>
                                <input type="text" id="password" name="password" class="form-control"
                                    placeholder="At Least 6" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Jabatan</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-crown'></i></span>
                                <select id="jabatan" name="jabatan" class="form-select">
                                    <option>Default select</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Svp.IT</option>
                                    <option value="3">Ka.Bang MMN</option>
                                    <option value="1">ka.Bang JTSE</option>
                                    <option value="2">KSPT</option>
                                    <option value="3">Staf IT</option>
                                    <option value="3">IT Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Foto</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i
                                        class="bx bx-comment"></i></span>
                                <input id="foto" name="foto" type="file" class="form-control"
                                    placeholder="Hi, Do you have a moment to talk Joe?" type="file"></input>
                            </div>
                        </div>
                        <div class="mb-3" hidden>
                            <label class="form-label" for="basic-icon-default-message">Level</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i
                                        class="bx bx-comment"></i></span>
                                <input id="foto" name="foto" class="form-control"
                                    placeholder="Hi, Do you have a moment to talk Joe?" type="text" value="1"></input>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
