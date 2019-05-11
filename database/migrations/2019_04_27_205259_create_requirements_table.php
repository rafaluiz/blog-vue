<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
     {
         Schema::create('requirements', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->integer('curso_id')->unsigned();
             $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
             $table->integer('instituicoe_id')->unsigned();
             $table->foreign('instituicoe_id')->references('id')->on('instituicoes')->onDelete('cascade');
             $table->text('description');
             $table->date('inicioprocesso');
             $table->date('previsaoprojeto');
             $table->date('previsaofinal');
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
         Schema::dropIfExists('requirements');
     }
}
