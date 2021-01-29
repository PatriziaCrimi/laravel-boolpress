<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    // Creating 5 fake tags (5 lines in the table "Tag")
    for ($i=0; $i < 5; $i++) {
      // Creating a new Object/Instance
      $new_tag = new Tag();
      $new_tag->name = $faker->words(3, true);
      // Generating the slug
      $slug = Str::slug($new_tag->name);
      $root_slug = $slug;
      /*
        Checking that the slug is UNIQUE -> it should NOT exist already in my db
        QUERY: SELECT 'slug' FROM 'tags' WHERE slug = $slug
        We need ->first() because "where" restituisce una COLLECTION and I need only the first result
      */
      $current_tag = Tag::where('slug', $slug)->first();
      $counter = 1;
      // The while loop starts when a tag with the same slug is found
      while($current_tag) {
        // Generating a new slug with a number at the end to make it different
        $slug = $root_slug . '-' . $counter;
        $counter++;
        // New QUERY to check if there is another tag with this new slug
        $current_tag = Tag::where('slug', $slug)->first();
      }
      // Assigning the final unique slug
      $new_tag->slug = $slug;
      // Saving all the data just generated
      $new_tag->save();
    }
  }
}
