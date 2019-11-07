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

















                <h1 class="mt-5">CONSULTAR DE NOTAS</h1>

                <!-- FORMULARIO DE BUSQUEDA DE UN SOLO ESTUDIANTE-->
                <form class="text-center border border-light p-5" action="consulta-general.php" method="POST">


                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <p class="">Estudiante</p>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <p class="">Asignatura</p>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <p class="">Periodo</p>
                        </div>
                    </div>

                    <div class="form-row mb-4">

                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="opciones" name="codigo_nombre" class="form-control" pattern="[a-zA-Z\s]+"  onkeyup="valida()">
                        </div>

                        <div class="col">
                            <!-- Last name -->
                            <select id="opciones2" name="asignatura_busqueda" onChange="valida()">

                                <option value="0">Seleccione la asignatura</option>

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
                        </div>

                        <div class="col">
                            <!-- Last name -->
                            <select id="opciones3" name="periodo_busqueda" onChange="valida()">

                                <option value="0">Seleccione el periodo</option>

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
                        </div>

                    </div>





                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <button class="btn btn-info my-4 btn-block" type="submit" class="form-control" name="buscar_general">Buscar estudiante</button>
                        </div>
                        <div class="col">
                            <!-- Last name -->

                            <a href="consulta-general.php"><button class="btn btn-info my-4 btn-block" type="button" class="form-control">Reiniciar</button></a>
                        </div>
                    </div>
                </form>
















                <!-- TABLA PARA ESTUDIANTE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Programa</th>
                            <th>Asignatura</th>
                            <th>Periodo</th>
                            <th>Nota</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $contador = 1;

                        foreach ($query_consulta_general_estudiantes as $row) {

                            ?>

                            <tr>

                                <td> <?php echo $contador; ?> </td>
                                <td> <?php echo $row['nombre']; ?> </td>
                                <td> <?php echo $row['apellido']; ?> </td>
                                <td> <?php echo $row['programa']; ?> </td>
                                <td> <?php echo $row['nombre_asignatura']; ?> </td>
                                <td> <?php echo $row['periodo']; ?> </td>
                                <td> <?php echo $row['nota']; ?> </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id_nota'] ?>" class="edit" id="editar_nodo"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="delete.php?id=<?php echo $row['id_nota'] ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>

                    </tbody>

                <?php

                    $contador++;
                }

                ?>
                </table>




























            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>






</body>

</html>