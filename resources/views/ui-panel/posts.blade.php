@extends('ui-panel.layouts.master')

@section('title', 'Posts')

@section('content')
    <section id="posts">
        <div class="container">
            <div class="row bg-light">
                <div class="col-md-8">

                    @foreach ($posts as $post)
                        <!-- BLOGS -->
                        <div class="p-sm-5 pt-5">
                            <img src="{{ asset("storage/post-images/$post->image") }}" alt="blog image"
                                class="w-100 rounded shadow-sm">
                            <h3 class="my-3 text-capitalize">{{ $post->title }}</h3>
                            <p>
                                {{ substr($post->content, 0, 200) }}...
                            </p>
                            <a href="{{ route('ui.detail', $post->id) }}">
                                <button class="btn btn-info btn-sm">
                                    Read More <i class="fa-solid fa-angles-right"></i>
                                </button>
                            </a>
                        </div>
                    @endforeach

                    {{ $posts->links() }}
                </div>

                <!-- SIDE BAR -->
                <div class="col-md-4 mt-5">
                    <form action="{{ route('ui.search') }}" method="GET">

                        @csrf
                        <div class="input-group z-0">
                            <input type="text" name="search" class="form-control border-end-0" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        <hr>
                        <h4>Categories</h4>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('ui.searchByCategory', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
