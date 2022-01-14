<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mantenimiento de cursos</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body class="cuerpo">
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
              @foreach ($courses as $course)
                 <!--Mostramos cada registro en una fila de la tabla-->
                 <tr>
                    <td>{{ $course['id'] }}</td>
                    <td>{{ $course['nombre'] }}</td>
                    <td>{{ $course['descripcion'] }}</td>
                    <td>{{ $course['precio'] }}</td>
                    <!-- Enviamos a actuser.php, mediante GET, el id del registro que deseamos editar o eliminar: -->
                    <td><a href="{{url('/cursos/' . $course['id'] . '/edit')}}"><i class="far fa-edit"></i></a>
                       <a href="{{url('/cursos/' . $course['id'] . '/destroy')}}"><i class="far fa-trash-alt"></i></a>
                    </td>
                 </tr>
              @endforeach
           </table>
           <h5 class="text-center text-uppercase text-secondary mb-2"><a class="btn btn-secondary" href="{{url('/cursos/create')}}">Añadir Usuario</a></h5>
        </div>

     </section>

    <!-- Pie de página utilizado en todas las páginas de nuestra aplicación web  -->
    <!-- Footer-->
    <footer class="footer text-center p-3">
       <!-- Copyright Section-->
       <div class="py-4 text-center">
          <div class="container">Copyright &copy; Profe Manuel from Bootstrap FreeLance</div>
       </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

    </html>
