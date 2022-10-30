@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h1 class="card-header justify-content-center d-flex">{{ $post->title }}</h1>
                    <div class="card-body p-5 fs-5">
                        {{ $post->body }}
                    </div>
                    <div class="row justify-content-center m-0 p-2">
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-success">List</a>
                                @can('update', $post)
                                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                @can('delete', $post)
                                    <form method="post" action="{{ route('blog.destroy', $post) }}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Delete post?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
