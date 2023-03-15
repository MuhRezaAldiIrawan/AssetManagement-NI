{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Account<i class='bx bx-user m-1'></i>
        </h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="" style="width: 200px; height: 200px" class="rounded">
                            @else
                                <img src="{{ asset('img/Logo/mun.png') }}" alt=""
                                    style="max-height: 200px; width: 180px">
                            @endif
                            <div class="row">
                                <h2 class="text-muted mb-3">{{ auth()->user()->nama }}</h2>
                                <h3 class="text-muted mb-3">{{ auth()->user()->jabatan }}</h3>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary mt-3" data-bs-toggle="modal"
                            data-bs-target="#fullscreenModal">
                            <span class="d-none d-sm-block">Edit Profile</span>
                        </button>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->nama }}"
                                        value="john.doe@example.com"  disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}"
                                            disabled />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ auth()->user()->jabatan }}"
                                        value="ThemeSelection" disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Tanda Tangan</label>
                                    <input type="file" class="form-control" id="address" name="address"
                                        placeholder="Address" disabled />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="state" class="form-label">Foto Tanda Tangan</label>
                                    <div class="d-flex align-items-start align-items-sm-center gap-4 m-1">
                                        @if (auth()->user()->ttd)
                                        <img src="{{ asset('storage/' . auth()->user()->ttd) }}" alt="">
                                        @else
                                            <img src="{{ asset('img/Logo/mun.png') }}" alt=""
                                                style="max-height: 200px; width: 180px">
                                        @endif
                                        {{-- <img src="{{ asset('img/avatars/1.png') }}" alt="user-avatar"
                                            class="d-block rounded" height="200" width="200" id="uploadedAvatar" /> --}}
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- /Account -->
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
                    <form action="{!! url('/users/update') !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->nama }}"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}"
                                    />
                                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Foto</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-comment"></i></span>
                                <input id="foto" name="foto" type="file" class="form-control"
                                    placeholder="Hi, Do you have a moment to talk Joe?" type="file"></input>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Foto TTD</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-comment"></i></span>
                                <input id="ttd" name="ttd" type="file" class="form-control"
                                     type="file"></input>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Data Users</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
