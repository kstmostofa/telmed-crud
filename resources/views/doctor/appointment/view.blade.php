@extends('layouts.app')
@section('title', 'Appointment List')
@section('css')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                            <a class="text-primary font-weight-bold">Daniel Taylor</a>
                            <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
                            <p class="mb-1">San Diego County, CA 91905, USA</p>
                            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                        </div>
                        <div>
                            <img src="/dist/images/author3.jpg" alt="" width="100px">
                        </div>
                        <div>
                            <h4>Invoice #3492</h4>
                            <div class="mb-2">
                                <span class="me-1">Date Issues:</span>
                                <span class="fw-semibold">25/08/2021</span>
                            </div>
                            <div>
                                <span class="me-1">Date Due:</span>
                                <span class="fw-semibold">29/08/2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
