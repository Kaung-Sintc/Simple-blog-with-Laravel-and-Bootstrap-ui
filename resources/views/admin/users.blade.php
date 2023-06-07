@extends('layouts.app')
@section('title', 'Admin Dashboard | Articles')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-3">
                <h5 class="mb-4">Ghost Admin's Dashboard</h5>
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


                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Namae</th>
                            <th>Email</th>
                            <th>Number of Articles</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->articles->count() }}</td>

                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $user->created_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $user->created_at->format('d M Y') }}
                                    </p>

                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $user->updated_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $user->updated_at->format('d M Y') }}
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
                    {{ $users->onEachSide(1)->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
