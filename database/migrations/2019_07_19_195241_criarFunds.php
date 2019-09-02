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
            $table->string('ticker');
            $table->string('perfil',1000)->default("");
            $table->string('fund_avatar')->default("");
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
