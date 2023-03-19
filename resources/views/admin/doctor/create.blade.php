@extends('layouts.app')
@section('title', 'Add Doctor')
@section('css')
    <link rel="stylesheet" href="/dist/vendors/select2/css/select2.min.css" />

@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Add Doctor</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                        value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Registration Number</label>
                                    <input type="text" class="form-control" placeholder="Registration Number"
                                        name="registration_number" value="{{ old('registration_number') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">NID Number</label>
                                    <input type="text" class="form-control" placeholder="NID Number" name="nid_number"
                                        value="{{ old('nid_number') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="text" class="form-control" placeholder="******" name="password"
                                        value="{{ old('password') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Department</label>
                                    <select name="department_id" class="form-control select2" required>
                                        <option label="Select Department"></option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Photo</label>
                                    <input type="file" class="form-control" name="photo" value="{{ old('photo') }}"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="/dist/vendors/select2/js/select2.full.min.js"></script>
    <script src="/dist/js/select2.script.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Department",
                allowClear: true
            });
        });
    </script>
@endsection
