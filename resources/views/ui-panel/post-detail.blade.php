@extends('ui-panel.layouts.master')

@section('title', 'Post Detail')
@section('content')

    <!-- POST DETAIL -->
    <section id="post-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3 mt-5 mt-sm-0">
                    <div class="p-sm-5">
                        <img src="{{ asset("storage/post-images/$post->image") }}" alt="blog image" class="w-100 rounded">
                        <div>
                            <strong><i class="fa-solid fa-pen me-2 mt-3"></i>Posted On,</strong>
                            {{ date('d-M-Y', strtotime($post->created_at)) }}
                        </div>
                        <div>
                            <strong><i class="fa-solid fa-list-ul me-2 mt-3"></i>Category:</strong>
                            {{ $post->category->name }}
                        </div>
                        <h4 class="mt-3 text-capitalize">{{ $post->title }}</h4>
                        <p style="text-align: justify;" class="lh-lg fs-5">
                            {{ $post->content }}
                        </p>

                        <form method="POST">

                            @csrf
                            <div>
                                <span>{{ $likes->count() }} likes</span> &nbsp;
                                <span>{{ $dislikes->count() }} dislikes</span> &nbsp;
                                <span>{{ $comments->count() }} comments</span>
                            </div>

                            <button type="submit"
                                @if ($likeStatus) @if ($likeStatus->type == 'like') disabled @endif
                                @endif formaction="{{ route('posts.like', $post->id) }}"
                                class="btn btn-sm btn-success"><i class="fa-solid fa-thumbs-up me-1"></i>Like</button>
                            <button type="submit"
                                @if ($likeStatus) @if ($likeStatus->type == 'dislike') disabled @endif
                                @endif formaction="{{ route('posts.dislike', $post->id) }}"
                                class="btn btn-sm btn-danger"><i class="fa-solid fa-thumbs-down me-1"></i>Dislike</button>

                            <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="collapse"
                                data-bs-target="#collapse"><i class="fa-solid fa-comment me-1"></i>Comments</button>
                        </form>

                        <div class="mt-3 collapse fade" id="collapse">
                            <form action="{{ route('posts.comment', $post->id) }}" method="POST">

                                @csrf
                                <textarea name="text" rows="5" placeholder="Your Comment"
                                    class="form-control @error('text') is-invalid @enderror" required></textarea>
                                @error('text')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>

                            @foreach ($comments as $comment)
                                <div class="col-sm-4 mt-3">
                                    <img src="{{ asset('storage/post-images/' . $post->image) }}" alt="user image"
                                        class="rounded-circle img-fluid object-fit-cover" style="width:60px;height:60px;">
                                        <span>{{ $comment->user->name }}</span>
                                    <div class="p-2 mt-2 rounded bg-secondary text-white">{{ $comment->text }}</div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
