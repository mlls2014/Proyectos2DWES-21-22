<h1>Listado de frutas</h1>
<h3><a href="{{ url('/frutas/crear') }}"> Crear fruta </a> </h3>
@if(session('status'))
   <p style="background: green;color: white;">
         {{ session('status') }}
   </p>
@endif
<ul>
  @foreach($frutas as $fruta)
   <li><a href="{{ url('/frutas/detalle', [$fruta->id]) }}"> {{ $fruta->nombre }} </a> </li>
  @endforeach
</ul>
