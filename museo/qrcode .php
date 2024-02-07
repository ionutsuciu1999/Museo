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
	<div id="logo_text">
        <h1 style="color:white; background-color:red; font-weight: bold;">IL MUSEO DELLA MATURTITA'</h1>
        <h1 style="color:#4f4f4f;font-weight: bold;">IL TUO CODICE E:</h1>
	</div>
	<?php
	$codice = "";
    if (isset($_GET['codice'])) {
        $codice = $_GET['codice'];
        echo "</br>";
		echo "<h1 style='color:green'>".$codice."</h1>";
    }
	?>

	<h1 style="color:#4f4f4f;">_______________________</h1>
	<form name='login' action='01login.php' method='post' >
		<input class="compra" style="background-color:green; color:white"type='submit' value="TORNA AL LOGIN">
	</form>

</body>
</html>
