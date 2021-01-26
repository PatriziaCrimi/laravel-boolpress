<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    // Creating 100 fake posts (100 lines in the table "Posts")
    for($i = 0; $i < 100; $i++) {
      // Creating a new Object/Instance
      $new_post = new Post();
      $new_post->title = $faker->sentence(5);
      $new_post->subtitle = $faker->sentence(4);
      $new_post->cathegories = $faker->words(3, true);
      $new_post->topics = $faker->words(5, true);
      $new_post->content = $faker->text();
      $new_post->summary = $faker->paragraph();
      $new_post->publication_date = $faker->datetime();
      $new_post->notes = $faker->sentence();
      // Generating the slug
      $slug = Str::slug($new_post->title);
      $root_slug = $slug;
      /*
        Checking that the slug is UNIQUE -> it doesn't exist already in my db
        QUERY: SELECT 'slug' FROM 'posts' WHERE slag = $slag
        We need ->first() because "where" restituisce una COLLECTION and I need only the first result
      */
      $current_post = Post::where('slug', $slug)->first();
      $counter = 1;
      // The while loop starts when a post with the same slug is found
      while($current_post) {
        // Generating a new slug with a final number to make it different
        $slug = $root_slug . '-' . $counter;
        $counter++;
        // New QUERY to check if there is another post with this new slug
        $current_post = Post::where('slug', $slug)->first();
      }
      // Assigning the final unique slug
      $new_post->slug = $slug;
      // Saving all the data just generated
      $new_post->save();
    }
  }
}
