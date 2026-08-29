<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nit',
        'correo',
        'telefono',
        'direccion',
        'estado',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // public function bodegas()
    // {
    //     return $this->hasMany(Bodega::class);
    // }

    // public function clientes()
    // {
    //     return $this->hasMany(Cliente::class);
    // }

    // public function proveedores()
    // {
    //     return $this->hasMany(Proveedor::class);
    // }

    // public function productos()
    // {
    //     return $this->hasMany(Producto::class);
    // }

    // public function facturas()
    // {
    //     return $this->hasMany(Factura::class);
    // }
}