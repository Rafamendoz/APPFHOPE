<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBanco extends Model
{
    protected $table = 'detallebanco';
    protected $fillable = ['id','id_cuentaBancaria','referencia','fecha','id_tipoTransaccion','monto','descripcion', 'estado'];
    public $timestamp = true;
}
