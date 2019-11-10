<?php

include '../conexion.php';



// REGISTRO DE ESTUDIANTES
if (isset($_POST['registrar_estudiante'])) {
  
  echo 'Estoy aqui ingresando';

  $nombre = $_POST['nombre'];

  $apellidos = $_POST['apellidos'];

  $programa = $_POST['programa'];


  $telefono = $_POST['telefono'];

  $correo = $_POST['correo'];

  $direccion = $_POST['direccion'];

  
  $registrar_estudiante = "INSERT INTO `estudiante` (`id_estudiante`, `nombre`, `apellido`, `programa`, `telefono`, `correo`, `direccion`) 
                VALUES (NULL, '$nombre', '$apellidos', '$programa', '$telefono', '$correo', '$direccion');";

  $query_registro_estudiante = mysqli_query($conectar, $registrar_estudiante);
    

  if ($query_registro_estudiante) {

    header('Refresh: 3; URL=../../../index.html');

    echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">Estudiante registrado<p>';
  } else {

    echo "No se pudo registrar al estudiante prueba prueba: ";
  }
}






//REGISTRO DE NOTA, PRIMERA VEZ
if (isset($_POST['registrar_nota'])) {
  
   echo 'Estoy aqui ingresando 2';


  $id = $_GET['id'];
  $nota = $_POST['nota'];
  $nota = round($nota, 1);
  $asignatura = $_POST['asignatura_busqueda'];
  $estudiante_id = $id;
  $periodo = $_POST['periodo_busqueda'];


  //verificar si exite el registro
  $consultar = "SELECT   Nott.estudiante_id,  Nott.asignatura_id, Nott.periodo_id
                FROM notas Nott
                WHERE Nott.estudiante_id = $id AND Nott.asignatura_id = $asignatura AND Nott.periodo_id = $periodo 
                ORDER BY Nott.id_nota";

  $query_consulta_registro_primera_vez = mysqli_query($conectar, $consultar);


  if (mysqli_num_rows($query_consulta_registro_primera_vez) >= 1) {

    header('Refresh: 3; URL=../../../index.html');
    echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">No se pudo registrar la nota, ya exite un registro previo<p>';
  } else {

    $registar_nota_primera_vez = "INSERT INTO `notas` (`id_nota`, `nota`, `asignatura_id`, `estudiante_id`, `periodo_id`) 
                      VALUES (NULL, '$nota', '$asignatura', '$estudiante_id', '$periodo')";
    $query_registro_nota_primera_vez = mysqli_query($conectar, $registar_nota_primera_vez);

    if ($query_registro_nota_primera_vez) {

      header('Refresh: 3; URL=../../../index.html');
      echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">Nota registrada<p>';
    } else {

      echo "Error al registrar la nota: ";
    }
  }
}





//ACTUALIZACION DE NOTAS
if (isset($_POST['update'])) {
  
   echo 'Estoy aqui ingresando 3';


  $id = $_GET['id'];
  $nota = $_POST['nota'];
  $nota = round($nota, 1);

  $actualizar = "UPDATE notas set nota = '$nota' WHERE id_nota = $id ";

  $query = mysqli_query($conectar, $actualizar);

  if ($query) {


    header('Refresh: 3; URL=../../../index.html');

    echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">Nota registrada<p>';
  } else {

    echo "Error al registrar la nota: ";
  }


}
