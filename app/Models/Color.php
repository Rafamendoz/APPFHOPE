<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $table = 'color';
    public $timestamp = true;
    protected $fillable = ['id', 'name_color','estado'];
}
