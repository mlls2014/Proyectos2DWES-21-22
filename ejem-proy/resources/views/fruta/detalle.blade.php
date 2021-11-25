<h3>Detalle de la fruta:</h3>
<h1>Nombre:{{ $fruta->nombre }}</h1>
<p>
   Descripción: {{ $fruta->descripcion }}</br>
   Precio: {{ $fruta->precio }}</br>
   Fecha: {{ $fruta->fecha }}</br>

</p>
<a href="{{ url('/frutas/index') }}"> Inicio </a> &nbsp;
<a href="{{ url('/frutas/eliminar', [$fruta->id]) }}"> Eliminar </a> &nbsp;
<a href="{{ url('/frutas/editar', [$fruta->id]) }}"> Editar </a> 
