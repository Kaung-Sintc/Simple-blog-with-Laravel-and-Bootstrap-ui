@extends('layouts.app')
@section('title', 'Admin Dashboard | Articles')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-3">
                <h5 class="mb-4">Ghost Admin's Dashboard</h5>
                <div class="list-group">
                    <a
                        href="#"
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


                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Control</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $index => $article)
                            <tr>
                                <td>{{ $articles->firstItem() + $index }}</td>
                                <td>
                                    <a href="" class="link-dark">{{ $article->title }}</a>
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($article->content, 30, '...') }}
                                    </span>
                                </td>
                                <td>{{ $article->user->name }}</td>
                                <td>
                                    {{ $article->category->name }}
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <button form="aritcleDeleteForm{{ $article->id }}"
                                            class=" btn btn-sm btn-outline-dark"
                                            onclick="confirm('Are you sure to delete?')"
                                        >
                                            <i class=" bi bi-trash3"></i>
                                        </button>

                                    </div>
                                    <form id="aritcleDeleteForm{{ $article->id }}" class=" d-inline-block"
                                        action="{{ route('articles.destroy', $article->slug) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $article->created_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $article->created_at->format('d M Y') }}
                                    </p>

                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $article->updated_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $article->updated_at->format('d M Y') }}
                                    </p>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('articles.create') }}">Create Item</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $articles->onEachSide(1)->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
