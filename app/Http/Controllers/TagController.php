<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
  public function index() {
    $data = [
      'tags' => Tag::all()
    ];
    return view('guest.tags.index', $data);
  }

  public function show($tag_slug) {
    // QUERY to get the specified tag line (Object) from the database
    $tag = Tag::where('slug', $tag_slug)->first();
    // Checking that the QUERY gives a result (the tag does exist)
    if(!$tag) {
      abort(404);
    }
    $data = [
      'tag' => $tag
    ];
    return view('guest.tags.show', $data);
  }
}
