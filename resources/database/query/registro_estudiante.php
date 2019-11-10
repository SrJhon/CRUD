include '../conexion.php';

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
    header('Refresh: 3; URL=../../../estudiante.php');
    echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">Estudiante registrado<p>';
  } else {
    echo "No se pudo registrar al estudiante prueba prueba: ";
  }
}
