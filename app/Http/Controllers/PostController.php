<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(5);
        return view("posts.index", compact('posts'));
    }

    public function create(Request $request)
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "body" => "required"
        ]);
        Post::create([
            "title" => $request->title,
            "body" => $request->body
        ]);
        return redirect()->route("posts.index")->with("success", "Post Created.");
    }

    /*public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        return view("posts.edit", compact("post"));
    }*/

    public function edit(Request $request, Post $post)
    {
        // $post = Post::find($id);
        return view("posts.edit", compact("post"));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required",
            "body" => "required"
        ]);
        // $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route("posts.index")->with("success", "Post Updated.");
    }

    public function show(Request $request, Post $post)
    {
        // $post = Post::find($id);
        return view("posts.show", compact("post"));
    }

    public function destroy(Request $request, Post $post)
    {
        // $post = Post::find($id);
        $post->delete();
        return redirect()->route("posts.index")->with("success", "Post Deleted.");
    }
}
