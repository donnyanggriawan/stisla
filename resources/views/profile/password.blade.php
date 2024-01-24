@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Password</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade in">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    @endif

    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth()->user()->name }}</h2>
        <p class="section-lead">
            Change password on this page or <a href="/profile"
                class="badge badge-primary ml-1">Change Profile</a>
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" action="/profile/password/update" novalidate="">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h4>Edit Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Old Password</label>
                                    <input type="password" name="current_password" class="form-control"
                                        value="" required="">
                                    @error('current_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control"
                                        value="" required="">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Confirmation Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        value="" required="">
                                    @error('password_confirmation')
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
