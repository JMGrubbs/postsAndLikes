<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::get(); // returns all posts as a collection
        $posts = Post::paginate(20);
         
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);


        
        //     Post::create([
        //         'user_id' => Auth::user()->id,
        //         'body' => $request->body
        // ]);
        // when useing the create function in laravel you need to pass in an array of the table collums
        // laravel automatically passes relational fields like 'user_id'.
        // "$request->only('body')" returns an array.
        $request->user()->posts()->create($request->only('body'));

        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);

        return redirect()->route('posts');
    }
}
