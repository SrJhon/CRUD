<?php

// Create connection
$conectar = mysqli_connect("localhost","root", "Huila.3218109199", "registro_notas");
// Check connection
if (!$conectar) {
      die("Connection failed: " . mysqli_connect_error());
}
