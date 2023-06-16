<!-- 
    PROCESO 3
// PROCESOS CON LA BASE DE DATOS
-->
<?php
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];#ci estudiante
    
    //sql 1**********
    $consulta = "select * from academico.usuario ";
    $consulta.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $consulta);
    $registros = mysqli_fetch_array($resultado);
    $nombre = $registros["nombre"];   
    
    
    //sql 2
    $consulta = "select * from academico.postulante ";
    $consulta.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $consulta);
    $registros = mysqli_fetch_array($resultado);
    $matricula = $registros["matricula"];
    $materiaP = $registros["materiaP"];
    $carrera = $registros["carrera"];


?>


<small>PROCESO 3</small>
<h2>LISTA DE DOCUMENTOS A ENTREGAR</h2>
<p>Plazo de entrega 28 de Febrero 2023.</p>

<p>
    a. Nombre:
    <input type="text" name="nombre" value="<?php echo $nombre;?>"><br><br>
    
    b. Matricula universitaria:
    <input type="text" name="matricula" value="<?php echo $matricula;?>"><br><br>

    c. Carrera:
    <input type="text" name="carrera" value="<?php echo $carrera;?>"><br>

    d. Universidad:
    <input type="text" name="materiaP" value="<?php echo $materiaP;?>"><br>
</p>