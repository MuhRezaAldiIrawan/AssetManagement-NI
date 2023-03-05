{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">LogActivity /</span> Activity <i
                class='bx bx-detail'></i></h4>
        <div class="card">
            <h5 class="card-header">Detail Activity</h5>
            <div class="card-body">
                <div class="row mb-6">
                    <div class="col-md">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img card-img-left" src="{{ asset('img/elements/12.jpg') }}"
                                        alt="Card image" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            This is a wider card with supporting text below as a natural lead-in to
                                            additional content.
                                            This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="demo-inline-spacing d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary m-1">
                            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Edit
                        </button>
                        <button type="button" class="btn btn-danger m-1">
                            <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                        </button>
                        <button type="button" class="btn btn-secondary m-1">
                            <span class="tf-icons bx bx-printer"></span>&nbsp; Print
                        </button>
                        <button type="button" class="btn btn-success m-1">
                            <span class="tf-icons bx bx-select-multiple"></span>&nbsp; Approve
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
