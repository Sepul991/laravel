<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAlta extends Model
{
    use HasFactory;

    public function tarifa()
    {
        //
        return $this->hasMany(Tarifa::class);
    }
    public function user()
    {
        //
        return $this->hasMany(User::class);
    }
}
