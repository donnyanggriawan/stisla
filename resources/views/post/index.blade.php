@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Post</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Post By {{ $post->user->name }}</h4>
                @if ($post->user_id == auth()->user()->id)
                    <div class="card-header-form">
                        <div class="card-footer text-right">
                            <a href="/post/edit/{{ $post->id }}" class="btn btn-primary mx-1">Edit Post</a>
                            <a href="/post/delete/{{ $post->id }}" class="btn btn-danger mx-1" onclick="return confirm('are u sure?')">Delete Post</a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="mr-3 img-fluid" src="{{ asset('storage/post-image/' . $post->image) }}">
                    </div>
                    <div class="col-md-8">
                        <div class="media-body mw-100">
                            <h2 class="mt-0">{{ $post->title }}</h2>
                            <p class="mb-0 lead">{!! $post->body !!}</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="media">
                    <img class="mr-3" src="{{ asset('storage/post-image/' . $post->image) }}"
                        alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    </div>
                </div> --}}

                {{-- <div class="chocolat-parent">
                    <div>
                        <h2>Heading 2</h2>
                        <div class="mx-auto">
                            <img alt="image" src="https://source.unsplash.com/300x300?cat" class="img-fluid">
                        </div>
                        <p class="lead mt-4">
                            <h1>test</h1>
                            <p>ABCDEFGHIJKLMN</p>
                            ABCDEFGHIJKLMN.
                        </p>
                        <p>ABCDEFGHIJKLMN</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
