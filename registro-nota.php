<?php

require 'resources/database/conexion.php';


//CONSULTA DE ESTUDIANTE, DESDE LA TABLA DE REGISTRO DE NOTAS POR PRIMERA VEZ
if (isset($_GET['id'])) {


  $id = $_GET['id'];

  $consultar = "SELECT   
                        Es.id_estudiante, Es.nombre, Es.apellido, Es.programa
                        
                        
                FROM estudiante Es
                
                WHERE Es.id_estudiante = $id";


  //$consultar = "SELECT * FROM notas WHERE id_nota = $id";

  $query_estudiante_id =  mysqli_query($conectar, $consultar);

  if (mysqli_num_rows($query_estudiante_id) == 1) {

    $row = mysqli_fetch_array($query_estudiante_id);


    $nombre_from_id = $row['nombre'];

    $apellido_from_id = $row['apellido'];

    $programa_from_id = $row['programa'];
  }
} else {

  $nombre_from_id = "";

  $apellido_from_id = "";

  $programa_from_id = "";
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

  <script>
    window.onload = function() {

      if (document.querySelector("#nombre_nota").value == "" && document.querySelector("#apellido_nota").value == "" && document.querySelector("#programa_nota").value == "") {
        document.querySelector("#registrar-boton").disabled = true;
      } else {
        document.querySelector("#registrar-boton").disabled = false;
      }


    }
  </script>



</head>

<body>


  <?php

  require('resources/database/query/reporte.php');

  ?>




  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Estudiante
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
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













        <h1 class="mt-5">REGISTRO DE NOTA</h1>

        <!-- FORMULARIO DE BUSQUEDA DE UN SOLO ESTUDIANTE-->
        <form class="text-center border border-light p-5" action="registro-nota.php" method="POST">


          <div class="form-row mb-4">
            <div class="col">
              <!-- First name -->
              <p class="">Id del estudiante</p>
            </div>
            <div class="col">
              <!-- Last name -->
              <p class="">Nombre del estudiante</p>
            </div>
          </div>

          <div class="form-row mb-4">
            <div class="col">
              <!-- First name -->
              <input type="text" id="opciones" name="codigo_id" class="form-control" pattern="[0-9]+"  onkeyup="valida()">
            </div>
            <div class="col">
              <!-- Last name -->
              <input type="text" id="opciones2" name="codigo_nombre" class="form-control"pattern="[a-zA-Z\s]+"  onkeyup="valida()">
            </div>
          </div>

          <div class="form-row mb-4">
            <div class="col">
              <!-- First name -->
              <button class="btn btn-info my-4 btn-block" type="submit" class="form-control" name="buscar_estudiante">Buscar estudiante</button>
            </div>
            <div class="col">
              <!-- Last name -->

              <a href="registro-nota.php"><button class="btn btn-info my-4 btn-block" type="button" class="form-control">Reiniciar</button></a>
            </div>
          </div>
        </form>












        <br><br>













        <!-- TABLA PARA ESTUDIANTE -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Programa</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $contador = 1;
            if (isset($query_reporte_individual)) {
              foreach ($query_reporte_individual as $row) {

                ?>

                <tr>
                  <td> <?php echo $contador; ?> </td>
                  <td> <?php echo $row['nombre']; ?> </td>
                  <td> <?php echo $row['apellido']; ?> </td>
                  <td> <?php echo $row['programa']; ?> </td>
                  <td>
                    <a href="registro-nota.php?id=<?php echo $row['id_estudiante'] ?>">REGISTAR NOTA</a>
                  </td>
                </tr>

          </tbody>

      <?php

          $contador++;
        }
      }

      ?>
        </table>












        <br><br>













        <!-- TABLA PARA ESTUDIANTE - REGISTRO DE NOTA - PRIMERA VEZ -->
        <div id="tabla-registro-nota" style="display: flex; justify-content: center;">

          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Programa</th>
                <th>Asignatura</th>
                <th>Periodo</th>
                <th>Nota</th>
                <th>Accion</th>
              </tr>
            </thead>

            <tbody>


              <form action="resources/database/query/registro.php?id=<?php echo $_GET['id']; ?>" method="POST">

                <tr>
                  <td> <input type="text" id="nombre_nota" name="nombre" readonly value="<?php echo $nombre_from_id; ?>"> </td>
                  <td> <input type="text" id="apellido_nota" name="apellido" readonly value="<?php echo $apellido_from_id; ?>"> </td>
                  <td> <input type="text" id="programa_nota" name="programa" readonly value="<?php echo $programa_from_id; ?>"> </td>
                  <td>
                    <select id="opciones2" name="asignatura_busqueda" onChange="valida()" required = "true">

                      <option value="">Seleccione la asignatura</option>

                      <?php

                      $consultar_asignatura = "SELECT * FROM asignatura";
                      $query_asignatura = mysqli_query($conectar, $consultar_asignatura);

                      foreach ($query_asignatura as $row_asignatura) {

                        ?>

                        <option value="<?php echo $row_asignatura['id_asignatura']; ?>"><?php echo $row_asignatura['nombre_asignatura']; ?></option>

                      <?php

                      }

                      ?>

                    </select>
                  </td>


                  <td>
                    <select id="opciones3" name="periodo_busqueda" onChange="valida()" required = "true">

                      <option value="">Seleccione el periodo</option>

                      <?php

                      $consultar_periodos = "SELECT * FROM periodos";
                      $query_periodos = mysqli_query($conectar, $consultar_periodos);

                      foreach ($query_periodos as $row_periodos) {

                        ?>

                        <option value="<?php echo $row_periodos['id_periodo']; ?>"><?php echo $row_periodos['periodo']; ?></option>

                      <?php

                      }

                      ?>

                    </select>
                  </td>
                  <td> <input type="number" step="0.01" min="0" max="5" name="nota" required = "true"> </td>
                  <td> <input type="submit" id="registrar-boton" name="registrar_nota" value="Registrar"> </td>
                </tr>

              </form>


            </tbody>
          </table>

        </div>







      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="jquery/jquery.slim.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>






</body>

</html>
