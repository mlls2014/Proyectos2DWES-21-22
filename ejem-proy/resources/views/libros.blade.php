<h1>Formulario Libro</h1>
<form action="{{ url('/libros')}}" method="POST">
{{-- Protección contra la vulnerabilidad CSRF --}}
@csrf
{{-- {{ csrf_field() }} --}}

<label for="titulo">Título</label>
<input type="text" name="titulo" />
<br/>
<label for="autor">Autor</label>
<input type="text" name="autor" />
<br/>
<input type="submit" value="enviar" />

</form>