<form action="{{ url('/juego/'.$juego->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('juego.form');

</form>