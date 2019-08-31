<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('content',10000);
            $table->string('title')->default("");
            $table->string('image_url')->default("")->nullable();
            $table->string('likes_total')->default('0');
            $table->string('comments_total')->default('0');
            $table->string('shares_total')->default('0');
            $table->timestamps();
            $table->unsignedInteger('post_owner_id');
            $table->foreign('post_owner_id')->references('id')->on('post_owners');
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
