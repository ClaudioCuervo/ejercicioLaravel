@extends('layouts.app')
@section('content')
<div class="container">


    @if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    {{ Session::get('mensaje') }}
    @endif
</div>



<a href="{{ url('juego/create') }}" class="btn btn-success">Registrar nuevo juego</a>
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
    @foreach( $juegos as $juego ) 
    <tr>
      <td>{{$juego->id}}</td>
      <td>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$juego->foto }}" alt="" width="100">
      </td>
      <td>{{$juego->games_name}}</td>
      <td>{{$juego->games_price}}</td>
      <td>{{$juego->games_des}}</td>
      <td>
      
      <a href="{{ url( '/juego/'.$juego->id.'/edit' ) }}" class="btn btn-primary" >
            Editar
      </a>
      
      
      <form action="{{ url( '/juego/'.$juego->id ) }}" class="d-inline"  method="post">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" onclick="return confirm('¿Quieres borrar?)" class="btn btn-danger" value="Borrar">
      

      </form>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
{!! $juegos->links() !!}
</div>
@endsection