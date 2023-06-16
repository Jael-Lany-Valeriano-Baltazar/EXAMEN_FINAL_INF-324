<!-- 
    PROCESO 2
-->
<?php
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];
    $usuarioRol = $_SESSION['usuarioRol'];
    
    $sql = "select * from academico.usuario ";
    $sql.= "where rol='secretaria'";
    $resultado = mysqli_query($conexion, $sql);
    $registros = mysqli_fetch_array($resultado);
    $imagen = $registros["convocatoria"];
  
?>

<small>PROCESO 2</small>
<h2>Publicacion: CONVOCATORIA BECA COMEDOR 2022-2023</h2>

<img src="data:image/jpeg;base64,<?php echo base64_encode($imagen); ?>" alt="Convocatoria" width="200" heiht="200" /><br><br><br>

