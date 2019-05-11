<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('matricula',10);
            $table->date('datanascimento')->nullable();
            $table->string('cep',10)->nullable();
            $table->string('logradouro',255)->nullable();
            $table->integer('numero');
            $table->text('complemento');
            $table->string('bairro',20);
            $table->string('cidade',100)->nullable();
	          $table->char('uf',2)->nullable();
            $table->string('naturalidade',120)->nullable();
            $table->string('nacionalidade',120)->nullable();
            $table->string('sexo')->nullable();
            $table->string('cpf',14)->unique();
	          $table->string('telefone',20)->nullable();
            $table->string('teleftwo',20)->nullable();
            $table->string('celular',20)->nullable();
            $table->enum('tipo', array('professor', 'aluno'));
            $table->integer('cadastradopor_id')->unsigned();
            $table->integer('atualizadopor_id')->unsigned();

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
