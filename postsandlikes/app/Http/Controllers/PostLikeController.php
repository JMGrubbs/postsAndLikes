<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // public function store(Post $post, Request $request)
    // {
    //     if (!$post->likedBy($request->user())) {
    //         // $post->likes()->create([
    //         //     'user_id'=>Auth::user()->id,
    //         // ]);
    //         $post->likes()->create([
    //             'user_id'=>$request->user()->id,
    //         ]);
    //     } else {
    //         $post->likes()->where('post_id', $post->id)->delete();
    //     }
    //     return back();
    // }

    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) {
            return response(null, 409);
        }
        // $post->likes()->create([
        //     'user_id'=>Auth::user()->id,
        // ]);
        $post->likes()->create([
            'user_id'=>$request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) {
            // $post->likes()->create([
            //     'user_id'=>Auth::user()->id,
            // ]);
            $post->likes()->where('post_id', $post->id)->delete();
        }
        return back();
    }

}
