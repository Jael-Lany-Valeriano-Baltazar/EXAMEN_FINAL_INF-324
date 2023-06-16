<?php
    
    include("conexion.inc.php");

    session_start();
    $USER = $_SESSION["USER"];

    include "navNotas.inc.php";
    
?>

<header id="header" class="header">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-container"><br><br>
                            <p class="p-heading p-large" >REGISTRAR MATERIA</p>
                            <div class="fadeIn_form first_form">
                            <img src="../fondos/prueba.png" id="icon_form" alt="" style="padding-top:23px; width:250px;"/>
                          </div>
                            <!--<h1><span id="js-rotating" style="text-align: center;">MATEMÁTICA, FÍSICA, CIENCIAS QUÍMICA, INFORMÁTICA, BIOLOGÍA, ESTADÍSTICA</span></h1>-->
                            
                     <!-- <div class="col-md-12">
                    <div class="wrapper_form fadeInDown_form" >
                            <div id="formContent_form">
                                <BR>-->
                          <!-- Tabs Titles --><!--
                          <h2 class="active_form h2_form"> Iniciar Sesión </h2>
                          -->
                      
                          <!-- Icon -->
                          <!--<div class="fadeIn_form first_form">
                            <img src="../logos/restriccion-de-cuenta.png" id="icon_form" alt="" style="padding-top:23px; width:250px;"/>
                          </div>-->
                      
                          <!-- Login Form --><!--
                          <form method="GET" action="insertar.php">

                            <?php if (isset($errores)) { ?>
                                <p class="error_login"><?php echo $errores; ?></p>
                            <?php } ?>

                            <input type="text" id="ci" class="fadeIn_form second_form" name="ci" placeholder="Ingrese su CI">
                            <input type="text" id="sigla" class="fadeIn_form third_form" name="sigla" placeholder="Sigla de la materia">
                            <input type="submit" class="fadeIn_form fourth_form" name="submit" value="Registrar">
                            
                        
                          </form>-->
                      
                          <!-- Remind Passowrd -->
                          
                      <!--
                        </div>
                      </div>
                </div>-->



                            <!--<a class="btn-solid-lg page-scroll" href="#intro">DISCOVER</a>-->
                        </div>
                    </div> <!-- end of col -->


                   
  <div class="col-md-6">
  <br><br><br><br><br><br><br><br>
  <p class="p-heading p-large" >DETALLE DE PROCESO</p>
    <div class="card">
      
    <?php
      include "conexion.inc.php";
      $sql="select * from FLUJO_INSC ";
      $sql.="where USER='".$USER."' and FECHA_FIN is null and PROCESO <> ''";
      $resultado=mysqli_query($con, $sql);
      ?>
      <table class="table">
      <tr>
        <td>FLUJO</td>
        <td>PROCESO</td>
        <td>NRO. INSCRIPCIÓN</td>
        <td>FECHA INICIAL</td>
        <td>FECHA FINAL</td>
      </tr>
    <?php 
    while ($fila=mysqli_fetch_array($resultado))
      {
        echo "<tr>";
        echo "<td>".$fila["FLUJO"]."</td>";
        echo "<td>".$fila["PROCESO"]."</td>";
        echo "<td>".$fila["NRO_INSC"]."</td>";
        echo "<td>".$fila["FECHA_INI"]."</td>";
        echo "<td>".$fila["FECHA_FIN"]."</td>";
        //echo "<td><a href='FLUJO.php?FLUJO=".$fila["FLUJO"]."&PROCESO=".$fila["PROCESO"]."&NRO_INSC=".$fila["NRO_INSC"]."'>Ir</td>";
        echo "</tr>";

        echo "<br><br>";
        //header ("Location:PRE-INSCRIPCION.php");
        echo '<button type="button" class="fadeIn_form fourth_form"><a href="PRE-INSCRIPCION.php?FLUJO='.$fila["FLUJO"].'&PROCESO='.$fila["PROCESO"].'&NRO_INSC='.$fila["NRO_INSC"].'">SIGUIENTE</a></button>';

        //echo " <button type="button" class="fadeIn_form fourth_form"><a href='flujo.php?FLUJO=".$fila["FLUJO"]."&PROCESO=".$fila["PROCESO"]."&NRO_INSC=".$fila["NRO_INSC"]."'>Ir</button>";
      }
    ?>
    </table>
    </div> 
  </div>



                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->





<?php
//include "menu.inc.php";
include "footer.inc.php";
?>
