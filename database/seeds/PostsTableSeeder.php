<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    for($i=0; $i < 100; $i++) {
      // Creating a new Object/Instance
      $new_post_object = new Post();
      $new_post_object->title = $faker->words(3, true);
      $new_post_object->subtitle = $faker->sentence(4);
      $new_post_object->author = $faker->name();
      $new_post_object->cathegory = $faker->word();
      $new_post_object->content = $faker->text();
      $new_post_object->summary = $faker->paragraph();
      $new_post_object->publication_date = $faker->datetime();
      $new_post_object->save();
    }
  }
}
