<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProducto extends Model
{
    protected $table = 'detalle_producto_venta';
    protected $fillable = ['id','venta_id','producto_id','cantidad','size_id','color_id','estado'];
    public $timestamp = true;
}
