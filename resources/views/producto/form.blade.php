

<h1>{{ $modo }} producto</h1>

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
<label for="product_name">Nombre: </label>
<input type="text" class="form-control" name="product_name" value="{{ isset($producto->product_name)?$producto->product_name:old('product_name') }}" id="product_name">

</div>

<div class="form-group">
<label for="number_copies">Número existencias: </label>
<input type="text" class="form-control" name="number_copies" value="{{ isset($producto->number_copies)?$producto->number_copies:old('number_copies') }}" id="number_copies">

</div>

<div class="form-group">
<label for="product_price">Precio: </label>
<input type="text" class="form-control" name="product_price" value="{{ isset($producto->product_price)?$producto->product_price:old('product_price') }}" id="product_price">

</div>

<div class="form-group">
<label for="foto">Foto: </label>
@if(isset($producto->foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto }}" alt="" width="100">
@endif
<input type="file" class="form-control" name="foto" value="" id="foto">

</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('producto/') }}">Volver</a>

