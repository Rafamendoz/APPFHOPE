<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public $table = 'servicios';
    public $timestamps = true;
   public  $filliable = ['service_name','endpoint','estado'];

}
