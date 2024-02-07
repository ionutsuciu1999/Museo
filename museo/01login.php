<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
	 <link rel="stylesheet" type="text/css" href="immagini/style.css" title="style" />
		<meta charset="utf-8">
		<title>Ionut Suciu</title>
		<style>
		.login {
		background-color: #4CAF50;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border-radius: 8px;
		margin: 4px 2px;
		cursor: pointer;
		}
		.compra {
		background-color: white;
		border: none;
		color: black;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border-radius: 8px;
		margin: 4px 2px;
		cursor: pointer;
		}
		.registrazione {
		background-color: #008CBA;
		border: none;
		border-radius: 8px;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		}
		body {
		background-color: #ffffff;
		color: #4f4f4f;
		text-align:center;
		font-size:140%;
		margin: auto;
		}
		
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
<div id="background">
<?php
	if (isset($_GET['errore'])) {
		$errore = $_GET['errore'];
		if($errore == "registrazione"){
			echo "<script type='text/javascript'>alert('UTENTE NON REGISTRATO');</script>";
		} else if($errore == "password"){
			echo "<script type='text/javascript'>alert('PASSWORD ERRATA');</script>";
		}else if($errore == "registrazionesbagliata"){
			echo "<script type='text/javascript'>alert('UTENTE GIA REGISTRATO');</script>";
		}else if($errore == "utentegiaregistrato"){
			echo "<script type='text/javascript'>alert('UTENTE GIA REGISTRATO');</script>";
		}else if($errore == "registrazionecorretta"){
			echo "<script type='text/javascript'>alert('REGISTRAZIONE AVVENUTA CORRETTAMENTE');</script>";
		}else if($errore == "codicesbagliato"){
			echo "<script type='text/javascript'>alert('IL CODICE INSERITO NON E VALIDO');</script>";
		}
	}
?>
<h1 style="color:white; background-color:red; font-weight: bold; font-size:300%;">IL MUSEO DELLA MATURITA' </h1>
<h2 style="color:#4CAF50; font-weight:bold">LOGIN</h2>
	<form name='login' action='02login.php' method='post' >
		UTENTE:<input type='text' name='utente' />
		<br/>
		PASSWORD:<input type='password' name='password' />
		<br/>
		<!--<div style="margin-right:163px">
		RICORDAMI:<input type='checkbox' name='ricordami' value='ricordami' />   -->
		</div>
		<input class="login" type='submit' value="LOGIN">
	</form>
<h1 style="color:#4f4f4f;">_______________________</h1>
	
<h2 style="color:#008CBA; font-weight:bold">REGISTRAZIONE</h2>
	<form name='registrazione' action='04login.php' method='post' >
		UTENTE:<input type='text' name='utente' />
		<br/>
		PASSWORD:<input type='password' name='password' />
		<br/>
		CODICE BIGLIETTO:<input type='text' name='codicebiglietto' />
		<br/>
		<input class="registrazione" type='submit' value='REGISTRAZIONE'>
	</form>
<h1 style="color:#4f4f4f;">_______________________</h1>
	<form name='compra' action='nuovobiglietto.php' method='post' >
		<input class="compra" type='submit' style="background-color:red; color:white;" value="COMPRA BIGLIETTO">
	</form>
	</body>
	</div>
</html>



