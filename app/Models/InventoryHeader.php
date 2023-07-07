<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHeader extends Model
{
    public $table = 'inventory_header';
    public $timestamp = true;
    protected $fillable = ['id', 'id_producto','total_stock','estado'];
}
