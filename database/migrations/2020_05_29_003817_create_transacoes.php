<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->double('valor',15,2);
            $table->bigInteger('idEmpresa')->unsigned();
            $table->bigInteger('idStatus')->unsigned();
            $table->bigInteger('idCliente')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idStatus')->references('id')->on('status_transacao');
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->timestamp('data')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
