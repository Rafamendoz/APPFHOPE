<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $table = 'size';
    public $timestamp = true;
    protected $fillable = ['id', 'name_size','estado'];
}
