@extends('layouts.app')
@section('content')
<div class="container">
@if(Session::has('mensaje'))

    <div class="alert alert-success" role="alert">
      {{ Session::get('mensaje') }}

    <!--<button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>-->
    </div>
    @endif




<a href="{{ url('producto/create') }}" class="btn btn-success">Nuevo Producto/Escandall</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>PrecioCosto</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id}}</td>
            <td>{{ $producto->Nombre}}</td>
            <td>{{ $producto->Cantidad }}</td>
            <td>{{ $producto->PrecioCosto }}</td>
            <td>{{ $producto-> Tipo }}</td>
            <td>
            <a href="{{url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning">Editar</a>


            <form action="{{ url('/producto/'.$producto->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick=" return confirm('Confirmas borrar')" value="Borrar" class="btn btn-danger">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{!! $productos->links() !!}}
</div>
@endsection
