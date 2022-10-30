@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h1 class="card-header justify-content-center d-flex">Add new post</h1>
                    <div class="card-body p-5 fs-5">
                        <form action="{{ route('blog.store') }}" method="post">
                            @csrf
                            <div class="form-group p-2">
                                <label for="title" class="fw-bolder fs-3">Title</label><br>
                                <input style="width: 100%;" type="text" id="title" name="title" value="{{ old('title') }}">
                                @foreach($errors->get('title') as $error)
                                    <small class="form-text text-danger">{{ $error }}</small>
                                @endforeach
                            </div>
                            <div class="form-group p-2">
                                <label for="body" class="fw-bolder fs-3">Body</label><br>
                                <textarea autocomplete="off" rows="7" style="width: 100%;" id="body" name="body">{{ old('body') }}</textarea>
                                @foreach($errors->get('body') as $error)
                                    <small class="form-text text-danger">{{ $error }}</small>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Add post</button>
                        </form>
                    </div>
                    <div class="row justify-content-center m-0 p-2">
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-success">List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
