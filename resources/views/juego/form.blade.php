<label for="games_name">Nombre: </label>
<input type="text" name="games_name" value="{{ $juego->games_name }}" id="games_name">
<br>

<label for="games_price">Precio: </label>
<input type="text" name="games_price" value="{{ $juego->games_price }}" id="games_price">
<br>

<label for="games_des">Descripcion: </label>
<input type="text" name="games_des" value="{{ $juego->games_des }}" id="games_des">
<br>

<label for="foto">Foto: </label>
{{ $juego->foto }}
<input type="file" name="foto" value="" id="foto">
<br>

<input type="submit" value="Guardar datos">
<br>