@extends('admin-panel.layouts.master')

@section('title', 'Post')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-3 card-title">Posts
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-end">+ Add New</a>
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
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <td>{{ $index + $posts->firstItem() }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <img src="{{ asset("storage/post-images/$post->image") }}" alt="post image" width="100px">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td><textarea readonly>{{ $post->content }}</textarea></td>
                                        <td class="col-sm-4">
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-primary btn-sm text-white">
                                                    <i class="fa-solid fa-file-pen"></i> Edit
                                                </a>
                                                <button onclick="return confirm('Are you sure you want to delete?')" type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm text-white">
                                                    <i class="fas fa-comments"></i> Comments
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
