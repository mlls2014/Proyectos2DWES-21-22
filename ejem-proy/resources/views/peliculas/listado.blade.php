@include('includes.header')
<!-- IMPRIMIR POR PANTALLA -->
<!-- <h1><?= $titulo ?></h1>
<h2><?= $listado[2] ?></h2> -->
<h1>{{ $titulo }}</h1>
<h2>{{ $listado[2] }}</h2>
<p>{{ date('Y') }}

<!-- COMETARIOS -->
{{--Esto es un comentario blade--}}

<!-- MOSTRAR SI EXISTE -->
{{ $director ?? 'No hay director' }}

<!-- CONDICIONALES -->

@if ($titulo && count($listado) >= 5)
El titulo existe y es este {{ $titulo }} y el listado es mayor a 5 ({{count($listado)}})
@elseif($titulo)
El título existe y es este {{ $titulo }} y el listado no es mayor a 5 ({{count($listado)}})
@else
El titulo no existe
@endif
<hr/>
<!-- BUCLES -->
@for($i=1;$i<=10;$i++)
   El número es {{$i}} <br/>
@endfor

<hr/>
<?php $cont=1;?>
@while($cont<50)
   @if($cont%2 == 0)
      Número PAR: {{ $cont}} <br/>
   @endif
   <?php $cont++; ?>
@endwhile
<hr/>

@foreach ($listado as $pelicula)
   <p>{{$pelicula}}</p>
@endforeach


@include('includes.footer')