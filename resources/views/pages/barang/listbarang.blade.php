{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang/</span>List Barang<i
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
                            <button type="button" class="btn btn-icon btn-primary m-1"  data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                <span class="tf-icons bx bx-plus"></span>
                            </button>
                            <a href="/print_listbarang" target="_blank">
                                <button type="button" class="btn btn-icon btn-secondary m-1">
                                    <span class="tf-icons bx bx-printer"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class=" table-responsive text-nowrap mt-3">
                    <table class="table table-bordered table-striped  table-hover " width="1000px">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Equipment</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Merk</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($listbarang as $b)
                            <tbody>
                                <td>{{ ++$i }}</td>
                                <td>{{ $b->nama_equipment }}</td>
                                <td>{{ $b->unit }}</td>
                                <td>{{ $b->merk }}</td>
                                <td>{{ $b->stock }}</td>
                                <td class=" d-flex justify-content-center m-0 ">
                                    <button class="btn btn-icon btn-primary me-1" type="button" data-bs-toggle="modal"
                                        data-bs-target="#basicModalViewAdd{{ $b->id }}" aria-expanded="false"
                                        aria-controls="multiCollapseExample2"> <span class="tf-icons bx bx-plus"></span>
                                    </button>
                                    <button class="btn btn-icon btn-danger me-1" type="button" data-bs-toggle="modal"
                                        data-bs-target="#basicModalViewMinus{{ $b->id }}" aria-expanded="false"
                                        aria-controls="multiCollapseExample2"> <span class="tf-icons bx bx-minus"></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary me-1" type="button" aria-expanded="false"
                                        aria-controls="multiCollapseExample2"> <span
                                            class="tf-icons bx bx-message-detail"></span>
                                    </button>

                                    <!-- Add Stock Modal -->
                                    <div class="modal fade" id="basicModalViewAdd{{ $b->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Barang Masuk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center align-items-center">
                                                    <div class="col-sm-6 col-lg-12 mb-4 ">
                                                        <form action="{!! url('/listbarang/tambahstock/' . $b->id) !!}" method="POST">
                                                            @csrf
                                                            <div class="card">
                                                                <label class="form-label">Jumlah Barang
                                                                    Masuk</label>
                                                                <input type="number" name="stock" id="stock"
                                                                    class="form-control">
                                                            </div>
                                                                <button type="submit" class="btn btn-primary mt-3">
                                                                    <span class="tf-icons bx bx-layer-plus"></span>&nbsp;
                                                                    Update Stock
                                                                </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Minus Stock Modal -->
                                    <div class="modal fade" id="basicModalViewMinus{{ $b->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Barang Keluar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center align-items-center">
                                                    <div class="col-sm-6 col-lg-12 mb-4 ">
                                                        <form action="{!! url('/listbarang/kurangstock/' . $b->id) !!}" method="POST">
                                                            @csrf
                                                            <div class="card">
                                                                <label class="form-label">Jumlah Barang
                                                                    Keluar</label>
                                                                <input type="number" name="stock" id="stock"
                                                                    class="form-control" >
                                                            </div>
                                                                <button type="submit" class="btn btn-danger mt-3">
                                                                    <span class="tf-icons bx bx-layer-minus"></span>&nbsp;
                                                                    Update Stock
                                                                </button>
                                                        </form>
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
