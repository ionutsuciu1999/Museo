<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
			<title>Controllo utente</title>
			<style>
		table {
			border-collapse: collapse;
		}
		table,
		th,
		td {
			border: 1px solid black;
		}
		.simbolo {
			width: 100px;
		}
			</style>
		</head>

		<body>

	<?php
	error_reporting(0);
	$utente = "";
	if (isset($_POST['utente'])) {
		$utente = $_POST['utente'];
	}

	$password = "";
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$password = "".$password."kappa";
	}
	
	$codicebiglietto = "";
	if (isset($_POST['codicebiglietto'])) {
		$codicebiglietto = $_POST['codicebiglietto'];
	}
	//echo "<h1> codicebiglietto:" . $codicebiglietto . "</h1>";
	//echo "<h1> utente:" . $utente . "</h1>";
	//echo "<h1> password:" . $password . "</h1>";
	?>

	<!--<hr />-->

	<?php
    error_reporting(0);
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'id13751875_ionutsuciuaugustin');
	define('DB_PASSWORD', 'GruyAjsX{XSfPpV0');
	define('DB_NAME', 'id13751875_museo');

	// connessione
	$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	// charset utf-8
	$mysqli->set_charset("utf8");

	// SQLinjection
	$utente = $mysqli->real_escape_string($utente);
	$password = $mysqli->real_escape_string($password);
	
	// query
	$sql = "SELECT * FROM codicerandom WHERE codicerandom = '".$codicebiglietto."'";
	$result = $mysqli->query($sql);
	if ($result) {
        if ($mysqli->affected_rows > 0) {
	
		$sql = "INSERT INTO utente ";
		$sql .= "(utente, password, admin) ";
		$sql .= "VALUES ";
		$sql .= "('" . $utente . "', '" .hash('sha256',$password). "', '0') ";
	
	
		//echo "<pre>" . $sql . "</pre>";
	
		$result = $mysqli->query($sql);

		if ($result) {
			if ($mysqli->affected_rows > 0) {
				echo "<script type='text/javascript'>window.top.location='01login.php?errore=registrazionecorretta';</script>";
				} else {
				echo "<script type='text/javascript'>window.top.location='01login.php?errore=utentegiaregistrato';</script>";
			}
        // $result->close();
		} else {
		echo "<script type='text/javascript'>window.top.location='01login.php?errore=registrazionesbagliata';</script>";
		}
		} else {
		echo "<script type='text/javascript'>window.top.location='01login.php?errore=codicesbagliato';</script>";
		}
	}
	
	$mysqli->close();
	?>
</body>
</html>