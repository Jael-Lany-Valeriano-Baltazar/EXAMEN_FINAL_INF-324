<!-- 
    PROCESO 10
-->
<?php
    include_once "template/cabecera.php";
    
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];//CI Estudiante
    
    $sql = "select * from academico.postulante ";
    $sql.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $sql);
    $registros = mysqli_fetch_array($resultado);
    $estado = $registros["estado"];
    
?>

<small>PROCESO 10</small>
<p><textarea name="notificar" rows="5" cols="60">
    <?php 
         if ($estado != "")
         {
            echo "\nUsted se encuentra ".$estado." para dar el examen !!!\n";
            if($estado == "inhabilitado"){
                echo "Notificación: ".$registros["notificacion"];  
            }
        }   
        ?>
    </textarea></p><br>
</p>
