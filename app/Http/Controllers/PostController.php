<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
      $posts = Post::all();
      // view function: 1st parameter is the name of the view, the 2nd thing is the variable you're making available to the view
      return view('posts.index', ['posts' => $posts]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show', [
        'post' => $post,
        'latest_posts' => $this->latest_posts()
      ]);
    }
}
