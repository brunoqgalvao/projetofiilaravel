<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarFunds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('perfil');
            $table->string('fund_avatar')->default("");
            $table->string('fund_banner')->default("");
            $table->timestamps();
            $table->unsignedInteger('post_owner_id');
            $table->foreign('post_owner_id')->references('id')->on('post_owners')->notnull();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funds');

    }
}
