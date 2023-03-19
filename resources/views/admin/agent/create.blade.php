@extends('layouts.app')
@section('title', 'Add Agent')
@section('css')

@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Add Agent</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agents.store') }}" method="POST" enctype="multipart/form-data">
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


@endsection
