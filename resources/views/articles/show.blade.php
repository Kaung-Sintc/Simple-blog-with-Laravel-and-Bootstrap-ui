@extends('layouts.app')

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
            Created by {{ $article->user->name }}
        </h6>

        <hr>

        <p class="card-text">
            {{ $article->content }}
        </p>

        @can('view', $article)
            <a href="{{ route('articles.edit', $article->slug) }}" class="card-link">Edit</a>
            <form action="" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')

                <button onclick="confirm('Are you sure to delete?')" class="btn text-danger text-decoration-underline">Delete</button>
            </form>
        @endcan

    </div>
    </div>
@endsection
