{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span>All User<i
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
                                data-bs-target="#fullscreenModal">
                                <span class="tf-icons bx bx-plus"></span>
                            </button>
                            <a href="/print_allusers" target="_blank">
                                <button type="button" class="btn btn-icon btn-secondary m-1">
                                    <span class="tf-icons bx bx-printer"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered"  width="1000px">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="25%">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center" width="15%">Jabatan</th>
                                <th class="text-center"  width="19%">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($allusers as $l)
                            <tbody>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->nama }}</td>
                                <td>{{ $l->email }}</td>
                                <td>{{ $l->jabatan }}</td>

                                {{-- <div style="height: 30px; overflow:hidden; width: 30px"> 
                                        <img src="{{ asset('storage/' . $l->foto ) }}" alt="">
                                    </div> --}}

                                <td>
                                    <button class="btn btn-icon btn-success me-1" type="button" data-bs-toggle="modal"
                                        data-bs-target="#basicModalView{{ $l->id }}" aria-expanded="false"
                                        aria-controls="multiCollapseExample2"> <span class="tf-icons bx bx-qr-scan"></span>
                                    </button>

                                    <button type="button" class="btn btn-icon btn-primary m-1" data-bs-toggle="modal"
                                        data-bs-target="#basicModal{{ $l->id }}">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </button>
                                    <a class="btn btn-icon btn-danger m-1" href="/allusers/delete/{{ $l->id }}"><span
                                            class="tf-icons bx bx-trash"></span></a>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="basicModal{{ $l->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! url('/allusers/update/'. $l->id ) !!}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <div class="row">
                                                            <div class="col mb-3">
                                                                <label for="nameBasic" class="form-label">ID User</label>
                                                                <input type="text" id="id" name="id"
                                                                    class="form-control" value="{{ $l->id }}"
                                                                    disabled />
                                                            </div>
                                                        </div> --}}
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="Nama" class="form-label">Nama</label>
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" value="{{ $l->nama }}" />
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="text" id="email" name="email"
                                                                    class="form-control" value="{{ $l->email }}" />
                                                            </div>
                                                        </div>
                                                        {{-- <div class="row" hidden>
                                                            <div class="col mb-3">
                                                                <label for="nameBasic" class="form-label">Passwrod</label>
                                                                <input type="text" id="password" name="password"
                                                                    class="form-control" value="{{ $l->password }}"
                                                                    disabled />
                                                            </div>
                                                        </div> --}}
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="jabatan"
                                                                    class="form-label mt-2">Jabatan</label>
                                                                <select id="jabatan" name="jabatan"
                                                                    class="form-select">
                                                                    <option>Default select</option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Svp.IT">Svp.IT</option>
                                                                    <option value="Ka.Bang MMN">Ka.Bang MMN</option>
                                                                    <option value="ka.Bang JTSE">Ka.Bang JTSE</option>
                                                                    <option value="KSPT">KSPT</option>
                                                                    <option value="Staf IT">Staf IT</option>
                                                                    <option value="IT Maintenance">IT Maintenance</option>
                                                                </select>
                                                                {{-- <input type="text" id="jabatan" name="jabatan"
                                                                    class="form-control" value="{{ $l->jabatan }}" /> --}}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <label for="nameBasic"
                                                                    class="form-label mt-2">Foto</label>
                                                                <input type="file" id="foto" name="foto"
                                                                    class="form-control" value="{{ $l->foto }}" />
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-3">Update
                                                            Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View Modal -->
                                    <div class="modal fade" id="basicModalView{{ $l->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center align-items-center">
                                                    <div class="col-sm-6 col-lg-12 mb-4 ">
                                                        <div class="card">
                                                            <div style="overflow:scroll; max-height: auto; width: 100%  ">
                                                                <img src="{{ asset('storage/' . $l->foto) }}"
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
                    <form action="{!! url('/allusers') !!}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="At Least 6" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Jabatan</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-crown'></i></span>
                                {{-- <input type="text" id="jabatan" name="jabatan" class="form-control"
                                    placeholder="At Least 6" /> --}}
                                <select id="jabatan" name="jabatan" class="form-select">
                                    <option>Default select</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Svp.IT">Svp.IT</option>
                                    <option value="Ka.Bang MMN">Ka.Bang MMN</option>
                                    <option value="ka.Bang JTSE">Ka.Bang JTSE</option>
                                    <option value="KSPT">KSPT</option>
                                    <option value="Staf IT">Staf IT</option>
                                    <option value="IT Maintenance">IT Maintenance</option>
                                </select>
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

                        <button type="submit" class="btn btn-primary">Add Data Users</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
