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
                            <button type="button" class="btn btn-icon btn-secondary m-1">
                                <span class="tf-icons bx bx-printer"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-wrap">
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
                        @foreach ($histori as $t)
                            <tbody>
                                <td>{{ ++$i }}</td>
                                <td>{{ $t->tanggal }}</td>
                                <td>{{ Str::limit($t->u_hardware, 200) }}</td>
                                <td>{{ $t->shift }}</td>
                                <td>{{ $t->kategori }}</td>
                                <td>{{ $t->user_id }}</td>
                                <td>
                                    @if ($t->status =='approve')
                                    <button type="button" class="btn btn-success active">Approve</button>
                                    @else
                                    <button type="button" class="btn btn-danger active">rejected</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-success me-1" type="button" data-bs-toggle="modal"
                                        data-bs-target="#basicModalView{{ $t->id }}" aria-expanded="false"
                                        aria-controls="multiCollapseExample2"> <span class="tf-icons bx bx-qr-scan"></span>
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
                                                <div class="modal-body d-flex justify-content-center align-items-center">
                                                    <div class="col-sm-6 col-lg-12 mb-4 ">
                                                        <div class="card">
                                                            <div style="overflow:scroll; max-height: auto; width: 100%  ">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

