<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $id) {
        $request->validate([
            'text' => 'required',
        ]);

        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::user()->id,
            'text' => $request->text,
        ]);

        return back()->with('successMsg', 'You have successfully commented!');
    }
}
