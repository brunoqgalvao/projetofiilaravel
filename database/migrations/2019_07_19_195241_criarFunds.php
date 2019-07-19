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
            $table->timestamps();
            $table->unsignedBigInteger('postOwner_id');
            // $table->foreign('postOwner_id')->references('id')->on('postOwners')->notnull();
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
