{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Account<i
                class='bx bx-user m-1'></i></h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded"
                                height="150" width="150" id="uploadedAvatar" />
                                <div class="row">
                                    <p class="text-muted mb-3">NAMA POSISI </p>

                                <p class="text-muted mb-3">POSISI</p>

                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary mt-3">
                            
                            <span class="d-none d-sm-block">Edit Profile</span>
                        </button>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="firstName" name="firstName"
                                        value="John" autofocus disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="john.doe@example.com" placeholder="john.doe@example.com" disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Nomor HP</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">IND (+62)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                            placeholder="+6282393169811" disabled />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="organization" name="organization"
                                        value="ThemeSelection" disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Level</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" disabled />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="state" class="form-label">Foto Tanda Tangan</label>
                                    <div class="d-flex align-items-start align-items-sm-center gap-4 m-1">
                                        <img src="{{ asset('img/avatars/1.png') }}" alt="user-avatar"
                                            class="d-block rounded" height="200" width="200" id="uploadedAvatar" />
                                    </div>
                                    <input type="file" class="form-control" id="address" name="address"
                                        placeholder="Address" disabled />
                                </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@endsection
