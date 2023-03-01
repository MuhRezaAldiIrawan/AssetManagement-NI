{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <div class="page-container">
        <!-- Content Wrapper START -->
        <div class="main-content">
            <div class="page-header no-gutters">
                <div class="d-md-flex align-items-md-center justify-content-between">
                    <div class="media m-v-10 align-items-center">
                        <div class="avatar avatar-image avatar-lg">
                            <img src="{{ asset('images/avatars/thumb-3.jpg') }}" alt="">
                        </div>
                        <div class="media-body m-l-15">
                            <h4 class="m-b-0">Welcome back, Nichols!</h4>
                            <span class="text-gray">Project Manager</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-b-0">Kerusakan Mayor</p>
                                    <h2 class="m-b-0">
                                        <span>26.80%</span>
                                    </h2>
                                </div>
                                <div class="avatar avatar-icon avatar-lg avatar-blue d-flex justify-content-center align-items-center">
                                    <i class="fas fa-briefcase-medical"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-b-0">Perbaikan</p>
                                    <h2 class="m-b-0">
                                        <span>26.80%</span>
                                    </h2>
                                </div>
                                <div class="avatar avatar-icon avatar-lg avatar-cyan d-flex justify-content-center align-items-center">
                                    <i class="fas fa-toolbox"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-b-0">Pergantian</p>
                                    <h2 class="m-b-0">
                                        <span>26.80%</span>
                                    </h2>
                                </div>
                                <div class="avatar avatar-icon avatar-lg avatar-red d-flex justify-content-center align-items-center">
                                    <i class="fas fa-dolly"></i>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-b-0">Penanganan Minor</p>
                                    <h2 class="m-b-0">
                                        <span>26.80%</span>
                                    </h2>
                                </div>
                                <div class="avatar avatar-icon avatar-lg avatar-gold d-flex justify-content-center align-items-center">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
