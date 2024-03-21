<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaseDiaria extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getProfesor()
    {
        $profesor = $this->users;

        if ($profesor && $profesor->tipoUsuario == 'admin') {
            return $profesor->id;
        }
    }
}
