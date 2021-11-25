<h1>{{$titulo}}</h1>
<p>(Acción <b>index</b> del controlador PeliculasController;))</p>

@isset($pagina)
<h3>La página es {{$pagina}}</h3>
@endisset

<a href="{{route('detalle.pelicula', ['id' => 10])}}">Ir al detalle película 10</a>

