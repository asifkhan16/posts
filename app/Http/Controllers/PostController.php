<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    Public function index(){
        $posts = Post::latest()->with('user','likes')->paginate(15);
        return view('posts.index',['posts' => $posts]);
    }

    public function store(request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);

        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body'    => $request->body,
        // ]);

         // in this method the posts model is use to store the data in data base
        // $request->user()->posts()->create([
        //     // user id will fill auto by the posts model
        //     'body' => $request->body,
        // ]);

        $request->user()->posts()->create($request->only('body'));

        return back()->with('success','post created successfuly...');
    }

    public function destroy(Post $post){
        // if(!$post->ownedby(auth()->user()))
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}
