<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('conteudo');
            $table->timestamps();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('comment_id');
            // $table->foreign('post_id')->references('id')->on('Posts')->notnull();
            // $table->foreign('user_id')->references('id')->on('Users')->notnull();
            // $table->foreign('comment_id')->references('id')->on('Comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');

    }
}
