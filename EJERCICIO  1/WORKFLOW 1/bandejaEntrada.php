<?php
    include "conexion.php";
    include_once "template/cabecera.php";
    SESSION_START();
    $usuarioActivo = $_SESSION['usuarioSesion'];
    $ci = $_SESSION['usuarioCI'];
    $rol = $_SESSION['usuarioRol'];

    $consulta="select * from flujousuario ";
    $consulta.="where usuario='".$usuarioActivo."' ";
    //**********$consulta.="and fechafin is null ";
    $resultado=mysqli_query($conexion, $consulta);
?>
<table class="table">
    <thead>
        <tr>
            <th>FLUJO <?php $rol ?></th>
            <th>PROCESOS</th>
            <th>OPERACIONES</th>
        </tr>
    </thead>

    <tbody>
        <?php
            while($registro = mysqli_fetch_array($resultado)){
                echo "<tr>";
                echo "<td>".$registro['flujo']."</td>";
                echo "<td>".$registro['proceso']."</td>";
                echo "<th>";
                echo "<a class='btn btn-primary' href='flujo.php?flujo=".$registro['flujo']."&proceso=".$registro['proceso']."' role='button' type='submit'> Ejecutar Tarea </a>";
                echo "</th>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<form action="index.php"><input type="submit" value="Cerrar Sesion" name="cerrar"></form>
<?php
    include_once "template/pie.php";
?>