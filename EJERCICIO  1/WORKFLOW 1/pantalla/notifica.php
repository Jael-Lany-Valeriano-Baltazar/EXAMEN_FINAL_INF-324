
<!-- 
    PROCESO 9
-->
<?php
    include_once "template/cabecera.php";
    
    SESSION_START();
    $ciSecretaria = $_SESSION['usuarioCI'];//CI de secretaria
    
?>

<small>PROCESO 9</small>
<h2>NOTIFICACION DE INHABILITACION</h2>
<p>
    Ingresar CI:
    <br><input type="text" name="ciEstudiante" value="<?php //echo $nombre;?>"><br><br>
    Ingrese Motivos:
    <br><textarea name="notificaEstudiante" rows="4" cols="50"></textarea><br><br>
    <input type="submit" value="Enviar" name="notificar">
</p>
