<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    public function registroTarifa()
    {
        return $this->belongsTo(RegistroAlta::class);
    }
}
