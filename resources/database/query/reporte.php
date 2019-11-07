<?php

require 'resources/database/conexion.php';


























//CONSULTA POR ESTUDIANTE PARA REGISTRAR NOTA
if (isset($_POST['buscar_estudiante'])) {


    $codigo_nombre = $_POST['codigo_nombre'];

    $codigo_id = $_POST['codigo_id'];


    if ($codigo_id != "" && $codigo_nombre != "") {


        $codigo_consulta = "Es.id_estudiante = $codigo_id OR Es.nombre LIKE '%$codigo_nombre%'";
    } else {


        if ($codigo_id == "") {

            $codigo_id = "null";
        }

        if ($codigo_nombre == "") {

            $codigo_nombre = "null";
        }

        $codigo_consulta = "Es.id_estudiante = $codigo_id OR Es.nombre LIKE '%$codigo_nombre%'";
    }

    $consultar = "SELECT   
                        Es.id_estudiante, Es.nombre, Es.apellido, Es.programa
                        
                        
                FROM estudiante Es
                
                WHERE $codigo_consulta
                ";


    $query_reporte_individual = mysqli_query($conectar, $consultar);
}

































//CONSULTA GENERAL DE ESTUDIANTES
if (isset($_POST['buscar_general'])) {




    $asignatura_busqueda  = $_POST['asignatura_busqueda'];

    $periodo_busqueda = $_POST['periodo_busqueda'];

    $codigo_nombre = $_POST['codigo_nombre'];




    if ($asignatura_busqueda != 0 && $periodo_busqueda != 0 && $codigo_nombre != "") {

        $codigo_consulta = "Nott.asignatura_id = $asignatura_busqueda AND Nott.periodo_id = $periodo_busqueda 
        AND (Es.id_estudiante LIKE '%$codigo_nombre%' OR Es.nombre LIKE '%$codigo_nombre%')";
    } elseif ($asignatura_busqueda != 0 && $periodo_busqueda != 0) {

        $codigo_consulta = "Nott.asignatura_id = $asignatura_busqueda AND Nott.periodo_id = $periodo_busqueda
                            ";
    } elseif ($periodo_busqueda != 0 && $codigo_nombre != "") {

        $codigo_consulta = " (Nott.periodo_id = $periodo_busqueda)
                                AND (Es.id_estudiante LIKE '%$codigo_nombre%' OR Es.nombre LIKE '%$codigo_nombre%')";
    } elseif ($asignatura_busqueda != 0 && $codigo_nombre != "") {

        $codigo_consulta = " (Nott.asignatura_id = $asignatura_busqueda)
                                AND (Es.id_estudiante LIKE '%$codigo_nombre%' OR Es.nombre LIKE '%$codigo_nombre%')";
    } else {


        if ($codigo_nombre == "") {

            $codigo_nombre = "null";
        }

        $codigo_consulta = "Nott.asignatura_id = $asignatura_busqueda OR Nott.periodo_id = $periodo_busqueda 
                                OR Es.id_estudiante LIKE '%$codigo_nombre%' OR Es.nombre LIKE '%$codigo_nombre%'";
    }

    $consultar = "SELECT Nott.id_nota, Nott.nota,
                        Es.nombre, Es.apellido, Es.programa,
                        Asig.nombre_asignatura,
                        Per.periodo
                        
                FROM notas Nott
                INNER JOIN estudiante Es ON Nott.estudiante_id = Es.id_estudiante
                INNER JOIN asignatura Asig ON Nott.asignatura_id = Asig.id_asignatura
                INNER JOIN periodos Per ON Nott.periodo_id = Per.id_periodo 
                WHERE $codigo_consulta
                ORDER BY Nott.id_nota";


    $query_consulta_general_estudiantes = mysqli_query($conectar, $consultar);
} else {


    $consultar = "SELECT    Nott.id_nota, Nott.nota,
                        Es.nombre, Es.apellido, Es.programa,
                        Asig.nombre_asignatura,
                        Per.periodo
                        
                FROM notas Nott
                INNER JOIN estudiante Es ON Nott.estudiante_id = Es.id_estudiante
                INNER JOIN asignatura Asig ON Nott.asignatura_id = Asig.id_asignatura
                INNER JOIN periodos Per ON Nott.periodo_id = Per.id_periodo ORDER BY Nott.id_nota";

    $query_consulta_general_estudiantes = mysqli_query($conectar, $consultar);
}
