<!-- 
    PROCESO 7
-->
<?php
    include_once "template/cabecera.php";

    SESSION_START();
    $ci = $_SESSION['usuarioCI'];//usuario secretaria

    //sql 1
    $sql = "select * from academico.usuario ";
    $sql.= "where ci='$ci'";
    $resultado = mysqli_query($conexion, $sql);
    $registros = mysqli_fetch_array($resultado);
    $imagen = $registros["listaPos"];


    //sql 2
    $sql = "select * ";
    $sql.= "from academico.usuario u, academico.postulante p ";
    $sql.= "where u.rol='estudiante' ";
    $sql.= "and u.documentoPos != '' ";
    $sql.= "and u.ci = p.ci ";
    $sql.= "and p.revisar = 1";
    $resultado = mysqli_query($conexion, $sql);

?>


<small>PROCESO 7</small>
<h2>LISTA POSTULANTES BECA COMEDOR</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Carnet de Identidad</th>
            <th>Carrera</th>
            <th>Materia de Postulacion</th>
        </tr>
    </thead>

    <tbody>
        <?php
            while($registro = mysqli_fetch_array($resultado)){
                echo "<tr>";
                echo "<td>".$registro['nombre']."</td>";
                echo "<td>".$registro['ci']."</td>";
                //$_SESSION['postulanteCI'] = $registro['ci'];
                echo "<td>".$registro['carrera']."</td>";
                echo "<td>".$registro['materiaP']."</td>"; 
                echo "</tr>";
            }
        ?>
    </tbody>
</table>


<input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif"><br><br>
<img src="data:image/jpeg;base64,<?php echo base64_encode($imagen); ?>" alt="Lista de Postulantes" width="200" heiht="200" /><br><br><br>