{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">Lokasi</h4>
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
                <div class="text-wrap">
                    <table class="table table-bordered table-striped nowrap table-hover display" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Singkatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($location as $l)
                            <tbody>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->nama }}</td>
                                <td>{{ $l->singkatan }}</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-primary m-1" data-bs-toggle="modal"
                                        data-bs-target="#basicModal{{ $l->id }}">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-danger m-1" data-bs-toggle="modal"
                                        data-bs-target="#basicModal{{ $l->id }}">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </button>

                                    <!-- Modal Edit Data -->
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
                                                    <form action="{!! url('/location/update') !!}" method="POST">
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
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="singkatan"
                                                                    class="form-label mt-3">Singkatan</label>
                                                                <input type="text" id="singkatan" name="singkatan"
                                                                    class="form-control" placeholder="Singkatan Nama Lokasi"
                                                                    value="{{ $l->singkatan }}" required />
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-3">Update
                                                            Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Delete Data -->
                                    <div class="modal fade" id="basicModaldelete" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Delete Data Location
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! url('/location') !!}" method="POST">
                                                        @csrf
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="namalokasi" class="form-label">Nama</label>
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" placeholder="Nama Lokasi"
                                                                    value="{{ $l->nama }}" required />
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="singkatan"
                                                                    class="form-label mt-3">Singkatan</label>
                                                                <input type="text" id="singkatan" name="singkatan"
                                                                    class="form-control"
                                                                    placeholder="Singkatan Nama Lokasi"
                                                                    value="{{ $l->singkatan }}" required />
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-3">Delete</button>
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
                    <form action="{!! url('/location') !!}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="namalokasi" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Nama Lokasi" required />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="singkatan" class="form-label mt-3">Singkatan</label>
                                <input type="text" id="singkatan" name="singkatan" class="form-control"
                                    placeholder="Singkatan Nama Lokasi" required />
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
                // processing: true,
                // ajax: {
                //     'url':'/location',
                //     'type': 'GET'
                // },
                // columns: [
                //     {data: 'id', name: 'id'},
                //     {data: 'nama', name: 'nama'},
                //     {data: 'singkatan', name: 'singkatan'},
                // ]
            });
        });
    </script>
@endsection
