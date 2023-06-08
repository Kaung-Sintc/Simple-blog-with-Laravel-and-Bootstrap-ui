@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif

@if (!empty(request('s')))
    <div class="mb-3">
        You search for "<span class="fw-bold">{{ request('s') }}</span>"
    </div>
@endif
<div class="d-flex justify-content-between">
    <form action="{{ route('articles.search') }}" method="GET">

        <div class="input-group">
            <input type="text" name="s" value="{{ request('s') ?? '' }}" placeholder="Search for articles..." autocomplete="off" class="form-control">
            @if (!empty(request('s')))
                <a href="{{ route('articles.index') }}" class="d-block text-center btn btn-sm btn-outline-danger">x</a>
            @endif
            <button class="btn btn-sm btn-outline-primary">Search</button>
        </div>
    </form>

    <form method="get">
        <select onchange="this.form.submit()" name="category" class="form-select">
            <option value="">All Categories</option>

            @foreach (\App\Models\Category::all() as $category)
                <option
                    value="{{ $category->slug }}"
                    {{ $category->slug === request('category') ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>
</div>

<hr>

<div class="list-group">
    @foreach ($articles as $article)
        <div class="list-group-item d-flex justify-content-between shadow-sm align-items-start mb-3 rounded">
            <div class="ms-2 me-auto">
                <h3>
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-dark text-decoration-none">
                        {{ Str::title($article->title) }}
                    </a>
                </h3>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fw-light fs-6">
                        {{ $article->created_at->format('D d') }} |
                        {{ $article->created_at->format('h:i a') }}
                    </div>

                    <a
                        href="{{ route('articles.index', "category={$article->category->slug}") }}"
                        class="text-decoration-none badge badge-pill fw-light fs-6 bg-primary opacity-75 text-white p-1 rounded"
                    >
                        {{ $article->category->name }}
                    </a>
                </div>

                <hr>
                <p>
                    {{ $article->excerpt }}
                </p>
            </div>
        </div>

        @endforeach
        {{ $articles->links() }}
</div>



@endsection
