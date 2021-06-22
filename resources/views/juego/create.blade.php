<form action="{{ url('/juego') }}" method="post" enctype="multipart/form-data">
@csrf
@include('juego.form');


</form>