<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasProfiles extends Model
{
    use HasFactory;
    public $table = '_user_has_profiles';
    public $fillable = ['id_usuario','id_profile'];
}
