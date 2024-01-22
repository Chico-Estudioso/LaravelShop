@extends('plantilla/plantilla')

@section('titulo', 'MODIFICAR PRODUCTO '.$p->nombre)

@section('contenido')
    <form action="{{route('actualizarP', $p->id)}}" method="POST" enctype="multipart/form-data">
            @csrf  
            @method('PUT')  
            <div class="mb-3">
              <label for="id" class="form-label">ID:</label>
              <input type="text" name="id" class="form-control" id="id" aria-describedby="Nombre" value="{{$p->id}}" disabled="disabled">
            </div>  
            <div class="mb-3">
              <label for="nombre" class="form-label">NOMBRE:</label>
              <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="Nombre" placeholder="" value="{{$p->nombre}}" >
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">DESCRIPCION:</label>
                <input type="text" name="desc" class="form-control" id="desc" aria-describedby="Descripcion" placeholder="" value="{{$p->descripcion}}" >
              </div>
              <div class="mb-3">
                <label for="precio" class="form-label">PRECIO:</label>
                <input type="number" name="precio" class="form-control" id="precio" aria-describedby="Precio" value="{{$p->precio}}" >
              </div>
              <div class="mb-3">
                <label for="stock" class="form-label">STOCK:</label>
                <input type="number" name="stock" class="form-control" id="precio" aria-describedby="Stock" value="{{$p->stock}}" >
              </div>
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img src="{{asset('storage/'.$p->img)}}" alt="Imagen" style="width: 50px">
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="Stock" >
              </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="{{route('productos')}}" class="btn btn-outline-danger">Cancelar</a>
    </form>
@endsection