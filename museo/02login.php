<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ionut Suciu</title>
	<style>
		table {
			border-collapse: collapse;
		}
		body{
		background-color: #ffffff;
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
	<!--
	<h1>Utente inserito:</h1>

	<hr />
	-->
	<?php

	error_reporting(0);
	$utente = "";
	if (isset($_POST['utente'])) {
		$utente = $_POST['utente'];
	}

	//$password = "";
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$password = "".$password."kappa";
	}

	//echo "<h1> utente:" . $utente . "</h1>";
	//echo "<h1> password:" . $password . "</h1>";
	//grant all privileges on id13751875_museo.* to
	//'id13751875_ionutsuciuaugustin'@'localhost' identified by 'GruyAjsX{XSfPpV0';
	$_SESSION['utente'] = $utente;
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
	
	$sql = "select * from utente ";
	$sql .= "where utente = '" . $utente . "' ";
	
	
	//echo "<pre>" . $sql . "</pre>";
	$mysqli->real_escape_string($sql);
	$result = $mysqli->query($sql);

	if ($result) {
		if ($result->num_rows == 1) {
			while ($row = $result->fetch_array()) {
				if (hash('sha256',$password) == $row['password']) {
					//
					//echo "OK";
					
					$_SESSION['login'] = 'ok';
					
					if($row['admin'] == '1'){
					$_SESSION['admin'] = 1;
					echo "<script type='text/javascript'>window.top.location='index.php';</script>";
					 //echo "<h1> SEI AMMINISTRATORE </h1>";
					//echo '<a href="03login.php" title="pagina protetta">VISUALIZZA ELENCO</a>';
					} else {
						$_SESSION["admin"] = 0;
						echo "<script type='text/javascript'>window.top.location='index.php';</script>";
						//echo '<h1> NON SEI AMMINISTRATORE </h1>';
					}

				} else {
					echo "<script type='text/javascript'>window.top.location='01login.php?errore=password';</script>";
				}
			}
		} else {
			echo "<script type='text/javascript'>window.top.location='01login.php?errore=registrazione';</script>";
		}
		$result->close();
	} else {
		echo "ERRORE";
	}

	$mysqli->close();

	?>

	<!--<a href="01login.php" title="torna al login">LOGIN</a>-->
</body>

</html>