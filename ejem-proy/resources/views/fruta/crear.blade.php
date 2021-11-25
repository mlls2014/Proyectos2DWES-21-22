<h1>Registrar una fruta</h1>
@isset($fruta)
    <h1>Editar fruta</h1>
@else
    <h1>Crear fruta</h1>
@endisset
<form action="{{ isset($fruta)?url('/frutas/update'):url('/frutas/guardar') }}" method="POST">
  @csrf
  @isset($fruta)
      <input type="hidden" name="id" value="{{ $fruta->id }}" /><br/>
  @endisset
  <label for="nombre">Nombre </label>
  <input type="text" name="nombre" value="{{ (isset($fruta))?$fruta->nombre:'' }}" /> <br/>
  
  <label for="descripcion">Descripción </label>
  <input type="text" name="descripcion" value="{{ (isset($fruta))?$fruta->descripcion:'' }}" /><br/>

  <label for="precio">Precio </label>
  <input type="number" name="precio" value="{{ (isset($fruta))?$fruta->precio:'' }}" /><br/>
  <label for="fecha">Fecha </label>
  <input type="date" name="fecha" value="{{ (isset($fruta))?$fruta->fecha:'' }}" /><br/>
  <input type="submit" name="guardar" />
  
</form>
