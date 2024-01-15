@extends('plantilla/plantilla')

@section('titulo', 'CREAR CLIENTES')

@section('contenido')
    <form action="{{route('insertarCliente')}}" method="POST" enctype="multipart/form-data">
            @csrf      
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
              <input type="text" class="form-control" id="id" aria-describedby="Id" placeholder="ID:">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">NOMBRE:</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="Nombre" placeholder="Nombre:">
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">TELEFONO:</label>
                <input type="number" class="form-control" id="telefono" aria-describedby="Telefono" placeholder="Telefono:">
              </div>
              <div class="mb-3">
                <label for="direccion" class="form-label">DIRECCION:</label>
                <input type="number" class="form-control" id="direccion" aria-describedby="Direccion" >
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">EMAIL:</label>
                <input type="email" class="form-control" id="email" aria-describedby="Email" >
              </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{route('productos')}}" class="btn btn-outline-primary">Cancelar</a>
    </form>
@endsection
