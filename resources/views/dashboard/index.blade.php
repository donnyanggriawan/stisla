@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">All Articles</h2>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image my-3">
                                <img src="{{ asset('storage/post-image/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                            </div>
                            <div class="article-title">
                                <h2><a href="/post/detail/{{ $post->id }}">{{ $post->title }}</a></h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>{!! $post->short_body !!}</p>
                            <div class="article-cta">
                                <a href="/post/detail/{{ $post->id }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
@endsection
