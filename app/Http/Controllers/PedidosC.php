<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $pedidos = Pedido::where('cliente_id', '')->get();
            return view('pedidos/pedidosC', compact('pedidos'));
        }
    }
}
