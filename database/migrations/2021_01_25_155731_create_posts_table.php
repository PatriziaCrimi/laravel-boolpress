<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string('title', 50);
      $table->string('subtitle', 50)->nullable();
      $table->string('author', 30);
      $table->string('cathegory', 20)->nullable();
      $table->longText('content');
      $table->mediumText('summary')->nullable();
      $table->dateTime('publication_date')->nullable();
      $table->string('notes')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('posts');
  }
}
