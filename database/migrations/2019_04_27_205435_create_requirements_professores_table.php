<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
     {
         Schema::create('requirements_professores', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->integer('titulacoe_id')->unsigned();
             $table->foreign('titulacoe_id')->references('id')->on('titulacoes')->onDelete('cascade');
             $table->text('description');
             $table->string('graduacoes');
             $table->string('posgraduacoes');
             $table->string('mestrado');
             $table->string('doutorado');
             $table->string('posdoutorado');
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
         Schema::dropIfExists('requirements_professores');
     }
  }
