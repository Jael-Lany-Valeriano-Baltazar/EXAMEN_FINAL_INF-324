<!-- 
    PROCESO 5
-->

<?php

    include_once "template/cabecera.php";
    
    SESSION_START();
    $ci = $_SESSION['usuarioCI'];//Iniciando Session KardexF
    
    //sql 1
    $sql = "select * ";
    $sql.= "from academico.usuario u, academico.postulante p ";
    $sql.= "where u.rol='estudiante' ";
    $sql.= "and u.documentoPos != '' ";
    $sql.= "and u.ci = p.ci";
    $resultado = mysqli_query($conexion, $sql);

?>


<small>PROCESO 5</small>
<h2>RECEPCION DE DOCUMENTOS</h2><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Carnet de Identidad</th>
            <th>Matricula</th>
            <th>Carrera</th>
            <th>Materia de Postulacion</th>
            <th>Documentos Postulante</th>
            <th>Enviar a Carrera</th>
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
                <td><input type="checkbox" name="check"></td><br>
        <?php    
                echo "</tr>";
            }
        ?>
    </tbody>
</table>