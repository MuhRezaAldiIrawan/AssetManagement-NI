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
                        <h4 class="m-0">Log Activity Barang</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-secondary m-1">
                                <span class="tf-icons bx bx-printer"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-xl-12">
                    <h6 class="text-muted">Filled Tabs</h6>
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-masuk" aria-controls="navs-justified-masuk"
                                    aria-selected="true">
                                    <i class="tf-icons bx bx-archive-in"></i> Masuk
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-keluar" aria-controls="navs-justified-keluar"
                                    aria-selected="false">
                                    <i class="tf-icons bx bx-archive-out"></i> Keluar
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-justified-masuk" role="tabpanel">
                                <div class=" table-responsive text-nowrap mt-3">
                                    <table class="table table-bordered table-striped  table-hover " width="1000px">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Nama Equipment</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">Stock</th>
                                                <th class="text-center">Activity</th>
                                            </tr>
                                        </thead>
                                        @foreach ($logbarangmasuk as $lb)
                                            @if ($lb->activity == 'masuk')
                                                <tbody>
                                                    <td>{{ ++$i_masuk }}</td>
                                                    <td>{{ $lb->tanggal }}</td>
                                                    <td>{{ $lb->nama_equipment }}</td>
                                                    <td>{{ $lb->merk }}</td>
                                                    <td>{{ $lb->stock }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success active">Masuk</button>
                                                    </td>
                                                </tbody>
                                            @endif
                                        @endforeach
                                    </table>

                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            {{ $logbarangmasuk->links() }}
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-justified-keluar" role="tabpanel">
                                <div class=" table-responsive text-nowrap mt-3">
                                    <table class="table table-bordered table-striped  table-hover " width="1000px">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Nama Equipment</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">Stock</th>
                                                <th class="text-center">Activity</th>
                                            </tr>
                                        </thead>
                                        @foreach ($logbarangkeluar as $lb)
                                            @if ($lb->activity == 'keluar')
                                                <tbody>
                                                    <td>{{ ++$i_keluar }}</td>
                                                    <td>{{ $lb->tanggal }}</td>
                                                    <td>{{ $lb->nama_equipment }}</td>
                                                    <td>{{ $lb->merk }}</td>
                                                    <td>{{ $lb->stock }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger active">Keluar</button>
                                                    </td>
                                                </tbody>
                                            @endif
                                        @endforeach
                                    </table>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            {{ $logbarangkeluar->links() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class=" table-responsive text-nowrap mt-3">
                    <table class="table table-bordered table-striped  table-hover " width="1000px">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nama Equipment</th>
                                <th class="text-center">Merk</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Activity</th>
                            </tr>
                        </thead>
                        @foreach ($logbarang as $lb)
                        <tbody>
                            <td>{{ ++$i }}</td>
                            <td>{{ $lb->tanggal }}</td>
                            <td>{{ $lb->nama_equipment }}</td>
                            <td>{{ $lb->merk }}</td>
                            <td>{{ $lb->stock }}</td>
                            <td>
                                @if ($lb->activity == 'masuk')
                                    <button type="button" class="btn btn-success active">{{ $lb->activity }}</button>   
                                @elseif($lb->activity == 'keluar') 
                                <button type="button" class="btn btn-danger active">{{ $lb->activity }}</button>   
                                @endif  
                        </tbody>
                        @endforeach                     
                    </table>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{ $logbarang->links() }}
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- <!-- Add Data Barang -->
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
    </div> --}}
@endsection
