<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('post_tag', function (Blueprint $table) {
        $table->unsignedBigInteger('post_id');
        // Creating the foreign key constraint to connect "posts" table
        $table->foreign('post_id')->references('id')->on('posts');
        $table->unsignedBigInteger('tag_id');
        // Creating the foreign key constraint to connect "tags" table
        $table->foreign('tag_id')->references('id')->on('tags');
        // Creating PRIMARY KEY: composta da entrambe le colonne insieme
        $table->primary(['post_id', 'tag_id']);
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
      Schema::dropIfExists('post_tag');
    }
}
