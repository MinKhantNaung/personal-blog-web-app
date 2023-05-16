@extends('admin-panel.layouts.master')

@section('title', 'category edit')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-4 card-title">Edit Category
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm float-end">
                                << back</a>
                        </h3>
                    </div>
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        <div class="card-body">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter project name..." value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection
