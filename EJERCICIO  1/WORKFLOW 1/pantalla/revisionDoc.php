<!-- 
    PROCESO 6
-->
<?php

    include_once "template/cabecera.php";

    SESSION_START();
    $ci = $_SESSION['usuarioCI'];

    //sql 1
    $sql = "select * ";
    $sql.= "from academico.usuario u, academico.postulante p ";
    $sql.= "where u.rol='estudiante' ";
    $sql.= "and u.documentoPos != '' ";
    $sql.= "and u.ci = p.ci ";
    $sql.= "and p.revisar = 1";
    $resultado = mysqli_query($conexion, $sql);
    
?>


<small>PROCESO 6</small>
<h2>REVISION DE DOCUMENTOS DEL POSTULANTE</h2><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Carnet de Identidad</th>
            <th>Matricula</th>
            <th>Carrera</th>
            <th>Materia de Postulacion</th>
            <th>Documentos Postulante</th>
        </tr>
    </thead>

    <tbody>
        <?php
            while($registro = mysqli_fetch_array($resultado)){
                echo "<tr>";
                echo "<td>".$registro['nombre']."</td>";
                echo "<td>".$registro['ci']."</td>";

                $_SESSION['postulanteCI'] = $registro['ci'];

                echo "<td>".$registro['matricula']."</td>";
                echo "<td>".$registro['carrera']."</td>";
                echo "<td>".$registro['materiaP']."</td>";
        ?>
                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($registro['documentoPos']); ?>" width="100" heiht="100" /></td>
        <?php    
                echo "</tr>";
            }
        ?>
    </tbody>
</table>