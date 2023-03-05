{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row gy-3 m-1">
                <div class="col-md-6 ">
                    <div class="demo-inline-spacing">
                        <h4 class="d-flex text-center">Log Activity</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-inline-spacing">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon btn-primary m-1">
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
                <div class=" table-responsive text-wrap">
                    <table class="table table-bordered table-striped nowrap table-hover display" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian Jenis Hardware</th>
                                <th>Shift</th>
                                <th>Kategori</th>
                                <th>user</th>
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
                                <td>perawatan rutin</td>
                                <td>User</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-list-check'></i>
                                            Details
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/activitydetail">More Details</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Update</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                        </tbody>
                    </table>
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
                scrollY: 200,
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
