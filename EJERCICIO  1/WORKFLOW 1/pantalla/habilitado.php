<!-- 
    PROCESO 8
-->

<?php
    include_once "template/cabecera.php";    
    SESSION_START();
    $ciSecretaria = $_SESSION['usuarioCI'];//CI de secretaria
?>

<small>PROCESO 8</small>
<h2>VALIDAR HABILITACION DEL ESTUDIANTE</h2><br>

<p>
    Ingresar CI:
    <input type="text" name="ciEstudiante" value="<?php //echo $nombre;?>"><br><br>
     
    Ingresar si esta habilitado e inhabilitado:
    <input type="text" name="estaHabilitado" value="<?php //echo $matricula;?>"><br><br>

    <input type="submit" value="Enviar" name="habilita_inhabilita">
</p>