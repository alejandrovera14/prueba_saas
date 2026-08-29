<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',  // ← Agregar
        'rol',         // ← Agregar
        'estado',      // ← Agregar
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Relación con Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // ✅ Verificar si es administrador
    public function isAdmin()
    {
        return $this->rol === 'Administrador';
    }
}