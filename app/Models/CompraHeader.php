<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraHeader extends Model
{
    use HasFactory;

    public $table = 'compra_header';
   public $fillable = ['id_cliente','id_tipoCompra','id_tipoMoneda','estado','total'];
}
