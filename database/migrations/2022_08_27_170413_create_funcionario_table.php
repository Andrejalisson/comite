<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('perfil', 25)->nullable();
            $table->string('imgIdentidade', 25)->nullable();
            $table->string('imgCpf', 25)->nullable();
            $table->string('imgEndereco', 25)->nullable();
            $table->string('imgTitulo', 25)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 20)->nullable();
            $table->date('nascimento')->nullable();
            $table->string('naturalidade', 20)->nullable();
            $table->string('titulo', 12)->nullable();
            $table->string('zona', 4)->nullable();
            $table->string('secao', 4)->nullable();
            $table->string('municipio', 20)->nullable();
            $table->string('telefone_fixo', 11)->nullable();
            $table->string('celular', 11)->nullable();
            $table->longText('observacao')->nullable();
            $table->longText('funcao', 20)->nullable();
            $table->float('remuneracao')->nullable();
            $table->string('cep',8)->nullable();
            $table->string('cidade', 20)->nullable();
            $table->string('bairro', 20)->nullable();
            $table->string('logradouro',100)->nullable();
            $table->string('numero',6)->nullable();
            $table->string('complemento',20)->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('funcionario');
    }
};
