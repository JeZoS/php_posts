<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user','likes'])->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        // Post::create();
        $request->user()->posts()->create([
            'body' => $request->body,
        ]);
        return back();
    }

    public function destroy(Post $post)
    {
        if(Auth::user()->id != $post->user->id){
            return back();
        }
        $post->delete();
        return back();
    }
}
