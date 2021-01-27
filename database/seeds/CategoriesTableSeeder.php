<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    // Creating 5 fake categories (5 lines in the table "Category")
    for ($i=0; $i < 5; $i++) {
      // Creating a new Object/Instance
      $new_category = new Category();
      $new_category->name = $faker->sentence(3);
      // Generating the slug
      $slug = Str::slug($new_category->name);
      $root_slug = $slug;
      /*
        Checking that the slug is UNIQUE -> it should NOT exist already in my db
        QUERY: SELECT 'slug' FROM 'categories' WHERE slug = $slug
        We need ->first() because "where" restituisce una COLLECTION and I need only the first result
      */
      $current_category = Category::where('slug', $slug)->first();
      $counter = 1;
      // The while loop starts when a category with the same slug is found
      while($current_category) {
        // Generating a new slug with a number at the end to make it different
        $slug = $root_slug . '-' . $counter;
        $counter++;
        // New QUERY to check if there is another category with this new slug
        $current_category = Category::where('slug', $slug)->first();
      }
      // Assigning the final unique slug
      $new_category->slug = $slug;
      // Saving all the data just generated
      $new_category->save();
    }
  }
}
