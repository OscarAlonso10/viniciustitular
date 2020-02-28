<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Login</h1>

	<form action="index.php" method="post">
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="login">
	</form>

	<?php
		$dbopts = getenv('DATABASE_URL');

		$dbconn = pg_connect($dbopts)
	    or die('Could not connect: ' . pg_last_error());

		echo "Conectado";


		if(isset($_POST['username']) and (isset($_POST['password']))){

 			$nombre = $_POST['username'];
 			
 			$password = $_POST['password'];
 			
 			$query = "SELECT * FROM usuaris where nom ='".$nombre."' and password = '".$password."'";

			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
 			

 			if(isset($result)){

        	echo "Bienvenido '".$result['nom']."'";


      		}else{

        	echo "Usuario o Password incorrectos";
        }

      	}
		pg_close($dbconn);
	?>
</body>
</html>