@extends('layouts.app')

@section('content')

<h3>
    Edit article
</h3>

<hr>

<form action="{{ route('articles.update' ,$article->slug) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label class="form-label" for="">Article's Title</label>
        <input
        type="text"
        value="{{ old('title', $article->title,) }}"
        class=" form-control @error('title') is-invalid @enderror "
        name="title">
        @error('title')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="">Article's Content</label>
        <textarea
            class=" form-control @error('content') is-invalid @enderror"
            name="content"
            rows="6"
            cols="10"
        >{{ old('content', $article->content) }}
        </textarea>
        @error('content')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button class=" btn btn-primary">Update</button>
</form>
@endsection

