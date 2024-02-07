<?php
session_start();
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
		.elimina {
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
		margin: 0px auto;
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
    <h1 style="color:white; background-color:red; font-weight: bold; font-size:300%;">IL MUSEO DELLA MATURITA' </h1>
    <?php
    if($_SESSION['admin']!=1){
         echo "<script type='text/javascript'>window.top.location='opere.php';</script>";
    }
    ?>
    <?php
    $idOpera = "";
    if (isset($_GET['idOpera'])) {
        $idOpera = $_GET['idOpera'];
        // echo $codTrattamento;
    } else {
        //echo "Errore: Manca idOpera";
        echo "<script type='text/javascript'>window.top.location='opere.php';</script>";
        exit;
    }
    ?>
    <h3>MODIFICA OPERA </h3>
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

    // charset utf-8
    $mysqli->set_charset("utf8");

    /// se c'e' piano allora faccio l'update
    $piano = "";
    if (isset($_GET['piano']) && $_GET['piano'] > "" ) {
        $piano = $_GET['piano'];
		$stanza = $_GET['stanza'];

        $sql = "UPDATE opera set piano = '" . $piano. "' WHERE idOpera = '" . $idOpera . "' ";
        
        // echo "<pre>sql: " . $sql . "</pre>";
        $result = $mysqli->query($sql);
		
		$sql = "UPDATE opera set stanza = '" . $stanza. "' WHERE idOpera = '" . $idOpera . "' ";
        
        //echo "<pre>sql: " . $sql . "</pre>";
        $result = $mysqli->query($sql);
        if ($mysqli->affected_rows == 1) {
            //echo "piano modficato";
        } else {
            //echo "ERRORE modfica";
        }
        echo "<script type='text/javascript'>window.top.location='opere.php';</script>";
    }
    /// fine update

    $sql = "select * from opera";
    $sql .= " where 1=1 ";
    if ($idOpera > "") {
        $sql .= "and idOpera like '" . $idOpera . "' ";
    }
    //echo "<pre>sql: " . $sql . "</pre>";
    $result = $mysqli->query($sql);
    if ($result) {
        echo "<form name=\"dati\" action=\"\" method=\"get\" >  ";

        // echo "OK";
        echo "<table >\n";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {

                echo "<tr>";
                echo "<th>idOpera</th> ";
                echo "<td>" . $row['idOpera'];
                echo "<input type=\"hidden\" name=\"idOpera\" value=\"" . $row['idOpera'] . "\" >";
                
                echo "</td> ";
                echo "</tr>\n";
                echo "<tr>";
                echo "<th>titolo</th>";
                echo "<td>" . $row['titolo'] . "</td>";
                echo "</tr>\n";
                echo "<tr>";
                echo "<th>anno</th>";
                echo "<td>" . $row['anno'] . "</td>";
                echo "</tr>\n";
                echo "<tr>";
                echo "<th>correnteartistica</th>";
                echo "<td>" . $row['correnteartistica'] . "</td>";
                echo "</tr>\n";
                echo "<tr>";
                echo "<th>stanza</th>";
				echo "<td>";
				echo "<input type=\"text\" name=\"stanza\" value=\"" . $row['stanza'] . "\" >";
				echo "</td>";
				echo "</tr>\n";
				echo "<tr>";
				echo "<th>piano</th>";
                echo "<td>";
                echo "<input type=\"text\" name=\"piano\" value=\"" . $row['piano'] . "\" >";
                echo "</td> ";
                echo "</tr>\n";
                echo "<tr>";
                echo "<th colspan=\"2\" >";
                echo "<input type=\"reset\" class=\"elimina\" value=\"Reset\" > ";
                echo "<input type=\"submit\" class=\"login\" value=\"Salva\" > ";
                echo "</th>";
                echo "</tr>\n";
            }
        } else {
            echo "nessun dato";
        }
        echo "</table >\n";
        echo "</form>";
        $result->close();
    } else {
       // echo "Errore";
    }
    ?>
    </br>
    <form name='opere' action='opere.php' method='post' >
		<input type="submit"class="registrazione" value="TORNA ALLE OPERE">
	</form>
    </div>
</body>
</html>