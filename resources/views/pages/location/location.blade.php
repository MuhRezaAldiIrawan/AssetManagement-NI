{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
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
                                data-bs-target="#basicModal"">
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
                                <th>IdLokasi</th>
                                <th>Nama</th>
                                <th>Singkatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10-10-10</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque beatae cupiditate
                                    necessitatibus temporibus hic sit qui dolorem.</td>
                                <td>>3</td>
                                <td>
                                    <div>
                                        <button type="button " class="btn btn-primary " aria-expanded="false"><i
                                                class='bx bx-edit'></i>
                                            
                                        </button>
                                        <button type="button" class="btn btn-danger mt-2 " aria-expanded="false"><i
                                                class='bx bx-trash'></i>
                                            
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Data Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">ID</label>
                            <input type="text" id="emailBasic" class="form-control" placeholder="Id Lokasi" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">Nama</label>
                            <input type="text" id="dobBasic" class="form-control" placeholder="Nama Lokasi" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label mt-3">Lokasi</label>
                            <input type="text" id="dobBasic" class="form-control" placeholder="Lokasi" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label mt-3">Singkatan</label>
                            <input type="text" id="emailBasic" class="form-control"
                                placeholder="Singkatan Nama Lokasi" />
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
            });
        });
    </script>
@endsection
