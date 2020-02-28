<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Login</h1>

	<form action="" method="post">
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="login">
	</form>

	<?php
		$dbopts = getenv('DATABASE_URL');

		$dbconn = pg_connect($dbopts)
	    or die('Could not connect: ' . pg_last_error());

		echo "Conectado";

		$query = 'SELECT * FROM usuaris';
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

		echo "<table>\n";
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		    echo "\t<tr>\n";
		    foreach ($line as $col_value) {
		        echo "\t\t<td>$col_value</td>\n";
		    }
		    echo "\t</tr>\n";
		}
		echo "</table>\n";

		pg_free_result($result);

		// Cerrando la conexión
		pg_close($dbconn);
	?>
</body>
</html>