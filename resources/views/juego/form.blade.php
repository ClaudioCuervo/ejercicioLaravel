

<h1>{{ $modo }} juego</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
    @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
</ul>
</div>
    
@endif


<div class="form-group">
<label for="games_name">Nombre: </label>
<input type="text" class="form-control" name="games_name" value="{{ isset($juego->games_name)?$juego->games_name:old('games_name') }}" id="games_name">

</div>

<div class="form-group">
<label for="games_price">Precio: </label>
<input type="text" class="form-control" name="games_price" value="{{ isset($juego->games_price)?$juego->games_price:old('games_price') }}" id="games_price">

</div>

<div class="form-group">
<label for="games_des">Descripcion: </label>
<input type="text" class="form-control" name="games_des" value="{{ isset($juego->games_des)?$juego->games_des:old('games_des') }}" id="games_des">

</div>

<div class="form-group">
<label for="foto">Foto: </label>
@if(isset($juego->foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$juego->foto }}" alt="" width="100">
@endif
<input type="file" class="form-control" name="foto" value="" id="foto">

</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('juego/') }}">Volver</a>

