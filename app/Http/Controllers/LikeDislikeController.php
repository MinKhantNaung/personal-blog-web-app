<?php

namespace App\Http\Controllers;

use App\Models\LikesDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function like($id) {
        $isExit = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();

        if($isExit) {
            if($isExit->type == 'like') {
                return back();
            } else {
                LikesDislike::where('id', $isExit->id)->update([
                    'type' => 'like',
                ]);

                return back();
            }

        } else {
            LikesDislike::create([
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);
            return back();
        }
    }

    public function dislike($id) {
       $isExit = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();

       if($isExit) {
            if($isExit->type == 'dislike') {
                return back();
            }

            LikesDislike::where('id', $isExit->id)->update([
                'type' => 'dislike',
            ]);

            return back();
       }

       LikesDislike::create([
            'post_id' => $id,
            'user_id' => Auth::user()->id,
            'type' => 'dislike',
       ]);

       return back();
    }
}
