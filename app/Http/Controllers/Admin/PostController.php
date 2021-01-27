<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'posts' => Post::all()
    ];
    return view('admin.posts.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data = [
      'categories' => Category::all()
    ];
    return view('admin.posts.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Storing all form data in a variable
    $form_data = $request->all();
    // Creating a new Object/Instance with the form data
    $new_post = new Post();
    $new_post->fill($form_data);
    // Generating the slug
    $slug = Str::slug($new_post->title);
    $root_slug = $slug;
    /*
      Checking that the slug is UNIQUE -> it should NOT exist already in my db
      QUERY: SELECT 'slug' FROM 'posts' WHERE slug = $slug
      We need ->first() because "where" restituisce una COLLECTION and I need only the first result
    */
    $current_post = Post::where('slug', $slug)->first();
    $counter = 1;
    // The while loop starts when a post with the same slug is found
    while($current_post) {
      // Generating a new slug with a number at the end to make it different
      $slug = $root_slug . '-' . $counter;
      $counter++;
      // New QUERY to check if there is another post with this new slug
      $current_post = Post::where('slug', $slug)->first();
    }
    // Assigning the final unique slug
    $new_post->slug = $slug;
    // Generating publication date
    $new_post->publication_date = date('Y-m-d H:i:s');
    // Saving the new Object/Instance in the databaase
    $new_post->save();
    // Redirecting to the view with all posts
    return redirect()->route('admin.posts.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    if(!$post) {
      abort(404);
    }
    return view('admin.posts.show', ['post' => $post]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
