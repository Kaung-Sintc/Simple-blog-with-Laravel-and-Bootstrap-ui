@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <a href="{{ route('articles.index') }}" class="btn btn-primary mb-3">Back</a>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ Str::title($article->title) }}</h3>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted text-body-secondary">
                {{ $article->created_at->diffForHumans() }}
            </h6>


            <h6 class="card-subtitle mb-2 text-body-secondary">
                written by <b>{{ $article->user->name }}</b>
            </h6>

            <hr>

            <p class="card-text">
                {{ $article->content }}
            </p>

            {{-- authorize article with policy --}}
            @can('view', $article)
                <a href="{{ route('articles.edit', $article->slug) }}" class="card-link">Edit</a>
                <form action="{{ route('articles.destroy', $article->slug) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')

                    <button onclick="confirm('Are you sure to delete?')" class="btn text-danger text-decoration-underline">Delete</button>
                </form>
            @endcan

        </div>
    </div>

    <!-- Button trigger modal -->




    @auth
        <div class="mt-5">
            @foreach ($article->comments()->whereNull('parent_id')->get() as $comment)
                <div class="card px-3 py-1 mt-3">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5 class="card-title">{{  $comment->user->name }}</h5>
                        {{-- authorize view --}}
                        @can('view', $comment)
                             <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                        @endcan
                    </div>
                    <h6 class="text-muted">{{  $comment->created_at->diffForHumans() }}</h6>
                    <div>{{ $comment->content }}</div>

                    <div>
                        {{-- authorize view with policy --}}
                        @can('view', $comment)
                            <form action="{{ route('comments.delete', $comment->id) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn text-danger text-decoration-underline">Del</button>
                            </form>
                        @endcan

                            <a id="reply-btn" class="mb-2 user-select-none" style="cursor:pointer">Reply</a>
                        {{-- reply form --}}
                        <form id="reply-form" action="{{ route('comments.store', $article->slug) }}" method="post" class="d-none mt-2">
                            @csrf
                            <input type="hidden" value="{{ $comment->id }}" name="parent_id">
                            <textarea name="content" cols="20" rows="2" class="form-control" placeholder="Reply"></textarea>
                            <button class="btn btn-outline-primary mt-2 float-end">Reply</button>
                        </form>
                    </div>

                    {{-- replies --}}
                    <div class="mt-2">
                        @foreach ($comment->replies as $reply)
                                <div class="card ms-3 p-1 mb-2">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6>{{ $reply->user->name }}</h6>
                                        {{-- authorize view --}}
                                        @can('view', $reply)
                                            <a href="{{ route('comments.edit', $reply->id) }}">Edit</a>
                                        @endcan
                                    </div>
                                    <h6 class="text-muted">{{  $comment->created_at->diffForHumans() }}</h6>
                                    <p>{{ $reply->content }}</p>

                                    {{-- authorize view --}}
                                    @can('view', $reply)
                                    {{-- reply delete form --}}
                                        <form action="{{ route('comments.delete', $reply->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-link text-danger">Del</button>
                                        </form>
                                    @endcan
                                </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{-- comment form --}}
            <form action="{{ route('comments.store', $article->slug) }}" method="POST">
                @csrf
                <h3>Comment Reply</h3>
                <textarea name="content" id="" cols="30" rows="4" class="form-control @error('content')
                    is-invalid
                @enderror"></textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button class="mt-3 btn btn-primary float-end">Comment</button>
            </form>
        </div>
    @endauth
@endsection
