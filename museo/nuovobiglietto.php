<!DOCTYPE HTML>
<html>

<head>
  <title>Ionut Suciu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="immagini/style.css" title="style" />
<style>
	body {
		<!--background-image: url("immagini/unnamed.png");-->
		background-color: #ffffff;
		color: #4f4f4f;
		text-align:center;
		font-size:140%;
		margin: auto;
		}
		.genera {
		background-color: #4CAF50;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 26px;
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
</style>
</head>

<body>
 <?php
    //error_reporting(E_ERROR | E_PARSE); 
    error_reporting(E_ALL ^ E_WARNING);
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

    $mysqli->set_charset("utf8");
    ?>
	<div id="logo_text">
        <h1 style="color:white; background-color:red; font-weight: bold; font-size:300%;">IL MUSEO DELLA MATURITA' </h1>
        <h1 style="color:#4f4f4f;font-weight: bold;">GENERA CODICE BIGLIETTO</h1>
	</div>
	<?php
	$genera = "";
	if (isset($_POST['genera'])) {
		$genera = $_POST['genera'];
		$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		echo "<h1 style='color:green'>CODICE: ".$randomString."</h1>";
		echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Filmuseodellamaturita.000webhostapp.com//qrcode.php?codice=".$randomString."%2F&choe=UTF-8' title='Codice Biglietto' />";
		/*echo "www.ilmuseodellamaturita.000webhostapp.com/qrcode.php?codice=".$randomString."";*/
		$sql = "INSERT INTO codicerandom (codicerandom) VALUES ('".$randomString."')";
		$result = $mysqli->query($sql);
	} 
	$mysqli->close();
	?>
	<form name='genera' action='nuovobiglietto.php' method='post'>
    <input type="submit" name="genera" class="genera" value="COMPRA" /><br/>
	</form>
	<h1 style="color:#4f4f4f;">_______________________</h1>
	<form name='compra' action='01login.php' method='post' >
		<input class="compra" style="background-color:red; color:white"type='submit' value="TORNA AL LOGIN">
	</form>

</body>
</html>
