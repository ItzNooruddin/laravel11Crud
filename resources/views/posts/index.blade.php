@extends('posts.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>All Posts</h4>
                </div>
                <div class="col-md-2 text-end">
                    <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @session('success')
                <div class="alert alert-success">{{ $value }}</div>
            @endsession
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">Show</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
