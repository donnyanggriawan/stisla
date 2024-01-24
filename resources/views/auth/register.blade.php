@extends('layouts.auth.app')

@section('content')
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="login-brand">
            <h1 class="text-danger">STI<span class="text-primary">SLA</span></h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Register</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password"
                                class="form-control pwstrength @error('password') is-invalid @enderror"
                                data-indicator="pwindicator" name="password">
                            <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password2" class="d-block">Password Confirmation</label>
                            <input id="password2" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm">
                            @error('password-confirm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="simple-footer">
            Copyright &copy; Stisla {{ date('Y') }}
        </div>
    </div>
@endsection
