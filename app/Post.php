<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title', 'summary', 'image_file_name',
      'body', 'user_id', 'status', 'published_at'
    ];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
