<?php
    if(file_exists($_FILES['imagen']['tmp_name'])){
        
        SESSION_START();
        $ci = $_SESSION['usuarioCI'];//usuario secretaria

        $imagen = $_FILES['imagen']['tmp_name'];
        $imagenContenido = addslashes(file_get_contents($imagen));

        $sql = "update academico.usuario set listaPos='$imagenContenido' ";
        $sql.= "where ci='$ci'";
        $resultado = mysqli_query($conexion, $sql);
    }
?>