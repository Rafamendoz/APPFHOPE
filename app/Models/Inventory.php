<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public $table = 'inventory';
    public $timestamp = true;
    protected $fillable = ['id', 'id_color','id_size','stock','id_producto','estado'];
}
