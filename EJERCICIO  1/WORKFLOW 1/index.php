<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio de Sesion</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata">
</head>
<body>
	<section class="form-main">
		<div class="form-content">
			<div class="box">
				<h3>Bienestar Social</h3>
                <form action="control.php" method="post">
					<div class="input-box">
						<input type="text" placeholder="Usuario" class="input-control" name="usuario">
					</div>
					<div class="input-box">
						<input type="password" placeholder="Password" class="input-control" name="pasword">
					</div>
					<button type="submit" class="btn" name="iniciar">Iniciar Sesion</button>
				</form>

			</div>
		</div>
	</section>
</body>
</html>
<html>
    <body>
        <form action="control.php" method="post">
            Usser:
            <input type="text" name="usuario" value=""/>
            Password:
            <input type="password" name="pasword" value=""/><br>            
            <input type="submit" name="ingresar" value="ingresar">
        
        </form>
    </body>
</html>
