@include('courses.header')
<h2 class="text-center text-uppercase text-secondary mb-2">{{$tipo}} Curso</h2>
<form action="{{ $tipo=='Alta'?url('/cursos/store'):url('/cursos/' . $course['id'] .'/update')}}" method="POST">
@csrf
    <!-- Nombre input-->
    <div class="form-floating mb-2">
       <input class="form-control" id="nombre" name="nombre" type="text" value="{{$course['nombre']??''}}" />
       <label for="name">Nombre</label>
    </div>
    <!-- Descripcion input-->
    <div class="form-floating mb-2">
       <input class="form-control" id="descripcion" name="descripcion" type="text" value="{{$course['descripcion']??''}}" />
       <label for="name">Descripcion</label>
    </div>
    <!-- Precio input-->
    <div class="form-floating mb-2">
        <input class="form-control" id="precio" name="precio" type="text" value="{{$course['precio']??''}}" />
        <label for="precio">Precio</label>
     </div>
    <!-- Submit Button-->
    <button class="btn btn-primary btn-xl mt-3 mb-2" id="submitButton" name="submit" type="submit">Guardar</button>
    <a class="btn btn-primary btn-xl mt-3 mb-2" href="{{ url('/cursos')}}">Cancelar</a>
    <!-- Para conservar el id de usuario -->
    {{-- <input type="text" name="id" value="{{$course['id']??''}}" readonly hidden> --}}
 </form>
@include('courses.footer')