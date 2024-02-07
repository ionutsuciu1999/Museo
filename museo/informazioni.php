<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Ionut Suciu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="immagini/style.css" title="style" />
<style>
	li{
		font-size:140%;
	}

	li:hover{
		background-color: gray;
	}
	#map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       .tornaindietro {
		background-color: #008CBA;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		}
</style>
</head>

<body>
<?php
/*if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
	echo "<h1 style='color:red'>ADMIN = SI</h1>";
} else {
	echo "<h1 style='color:red'>ADMIN = NO</h1>";
}
*/
?>
  <div id="main">
    <div id="header" style="height:140px;">
      <div id="logo" style="margin-top:5px;">
        <div id="logo_text" style="margin-top:10px;">
          <h1 style="color:white; background-color:red;font-weight: bold; font-size:564%;">IL MUSEO DELLA MATURITA'</h1>
          <h2 style="color:#4f4f4f; padding:0px 0px 0px 0px;">Progetto by Ionut Suciu 5B INF, IIS EINAUDI-SCARPA Montebelluna</h2>
        </div>
		<?php
		if (isset($_SESSION['utente'])) {
		$utente = $_SESSION['utente'];
		echo "<h3 style='color:green'>HAI FATTO IL LOGIN COME: ".$utente."</h1>";
		} else {
		echo "<h3 style='color:red'>NON HAI FATTO IL LOGIN</h1>";
		}
		?>
      </div>
    </div>
    <div id="site_content">
      <div id="content"> 
            <?php //sitoooooooooo
    if(!isset($_SESSION['admin'])){
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
    
    <?php
    $titolo = "";
    $piano = "";
    $stanza = "";
    $anno = "";
    $descrizione = "";
    $correnteartistica = "";
    $idAutore = "";
    $tecnica = "";
    $altezza = "";
    $tipo = "";
    $peso = "";
    $materiale = "";
    $nome = "";
    $cognome = "";
    $nazionalita = "";
    $dataNascita = "";
    $dataMorte = "";
                
    error_reporting(E_ALL ^ E_WARNING);
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'id13751875_ionutsuciuaugustin');
    define('DB_PASSWORD', 'GruyAjsX{XSfPpV0');
    define('DB_NAME', 'id13751875_museo');

    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $mysqli->set_charset("utf8");
    
    $sql = "SELECT titolo FROM opera WHERE opera.idOpera = '".$idOpera."'"; //PRENDO IL TITOLO
    
    //echo "<pre>sql: " . $sql . "</pre>";
    $result = $mysqli->query($sql);
    if ($result) {
        echo "<table>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $titolo = $row['titolo'];
            }
        }
    }
    echo "<h3 style='text-align: center; margin-top:10px; color:white; font-size:230%'>".$titolo."</h3>";
    
    
    echo "<div style='max-width:70%;margin: auto;'>";
    echo "<img style='width:100%' src='immagini/immaginiopere/".$idOpera.".png'>";
    echo "</div>";
    
    
    
    
    $sql = "SELECT * 
    FROM opera LEFT JOIN pittura ON opera.idOpera = pittura.idOpera LEFT JOIN scultura ON opera.idOpera = scultura.idOpera LEFT JOIN autore ON opera.idAutore = autore.idAutore
        WHERE opera.idOpera = '".$idOpera."'"; //PRENDO TUTTI I DATI
     
    //echo "<pre>sql: " . $sql . "</pre>";
    $result = $mysqli->query($sql);
    if ($result) {
        echo "<table>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $idOpera = $row['idOpera'];
                $titolo = $row['titolo'];
                $piano = $row['piano'];
                $stanza = $row['stanza'];
                $anno = $row['anno'];
                $descrizione = $row['descrizione'];
                $correnteartistica = $row['correnteartistica'];
                $idAutore = $row['idAutore'];
                $tecnica = $row['tecnica'];
                $altezza = $row['altezza'];
                $larghezza = $row['larghezza'];
                $tipo = $row['tipo'];
                $peso = $row['peso'];
                $materiale = $row['materiale'];
                $nome = $row['nome'];
                $cognome = $row['cognome'];
                $nazionalita = $row['nazionalita'];
                $dataNascita = $row['dataNascita'];
                $dataMorte = $row['dataMorte'];
                /*
                 echo $titolo;
                 echo "<br>";
    echo $piano;
    echo "<br>";
    echo $stanza;
    echo "<br>";
    echo $anno;
    echo "<br>";
    echo $descrizione;
    echo "<br>";
    echo $correnteartistica;
    echo "<br>";
    echo $idAutore;
    echo "<br>";
    echo $tecnica;
    echo "<br>";
    echo $altezza;
    echo "<br>";
    echo $tipo;
    echo "<br>";
    echo $peso;
    echo "<br>";
    echo $materiale;
    echo "<br>";
    echo $nome;
    echo "<br>";
    echo $cognome;
    echo "<br>";
    echo $nazionalita;
    echo "<br>";
    echo $dataNascita;
    echo "<br>";
    echo $dataMorte;
    echo "<br>";
    */
                /*echo "<tr>";
                echo "<th>idOpera</th> ";
                echo "<td>" . $row['idOpera'];
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
                echo "</th>";
                echo "</tr>\n";
                */
            }
        } else {
            echo "nessun dato";
        }
        echo "</table >\n";
        $result->close();
    } else {
       echo "Errore";
    }
    
    if($peso==''){
         //echo "pittura";
         echo "<br>";
         echo "<h2 style='color:white;'>Descrizione:</h2>";
         echo "<p>".$descrizione."</p>";
         echo "<h2 style='color:white;'>L'autore:</h2>";
         echo "<p>L'autore di questa opera è  <span style='color:yellow'>".$nome." ".$cognome."</span> di nazionalita <span style='color:yellow'>".$nazionalita."</span>, nato il <span style='color:yellow'>".$dataNascita."</span> e deceduto il <span style='color:yellow'>".$dataMorte."</span></p>";
         echo "<h2 style='color:white;'>L'opera:</h2>";
         echo "<p>Questa pittura è stata realizzata nel <span style='color:yellow'>".$anno."</span> e segue la corrente artistica del <span style='color:yellow'>".$correnteartistica."</span>, ha una dimensione di <span style='color:yellow'>".$larghezza."</span> x <span style='color:yellow'>".$altezza."</span> e la tecnica utilizzata è <span style='color:yellow'>".$tecnica."</span>. La si puo trovare nella stanza Nr.<span style='color:yellow'>".$stanza."</span> del nosto museo.</p>";
    } else {
        //echo "scultura";
        echo "<br>";
        echo "<h2 style='color:white;'>Descrizione:</h2>";
         echo "<p>".$descrizione."</p>";
         echo "<h2 style='color:white;'>L'autore:</h2>";
         echo "<p>L'autore di questa opera è  <span style='color:yellow'>".$nome." ".$cognome."</span> di nazionalita <span style='color:yellow'>".$nazionalita."</span>, nato il <span style='color:yellow'>".$dataNascita."</span> e deceduto il <span style='color:yellow'>".$dataMorte."</span></p>";
         echo "<h2 style='color:white;'>L'opera:</h2>";
         echo "<p>Questa scultura è stata realizzata nel <span style='color:yellow'>".$anno."</span> e segue la corrente artistica del <span style='color:yellow'>".$correnteartistica."</span>, ha un peso di <span style='color:yellow'>".$peso."</span> kg ed il materiale utilizzato è <span style='color:yellow'>".$materiale."</span>. La si puo trovare nella stanza Nr.<span style='color:yellow'>".$stanza."</span> del nosto museo.</p>";
    }
    ?>

      </div>
    <form  action='opere.php' method='get'>
    <input class="tornaindietro" type='submit' value="TORNA INDIETRO" name="TORNA INDIETRO">
    </form>
    </div>
    </br>
    </br>
  </div>
</body>
</html>
