{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Activity /</span>{{ $subtitle }}<i
                class='bx bx-street-view m-1'></i></h5>
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="demo-inline-spacing ">
                        <h4 class="m-0">Histori Activity</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-secondary m-1" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">
                            <span class="tf-icons bx bx-printer"></span>
                        </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/pengembanganhistori" method="get">
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
                <div class="table-responsive text-nowrap mt-3">
                    <table class="table table-bordered table-striped  table-hover display" width="1000px">
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
                        @foreach ($pengembangan as $t)
                            <tbody>
                                <td>{{ ++$i }}</td>
                                <td>{{ $t->tanggal }}</td>
                                <td>{{ Str::limit($t->u_hardware, 200) }}</td>
                                <td>{{ $t->shift }}</td>
                                <td>{{ $t->kategori }}</td>
                                <td>{{ $t->user_id }}</td>
                                <td>
                                    @if ($t->status == 'approve')
                                        <button type="button" class="btn btn-success active">Open</button>
                                    @else
                                        <button type="button" class="btn btn-danger active">rejected</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-success me-1" type="button" data-bs-toggle="modal"
                                        data-bs-target="#basicModalView{{ $t->id }}" aria-expanded="false"
                                        aria-controls="multiCollapseExample2"> <span class="tf-icons bx bx-qr-scan"></span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#basicModalDetail{{ $t->id }}">
                                        <span class="tf-icons bx bx-detail"></span>&nbsp; Details
                                    </button>
                                    <a href="/print_detail_pengembangan/{{ $t->id }}" target="_blank">
                                        <button type="button" class="btn btn-secondary m-1">
                                            <span class="tf-icons bx bx-printer"></span>&nbsp; Print
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
                                                <div class="modal-body d-flex justify-content-center align-items-center">
                                                    <div class="col-sm-6 col-lg-12 mb-4 ">
                                                        <div class="card">
                                                            <div
                                                                style="overflow:scroll; max-height: 500px; max-width: 1000px  ">
                                                                <img src="{{ asset('storage/' . $t->foto) }}"
                                                                    alt="" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="basicModalDetail{{ $t->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center align-items-center">
                                                    <div class="col-sm-6 col-lg-12 mb-4 ">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <div class="accordion-item  m-3 mt-0">
                                                                    <h2 class="accordion-header text-body d-flex justify-content-between"
                                                                        id="accordionIconOne">
                                                                        <button type="button"
                                                                            class="accordion-button collapsed"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#accordionIcon-1"
                                                                            aria-controls="accordionIcon-1">
                                                                            Tanggal & Kategori Activity
                                                                        </button>
                                                                    </h2>

                                                                    <div id="accordionIcon-1"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#accordionIcon">
                                                                        <div class="accordion-body">
                                                                            <p>Tanggal Pengajuan : {{ $t->tanggal }}</p>
                                                                            <p>Kategori : {{ $t->kategori_activity }} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item m-3">
                                                                    <h2 class="accordion-header text-body d-flex justify-content-between"
                                                                        id="accordionIconOne">
                                                                        <button type="button"
                                                                            class="accordion-button collapsed"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#accordionIcon-7"
                                                                            aria-controls="accordionIcon-7">
                                                                            Shift, Lokasi & Kategori
                                                                        </button>
                                                                    </h2>

                                                                    <div id="accordionIcon-7"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#accordionIcon">
                                                                        <div class="accordion-body">
                                                                            <p>Shift : {{ $t->shift }}</p>
                                                                            <p>Lokasi :{{ $t->lokasi }}</p>
                                                                            <p>Kategori :{{ $t->kategori }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item m-3">
                                                                    <h2 class="accordion-header text-body d-flex justify-content-between"
                                                                        id="accordionIconOne">
                                                                        <button type="button"
                                                                            class="accordion-button collapsed"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#accordionIcon-3"
                                                                            aria-controls="accordionIcon-3">
                                                                            Uraian & Jenis Hardware
                                                                        </button>
                                                                    </h2>

                                                                    <div id="accordionIcon-3"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#accordionIcon">
                                                                        <div class="accordion-body">
                                                                            <p>{{ $t->j_hardware }}</p>
                                                                            <p>{{ $t->u_hardware }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item m-3">
                                                                    <h2 class="accordion-header text-body d-flex justify-content-between"
                                                                        id="accordionIconOne">
                                                                        <button type="button"
                                                                            class="accordion-button collapsed"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#accordionIcon-4"
                                                                            aria-controls="accordionIcon-4">
                                                                            Uraian & Standart Aplikasi
                                                                        </button>
                                                                    </h2>

                                                                    <div id="accordionIcon-4"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#accordionIcon">
                                                                        <div class="accordion-body">
                                                                            <p>{{ $t->s_aplikasi }}</p>
                                                                            <p>{{ $t->u_aplikasi }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item m-3">
                                                                    <h2 class="accordion-header text-body d-flex justify-content-between"
                                                                        id="accordionIconOne">
                                                                        <button type="button"
                                                                            class="accordion-button collapsed"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#accordionIcon-5"
                                                                            aria-controls="accordionIcon-5">
                                                                            Uraian & Aplikasi IT & Peralatan Toll
                                                                        </button>
                                                                    </h2>

                                                                    <div id="accordionIcon-5"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#accordionIcon">
                                                                        <div class="accordion-body">
                                                                            <p>{{ $t->a_it }}</p>
                                                                            <p>{{ $t->u_it }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item m-3">
                                                                    <h2 class="accordion-header text-body d-flex justify-content-between"
                                                                        id="accordionIconOne">
                                                                        <button type="button"
                                                                            class="accordion-button collapsed"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#accordionIcon-6"
                                                                            aria-controls="accordionIcon-6">
                                                                            Catatan & Kondisi Akhir
                                                                        </button>
                                                                    </h2>

                                                                    <div id="accordionIcon-6"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#accordionIcon">
                                                                        <div class="accordion-body">
                                                                            <p>{{ $t->catatan }}</p>
                                                                            <p>{{ $t->kondisi_akhir }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{ $pengembangan->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

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
                            onclick="this.href='/print_activity_pengembangan/' + document.getElementById('startdate').value + '/' + document.getElementById('enddate').value "
                            target="_blank">
                            <button type="submit" class="btn btn-primary">Cetak Data</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
