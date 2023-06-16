<?php
/*
    //sql 1
    $sql = "select * from academico.usuario ";
    $sql.= "where ci='333111' and rol='estudiante'";//ID de estudiante
    $resultado = mysqli_query($conexion, $sql);
    $registros = mysqli_fetch_array($resultado);
    $imagen = $registros["documentoPos"];
    $imagenContenido = addslashes(file_get_contents($imagen));


  

    $sql = "update academico.usuario set documentoPos='$imagen' ";
    $sql.= "where rol='secretaria'";
    $resultado = mysqli_query($conexion, $sql);
    */ 
?>

<?php
    if(isset($_POST['check'])){
        SESSION_START();
        $ci = $_SESSION['postulanteCI'];

        $sql = "update academico.postulante set revisar=1 ";
        $sql.= "where ci='$ci'";
        $resultado = mysqli_query($conexion, $sql); 
    }
?>