<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empresa;
use App\Clientes;
use App\StatusTransacao;

class Transacoes extends Model
{
    public $timestamps = false;

    public function empresa()
    {
        return $this->belongsTo('App\Empresa','idEmpresa','id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente','idCliente','id');
    }

    public function status()
    {
        return $this->belongsTo('App\StatusTransacao','idStatus','id');
    }
}
