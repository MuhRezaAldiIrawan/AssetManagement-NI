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
                            <a href="/print_listbarang" target="_blank">
                                <button type="button" class="btn btn-icon btn-secondary m-1">
                                    <span class="tf-icons bx bx-printer"></span>
                                </button>
                            </a>
                            <div class="btn-group" id="dropdown-icon-demo">
                                <button type="button" class="btn btn-icon btn-info m-1 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown" data-bs-offset="10,20">
                                    <span class="tf-icons bx bx-export"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#modalToggle"><i
                                                class="bx bxl-microsoft-teams scaleX-n1-rtl m-1"></i>Excel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i
                                                class="bx bxs-file-pdf scaleX-n1-rtl m-1"></i>Pdf</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i
                                                class="bx bxs-file-doc scaleX-n1-rtl m-1"></i>CSV</a>
                                    </li>
                                </ul>
                            </div>
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
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Uraian Jenis Hardware</th>
                                <th class="text-center">Shift</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">user</th>
                            </tr>
                        </thead>
                        @foreach ($tollhistori as $b)
                            <tbody>
                                <td>{{ ++$i }}</td>
                                <td>{{ $b->tanggal }}</td>
                                <td>{{ Str::limit($b->u_hardware, 100) }}</td>
                                <td>{{ $b->shift }}</td>
                                <td>{{ $b->kategori }}</td>
                                <td>{{ $b->user->nama }}</td>
                                <td>
                                    <a href="/activitydetail/{{ $b->id }}">
                                        <button type="button" class="btn btn-primary">
                                            <span class="tf-icons bx bx-detail"></span>&nbsp; Details
                                        </button>
                                    </a>
                                </td>
                            </tbody>
                      
                        @endforeach
                    </table>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{ $tollhistori->links() }}
                        </ul>
                    </nav>
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
