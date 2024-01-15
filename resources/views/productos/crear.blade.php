@extends('plantilla/plantilla')

@section('titulo', 'CREAR PRODUCTOS')

@section('mensaje')
<h5 class="text-danger">Espacio para mensaje</h5>

@endsection

@section('contenido')
    <form action="{{route('insertarProducto')}}" method="POST" enctype="multipart/form-data">
            @csrf      
            <div class="mb-3>
              <label for="nombre" class="form-label">NOMBRE:</label>
              <input type="text" class="form-control" id="nombre" aria-describedby="Nombre" placeholder="Nombre:">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">DESCRIPCION:</label>
                <input type="text" class="form-control" id="desc" aria-describedby="Descripcion" placeholder="Descripcion:">
              </div>
              <div class="mb-3">
                <label for="precio" class="form-label">PRECIO:</label>
                <input type="number" class="form-control" id="precio" aria-describedby="Precio" placeholder="precio:">
              </div>
              <div class="mb-3">
                <label for="stock" class="form-label">STOCK:</label>
                <input type="number" class="form-control" id="precio" aria-describedby="Stock" >
              </div>
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" aria-describedby="Stock" >
              </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{route('productos')}}" class="btn btn-outline-primary">Cancelar</a>
    </form>
@endsection