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
  tr:hover {background-color: lightgray;}
        table {
            border-collapse: collapse;
            width: 100%;
            white-space:nowrap;
        }
		li{
		font-size:140%;
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
		.registrazione {
		background-color: green;;
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
		.registrazione2 {
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
		.modifica {
		background-color: #008CBA;
		border: none;
		color: white;
		padding: 5px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 15px;
		margin: 4px 2px;
		cursor: pointer;
		}
		.elimina {
		background-color: red;
		border: none;
		color: white;
		padding: 5px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 15px;
		margin: 4px 2px;
		cursor: pointer;
		}	
		li:hover{
		background-color: gray;
		}
        tr, th {
           /* border: black solid 2px;
            padding: 3px;
            text-align: center;
			font-size:120%;*/
			
			border-bottom: 10px solid #4F4F4F;
             text-align: center;
        }
		.button-error {
            background: rgb(202, 60, 60);
			color:white;
        }
    </style>
</head>

<body>
  <div id="main">
     <div id="header">
      <div id="logo" style="margin-top:5px">
        <div id="logo_text" style="margin-top:10px; width:100%">
          <h1 style="text-align:center;color:white; background-color:red;font-weight: bold; font-size:500%;">IL MUSEO DELLA MATURITA'</h1>
          <h2 style="color:#4f4f4f; padding:0px 0px 0px 0px;">Progetto by Ionut Suciu 5B INF, IIS EINAUDI-SCARPA Montebelluna</h2>
        </div>
		<?php
		error_reporting(0);
		if (isset($_SESSION['utente'])) {
		$utente = $_SESSION['utente'];
		echo "<h3 style='color:green'>HAI FATTO IL LOGIN COME: ".$utente."</h1>";
		} else {
		echo "<h3 style='color:red'>NON HAI FATTO IL LOGIN</h1>";
		}
		?>
      </div>
      <div id="menubar">
        <ul id="menu"  >
          <li class="selected"  ><a href="index.php" style="width:178px; height:32px">Presentazione</a></li>
          <li><a href="opere.php" style="width:120px; height:32px">Opere</a></li>
          <li><a href="tariffe.php" style="width:110px; height:32px">Info</a></li>
          <li><a href="01login.php" style="width:100px; height:32px">Login</a></li>
		  <li><a href="logout.php" style="width:80px; height:32px">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div>
	 <?php
	 error_reporting(0);
	 //scultura o pittura
    $tipo = "";
    if (isset($_GET['tipo'])) {
        $tipo = $_GET['tipo'];
    }
    ?>
    <h1 style="text-align: center; margin-top:10px; color:white; font-size:230%">LE OPERE PRESENTI ALL'INTERNO DEL MUSEO</h1>
	<?php
	error_reporting(0);
	$admin = $_SESSION['admin'];
	if($admin==0&&$utente!=""){
	//echo "<h3 style='color:red; text-align:center'>Non sei amministratore, non puoi modificare,inserire oppure eliminare le opere.</h1>";
	} else if($admin==0&&$utente=="") {
	echo "<h1 style='color:red; text-align:center '>FARE IL LOGIN PER VISUALIZZARE LE OPERE</h1>";
	} else if($admin==1){
	echo "<h3 style='color:green; text-align:center'>Sei amministratore, ora puoi modificare,inserire oppure eliminare le opere.</h1>";
	echo"<div style='float:right'><form name='inserisciOpera' action='nuovo.php' method='post' >
	<input type='submit' style='padding:10px; font-size:20px' class='registrazione' value='INSERISCI UNA NUOVA OPERA '>
	</form></div>";
	echo"<form name='inserisciAutore' action='nuovoAutore.php' method='post' >
	<input type='submit' style='padding:10px; font-size:20px' class='registrazione' value='INSERISCI UN NUOVO AUTORE'>
	</form>";
	echo"<div style='float:right'><form name='nuovaimmagine' action='nuovaimmagine.php' method='post' >
	<input type='submit' style='padding:10px; font-size:20px' class='registrazione' value='INSERISCI NUOVA IMMAGINE   '>
	</form></div>";
	echo"<form name='nuovacorrente' action='nuovacorrente.php' method='post' >
	<input type='submit' style='padding:10px; font-size:20px' class='registrazione' value='INSERISCI NUOVA CORRENTE'>
	</form>";
	echo "<br/>";
	}
	?>
	
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
    ?>
	
	<!---?php echo $_SERVER['PHP_SELF'];?--->
    <?php
	error_reporting(0);
	if($utente!=""){
	echo "<form name='dati' class='pure-form' method='get' action='opere.php' method='get'>";
	echo "	<label for='multi-state'>Seleziona:</label><br/>";
	echo "	<select name='tipo' style='height:30px'>";
    echo "        <option value='' style='font-size:20px'>Tutti</option>  ";     
	echo "		<option value='pittura' style='font-size:20px'>Pitture</option>  ";
    echo "        <option value='scultura' style='font-size:20px'>Sculture</option>  ";
    echo "        </option>";                
    echo "   </select>";
    echo "    <input type='submit' style='padding:7px; font-size:13px' class='registrazione' value='INVIA' />";
    echo "</form>";
	echo "<br/>";
	}
	?>
	
    <?php
	error_reporting(0);
	if ($utente!="") { /// HA FATTO IL LOGIN??? allora vedo le opere (cancella questa riga e la parentesi chiusa corrispondente
	$sql = "SELECT * FROM opera";
    if ($tipo == "") {
		$sql = "SELECT * FROM opera INNER JOIN autore ON opera.idAutore=autore.idAutore";
    } else if($tipo == "pittura"){
		$sql = "SELECT * FROM opera inner JOIN ".$tipo." ON opera.idOpera=".$tipo.".idOpera INNER JOIN autore ON opera.idAutore=autore.idAutore";
	} else if($tipo == "scultura"){
		$sql = "SELECT * FROM opera inner JOIN ".$tipo." on opera.idOpera=".$tipo.".idOpera INNER JOIN autore ON opera.idAutore=autore.idAutore";
	}
    //echo "<pre>sql: " . $sql . "</pre>";
    $result = $mysqli->query($sql);
    if ($result) {

        // echo "OK";
        echo "<table style='background-color:white; color:#4f4f4f; width:100%'>\n";
        echo "<tr>";
		echo "<th style='color:black'>Nr.</th> ";
        echo "<th style='color:black'>Titolo</th> ";
		echo "<th style='color:black'>Immagine</th>";
        echo "<th style='color:black'>Anno</th>";
        //echo "<th style='color:black'>Correnteartistica</th>";
        //echo "<th style='color:black'>Descrizione</th>";
        //echo "<th style='color:black'>Piano</th>";
        echo "<th style='color:black' colspan='2'>Autore</th>";
        //echo "<th style='color:black'>Cognome</th>";
        echo "<th style='color:black'>Piano -</th>";
        echo "<th style='color:black'>Stanza </th>";
        echo "<th style='color:black'>Info</th>";
		if($admin==1){
		echo "<th style='color:black'>Modifica</th>";
		echo "<th style='color:black'>Elimina</th>";
		}
        echo "</tr>\n";
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_array()) {

                echo "<tr>";
				echo "<td>" . $row['idOpera'] . "</td> ";
                echo "<td style='max-width:280px; white-space:initial;' ><h1 style='padding:0 0 0 0; margin:0 0 0 0;font-size:170%'>" . $row['titolo'] . "</h1></td>";
				echo "<td><img class='immagine' src='immagini/immaginiopere/" . $row['idOpera'] . "icona.png' alt='" . $row['idOpera']."' /></td>";
                echo "<td>" . $row['anno'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['cognome'] . "</td>";
                //echo "<td>" . $row['correnteartistica'] . "</td>";
                //echo "<td>" . $row['descrizione'] . "</td>";
                echo "<td><h2 style='padding:0 0 0 0; margin:0 0 0 0;font-size:130%; color:#4F4F4F'>" . $row['piano'] . "</h2></td>";
                echo "<td><h2 style='padding:0 0 0 0; margin:0 0 0 0;font-size:130%;color:#4F4F4F'>" . $row['stanza'] . "</h2></td>";
                echo "<td>"; // INFORMAZIONI
                echo "<form  action='informazioni.php' method='get'>";
                echo "<input type='hidden' value='".$row['idOpera']."' name='idOpera'/>";
                echo "<input class='registrazione2' type='submit' value='INFO' />";
                echo "</form>";
                echo "</td>";
                if($admin==1){
				echo "<td>"; // UPDATE
                echo "<form  action='museo_up.php?idOpera' method='get'>";
                echo "<input type='hidden' value='".$row['idOpera']."' name='idOpera'/>";
                echo "<input class='modifica' type='submit' value='Modifica' />";
                echo "</form>";
                echo "</td>";
                echo "<td>";// DELETE 
                echo "<form name=\"dati" . $i . "\" action=\"museo_del.php\" method=\"get\" >";
                echo "<input type=\"hidden\" value=\"" . $row['idOpera'] . "\" name = \"idOpera\" />";
                echo "<input class='elimina' type=\"submit\" value=\"Elimina\" onclick=\"return controlla('" . $row['idOpera'] . "');\" />";
                echo "</form>";
                echo "</td>";
				}
                echo "</tr>\n";
                $i++;
            }
        } else {
            echo "nessun dato";
        }
        echo "</table >\n";
        $result->close();
    } else {
        echo "Errore";
    }
	}
    ?>
    <script>
    function controlla(idOpera) {
        // alert("sto controllando");
        var ris;
        ris = confirm("Sei sicuro di eliminare " + idOpera + "?");
        if (ris) {
            return true;
        } else {
            return false;
        }
    }
    </script>
      </div>
    </div>
  </div>
          <?php
        if (isset($_GET['errore'])) {
		$errore = $_GET['errore'];
		if($errore == "errore"){
			echo "<script type='text/javascript'>alert('ERRORE NELL INSERIMENTO, RIPROVARE');</script>";
	   	} else if($errore == "ok"){
			echo "<script type='text/javascript'>alert('OPERA INSERITA CORRETTAMENTE');</script>";
	   	} else if($errore == "noneliminato"){
			echo "<script type='text/javascript'>alert('ERRORE NELL ELIMINAZIONE');</script>";
	   	} else if($errore == "eliminato"){
			echo "<script type='text/javascript'>alert('OPERA ELIMINATA CORRETTAMENTE');</script>";
		    }
        }
        ?>
</body>
</html>
