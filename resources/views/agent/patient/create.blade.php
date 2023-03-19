@extends('layouts.app')
@section('title', 'Add Patient')
@section('css')
    <link rel="stylesheet" href="/dist/vendors/select2/css/select2.min.css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Add Patient</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('agent.patients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Division</label>
                                    <select class="form-control select2" data-placeholder="Select a Division"
                                        name="division_id" onchange="getDistrict(this.value)">
                                        <option label="Choose..."></option>
                                        @foreach ($divisions as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name . '-' . $value->bn_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District</label>
                                    <select class="form-control select2" data-placeholder="Select a District"
                                        name="district_id" onchange="getUpazila(this.value)" disabled>
                                        <option label="Choose..."></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upazila</label>
                                    <select class="form-control select2" data-placeholder="Select a Upazila"
                                        name="upazila_id" disabled>
                                        <option label="Choose..."></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                        value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Blood Group</label>
                                    <select name="blood_group" class="form-control select2"
                                        data-placeholder="Select Blood Group">
                                        <option label="Select Blood Group"></option>
                                        <option value="A+">A Positive (A+)</option>
                                        <option value="A-">A Negative (A-)</option>
                                        <option value="B+">B Positive (B+)</option>
                                        <option value="B-">B Negative (B-)</option>
                                        <option value="AB+">AB Positive (AB+)</option>
                                        <option value="AB-">AB Negative (AB-)</option>
                                        <option value="O+">O Positive (O+)</option>
                                        <option value="O-">O Negative (O-)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Age</label>
                                    <input type="number" class="form-control" placeholder="Age" name="age"
                                        value="{{ old('age') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">NID Number</label>
                                    <input type="text" class="form-control" placeholder="NID Number" name="nid_number"
                                        value="{{ old('nid_number') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Photo</label>
                                    <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Symptoms</label>
                                    <textarea class="form-control" name="symptoms" id="" rows="10" width="100%"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2 mb-2 bg-light">
                                <h5>Doctor Information</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Department</label>
                                    <select class="form-control select2" data-placeholder="Select a Department"
                                        name="department_id" onchange="getDoctor(this.value)">
                                        <option label="Choose..."></option>
                                        @foreach ($departments as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Doctor</label>
                                    <select class="form-control select2" data-placeholder="Select a Doctor"
                                        name="doctor_id">
                                        <option label="Choose..."></option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
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
                            </div> --}}


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
                allowClear: true,
                width: '100%',
            });
        });
    </script>

    {{-- Script for get district --}}
    <script>
        function getDistrict(division_id) {
            $.ajax({
                url: "{{ route('get-districts') }}",
                type: "POST",
                data: {
                    division_id: division_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('select[name="district_id"]').removeAttr('disabled');
                    $('select[name="district_id"]').empty();
                    $('select[name="upazila_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="district_id"]').append(
                            '<option value="' + value._id + '">' + value.name + "-" + value
                            .bn_name +
                            '</option>');
                    });
                }
            });
        }
    </script>
    <script>
        function getUpazila(district_id) {
            console.log('district_id', district_id);
            $.ajax({
                url: "{{ route('get-upazilas') }}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log('data', data);
                    $('select[name="upazila_id"]').removeAttr('disabled');
                    $('select[name="upazila_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="upazila_id"]').append(
                            '<option value="' + value._id + '">' + value.name + "-" + value
                            .bn_name +
                            '</option>');

                    });
                }
            });
        }
    </script>

    <script>
        function getDoctor(department_id) {
            $.ajax({
                url: "{{ route('get-doctors') }}",
                type: "POST",
                data: {
                    department_id: department_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.length == 0) {
                        toastr.error('No doctor found in this department', 'Error', {
                            progressBar: true,
                            positionClass: 'toast-top-right',
                        });
                    }
                    $('select[name="doctor_id"]').removeAttr('disabled');
                    $('select[name="doctor_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="doctor_id"]').append(
                            '<option value="' + value._id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    </script>
@endsection
