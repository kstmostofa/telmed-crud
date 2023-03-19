@extends('layouts.app')
@section('title', 'Appointment List')
@section('css')
    <link rel="stylesheet" href="/dist/vendors/datatable/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="/dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Appointment List</h4>
                    {{-- <a href="{{ route('admin.agents.create') }}" class="btn btn-primary">+ Add Agent</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {!! $html->table(['class' => 'display table dataTable table-striped table-bordered']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    {!! $html->scripts() !!}
    <script src="/dist/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dist/js/datatable.script.js"></script>
    <!-- END: Page Vendor JS-->

@endsection
