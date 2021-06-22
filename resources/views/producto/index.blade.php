@extends('layouts.app')
@section('content')
<div class="container">


    @if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    {{ Session::get('mensaje') }}
    @endif
</div>



<a href="{{ url('producto/create') }}" class="btn btn-success">Registrar nuevo producto</a>
<br><br>
<table class="table table-light">
  
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Descripcion</th>
      <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
    @foreach( $productos as $producto ) 
    <tr>
      <td>{{$producto->id}}</td>
      <td>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto }}" alt="" width="100">
      </td>
      <td>{{$producto->product_name}}</td>
      <td>{{$producto->number_copies}}</td>
      <td>{{$producto->product_price}}</td>
      <td>
      
      <a href="{{ url( '/producto/'.$producto->id.'/edit' ) }}" class="btn btn-primary" >
            Editar
      </a>
      
      
      <form action="{{ url( '/producto/'.$producto->id ) }}" class="d-inline"  method="post">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" onclick="return confirm('¿Quieres borrar?)" class="btn btn-danger" value="Borrar">
      

      </form>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
{!! $productos->links() !!}
</div>
@endsection