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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->text('store_logo')->nullable();
            $table->text('store_nome_loja')->nullable();
            $table->text('store_nome_fantasia')->nullable();
            $table->text('store_cnpj')->nullable();
            $table->string('store_horario')->nullable();
            $table->string('store_endereco1')->nullable();
            $table->string('store_endereco2')->nullable();
            $table->string('store_endereco3')->nullable();
            $table->string('store_endereco4')->nullable();
            $table->string('store_cep')->nullable();
            $table->string('store_estado')->nullable();
            $table->string('store_cidade')->nullable();
            $table->text('footer_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
