@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h1 class="card-header justify-content-center d-flex">{{ __('Articles') }}</h1>
                    <div class="card-body">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row">
                                    @foreach ($posts as $post)
                                        <div class="col-md-4">
                                            <div class="card mb-4 box-shadow">
{{--                                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1840669a480%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1840669a480%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.20000076293945%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">--}}
                                                <div class="card-body">
                                                    <p class="card-text fw-bolder fs-5">{{ $post->title }}</p>
                                                    <p class="card-text">{{ $post->preview_text }}</p>
                                                    <p class="card-text">Author: {{ $post->user->name }}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-sm btn-success">View</a>
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
                                                        <small class="text-muted">{{ $post->created_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header justify-content-center d-flex">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
