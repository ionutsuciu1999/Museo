<?php
session_start();
?>
<?php
//error_reporting(0);
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

<?php
//error_reporting(0);
if (isset($_GET['idAutore'])) {

    $idAutore = $_GET['idAutore'];
    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
	$nazionalita = $_GET['nazionalita'];
	$dataNascita = $_GET['dataNascita'];
	$dataMorte = $_GET['dataMorte'];

    $sql = "INSERT INTO autore ";
    $sql .= "(idAutore,nome,cognome,nazionalita,dataNascita,dataMorte) ";
    $sql .= "VALUES ";
    $sql .= "('" . $idAutore . "', '" . $nome . "', '" . $cognome . "', '" . $nazionalita . "', '" . $dataNascita . "', '" . $dataMorte . "') ";

    echo "<pre>" . $sql . "</pre>";

    $result = $mysqli->query($sql);
    if ($result) {
        echo "</br>";
        echo "OkkkkkK";
        if ($mysqli->affected_rows > 0) {
             echo "</br>";
            echo "<h3>autore registrata</h3>";
        } else {
             echo "</br>";
            echo "<h3>nessun dato mdificato</h3>";
        }
    } else {
         echo "</br>";
        echo "ERRORE: " . $mysqli->error;
    }
} 

?>

<!DOCTYPE html>
<html>

<head>
 <title>Ionut Suciu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="immagini/style.css" title="style" />
  <style>
    <style>
        table {
            border-collapse: collapse;
        }
		body {
		background-image: url("immagini/unnamed2.png");
		color: white;
		text-align:center;
		font-size:140%;
		margin: auto;
		}
        table,
        th,
        td {
            border: 1px solid black;
        }
        .simbolo {
            width: 100px;
        }
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
		.reset {
		background-color: red;
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
		.upload {
		background-color: #008CBA;
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
    </style>
</head>
<?php
    if($_SESSION['admin']!=1){
            echo "<script type='text/javascript'>window.top.location='opere.php';</script>";
    }
?>
<body>
<div id="main" style="background-color:#fff; color:#4f4f4f">
<h1 style="color:white; background-color:red; font-weight: bold; font-size:300%;">IL MUSEO DELLA MATURITA'</h1>
    <h1>INSERISCI UN NUOVA IMMAGINE</h1>
	

	<div style="background-color:#4f4f4f; color:#cacaca">
	<p>“idOpera + ‘icona.png’” per impostare l'icona dell’opera </p>
	<p>“idOpera + ‘.png’” per impostare l’immagine come immagine di presentazione nella pagina personalizzata.</p>
	<!--<h2 style="color:white">Inserisci dati Autore</h2>-->
	 <form action="uploadimmagine.php" method="POST" enctype="multipart/form-data">
	<input style="background-color:white" type="file" name="file"><br><br>
	<input class="login" type="Submit" value="UPLOAD IMMAGINE">
	</form>
	</div>
	<br/>
	<form name='opere' action='opere.php' method='post' >
		<input type="submit"class="upload" value="TORNA AL SITO">
	</form>
	<br/>
	<br/>
	<br/>
	<br/>
	</div>
</body>

</html>
