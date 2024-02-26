<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Pedido_Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;

class PedidosC extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    //
    function pedidos()
    {

        if (Auth::user()->tipo == 'A') {
            $pedidos = Pedido::all();
            return view('pedidos/pedidos', compact('pedidos'));
        } else {
            //Recuperar sus pedidos y el cliente asociado al usuario
            //select * from clientes where userid=idAuth::user->id limit 1
            $cliente = Cliente::where('user_id', Auth::user()->id)->first();
            //Hacemos un select * from pedidos where cliente_id=idClienteLogueado
            $pedidos = Pedido::where('cliente_id', $cliente->id)->get();
            return view('pedidos/pedidosC', compact('pedidos'));
        }
    }

    function crearPedido()
    {
        if (session('carrito') == null or sizeof(session('carrito')) == 0) {
            return back()->with('mensaje', 'Error no hay productos en el carrito');
        }
        $error = false;
        try {
            //Creamos el pedido en una transacción
            //ya que hay que hacer un insert en 2 tablas
            DB::transaction(function () {
                //Crear pedido a partir de la variable de sesion
                // y del usuario logueado
                $p = new Pedido();
                $p->fecha = date('YmdHis');
                // Recuperamos el cliente
                $c = Cliente::where('user_id', Auth::user()->id)->first();
                $p->cliente_id = $c->id;
                //Guardar pedido
                if ($p->save()) {
                    //Crear un pedido producto para cada producto que haya en el carrito
                    $carrito = session('carrito');
                    foreach ($carrito as $pc) {
                        $nuevo = new Pedido_Producto();
                        $nuevo->cantidad = $pc['cantidad'];
                        $nuevo->precioU = $pc['producto']->precio;
                        $nuevo->pedido_id = $p->id;
                        $nuevo->producto = $pc['producto']->id;
                        $nuevo->save();
                    }
                }
            });
        } catch (PDOException $e) {
            $error = true;
            return back()->with('mensaje', 'Ha habido un error en la creacion del pedido: ' . $e->getMessage());
        } finally {

            if (!$error) {
                session()->forget('carrito');
                return redirect()->route('pedidos')->with('mensaje', 'Pedido Creado');
            }
        }
    }
}
