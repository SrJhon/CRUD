<?php

// Create connection
$conectar = mysqli_connect("localhost","root", "Huila.3218109199", "registro_notas");
// Check connection
if (!$conectar) {
      echo 'Error al conectar a la base de datos';
}else{
 
      echo 'Conectado a la base de datos';
      
}
