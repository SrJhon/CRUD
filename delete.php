<?php

require 'resources/database/conexion.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $consultar = "DELETE FROM notas WHERE id_nota = $id";

    $query_delete_nota =  mysqli_query($conectar, $consultar);


    if ($query_delete_nota) {


        header('Refresh: 3; URL=index.html');

        echo '<p class="alert alert-success agileits" role="alert" style="text-align: center;">Nota eliminada<p>';
    } else {

        echo "Error al momento de eliminar la nota: ";
    }
}
    