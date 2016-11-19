# CMS process

www ~/.composer/vendor/bin/laravel new monkey_blog
php artisan serve
Go to http://localhost:8000/

See where stuff is:
Routes > web.php
Resources > views > welcome.blade.php

Initialize repo
git init
git add .
git commit -am "whatever"

In .env change db settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=monkey_blog
DB_USERNAME=root
DB_PASSWORD=

database > migrations
Laravel comes with users table by default. We have to add missing columns

```
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->boolean('is_author')->default(false);
        $table->boolean('is_editor')->default(false);
        $table->rememberToken();
        $table->timestamps();
    });
}
```

Create posts table

php artisan make:migration create_posts_table --create=posts
database > migrations > posts  modify the table:

```
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->string('summary');
        $table->string('image_file_name');
        $table->text('body');
        // user id unsigned: always positive numbers
        $table->integer('user_id')->unsigned();
        $table->string('status')->default('draft');
        // nullable allows the field not to have a value
        $table->dateTime('published_at')->nullable();
        $table->timestamps();
    });
}
```

Run `php artisan migrate`

To rollback migration:
`php artisan migrate:rollback`

Create post controller for Front-End
`php artisan make:controller PostController --resource`

app > Http > Controllers > PostController: Modify controller

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
```

routes > web.php:
`Route::resource('posts', 'PostController', ['only' => ['index', 'show']]);`

To see routes
`php artisan route:list`

Create a view to show posts:
In resources > views create new folder called posts. Inside, create index.blade.php. Create the HTML structure

Create model (1 model per db table). Laravel brings a user model (app > user.php)
`php artisan make:model Post`

<!-- ORM Object Relational Mapping: Model talks to DB -->
We're going to create a fake post
In the post model write the post fields:

```class Post extends Model
{
    protected $fillable = [
      'title', 'summary', 'image_file_name',
      'body', 'user_id', 'status', 'published_at'
    ];
}
```
Open the PHP console:
` php artisan tinker` (this is the console)

Create a fake post in the console:

run:
```
App\Post::create(['title' => 'Welcome!', 'summary' => 'Enjoy lalalalal', 'image_file_name' => 'cat.jpg', 'user_id' => 1, 'body' => 'This is the content of this post'])
```

This is the result:
```
=> App\Post {#684
     title: "Welcome!",
     summary: "Enjoy lalalalal",
     image_file_name: "cat.jpg",
     user_id: 1,
     body: "This is the content of this post",
     updated_at: "2016-11-19 19:25:40",
     created_at: "2016-11-19 19:25:40",
     id: 1,
   }
```

To exit, write exit

In resources >views, create a show and update the index view:

First, create a layout folder that will contain all the stuff that will be repeated throughout the views:

app.blade.php
```
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') | Monkey Blog</title>
  </head>
  <body>
    @yield('content')
  </body>
</html>
```

Now, create the show view:
```
@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
      {{$post->body}}
    </div>
@endsection
```

and update the index view:

```
@extends('layouts.app')
@section('title', 'Posts')

@section('content')
    <h1>Listing posts</h1>
    <ul>
      @foreach ($posts as $post)
        <li>
          <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
        </li>
      @endforeach
@endsection
```

create new branch:
Marian
`git co -b responsive-tag`
Justice
`git co -b summary`

Get back to master branch:
`git co master`
`git pull` to bring changes made in other branches
