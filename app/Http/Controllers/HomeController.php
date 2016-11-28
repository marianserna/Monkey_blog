<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['latest_posts' => $this->latest_posts()]);
    }
}
