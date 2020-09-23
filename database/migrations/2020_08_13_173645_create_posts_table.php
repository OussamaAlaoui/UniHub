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
            $table->id('post_id');
            $table->integer('user_id');
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('posttype_id')->constrained();
            $table->text('description');
            $table->string('file')->nullable();
            $table->boolean('is_image')->default(0);
            $table->boolean('is_pinned')->default(0);
            $table->boolean('is_reported')->default(0);
            $table->boolean('is_clean')->default(0);
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
