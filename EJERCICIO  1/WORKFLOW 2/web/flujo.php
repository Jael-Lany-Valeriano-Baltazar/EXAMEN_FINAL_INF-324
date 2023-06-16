<?php
    
    include("conexion.inc.php");

    session_start();
    $USER = $_SESSION["USER"];

    include "navNotas.inc.php";

$FLUJO = $_GET["FLUJO"];
$PROCESO = $_GET["PROCESO"];
$NRO_INSC = $_GET["NRO_INSC"];

//include "conexion.inc.php";
$sql="select * from FLUJO";
$sql.="where FLUJO='".$FLUJO."' and ";
$sql.="PROCESO='".$PROCESO."'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$PANTALLA=$fila["PANTALLA"];
$TIPO=$fila["TIPO"];
$PRO=$fila["PROCESO_SIG"];
$ROL=$fila["ROL"];
//echo $pro;
//echo $rol;
//echo $_SESSION["rol"];
include $PANTALLA.".php";///////////////////////////FALTA DATOS.INC

$sql="select count(*) as cantidad from FLUJO_INSC";
$sql.="where FLUJO='".$FLUJO."' and ";
$sql.="PROCESO='".$PROCESO."' and ";
$sql.="NRO_INSC='".$NRO_INSC."'";
$resultado2=mysqli_query($con, $sql);
$fila2=mysqli_fetch_array($resultado2);
$cantidad=$fila2["cantidad"];

?>

<form method="GET" action="motor.php">  <!-------FALTA MOTOOOR------>
	<?php 
	//include $pantalla.".inc.php";
	?>
	<input type="hidden" value="<?php echo $PANTALLA;?>" name="PANTALLA"/>
	<input type="hidden" value="<?php echo $FLUJO;?>" name="FLUJO"/>
	<input type="hidden" value="<?php echo $PROCESO;?>" name="PROCESO"/>
	<input type="hidden" value="<?php echo $TIPO;?>" name="TIPO"/>
	<input type="hidden" value="<?php echo $NRO_INSC;?>" name="NRO_INSC"/>

	<br/>
	<?php
	if($ROL==$_SESSION["ROL"]){
		include $PANTALLA.".inc.php";
		if ($tipo=="C")
		{	
	?>
		<div style=" text-align: center;">
		<input type="submit" class="btn btn-primary" value="SI" name="SI"/>
		<input type="submit"  class="btn btn-primary" value="NO" name="No"/>
		</div>	
	<?php
		}else{
	?>	

		<div style=" text-align: center;">
		<input type="submit" class="fadeIn_form fourth_form" value="Siguiente" name="Siguiente"/>	
	<?php
		if($cantidad<1){
	?>
	<input type="submit" class="fadeIn_form fourth_form" value="Anterior" name="Anterior"/>
	<?php
		}else{	
	?>
		<input type="submit" class="fadeIn_form fourth_form" disabled value="Anterior" name="Anterior"/>
	</div>	
	
	<?php	
		}
	}
	?>
		
	<?php	
	}else{
		
	?>
		
				<div class="item">
                    <div id="headingOne">
                        <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                            <span class="circle-numbering">1</span><span class="accordion-title">PROCESANDO DATOS</span>
                        </span>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div style=" color: white;"  class="accordion-body">
                            EL PROCESO ESTÁ EN EJECUCIÓN.
							<BR>
							SE REQUIERE CAMBIAR DE ROL.
                        </div>
                    </div>
                </div>

<?php
	}

//include "menu.inc.php";
include "footer.inc.php";
?>

	