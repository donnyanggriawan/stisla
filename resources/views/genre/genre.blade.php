@extends('layouts.dashboard.app')

@section('content')
    <div class="section-header">
        <h1>Genre</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Table</h2>
        <p class="section-lead">Example of some Bootstrap table components.</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Genre</h4>
                        <div class="card-header-form">
                            <div class="card-footer text-right">
                                <a href="/genre/tambah" class="btn btn-info">Add Genre</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Genre</th>
                                    <th>Created At</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                @foreach ($genres as $genre)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $genre->genre }}</td>
                                        <td>{{ date($genre->created_at) }}</td>
                                        <td class="col-md-1 text-center">
                                            <a href="/genre/edit/{{ $genre->id }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td class="col-md-1 text-center"><a href="/genre/delete/{{ $genre->id }}"
                                                class="btn btn-danger" onclick="return confirm('are u sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                            </table>
                            <div class="col-md-8">
                                <div class="d-inline">
                                    {{ $genres->links('pagination::bootstrap-4') }}
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
@endsection
