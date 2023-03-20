{{-- Extends layout --}}
@extends('components.layout')

@section('content')

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
</table>
@endsection
