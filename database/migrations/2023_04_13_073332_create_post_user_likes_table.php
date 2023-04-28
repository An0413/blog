<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('post_id', 'post_user_like_post_idx');
            $table->index('user_id', 'post_user_like_user_idx');

            $table->foreign('post_id', 'post_user_like_post_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'post_user_like_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_user_likes');
    }
};
