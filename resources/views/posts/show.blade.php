@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h3>Comments</h3>
    @foreach ($post->comments as $comment)
        <div>
            <p>{{ $comment->comment }}</p>
            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach

    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div>
            <label for="comment">Add a Comment</label>
            <textarea name="comment" id="comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>

    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit Post</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Post</button>
    </form>
@endsection
