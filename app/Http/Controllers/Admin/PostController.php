<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use \Auth;
use \Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $scope = Post::with('user');

      if (Auth::user()->is_admin) {
       // nothing
      } else if (Auth::user()->is_editor && Auth::user()->is_author) {

      $scope = $scope->where('user_id', Auth::user()->id)
        ->orWhereIn('status', ['submitted', 'published', 'rejected']);
      } else if (Auth::user()->is_editor) {
        $scope = $scope->whereIn('status', ['submitted', 'published', 'rejected']);
      } else if (Auth::user()->is_author) {
        $scope = $scope->where('user_id', Auth::user()->id);
      }

      $posts = $scope->get();

      return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $post = new Post();
      return view('admin.posts.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
        'title' => 'required',
        'summary' => 'required',
        'body' => 'required',
      ]);

      $input = $request->all();
      $post = new Post($input);
      $post->status = 'draft';
      $post->user_id = Auth::user()->id;
      $post->save();

      Session::flash('flash_message','A new post has been created');

      return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function submit($id)
    {
      $post = Post::find($id);
      $post->status = 'submitted';
      $post->save();

      Session::flash('flash_message','The post has been submitted');

      return redirect()->route('admin.posts.index');
    }
    /**
     * Setting status of post to submitted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function publish($id)
     {
       $post = Post::find($id);
       $post->status = 'published';
       $post->published_at = new \DateTime();
       $post->save();

       Session::flash('flash_message','The post has been published');

       return redirect()->route('admin.posts.index');
     }
     /**
      * Setting status of post to submitted.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

      public function reject($id)
      {
        $post = Post::find($id);
        $post->status = 'rejected';
        $post->save();

        Session::flash('flash_message','The post has been rejected');
        return redirect()->route('admin.posts.index');
      }
      /**
       * Setting status of post to submitted.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

    public function edit($id)
    {
      $post = Post::find($id);
      return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      $this->validate($request, [
        'title' => 'required',
        'summary' => 'required',
        'body' => 'required',
      ]);

      $input = $request->all();
      $post->fill($input)->save();
      Session::flash('flash_message','The post has been updated');
      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Post::destroy($id);
      Session::flash('flash_message','The post has been deleted');
      return redirect()->route('admin.posts.index');
    }
}
