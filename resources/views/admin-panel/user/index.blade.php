@extends('admin-panel.layouts.master')

@section('title', 'Users')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Users</h3>
            </div>
        </div>
        <div class="card-body">

            @if (session('successMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('successMsg') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>STATUS</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <form action="{{ route('users.delete', $user->id) }}" method="POST">

                                    @csrf
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit
                                    </a>
                                    <button onclick="return confirm('Are you sure you want to delete?')"
                                        class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
@endsection
