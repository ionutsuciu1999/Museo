<?php
error_reporting(0); //messi dei commenti sugli echo che dicono se errore o no, usare javascript per visualizzare gli errori
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
error_reporting(0);
if (isset($_GET['idOpera'])) {

    $idOpera = $_GET['idOpera'];
    $titolo = $_GET['titolo'];
    $piano = $_GET['piano'];
	$stanza = $_GET['stanza'];
	$anno = $_GET['anno'];
	$descrizione = $_GET['descrizione'];
	$correnteartistica = $_GET['correnteartistica'];
	$idAutore = $_GET['idAutore'];

    $sql = "INSERT INTO opera ";
    $sql .= "(idOpera,titolo,piano,stanza,anno,descrizione,correnteartistica,idAutore) ";
    $sql .= "VALUES ";
    $sql .= "('" . $idOpera . "', '" . $titolo . "', '" . $piano . "', '" . $stanza . "', '" . $anno . "', '" . $descrizione . "', '" . $correnteartistica . "', '" . $idAutore . "') ";

    echo "<pre>" . $sql . "</pre>";

    $result = $mysqli->query($sql);
    if ($result) {
       // echo "OK";
        if ($mysqli->affected_rows > 0) {
            echo "<script type='text/javascript'>window.top.location='opere.php?errore=ok';</script>";
        } else {
            echo "nessun dato mdificato";
            echo "<script type='text/javascript'>window.top.location='opere.php?errore=errore';</script>";
        }
    } else {
        echo "<script type='text/javascript'>window.top.location='opere.php?errore=errore';</script>";
    }
} 

