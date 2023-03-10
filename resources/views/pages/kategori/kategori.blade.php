{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">Kategori</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-primary m-1" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
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
                <div class="table-responsive text-wrap">
                    <table class="table table-bordered table-striped  table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center"width="200px">Action</th>
                            </tr>
                        </thead>
                        @foreach ($kategori as $l)
                            <tbody>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->nama }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-icon btn-primary m-2" data-bs-toggle="modal"
                                        data-bs-target="#basicModal{{ $l->id }}">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </button>
                                    <a class="btn btn-icon btn-danger m-1" href="/kategori/delete/{{ $l->id }}"><span class="tf-icons bx bx-trash"></span></a>

                                    <!-- Edit Modal --> 
                                    <div class="modal fade" id="basicModal{{ $l->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Edit Data Location</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! url('/kategori/update') !!}" method="POST">
                                                        {{-- @method('patch') --}}
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $l->id }}">
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="namalokasi" class="form-label">Nama</label>
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" placeholder="Nama Lokasi"
                                                                    value="{{ $l->nama }}" required />
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-3">Update
                                                            Data</button>
                                                    </form>
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

    <!-- Modal Add Data -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Data Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{!! url('/kategori') !!}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="namalokasi" class="form-label">Nama Kategori</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Nama Kategori" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">add
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

