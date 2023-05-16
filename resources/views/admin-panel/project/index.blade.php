@extends('admin-panel.layouts.master')

@section('title', 'project')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-3 card-title">Projects
                            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm float-end">+ Add New</a>
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
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->url }}</td>
                                        <td>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('projects.edit', $project->id) }}"
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
                        {{ $projects->links() }}
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection
