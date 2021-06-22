

<h1>{{ $modo }} juego</h1>
<label for="games_name">Nombre: </label>
<input type="text" name="games_name" value="{{ isset($juego->games_name)?$juego->games_name:'' }}" id="games_name">
<br>

<label for="games_price">Precio: </label>
<input type="text" name="games_price" value="{{ isset($juego->games_price)?$juego->games_price:'' }}" id="games_price">
<br>

<label for="games_des">Descripcion: </label>
<input type="text" name="games_des" value="{{ isset($juego->games_des)?$juego->games_des:'' }}" id="games_des">
<br>

<label for="foto">Foto: </label>
@if(isset($juego->foto))
<img src="{{ asset('storage').'/'.$juego->foto }}" alt="" width="100">
@endif
<input type="file" name="foto" value="" id="foto">
<br>

<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('juego/') }}">Volver</a>
<br>