{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang/</span>Log Activity Barang<i
                class='bx bx-list-ol m-1'></i></h5>
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">List Barang</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-primary m-1" d data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
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
                <div class=" text-wrap mt-3">
                    <table class="table table-bordered table-striped  table-hover " width="1000px">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Equipment</th>
                                <th class="text-center">Merk</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Activity</th>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Data Barang -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add Data barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{!! url('/listbarang') !!}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="nama_equipment" class="form-label">Nama Equitment</label>
                                <input type="text" id="nama_equipment" name="nama_equipment" class="form-control"
                                    placeholder="nama_equitment" />
                            </div>
                            <div class="col mb-0">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="text" id="unit" name="unit" class="form-control"
                                    placeholder="Unit Barang" />
                            </div>
                        </div>
                        <div class="row g-2 ">
                            <div class="col mb-0 mt-3">
                                <label for="merk" class="form-label">Merk</label>
                                <input type="text" id="merk" name="merk" class="form-control"
                                    placeholder="Merek Barang" />
                            </div>
                            <div class="col mb-0 mt-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control"
                                    placeholder="Stock" />
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
