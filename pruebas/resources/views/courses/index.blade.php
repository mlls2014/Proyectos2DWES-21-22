@include('courses.header')
    <header>
      <!-- <h1 class="text-center ">Aplicación de ejemplo MVC POO</h1>       -->
    </header

    <section class="page-section pt-5">
        <div class="container">
           <h2 class="text-center text-uppercase text-secondary mb-2">Listado de Cursos</h2>

           <!--Creamos la tabla que utilizaremos para el listado:-->
           <table class="table table-striped text-center">
              <tr>
                 <th>Id</th>
                 <th>Nombre</th>
                 <!-- <th>Contraseña</th>-->
                 <th>Descripcion</th>
                 <th>PVP</th>
                 <!-- Añadimos una columna para las operaciones que podremos realizar con cada registro -->
                 <th>Operaciones</th>
              </tr>
              <!--Los datos a listar están almacenados en $parametros["datos"], que lo recibimos del controlador-->
              @foreach ($courses as $key => $course)
                 <!--Mostramos cada registro en una fila de la tabla-->
                 <tr>
                    <td>{{ $course['id']}}</td>
                    <td>{{ $course['nombre'] }}</td>
                    <td>{{ $course['descripcion'] }}</td>
                    <td>{{ $course['precio'] }}</td>
                    <!-- Enviamos a actuser.php, mediante GET, el id del registro que deseamos editar o eliminar: -->
                    <td><a href="{{url('/cursos/' . $key . '/edit')}}"><i class="far fa-edit"></i></a>
                       <a href="{{url('/cursos/' . $key . '/destroy')}}"><i class="far fa-trash-alt"></i></a>
                    </td>
                 </tr>
              @endforeach
           </table>
           <h5 class="text-center text-uppercase text-secondary mb-2"><a class="btn btn-secondary" href="{{url('/cursos/create')}}">Añadir Curso</a></h5>
        </div>

     </section>

@include('courses.footer')