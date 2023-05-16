@extends('admin-panel.layouts.master')

@section('title', 'skill create')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-4 card-title">Create Skill
                            <a href="{{ route('skills.index') }}" class="btn btn-secondary btn-sm float-end">
                                << back</a>
                        </h3>
                    </div>
                    <form action="{{ route('skills.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter skill name..." value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="percent">Percent</label>
                                <input type="number" name="percent" id="percent"
                                    class="form-control @error('percent') is-invalid @enderror"
                                    placeholder="Enter percent..." value="{{ old('percent') }}">
                                @error('percent')
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
