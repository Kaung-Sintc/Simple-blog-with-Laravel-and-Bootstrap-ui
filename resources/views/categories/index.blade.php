@extends('layouts.app')

@section('title', 'Admin Dashboard | Categories')

@section('content')
    <div class=" container">
        @if(session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-outline-primary mb-3">Add new category</a>
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="list-group-item list-group-item-action @if (request()->routeIs('admin.dashboard'))
                                active
                            @endif"
                            >
                            Articles
                        </a>
                        <a
                            href="{{ route('categories.index') }}"
                            class="list-group-item list-group-item-action
                            @if (request()->routeIs('categories.index'))
                                active
                            @endif"
                        >
                            Categories
                        </a>

                    <a
                        href="{{ route('admin.users') }}"
                        class="list-group-item list-group-item-action
                        @if (request()->routeIs('admin.users'))
                            active
                        @endif"
                    >
                        Users
                    </a>
                </div>
            </div>
            <div class="col-9">
                <h3>Manage Categories</h3>
                <hr>

                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $index }}</td>
                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-outline-dark">
                                            <i class=" bi bi-pencil"></i>
                                        </a>

                                        <button form="aritcleDeleteForm{{ $category->id }}"
                                            class=" btn btn-sm btn-outline-dark"
                                            onclick="confirm('Are you sure to delete?')"
                                        >
                                            <i class=" bi bi-trash3"></i>
                                        </button>

                                    </div>
                                    <form id="aritcleDeleteForm{{ $category->id }}" class=" d-inline-block"
                                        action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $category->created_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->created_at->format('d M Y') }}
                                    </p>

                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $category->updated_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->updated_at->format('d M Y') }}
                                    </p>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('categories.create') }}">Create Item</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $categories->onEachSide(1)->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
