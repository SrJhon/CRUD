<?php

// Create connection
$conectar = mysqli_connect("localhost","root", "Huila.3218109199", "registro_notas");
// Check connection
if (!$conectar) {
      echo "Aquiiii";
      die("Connection failed: " . mysqli_connect_error());
}

// REGISTRO DE ESTUDIANTES
if (isset($_POST['registrar_estudiante'])) {
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $programa = $_POST['programa'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $direccion = $_POST['direccion'];
  
  
  
  $registro_estudiante = "INSERT INTO `estudiante` (`id_estudiante`, `nombre`, `apellido`, `programa`, `telefono`, `correo`, `direccion`) 
                VALUES (NULL, '$nombre', '$apellidos', '$programa', '$telefono', '$correo', '$direccion');";
  $query_registro_estudiante =  mysqli_query($conectar, $registro_estudiante);
    
  if ($query_registro_estudiante) {
    header('Refresh: 3; URL=index.php');
    echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">Estudiante registrado<p>';
  } else {
    echo "No se pudo registrar al estudiante prueba prueba: ";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Estudiante
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro-nota.php">Nota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consulta-general.php">Consultar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">



        <!--FORMULARO PAR EL REGISTRO DE ESTUDIANTES-->

        <h1 class="mt-5">REGISTRO DE ESTUDIANTE</h1>

        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="index.php" method="POST">

          <div class="form-row mb-4">
            <div class="col">
              <!-- First name -->
              <input type="text" name="nombre" class="form-control" placeholder="Nombre" pattern="[a-zA-Z\s]+" required = "true">
            </div>
            <div class="col">
              <!-- Last name -->
              <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" pattern="[a-zA-Z\s]+" required = "true">
            </div>
          </div>

          <!-- Programa -->
          <input type="text" name="programa" class="form-control mb-4" placeholder="Programa" pattern="[a-zA-Z\s]+" required = "true">


          <!-- Telefono -->
          <input type="text" name="telefono" class="form-control mb-4" placeholder="Telefono" minlength="7" maxlength="10" pattern="[0-9]+" required = "true">


          <!-- E-mail -->
          <input type="email" name="correo" class="form-control mb-4" placeholder="Correo" required = "true">


          <!-- Direccion -->
          <input type="text" name="direccion" class="form-control mb-4" placeholder="Direccion" required = "true">


          <!-- Sign up button -->
          <button class="btn btn-info my-4 btn-block" type="submit" name="registrar_estudiante">Registrar</button>


        </form>
        <!-- Default form register -->






      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="jquery/jquery.slim.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
