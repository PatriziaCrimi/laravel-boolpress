<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function show($category_slug) {
    // QUERY to get the specified category line (Object) from the database
    $category = Category::where('slug', $category_slug)->first();
    // Checking that the QUERY gives a result (the category does exist)
    if(!$category) {
      abort(404);
    }
    $data = [
      'category' => $category
    ];
    return view('guest.categories.show', $data);
  }
}
