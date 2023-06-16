<?php
//**** conectando ala base de datos de flujo principal */
    $conexion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conexion,"workflow2");
?>