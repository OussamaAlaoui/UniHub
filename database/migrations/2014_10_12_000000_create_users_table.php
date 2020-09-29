<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpKernel\Profiler\Profile;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profilepic')->default('profile.jpg');
            $table->boolean('is_admin');
            $table->integer('admin_id');
            $table->boolean('is_student');
            $table->string('class')->references(array('level', 'name', 'city'))->on('classes');
            $table->string('guardian_email');
            $table->boolean('is_delegate');
            $table->boolean('is_professor');
            $table->string('subject_id');
            $table->boolean('is_moderator');
          
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
