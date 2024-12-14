@extends('posts.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>Edit Post</h4>
                </div>
                <div class="col-md-2 text-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">All Posts</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-2">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label>Body:</label>
                    <textarea class="form-control" name="body">{{ $post->body }}</textarea>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
