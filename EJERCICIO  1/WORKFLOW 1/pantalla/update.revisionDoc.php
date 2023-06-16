<?php
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];#ci secretaria

    $matricula = $_GET["matricula"];
    $materiaP = $_GET["materiaP"];

    $sql = "update academico.postulante set matricula='$matricula', materiaP='$materiaP' ";
    $sql.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $sql);

?>