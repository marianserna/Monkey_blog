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
