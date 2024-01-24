@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Post</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Post u make</h2>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Genre</h4>
                        <div class="card-header-form">
                            <div class="card-footer text-right">
                                <a href="/post/tambah" class="btn btn-info">Add Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th class="col-2">#</th>
                                    <th class="text-center col-3">Title</th>
                                    <th class="text-center col-3">Image</th>
                                    <th class="text-center col-2">Setail</th>
                                    <th class="text-center col-2">Delete</th>
                                </tr>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <img class="mr-3 img-fluid" src="{{ asset('storage/post-image/' . $post->image) }}">
                                        </td>
                                        <td class="col-md-1 text-center">
                                            <a href="/post/detail/{{ $post->id }}" class="btn btn-success">Detail</a>
                                        </td>
                                        <td class="col-md-1 text-center"><a href="/post/delete/{{ $post->id }}"
                                                class="btn btn-danger" onclick="return confirm('are u sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                            </table>
                            <div class="col-md-8">
                                <div class="d-inline">
                                    {{ $posts->links('pagination::bootstrap-4') }}
                                </div>
                            </div>

                            {{-- <div class="d-inline">
                                {{ $genres->links('pagination::bootstrap-4') }}
                            </div>
                            <div class="card-footer text-right">
                                <a href="/genre/tambah" class="btn btn-info">Add Genre</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('successUpdate'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('successUpdate') }}'
            });
        </script>
    @endif
@endsection
