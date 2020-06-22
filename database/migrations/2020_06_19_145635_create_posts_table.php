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
            $table->integer("user_id")->nullable()->index();
            $table->integer("category_id")->nullable()->index();
            $table->integer("tag_id")->nullable()->index();
            $table->integer("photo_id")->nullable()->index();
            $table->string("title");
            $table->text("short_description");
            $table->text("content");
            $table->text("published_at")->nullable();
            $table->string("slug")->nullable();
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
