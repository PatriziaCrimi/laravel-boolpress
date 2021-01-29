<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'subtitle', 'slug', 'category_id', 'content', 'summary', 'publication_date', 'notes'];
  // This function connects the two Models: it creates the relationship to the category (SINGULAR: only one category can be given to one post)
  // ONE TO MANY - SECONDARY TABLE needs the "belongsTo()" function
  public function category() {
    return $this->belongsTo('App\Category');
  }

  public function tags() {
    return $this->belongsToMany('App\Tag');
  }
}
