<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastraCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastra_cliente', function (Blueprint $table) {
            $table->id();
            $table->string("nome",100);
            $table->string("endereco",50);
            $table->string("cpf",11);
            $table->string("telefone",11);
            $table->string("cidade",100);
            $table->string("email",100);
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
        Schema::dropIfExists('cadastra_cliente');
    }
}
