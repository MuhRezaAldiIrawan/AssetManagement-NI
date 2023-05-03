{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Activity /</span>Log Activity Toll<i
                class='bx bx-street-view m-1'></i></h5>
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
                                data-bs-target="#fullscreenModal"">
                                <span class="tf-icons bx bx-plus"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary m-1" data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                <span class="tf-icons bx bx-printer"></span>
                            </button>
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

                <form action="/toll" method="get">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <select id="cari" name="search" class="form-select">
                                <option value="" selected>Semua Lokasi</option>
                                @foreach ($lokasi as $l)
                                    <option>{{ $l->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-0">
                            <div class="demo-inline-spacing">
                                <button type="submit" class="btn btn-primary" value="CARI">
                                    <span class="tf-icons bx bx-search"></span>&nbsp; Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($toll->isEmpty())
                    @include('components.emptyfield')
                @else
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-bordered table-striped  table-hover display" width="1000px"
                            id="tbl_list">
                            <thead>
                                <tr class="text-wrap">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Uraian Jenis Hardware</th>
                                    <th class="text-center">Shift</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">user</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" width="21%">Action</th>
                                </tr>
                            </thead>
                            @foreach ($toll as $t)
                                <tbody>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $t->tanggal }}</td>
                                    <td>{{ Str::limit($t->u_hardware, 100) }}</td>
                                    <td>{{ $t->shift }}</td>
                                    <td>{{ $t->kategori }}</td>
                                    <td>{{ $t->user->nama }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning active">Pending</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-icon btn-success me-1" type="button" data-bs-toggle="modal"
                                            data-bs-target="#basicModalView{{ $t->id }}" aria-expanded="false"
                                            aria-controls="multiCollapseExample2"> <span
                                                class="tf-icons bx bx-qr-scan"></span>
                                        </button>
                                        <a href="/activitydetail/{{ $t->id }}">
                                            <button type="button" class="btn btn-primary">
                                                <span class="tf-icons bx bx-detail"></span>&nbsp; Details
                                            </button>
                                        </a>
                                        <!-- View Modal -->
                                        <div class="modal fade" id="basicModalView{{ $t->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div
                                                        class="modal-body d-flex justify-content-center align-items-center">
                                                        <div class="col-sm-6 col-lg-12 mb-4 ">
                                                            <div class="card">
                                                                <div
                                                                    style="overflow:scroll; max-height: 500px; max-width: 1000px  ">
                                                                    <img src="{{ asset('storage/' . $t->foto) }}"
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
                @endif
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Add Modal -->
    @include('components.formactivity.toll')

    <!-- Print Activity -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Print Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="startdate" class="form-label">Start Date</label>
                            <input type="date" id="startdate" name="startdate" class="form-control"
                                placeholder="Tanggal Mulai" />
                        </div>
                        <div class="col mb-0">
                            <label for="enddate" class="form-label">End Date</label>
                            <input type="date" id="enddate" name="enddate" class="form-control"
                                placeholder="Tanggal Berakhir" />
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <a href=""
                            onclick="this.href='/print_activity_toll/' + document.getElementById('startdate').value + '/' + document.getElementById('enddate').value "
                            target="_blank">
                            <button type="submit" class="btn btn-primary">Cetak Data Data</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.import & export.import')

@endsection
