@extends('admin-panel.layouts.master')

@section('title', 'project edit')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-4 card-title">Edit Project
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm float-end">
                                << back</a>
                        </h3>
                    </div>
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        <div class="card-body">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter project name..." value="{{ old('name', $project->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="url">URL</label>
                                <input type="text" name="url" id="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    placeholder="Enter URL..." value="{{ old('url', $project->url) }}">
                                @error('url')
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
