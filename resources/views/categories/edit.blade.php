@extends('layouts.app')

@section('content')

<h3>
    Edit Category
</h3>

<hr>

<form action="{{ route('categories.update' ,$category->id) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label class="form-label" for="">Category</label>
        <input
        type="text"
        value="{{ old('name', $category->name,) }}"
        class=" form-control @error('name') is-invalid @enderror "
        name="name">
        @error('name')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button class=" btn btn-primary">Update</button>
    <a href="{{ route('categories.index') }}" class=" btn btn-outline-primary">Cancel</a>
</form>
@endsection

