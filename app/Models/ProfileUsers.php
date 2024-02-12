<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUsers extends Model
{
    use HasFactory;

    public $table='profile_users';
    public $fillable = ['name_profile', 'start_date', 'end_date','estado'];
}
