<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoC extends Controller
{
    //Metodo que maneja la ruta productos
    function productos()
    {
        return view('productos/productos');
    }

    function crear()
    {
        return view('productos/crear');
    }

    function crearCliente()
    {
        return view('productos/clientes/crear');
    }
    function insertarCliente()
    {
        return view('productos/clientes/insertar');
    }
    function insertar()
    {
        return 'Insertar producto';
    }

    function ver($idP)
    {
        return 'Pagina para ver el producto ' . $idP;
    }
    function modificar($idP)
    {
        return 'Pagina para modificar el producto ' . $idP;
    }
    function borrar($idP)
    {
        return 'Pagina para borrar el producto ' . $idP;
    }
}
