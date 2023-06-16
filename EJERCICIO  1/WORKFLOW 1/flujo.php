<?php
    //http://localhost/inf324/TEMA%202/clase1/flujo.php?flujo=F1&proceso=P1
    include "conexion.php";
    $flujo = $_GET["flujo"];
    $proceso = $_GET["proceso"];
    $sql = "select * from flujo ";
    $sql.= "where flujo='$flujo' and proceso='$proceso'";
    $resultado = mysqli_query($conexion, $sql);
    $registros = mysqli_fetch_array($resultado);
    $pantalla = $registros['pantalla'];//obtencion de la base de datos
?>
<html>
    <head>
        <title>WORKFLOW</title>
    </head>
    <body>
        <form action="motor.php" method="post" enctype="multipart/form-data">
            <?php 
                include "pantalla/".$pantalla.".php";
            ?>
            <input type="hidden" name="valor_flujo" value="<?php echo $flujo; ?>">
            <input type="hidden" name="valor_proceso" value="<?php echo $proceso; ?>">
            <input type="hidden" name="valor_pantalla" value="<?php echo $pantalla; ?>">

            <input type="submit" value="Anterior" name="Anterior">
            <input type="submit" value="Siguiente" name="Siguiente">
            <input type="submit" value="Bandeja Entrada" name="BandejaEntrada">
        </form>
    </body>
</html>



//****************************










*/



//************************** */