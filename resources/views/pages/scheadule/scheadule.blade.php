{{-- Extends layout --}}
@extends('components.layout')



{{-- Content --}}
@section('content')
<div class="col-lg-12 mb-4 order-0">
    <div class="card">
        <div class="row gy-3 m-1">
            <div class="col-md-6 d-flex align-items-end">
                <div class="demo-inline-spacing ">
                    <h4 class="m-0">Time Scheadule</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-wrap">
                @include('components.scheadule')
            </div>
        </div>
    </div>
</div>

@endsection