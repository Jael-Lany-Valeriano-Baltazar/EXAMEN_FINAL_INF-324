<?php
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];#ci estudiante

    $matricula = $_POST["matricula"];
    $materiaP = $_POST["materiaP"];
    $carrera = $_POST["carrera"];

    $sql = "update academico.postulante set matricula='$matricula', materiaP='$materiaP', carrera='$carrera'";
    $sql.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $sql);

?>