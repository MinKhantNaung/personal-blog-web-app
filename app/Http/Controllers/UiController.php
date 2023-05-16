<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    // to index page
    public function index()
    {
        $skills = Skill::paginate(10);
        $projects = Project::all();
        $studentCount = Student::find(1);
        $posts = Post::orderBy('id', 'desc')->take(6)->get();

        return view('ui-panel.index', compact('skills', 'projects', 'studentCount', 'posts'));
    }

    // to posts page
    public function postsPage()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(5);

        $posts->appends(request()->all());
        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    // to post detail page
    public function detail($id)
    {
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislikes = LikesDislike::where('post_id', $id)->where('type', 'dislike')->get();
        $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
        $comments = Comment::where('post_id', $id)->where('status', 'show')->get();

        return view('ui-panel.post-detail', compact('post', 'likes', 'dislikes', 'likeStatus', 'comments'));
    }

    // to search posts in posts page
    public function search(Request $request)
    {
        $search = '%' . $request->search . '%';

        $categories = Category::all();
        $posts = Post::where('title', 'like', $search)
            ->orWhere('content', 'like', $search)
            ->orWhereHas('category', function ($category) use ($search) {
                $category->where('name', 'like', $search);
            })
            ->paginate(5);

        $posts->appends(request()->all());

        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    // to search posts by categories
    public function searchByCategory($id)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $id)->paginate(5);

        $posts->appends(request()->all());
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
}
