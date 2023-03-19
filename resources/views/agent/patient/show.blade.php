@extends('layouts.app')
@section('title', 'Patient Destails')


@section('content')
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-4 mb-4 mt-3 pr-lg-0 flip-menu">
            <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
            <div class="card border h-100 mail-menu-section ">
                <div class="text-center mt-3">
                    <p class="card-title">Hospital Name</p>
                    <p class="card-text">Address of Hospital</p>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>



            <div class="eagle-divider"></div>
            <div class="card-header py-1 mt-4">
                <h6 class="mb-0">Symptoms</h6>
            </div>
            <ul class="nav flex-column font-weight-bold mt-3 note-label" id="myTab1" role="tablist">
                <li class="nav-item  px-3">
                    <a class="nav-link text-primary" data-label="business-note" href="#">
                        <i class="icon-pin"></i> Business
                    </a>
                </li>
                <li class="nav-item  px-3">
                    <a class="nav-link text-danger" data-label="private-note" href="#">
                        <i class="icon-pin"></i> Private
                    </a>
                </li>
                <li class="nav-item  px-3">
                    <a class="nav-link text-warning" data-label="social-note" href="#">
                        <i class="icon-pin"></i> Social
                    </a>
                </li>
                <li class="nav-item  px-3 ">
                    <a class="nav-link text-success" data-label="personal-note" href="#">
                        <i class="icon-pin"></i> Personal
                    </a>
                </li>
                <li class="nav-item px-3 ">
                    <a class="nav-link text-info" data-label="work-note" href="#">
                        <i class="icon-pin"></i> Work
                    </a>
                </li>

            </ul>

        </div>
    </div>
    <div class="col-12 col-lg-8 col-xl-8 mb-4 mt-3 pl-lg-0">
        <div class="card border  h-100 notes-list-section">
            <a href="#" class="d-inline-block d-lg-none flip-menu-toggle border-0"><i class="icon-menu"></i></a>
            <div class="row notes">
                <div class="col-12  col-md-6 col-lg-4 my-3 note business-note all starred" data-type="business-note">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">Remove Houtzdale Location</h6>
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">June
                                        14th, 2020</span></p>
                                <div class="note-content mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="d-flex notes-tool">
                                    <span class="icon-star"></span>
                                    <span class="icon-exclamation mx-2"></span>
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <a class="text-success edit-note" href="#" data-toggle="modal"
                                            data-target="#editnote"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-4 my-3 note personal-note all important" data-type="personal-note">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">Video not Wokring</h6>
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">June
                                        4th, 2020</span></p>
                                <div class="note-content mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="d-flex notes-tool">
                                    <span class="icon-star"></span>
                                    <span class="icon-exclamation mx-2"></span>
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <a class="text-success edit-note" href="#" data-toggle="modal"
                                            data-target="#editnote"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-4 my-3 note work-note all starred important" data-type="work-note">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">Limit API to logged in users</h6>
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">May
                                        21st, 2020</span></p>
                                <div class="note-content mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="d-flex notes-tool">
                                    <span class="icon-star"></span>
                                    <span class="icon-exclamation mx-2"></span>
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <a class="text-success edit-note" href="#" data-toggle="modal"
                                            data-target="#editnote"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-4 my-3 note social-note all" data-type="social-note">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">Page Performance Issues</h6>
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">May
                                        14th, 2020</span></p>
                                <div class="note-content mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="d-flex notes-tool">
                                    <span class="icon-star"></span>
                                    <span class="icon-exclamation mx-2"></span>
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <a class="text-success edit-note" href="#" data-toggle="modal"
                                            data-target="#editnote"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-4 my-3 note private-note all" data-type="private-note">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">Remove Houtzdale Location</h6>
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">Feb
                                        4th, 2020</span></p>
                                <div class="note-content mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="d-flex notes-tool">
                                    <span class="icon-star"></span>
                                    <span class="icon-exclamation mx-2"></span>
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <a class="text-success edit-note" href="#" data-toggle="modal"
                                            data-target="#editnote"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-4 my-3 note business-note all" data-type="business-note">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">Post-Launch SEO Audit</h6>
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">April
                                        20th, 2020</span></p>
                                <div class="note-content mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="d-flex notes-tool">
                                    <span class="icon-star"></span>
                                    <span class="icon-exclamation mx-2"></span>
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <a class="text-success edit-note" href="#" data-toggle="modal"
                                            data-target="#editnote"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
