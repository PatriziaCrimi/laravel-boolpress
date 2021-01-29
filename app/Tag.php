<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  // This function connects the two Models: it creates the relationship to the posts
  // MANY TO MANY (PLURAL: many tags can be given to many different posts)
  public function posts() {
    return $this->belongsToMany('App\Post');
  }
}
