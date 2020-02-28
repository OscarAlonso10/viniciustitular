<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$dbopts = getenv('DATABASE_URL');
		$dbconn = pg_connect($dbopts)
	    or die('Could not connect: ' . pg_last_error());

		echo "Conectado";
	?>
</body>
</html>