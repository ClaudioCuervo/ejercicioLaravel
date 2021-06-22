<table class="table table-light">
  
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Descripcion</th>
    </tr>
  </thead>

  <tbody>
    @foreach( $juegos as $juego ) 
    <tr>
      <td>{{$juego->id}}</td>
      <td>{{$juego->foto}}</td>
      <td>{{$juego->games_name}}</td>
      <td>{{$juego->games_price}}</td>
      <td>{{$juego->games_des}}</td>
      <td>
      
      <a href="{{ url( '/juego/'.$juego->id.'/edit' ) }}">
            Editar
      </a>
      | 
      
      <form action="{{ url( '/juego/'.$juego->id ) }}" method="post">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" onclick="return confirm('¿Quieres borrar?)" value="Borrar">
      

      </form>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>