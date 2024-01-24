@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Update Post</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Update Post</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Simple Summernote</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/post/edit/{{ $post->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $post->title }}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ $post->image }}">
                                    @if ($post->image)
                                        <p class="mb-0">Current Image: {{ $post->image }}</p>
                                    @endif
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric @error('category') is-invalid @enderror"
                                        name="category">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}"
                                                @if ($post->genre_id == $genre->id) selected @endif>
                                                {{ $genre->genre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple @error('content') is-invalid @enderror" name="content">
                                        {{ old('content', $post->body) }}sdadadas
                                    </textarea>
                                    @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
