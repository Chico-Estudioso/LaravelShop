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

    function insertarCarrito(Request $r)
    {
        $producto = Producto::find($r->carrito);


        //Añadir al carrito el producto
        //El carrito se almacena en una variable de sesión 
        if (session('carrito') == null) {
            $carrito = array();
        } else {
            $carrito = session('carrito');
        }
        $actualizado = false;
        foreach ($carrito as $clave => $pc) {
            if ($pc['producto']->id == $producto->id) {
                $carrito[$clave]['cantidad'] = $r->cantidad;
                $actualizado = true;
            }
        }
        if (!$actualizado) {
            //Añadir al carrito el producto
            //El carrito se almacena en una variable de sesión 
            $carrito[] = array('producto' => $producto, 'cantidad' => 1);
        }
        session(['carrito' => $carrito]);
        return back()->with('mensaje', 'Producto añadido al carrito');
    }

    function verCarrito()
    {
        return view('carrito/verCarrito');
    }
    function modificarCarrito(Request $r)
    {
        $carrito = session('carrito');
        if ($r->modificarPC != null) {
            //MODIFICAR LA CANTIDAD DEL PRODUCTO EN EL CARRRITO
            foreach ($carrito as $clave => $pc) {
                if ($pc['producto']->id == $r->modificarPC) {
                    $carrito[$clave]['cantidad'] = $pc['cantidad'] + $r->cantidad;
                    session(['carrito' => $carrito]);
                    return back()->with('mensaje', 'Producto Modificado');
                }
            }
        } elseif ($r->borrarPC != null) {
            //Borrar la cantidad de producto del carrito
            foreach ($carrito as $clave => $pc) {
                if ($pc['producto']->id == $r->borrarPC) {
                    unset($carrito[$clave]);
                    session(['carrito' => $carrito]);
                    return back()->with('mensaje', 'Producto Borrado');
                }
            }
        }
    }
}
