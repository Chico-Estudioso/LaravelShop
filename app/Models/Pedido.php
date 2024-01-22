<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    use HasFactory;

    function cliente()
    {
        return $this->BelongsTo(Cliente::class);
    }

    //Si devuelve con hasMany ponemos get()
    function detalle()
    {
        return $this->hasMany(Pedido_Producto::class)->get();
    }
}
