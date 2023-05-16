@extends('ui-panel.layouts.master')

@section('title', 'Min Personal Blog')

@section('content')

    <!-- ABOUT ME AND SKILLS SECTION -->
    <section id="aboutMe" class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="about">
                    <div class="row mt-4">
                        <div class="col-md-5 text-start">
                            <h3 class="display-6 text-center">ABOUT ME</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores vitae rerum
                                minima illum adipisci voluptatem facilis accusamus nam a incidunt? Accusamus
                                quam doloribus reprehenderit quia consequatur quae aliquid veniam sequi.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis saepe
                                aliquam eveniet, dolorum explicabo maiores dolor voluptatum magni doloremque
                                pariatur. Commodi quas ducimus sint repudiandae nisi minus possimus, quod
                                tenetur!</p>
                            <div class="row my-3">
                                <div class="col-sm-6">
                                    <div
                                        class="total-project my-2 border border-1 border-dark rounded shadow-sm text-center py-2">
                                        <i class="fa-solid fa-diagram-project fs-1 text-success"></i><br>
                                        <strong>{{ $projects->count() }}</strong><br>
                                        <span>TOTAL PROJECTS</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div
                                        class="total-students my-2 border border-1 border-dark rounded shadow-sm text-center py-2">
                                        <i class="fa-solid fa-users fs-1 text-success"></i><br>
                                        <strong>
                                            @if ($studentCount)
                                                {{ $studentCount->count }}
                                            @endif
                                        </strong><br>
                                        <span>TOTAL STUDENTS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7" id="skills">
                            <h3 class="display-6 text-center">MY SKILLS</h3>

                            @foreach ($skills as $skill)
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <div class="progress mt-2">
                                            <div class="progress-bar" style="width: {{ $skill->percent }}%;">
                                                {{ $skill->percent }}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">{{ $skill->name }}</div>
                                </div>
                            @endforeach

                            {{ $skills->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MY PROJECTS -->
    <section id="projects">
        <h3 class="display-6 text-center my-5">MY PROJECTS</h3>
        <div class="container">
            <div class="row">

                @foreach ($projects as $project)
                    <div class="col-md-4">
                        <a href="{{ $project->url }}" target="_blank">
                            <div class="border border-1 border-dark my-2 rounded text-center py-3">
                                <i class="fa-solid fa-diagram-project fs-1 text-success"></i> <br>
                                <strong>{{ $project->name }}</strong>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- LATEST POSTS -->
    <section id="latest-posts">
        <div class="container">
            <div class="row">
                <h3 class="display-6 mt-5 my-3 text-center">LATEST POSTS FROM BLOGS</h3>
                <small>Hey guys! I warmly welcome you to read my blog posts. Here are very interesting and
                    exciting posts you can read that I am supporting for you.</small><br><br>

                @foreach ($posts as $post)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ route('ui.detail', $post->id) }}">
                            <img src="{{ asset("storage/post-images/$post->image") }}" alt="blog image"
                                class="w-100 rounded shadow">
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            <h6 class="text-uppercase my-2">
                                {{ $post->title }}
                            </h6>
                            <p>{{ substr($post->content, 0, 200) }}...</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
