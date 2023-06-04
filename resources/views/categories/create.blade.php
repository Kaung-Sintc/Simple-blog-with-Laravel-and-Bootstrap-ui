@extends('layouts.app')

@section('content')

<h3>
    Create new Category
</h3>

<hr>

<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label" for="">Category</label>
        <input
        type="text"
        value="{{ old('name') }}"
        class=" form-control @error('name') is-invalid @enderror "
        name="name">
        @error('name')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button class=" btn btn-primary">Add</button>
    <a href="{{ route('categories.index') }}" class=" btn btn-outline-primary">Cancel</a>
</form>
@endsection

