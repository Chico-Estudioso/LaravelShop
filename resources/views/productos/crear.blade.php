@extends('plantilla/plantilla')

@section('titulo', 'CREAR PRODUCTOS')

@section('contenido')
    <form action="{{route('insertarProducto')}}" method="POST" enctype="multipart/form-data">
            @csrf      
            <div class="mb-3">
              <label for="nombre" class="form-label">NOMBRE:</label>
              <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre')}}" aria-describedby="Nombre" placeholder="nombre">
              @error('nombre')
              <span class="text-danger">{{$mensaje}}</span>
              @enderror
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">DESCRIPCION:</label>
                <input type="text" name="desc" class="form-control"  value="{{old('desc')}}" id="desc" aria-describedby="Descripcion" placeholder="Descripcion breve">
              @error('desc')
              <span class="text-danger">{{$mensaje}}</span>
              @enderror
              </div>
              <div class="mb-3">
                <label for="precio" class="form-label">PRECIO:</label>
                <input type="number" name="precio" class="form-control"  value="{{old('precio')}}" id="precio" aria-describedby="Precio" placeholder="example 3$">
                @error('precio')
                <span class="text-danger">{{$mensaje}}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="stock" class="form-label">STOCK:</label>
                <input type="number" name="stock" class="form-control"  value="{{old('stock')}}" id="precio" aria-describedby="Stock" >
                @error('stock')
                <span class="text-danger">{{$mensaje}}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="Stock" >
                @error('imagen')
                <span class="text-danger">{{$mensaje}}</span>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{route('productos')}}" class="btn btn-outline-danger">Cancelar</a>
    </form>
@endsection