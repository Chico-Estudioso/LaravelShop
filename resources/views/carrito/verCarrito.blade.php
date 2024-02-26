@extends('plantilla/plantilla')

@section('titulo','CARRITO')



@section('contenido')
<table class="table table-striped">
    <thead class="table-info">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach (session('carrito') as $pc)
        <tr>
            <form action="{{route('modificarCarrito')}}" method="post">
                @csrf
                <td>{{$pc['producto']->id}}</td>
                <td>{{$pc['producto']->nombre}}</td>
                <td>{{$pc['producto']->descripcion}}</td>
                <td>{{$pc['producto']->precio}}</td>
                <td><input class="from-control" type="number" name="cantidad" id="cantidad" value="{{$pc['cantidad']}}"></td>
                <td><img src="{{asset('storage/'.$pc['producto']->img)}}" width="100px" /></td>
                <td>

                    <button type="submit" class="btn btn-outline-info" name="modificarPC"
                        value="{{$pc['producto']->id}}">Modificar</button>
                    <button type="submit" class="btn btn-outline-danger" name="borraPCr"
                        value="{{$pc['producto']->id}}">Borrar</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<form action="{{route('crearPedido')}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-outline-success" value="">Crear Pedido</button>
</form>
@endsection