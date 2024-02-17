<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUsersAuth extends Model
{
    use HasFactory;
    public $table='profile_users_auth';
    public $fillable = ['id_profile', 'permissions', 'view_name'];

}
