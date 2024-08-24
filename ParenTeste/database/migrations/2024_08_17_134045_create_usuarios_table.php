<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cep');
            $table->string('complemento')->nullable();
            $table->string('genero');
            $table->date('data_nascimento');
            $table->string('convenio');
            $table->string('senha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
