<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('posts', function (Blueprint $table) {
      // Creating the new column "category_id" (FK) positioned after the column "slug"
      /* ----- OPTION 1 ----- */
      $table->unsignedBigInteger('category_id')->nullable()->after('slug');
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
      /* ----- OPTION 2 -----
      $table->foreignId('category_id')->constrained();
      */
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('posts', function (Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('posts_category_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('category_id');
    });
  }
}
