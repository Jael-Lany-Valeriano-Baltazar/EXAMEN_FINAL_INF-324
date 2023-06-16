<!-- 
    PROCESO 1
-->
<?php
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];
    //**************INTERACCION CON DOS BASES DE DATOS
    $sql = "select * from academico.usuario ";
    $sql.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $sql);
    $registros = mysqli_fetch_array($resultado);
    $imagen = $registros["convocatoria"];
?>


<small>PROCESO 1</small>
<h1>BIENESESTAR SOCIAL</h1>
<h2>CONVOCATORIA BECA COMEDOR 2022-2023</h2>
<h4 class="text-center">Subir la Convocatoria:</h4>

<input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif"><br><br>

<img src="data:image/jpeg;base64,<?php echo base64_encode($imagen); ?>" alt="Convocatoria" width="200" heiht="200" /><br><br><br>