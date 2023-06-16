<?php

            session_start();
           // $_SESSION["USER"] = $ci;
            $USER = $_SESSION["USER"];
    include("conexion.inc.php");            

            $ci = $_GET['ci'];
            $sigla = $_GET['sigla'];

            $consultaS= "INSERT INTO DB_ACADEMICO.INSCRIPCION VALUES($ci,'$sigla', 0, 0);";
            $con -> query($consultaS);
            //$consultaS= "INSERT INTO dueño VALUES($ci);";
            //$con -> query($consultaS);

            //echo "<P> MATERIA REGISTRADA ... CAMBIO DE ROL</P>";

            //header("Location: inicio.php");

?>