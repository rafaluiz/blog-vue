<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
      Schema::create('alunos_professores', function(Blueprint $table){
              $table->increments('id');
              $table->integer('aluno_id')->unsigned();
              $table->integer('professor_id')->unsigned();

              $table->foreign('aluno_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
              $table->foreign('professor_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
          });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
          Schema::dropIfExists('alunos_professores');
      }
  }
