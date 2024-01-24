@extends('layouts.auth.app')

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
            <h1 class="text-danger">STI<span class="text-primary">SLA</span></h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Login</h4>
            </div>

            <div class="card-body">
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session()->get('loginError') }}
                        </div>
                    </div>
                @elseif (session()->has('loginSuccess'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session()->get('loginSuccess') }}
                        </div>
                    </div>
                @endif
                <form method="POST" action="" class="" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            <div class="float-right">
                                <a href="auth-forgot-password.html" class="text-small">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" tabindex="2" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
                </form>

                {{-- <div class="text-center mt-4 mb-3">
                <div class="text-job text-muted">Login With Social</div>
            </div>
            <div class="row sm-gutters">
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                        <span class="fab fa-facebook"></span> Facebook
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                        <span class="fab fa-twitter"></span> Twitter
                    </a>
                </div>
            </div> --}}

            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            Don't have an account? <a href="/register">Create One</a>
        </div>
        <div class="simple-footer">
            Copyright &copy; Stisla {{ date('Y') }}
        </div>
    </div>
@endsection
