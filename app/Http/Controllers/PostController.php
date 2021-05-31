<?php

namespace App\Http\Controllers;

use App\Post;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::join('comments', 'posts.id', '=', 'comments.id')
            ->select('posts.title', 'comments.content')
            ->get();

        return view('posts.index', compact(['posts']));
    }

    public function show(Post $post)
    {
        $post = Post::find($post->id);

        return view('posts.show', compact(['post']));
    }
}
