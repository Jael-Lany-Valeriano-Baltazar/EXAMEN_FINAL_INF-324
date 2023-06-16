<?php
    include "conexion.php";
    $usuario = $_POST['usuario'];
    $password = $_POST['pasword'];
    SESSION_START();
    //*************Interaccion con la segunda base de datos (academico)
    $consulta="select count(*) as contador from academico.usuario ";
    $consulta.="where usser='$usuario' and pasword='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $registros=mysqli_fetch_array($resultado);
    
    //************Para verificar que existe ese usuario
    $contador=$registros['contador'];
    //*********Obtener datos del usuario
    $consulta="select * from academico.usuario ";
    $consulta.="where usser='$usuario' and pasword='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $registros = mysqli_fetch_array($resultado);
    $ci = $registros["ci"];
    $rol = $registros["rol"];

    //tomar los datos de sescion  
    if($contador > 0){
        header("Location: bandejaEntrada.php");
        $_SESSION['usuarioSesion'] = $usuario;
        $_SESSION['usuarioCI'] = $ci;
        $_SESSION['usuarioRol'] = $rol;
    }
    else {
        header("Location: index.php");
    }

?>