<?php

use App\Http\Controllers\ProductoC;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::controller(ProductoC::class)->group(function () {
    Route::get('productos', 'productos')->name('productos');
    //Definir ruta para crear un producto
    Route::get('productos/crear', 'crear')->name('crearProducto');
    Route::post('productos/insertar', 'insertar')->name('insertarProducto');
    //Definir una ruta con un parámetro
    Route::get('productos/{idP}', 'ver')->name('verP');
    Route::get('productos/borrar/{idP}', 'borrar')->name('borrarP');
    //Definir sruta con 2 parámetros
    Route::get('productos/modificar/{idP}', 'modificar')->name('modificarP');
    Route::get('productos/clientes/crear', 'crear')->name('crearClientes');
    Route::get('productos/clientes/insertar', 'insertar')->name('insertarCliente');
});




//Ruta para ver un producto concreto, pasando el id



//Definir ruta con 2 parámetros y uno opcional (un Texto)
Route::get('productos/opt/{idP}/{unTexto?}', function ($idP, $texto = null) {
    echo '<h1>' . $texto != null ? $texto : '' . '</h1>';
    echo '<p>Pagina para ver como se define un parametro opcional: ' . $idP . '</p>';
});
