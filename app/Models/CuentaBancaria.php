<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    protected $table = 'cuentaBancaria';
    public $timestamp = true;
    protected $fillable = ['id', 'cBancaria_nCuenta', 'cBancaria_idBanco','cBancaria_nCuenta','cBancaria_tipoCuenta','cBancaria_tipoMoneda','cBancaria_total','estado'];
}
