@extends('admin-panel.layouts.master')

@section('title', 'Post Comments')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-3 card-title">Comments
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm float-end">
                                << back</a>
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
                            <tbody>
                                @if ($comments->count() < 1)
                                    NO COMMENT
                                @else
                                @foreach ($comments as $index => $comment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td class="col-6">{{ $comment->text }}</td>
                                        <td>
                                            <form action="{{ route('comment.showHide', $comment->id) }}" method="POST">

                                                @csrf
                                                <button type="submit" class="btn
                                                {{ $comment->status == 'show' ? 'btn-danger' : 'btn-success' }}
                                                ">
                                                    <i class="fa-regular fa-eye-slash me-1"></i>
                                                    {{ $comment->status == 'show' ? 'Hide' : 'Show' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer">
                        {{ $categories->links() }}
                    </div> --}}
                </div>

            </div>

        </div>
    </div>

@endsection
