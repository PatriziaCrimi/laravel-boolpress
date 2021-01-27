<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // This function connects the two Models: it creates the relationship to the posts (PLURAL: one category can be given to many different posts)
  // ONE TO MANY - PRIMARY TABLE needS the "hasMany()" function
  public function posts() {
    return $this->hasMany('App\Post');
  }
}
