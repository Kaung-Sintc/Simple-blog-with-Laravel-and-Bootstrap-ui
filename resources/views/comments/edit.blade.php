@extends('layouts.app')

@section('title', 'Comment | Edit')
@section('content')
    <div class="mx-auto" style="max-width: 400px">
        <h1>Edit Commet</h1>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="text" name="content" value="{{ $comment->content }}" class="form-control">
            <input type="submit" class="btn btn-outline-primary mt-2 float-end" value="Update">
        </form>
    </div>
@endsection
