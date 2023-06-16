<?php

    if(file_exists($_FILES['imagen']['tmp_name'])){
        
        SESSION_START();
        $ci = $_SESSION['usuarioCI'];

        //Estos datos se ingresaron en el PROCESO 1 - convocatoria
        $imagen = $_FILES['imagen']['tmp_name'];
        $imagenContenido = addslashes(file_get_contents($imagen));

        //Interaccion con dos bases de datos 
        $sql = "update academico.usuario set cronogramaEva='$imagenContenido' ";
        $sql.= "where ci='$ci'";
        $resultado = mysqli_query($conexion, $sql);
    }
?>