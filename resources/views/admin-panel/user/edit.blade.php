@extends('admin-panel.layouts.master')

@section('title', 'Users Edit')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Edit Users</h3>
            </div>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">

            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="form-control" placeholder="Name...">
                    @error('name')
                        <strong class="text-danger">
                            {{ $message }}
                        </strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="form-control" placeholder="Email...">
                    @error('email')
                        <strong class="text-danger">
                            {{ $message }}
                        </strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">Choose status...</option>
                        <option value="admin" @if ($user->status == 'admin') selected @endif>Admin</option>
                        <option value="user" @if ($user->status == 'user') selected @endif>User</option>
                    </select>
                    @error('status')
                        <strong class="text-danger">
                            {{ $message }}
                        </strong>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection
