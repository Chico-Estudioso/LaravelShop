<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoC extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth');
    }

    function insertarCarrito($idP)
    {
        $producto = Producto::find($idP);


        //Añadir al carrito el producto
        //El carrito se almacena en una variable de sesión 
        if (session('carrito') == null) {
            session(['carrito' => array()]);
        }
        $actualizado = false;
        foreach (session('carrito') as $pc) {
            if ($pc['prducto']->id == $producto->id) {
                $pc['cantidad'] += 1;
                $actualizado = true;
            }
        }
        if (!$actualizado) {
            //Añadir al carrito el producto
            //El carrito se almacena en una variable de sesión 
            session('carrito')[] = array('producto' => $producto, 'cantidad' => 1);
        }
        //Añadir al carrito el producto
        session('carrito')[] = $producto;
    }
}
