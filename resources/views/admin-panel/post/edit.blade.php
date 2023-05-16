@extends('admin-panel.layouts.master')

@section('title', 'post edit')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-4 card-title">Update Post
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm float-end">
                                << back</a>
                        </h3>
                    </div>
                    <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category_id" id="category" class="form-select @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label> <br>
                                <input type="file" name="image" id="image"
                                    class="@error('image') is-invalid @enderror">
                                    <img src="{{ asset("storage/post-images/$post->image") }}" width="100px" alt="post image" class="img-fluid img-thumbnail border border-info d-block mt-3">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content">Content</label>
                               <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="Content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection
