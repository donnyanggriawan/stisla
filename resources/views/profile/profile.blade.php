@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Profile</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth()->user()->name }}</h2>
        <p class="section-lead">
            Change information about yourself on this page or <a href="/profile/password"
                class="badge badge-primary ml-1">Change Password</a>
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" action="/profile/update" novalidate="">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>First Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}" required="">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ auth()->user()->email }}" required="">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
