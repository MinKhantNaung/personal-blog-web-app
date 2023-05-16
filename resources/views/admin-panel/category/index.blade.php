@extends('admin-panel.layouts.master')

@section('title', 'Category')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-3 card-title">Categories
                            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-end">+ Add New</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        @if (session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('successMsg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-info btn-sm text-white">
                                                    <i class="fa-solid fa-file-pen"></i> Edit
                                                </a>
                                                <button onclick="return confirm('Are you sure you want to delete?')" type="submit" class="btn btn-danger btn-sm">
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
                        {{ $categories->links() }}
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection
