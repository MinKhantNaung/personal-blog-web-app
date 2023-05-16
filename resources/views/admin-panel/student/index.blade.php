@extends('admin-panel.layouts.master')

@section('title', 'student count')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-3 card-title">Students Count</h3>
                    </div>
                    <div class="card-body">
                        @if (session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('successMsg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($studentsCount->count() < 1)
                            <form action="{{ route('students.store') }}" method="POST">

                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="number" name="count"
                                            class="form-control @error('count') is-invalid @enderror"
                                            placeholder="Enter count...">
                                        <input type="submit" value="Create" class="btn btn-primary">
                                    </div>
                                    @error('count')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </form>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($student)
                                    <tr>
                                        <td>
                                            {{ $student->count }}

                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-sm text-white" id="addBtn">
                                                <i class="fa-solid fa-plus-circle"></i> Add More Student
                                            </button>

                                            <form action="{{ route('students.update', $student->id) }}" method="POST"
                                                style="display: none" id="addForm">

                                                @csrf
                                                <div class="input-group">
                                                    <input type="number"
                                                        class="form-control @error('count') is-invalid @enderror"
                                                        name="count" placeholder="Enter student count..." required>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa-solid fa-plus-circle"></i> Add
                                                    </button>
                                                </div>
                                                @error('count')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{-- {{ $skills->links() }} --}}
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#addBtn').click(function() {
                $(this).hide();
                $('#addForm').show();
            });
        });
    </script>
@endsection


