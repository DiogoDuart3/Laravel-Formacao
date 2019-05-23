<?php

namespace App\Http\Controllers;

use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('posts', ['only' => ['index', 'create']]);
//        $this->middleware('log');
    }

    function index(){
        $posts = Post::desc();
        return view('admin.posts.index', compact('posts'));
    }

    function show($id){
        $post = Post::withTrashed()->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    function edit($id){
        $post = Post::withTrashed()->findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    function store(){
        $data = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);
        $post = new Post();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id = 1;
        $post->save();
        Session::flash('message', 'Added with success');
        return redirect('/admin/posts');
    }

    function update($id){
        $data = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);
        Post::withTrashed()->findOrFail($id)->update($data);\
        Session::flash('message', 'Edit with success');
        return redirect('/admin/posts');
    }

    function create(){
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    function destroy($id){
        $post = Post::findOrFail($id);
        if($post->deleted_at){
            $post->forceDlete();
        } else {
            $post->delete();
        }
        return back();
    }
}
