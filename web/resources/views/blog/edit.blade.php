@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h1 class="card-header justify-content-center d-flex">Edit post</h1>
                    <div class="card-body p-5 fs-5">
                        @if(session('status') == 'ok')
                            <p class="text-success justify-content-center d-flex">Post updated</p>
                        @endif
                        <form action="{{ route('blog.update', $post) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group p-2">
                                <label for="title" class="fw-bolder fs-3">Title</label><br>
                                <input style="width: 100%;" type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
                                @foreach($errors->get('title') as $error)
                                    <small class="form-text text-danger">{{ $error }}</small>
                                @endforeach
                            </div>
                            <div class="form-group p-2">
                                <label for="body" class="fw-bolder fs-3">Body</label><br>
                                <textarea autocomplete="off" rows="7" style="width: 100%;" id="body" name="body">{{ old('body', $post->body) }}</textarea>
                                @foreach($errors->get('body') as $error)
                                    <small class="form-text text-danger">{{ $error }}</small>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="row justify-content-center m-0 p-2">
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-success">List</a>
                                <a href="{{ route('blog.show', $post) }}" class="btn btn-sm btn-warning">Detail</a>
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
