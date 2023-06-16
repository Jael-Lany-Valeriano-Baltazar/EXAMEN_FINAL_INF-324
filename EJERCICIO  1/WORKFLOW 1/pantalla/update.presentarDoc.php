<?php

    if(file_exists($_FILES['imagen']['tmp_name'])){
        
        SESSION_START();
        $ci = $_SESSION['usuarioCI'];

        //Obtener imagen
        $imagen = $_FILES['imagen']['tmp_name'];
        $imagenContenido = addslashes(file_get_contents($imagen));

        //sql 1
        $sql = "update academico.usuario set documentoPos='$imagenContenido' ";
        $sql.= "where ci='$ci'";
        $resultado = mysqli_query($conexion, $sql);

        //sql 2
        $sql = "update academico.usuario set documentoPos='$imagenContenido' ";
        $sql.= "where rol='kardexF'";
        $resultado = mysqli_query($conexion, $sql);
      
    }
?>
