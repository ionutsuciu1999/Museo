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
       
       .orario {
		background-color: #008CBA;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
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
    <div id="header">
      <div id="logo" style="margin-top:5px;">
        <div id="logo_text" style="margin-top:10px; width:100%">
          <h1 style="color:white; background-color:red;font-weight: bold; text-align:center; font-size:500%;">IL MUSEO DELLA MATURITA'</h1>
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
      <div id="menubar">
        <ul id="menu" >
          <li class="selected" ><a href="index.php" style="width:178px; height:32px">Presentazione</a></li>
          <li><a href="opere.php" style="width:120px; height:32px">Opere</a></li>
          <li><a href="tariffe.php" style="width:110px; height:32px">Info</a></li>
          <li><a href="01login.php" style="width:100px; height:32px">Login</a></li>
		  <li><a href="logout.php" style="width:80px; height:32px">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
          <h1 style="text-align: center; color:white; font-size:230%; margin-top:10px;">ORARIO</h1>

            <form  action='pdf/orario/orario.php' method='post'>
    <input style="margin-left:314px"class="orario" type='submit' value="VISUALIZZA ORARIO" name="TORNA INDIETRO">
    </form>
          <h1 style="text-align: center; color:white; font-size:230%; margin-top:10px;">TARIFFE</h1>

		<?php
		echo "<hr>";
		echo "<h1 style='color:white'><strong>Ingresso Intero:</strong> 15€</h1>";
		echo "<hr>";
		echo "<h1 style='color:white'><strong>Ingresso Ridotto 1:</strong> 11€</h1>";
		echo "<p style='color:#cacaca'>Per i visitatori da 15 a 18 anni.</p>";
		echo "<hr>";
		echo "<h1 style='color:white'><strong>Ingresso Ridotto 2:</strong> 5€</h1>";
		echo "<p style='color:#cacaca'>Per i visitatori da 6 a 14 anni.</p>";
		echo "<hr>";
		echo "<h1 style='color:white'><strong>Ingresso Ridotto 3:</strong> 2€</h1>";
		echo "<p style='color:#cacaca'>Per i gruppi scolastici.</p>";
		echo "<hr>";

		?>
		<p></p>
      </div>
    <div>
    <h1 style="text-align: center; color:white; font-size:230%; margin-top:10px;">DOVE TROVARCI</h1>
    <!--<a href="https://www.google.it/maps/place/IIS+Einaudi+-+Scarpa/@45.7710626,12.0446161,17z/data=!3m1!4b1!4m5!3m4!1s0x477924f9e9e0ed47:0x94193ab712557360!8m2!3d45.7710589!4d12.0468048">
    <img style="width:100%; height:350px" src="/immagini/maps.PNG" alt="mappa">-->
    <iframe style="width:100%"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.0063683944363!2d12.044616115810902!3d45.771062620935524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477924f9e9e0ed47%3A0x94193ab712557360!2sIIS%20Einaudi%20-%20Scarpa!5e0!3m2!1sen!2sit!4v1591023315486!5m2!1sen!2sit" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </a>
    </div>
    <div style="float:right;width:30px">
        <img style="width:100%"src="immagini/topologia.png" alt="topologia">
    </div>
    </div>
  </div>
</body>
</html>
