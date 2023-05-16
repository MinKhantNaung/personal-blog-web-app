<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('admin-panel.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin-panel.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,svg',
            'title' => 'required',
            'content' => 'required',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/post-images', $imageName);

        Post::create([
            'category_id' => $request->category_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('successMsg', 'You have successfully created!');
    }

    // to show comments
    public function show($id) {
        $comments = Comment::where('post_id', $id)->get();

        return view('admin-panel.post.comment', compact('comments'));
    }

    // to show or hide comments
    public function showHideComments($id) {
        $comment = Comment::findOrFail($id);

        $status = $comment->status == 'show' ? 'hide' : 'show';

        $comment->update([
            'status' => $status,
        ]);

        return back()->with('successMsg', 'Comment status changed successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin-panel.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp,svg',
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        if($request->hasFile('image')) {
            $oldImage = $post->image;
            File::delete('storage/post-images/' . $oldImage);

            $image = $request->image;
            $newImage = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/post-images/', $newImage);

            $data['image'] = $newImage;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('successMsg', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $postImage = $post->image;
        File::delete('storage/post-images/' . $postImage);
        $post->delete();

        return back()->with('successMsg', 'You have successfully deleted!');
    }
}
