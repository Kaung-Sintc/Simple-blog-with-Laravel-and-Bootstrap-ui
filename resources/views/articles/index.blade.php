@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif

<div class="list-group">
    @foreach ($articles as $article)
        <div class="list-group-item d-flex justify-content-between align-items-start mb-3">
            <div class="ms-2 me-auto">
                <h3 class="fw-bold">{{ Str::title($article->title) }}</h3>
                <span class="fw-light fs-6">
                    {{ $article->created_at->format('D d') }}
                    ({{ $article->created_at->diffForHumans() }})
                </span>
                |
                <span class="fw-light fs-6 fw-bold">{{ $article->user->name }}</span>
                <hr>
                <p>
                    {!!
                    Str::words(
                        $article->content, 20, "...
                        <a href='/articles/$article->slug'>
                            See more
                        </a>"
                    )
                !!}
                </p>
                {{-- <a
                    href="{{ route('articles.show', $article->slug) }}"
                    class="btn btn-link"
                >
                    See details <i class="bi bi-arrow-down-right"></i>
                </a> --}}
            </div>
        </div>
    @endforeach
</div>



@endsection
