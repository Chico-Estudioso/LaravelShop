<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteC extends Controller
{
    function clientes()
    {
        return view('clientes/clientes');
    }
    function crearClientes()
    {
        return view('clientes/crear');
    }
    function insertarClientes()
    {
        return view('clientes/insertar');
    }
}