if (isset($_GET['tipo'])) { //////////// se il tipo è scultura o pittura inserisco pittura nel DB oppure scultura, poi inserisco l'opera generale con FK a quella scultura o a quella pittura
	$tipo = $_GET['tipo'];
	if($tipo == "pittura"){ //se pittura
		$tecnica = $_GET['tecnica'];
		$larghezza = $_GET['larghezza'];
		$altezza = $_GET['altezza'];
		$idOpera = $_GET['idOpera'];
		$tipo = $_GET['tipo'];
		
	$sql = "INSERT INTO pittura ";
    $sql .= "(tecnica,larghezza,altezza,idOpera,tipo) ";
    $sql .= "VALUES ";
    $sql .= "('" . $tecnica . "', '" . $larghezza . "', '" . $altezza . "', '" . $idOpera . "', '" . $tipo ."')";

    echo "<pre>" . $sql . "</pre>";

    $result = $mysqli->query($sql);
    if ($result) {
        echo "OK";
        if ($mysqli->affected_rows > 0) {
            echo "<h3>Pittura registrata</h3>";
        } else {
            echo "nessun dato modificato";
        }
    } else {
        echo "<script type='text/javascript'>window.top.location='opere.php?errore=errore';</script>";
    }
	
	} else { //se scultura
	$peso = $_GET['peso'];
	$materiale = $_GET['materiale'];
	$idOpera = $_GET['idOpera'];
	$tipo = $_GET['tipo'];
		
	$sql = "INSERT INTO scultura ";
    $sql .= "(peso,materiale,idOpera,tipo) ";
    $sql .= "VALUES ";
    $sql .= "('" . $peso . "', '" . $materiale . "', '" . $idOpera . "', '" . $tipo ."')";

    echo "<pre>" . $sql . "</pre>";

    $result = $mysqli->query($sql);
    if ($result) {
        echo "OK";
        if ($mysqli->affected_rows > 0) {
            echo "<h3>Scultura registrata</h3>";
        } else {
            echo "nessun dato mdificato";
        }
    } else {
        echo "<script type='text/javascript'>window.top.location='opere.php?errore=errore';</script>";
    }
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

<body>
<div id="main" style="background-color:#fff; color:#4f4f4f">
<h1 style="color:white; background-color:red; font-weight: bold; font-size:300%;">IL MUSEO DELLA MATURITA'</h1>
    <h1>INSERISCI UNA NUOVA OPERA</h1>
	<!--<div style="background-color:#4f4f4f;">
	<h2 style="color:white">Carica immagine</h2>
	<h3 style="color:#cacaca">Nome immagine = id opera a cui appartiene</h3>
   <form action="uploadimmagine.php" method="POST" enctype="multipart/form-data">
	<input style="background-color:white" type="file" name="file"><br><br>
	<input class="upload" type="Submit" value="UPLOAD IMMAGINE">
	</form>
	<br>
	</div>-->
	<div style="background-color:#4f4f4f; color:#cacaca"> <!--PITTURA -->
	<h2 style="color:white">Inserisci una Pittura</h2>
	
    <form name="pittura" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="get">
        idOpera:<input type="text" name="idOpera" value="" /><br />
		Titolo:<input type="text" name="titolo" value="" /><br />
		Piano:<input type="text" name="piano" value="" /><br />
		Stanza:<input type="text" name="stanza" value="" /><br />
		Anno:<input type="text" name="anno" value="" /><br />
		Descrizione:<input type="text" name="descrizione" value="" /><br />
		<select name="correnteartistica">
        <?php
            $sql = "select nomeCorrente from correnteartistica";
            $result = $mysqli->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        echo "<option value=\"" . $row['nomeCorrente'] . "\" >";
                        echo $row['nomeCorrente'];
                        echo "</option>\n";
                    }
                }
            }
            ?>
		</select>
		<br />
		<select name="idAutore">
        <?php
        	error_reporting(0);
            $sql = "select idAutore, nome, cognome from autore";
            $result = $mysqli->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        echo "<option value=\"" . $row['idAutore'] . "\" >";
                        echo $row['idAutore'];
						echo " - ";
						echo $row['nome'];
						echo " ";
						echo $row['cognome'];
                        echo "</option>\n";
                    }
                }
            }
            ?>
		</select>
		<br/>
		Tecnica:<input type="text" name="tecnica" value="" /><br />
		Larghezza:<input type="text" name="larghezza" value="" /><br />
		Altezza:<input type="text" name="altezza" value="" /><br />
		idOpera come quella dell'opera
		<br/>
		Tipo:<input type="text" name="tipo" value="pittura" readonly /><br />
		<br/>
		<input class="reset" type="reset" value="RESET"/>
        <input class="login" type="submit" value="INSERISCI"/>
    </form>
	<br>
	</div>
    <br>
	<div style="background-color:#4f4f4f; color:#cacaca"> <!--SCULTURA -->
	<h2 style="color:white">Inserisci una Scultura</h2>
	<form name="pittura" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="get">
        idOpera:<input type="text" name="idOpera" value="" /><br />
		Titolo:<input type="text" name="titolo" value="" /><br />
		Piano:<input type="text" name="piano" value="" /><br />
		Stanza:<input type="text" name="stanza" value="" /><br />
		Anno:<input type="text" name="anno" value="" /><br />
		Descrizione:<input type="text" name="descrizione" value="" /><br />
		<select name="correnteartistica">
        <?php
        	error_reporting(0);
            $sql = "select nomeCorrente from correnteartistica";
            $result = $mysqli->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        echo "<option value=\"" . $row['nomeCorrente'] . "\" >";
                        echo $row['nomeCorrente'];
                        echo "</option>\n";
                    }
                }
            }
            ?>
		</select>
		<br />
		<select name="idAutore">
        <?php
        	error_reporting(0);
            $sql = "select idAutore, nome, cognome from autore";
            $result = $mysqli->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        echo "<option value=\"" . $row['idAutore'] . "\" >";
                        echo $row['idAutore'];
						echo " - ";
						echo $row['nome'];
						echo " ";
						echo $row['cognome'];
                        echo "</option>\n";
                    }
                }
            }
            ?>
		</select>
		<br />
		Peso:<input type="text" name="peso" value="" /><br />
		Materiale:<input type="text" name="materiale" value="" /><br />
		idOpera come quella dell'opera
		<br/>
		Tipo:<input type="text" name="tipo" value="scultura" readonly /><br />
		<br/>	
		<input class="reset" type="reset" value="RESET"/>
        <input class="login" type="submit" value="INSERISCI"/>
		</form>
    </form>	
	<br>
	</div>
	<br/>
	<form name='login' action='opere.php' method='post' >
    <input class="upload" type='submit' value="TORNA AL SITO">
	</form>
	<br/>
	<br/>
	<br/>
	<br/>
	</div>
</body>

</html>