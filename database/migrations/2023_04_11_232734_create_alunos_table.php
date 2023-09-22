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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('primeiro_nome');
            $table->string('nome_meio');
            $table->string('ultimo_nome');
            $table->date('data_nascimento');
            $table->string('genero');
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->string('deficiencia');
            $table->string('estado_civil');
            $table->string('provincia');
            $table->string('endereco');
            $table->string('numero_telefone');
            $table->string('email')->unique();
            $table->string('numero_bi')->unique();
            $table->string('nome_responsavel');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('contato_responsavel');
            $table->string('parentesco_responsavel');
            $table->string('escola_anterior')->nullable();
            $table->string('certificados')->nullable();
            $table->string('vc_foto')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
