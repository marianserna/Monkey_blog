<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Post extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $fillable = [
      'title', 'summary', 'image',
      'body', 'user_id', 'status', 'published_at'
    ];

    public function __construct(array $attributes = array()) {
       $this->hasAttachedFile('image', [
           'styles' => [
              'hero' => '1440',
              'medium' => '500x500#'
           ]
       ]);

       parent::__construct($attributes);
   }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
