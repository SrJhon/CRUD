<?php

require 'resources/database/conexion.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $consultar = "SELECT Nott.id_nota, Nott.nota,
                            Es.nombre, Es.apellido,
                            Asig.nombre_asignatura,
                            Per.periodo

                    FROM notas Nott
                    INNER JOIN estudiante Es ON Nott.estudiante_id = Es.id_estudiante
                    INNER JOIN asignatura Asig ON Nott.asignatura_id = Asig.id_asignatura
                    INNER JOIN periodos Per ON Nott.periodo_id = Per.id_periodo
                    WHERE Nott.id_nota = $id";

    //$consultar = "SELECT * FROM notas WHERE id_nota = $id";

    $query =  mysqli_query($conectar, $consultar);

    if (mysqli_num_rows($query) == 1) {

        $row = mysqli_fetch_array($query);

        $periodo = $row['periodo'];

        $asignatura = $row['nombre_asignatura'];

        $nombre = $row['nombre'];

        $apellido = $row['apellido'];

        $nota = $row['nota'];
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
                    <li class="nav-item">
                        <a class="nav-link" href="registro-nota.php">Nota</a>
                    </li>
                    <li class="nav-item active">
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



                <!-- TABLA PARA ESTUDIANTE - REGISTRO DE NOTA - PRIMERA VEZ -->
                <div id="tabla-registro-nota" style="display: flex; justify-content: center;">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Asignatura</th>
                                <th>Periodo</th>
                                <th>Nota</th>
                                <th>Accion</th>
                            </tr>
                        </thead>

                        <tbody>


                            <form action="resources/database/query/registro.php?id=<?php echo $_GET['id']; ?>" method="POST">

                                <tr>
                                    <td> <input type="text" name="nombre" readonly value="<?php echo $nombre; ?>"> </td>
                                    <td> <input type="text" name="apellido" readonly value="<?php echo $apellido; ?>"> </td>
                                    <td> <input type="text" name="asignatura" readonly value="<?php echo $asignatura; ?>"> </td>
                                    <td> <input type="text" name="periodo" readonly value="<?php echo $periodo; ?>"> </td>
                                    <td> <input type="text" name="nota" value="<?php echo $nota; ?>" pattern="^[0-5]{1,5}(\.[0-9]{0,1})?$" required = "true"> </td>
                                    <td> <input type="submit" name="update" value="Actualizar"> </td>
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