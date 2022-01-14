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
<form action="" method="POST">
    <!-- Nombre input-->
    <div class="form-floating mb-2">
       <input class="form-control" id="nombre" name="nombre" type="text" value="" />
       <label for="name">Nombre</label>
    </div>
    <!-- Descripcion input-->
    <div class="form-floating mb-2">
       <input class="form-control" id="email" name="email" type="text" value="" />
       <label for="name">Descripcion</label>
    </div>
    <!-- Precio input-->
    <div class="form-floating mb-2">
        <input class="form-control" id="precio" name="precio" type="text" value="" />
        <label for="precio">Precio</label>
     </div>
    <!-- Submit Button-->
    <button class="btn btn-primary btn-xl mt-3 mb-2" id="submitButton" name="submit" type="submit">Guardar</button>
    {{-- <a class="btn btn-primary btn-xl mt-3 mb-2" href="?controller=user&action=listado">Cancelar</a> --}}
    <!-- Para conservar el id de usuario -->
    {{-- <input type="text" name="id" value="<?= $user->getId() ?>" readonly> --}}
 </form>

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
