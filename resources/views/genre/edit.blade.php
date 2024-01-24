@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Tambah Genre</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Genre</h2>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <form method="POST" action="/genre/edit/{{ $genre->id }}">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Genre</label>
                                <input type="text" name="genre" value="{{ $genre->genre }}" class="form-control" required="">
                            </div>
                            @error('genre')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
