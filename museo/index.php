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
	
	
.mySlides {display: none}


/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}


/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}



</style>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo" style="margin-top:5px">
        <div id="logo_text" style="margin-top:10px; width:100%">		
          <h1 style="color:white; text-align:center; background-color:red;font-weight: bold; font-size:500%;">IL MUSEO DELLA MATURITA'</h1>
          <h2 style="color:#4f4f4f; padding:0px 0px 0px 0px;">Progetto by Ionut Suciu 5B INF, IIS EINAUDI-SCARPA Montebelluna</h2>
        </div>
	<?php
		if (isset($_SESSION['utente'])) {
		$utente = $_SESSION['utente'];
		echo "<h3 style='color:green'>HAI FATTO IL LOGIN COME: ".$utente."</h1>";
		} else {
		echo "<h3 style='color:red; '>NON HAI FATTO IL LOGIN</h1>";
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
		<h1 style="text-align: center; margin-top:10px; color:white; font-size:230%">PRESENTAZIONE</h1>
		
		
<div>
<!--<span><img src="/immagini/museo2.png" style="width:100%;" /></span>-->

<div class="mySlides fade">
  <img src="immagini/museo.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="immagini/museo2.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="immagini/museo3.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="immagini/museo4.png" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
		</div>
		

		<h1 style="margin-top:10px;color:white;">Uno dei musei più famosi del mondo in cui trovare opere pittoriche e sculture di grandi artisti è Il Museo Della Maturità</h1>
        <p>Uno dei luoghi che un appassionato di arte dovrebbe assolutamente visitare è il Museo Della Maturità che si 
		trova a Montebelluna, in Italia. Si tratta di una delle pinacoteche e dei musei più importanti a livello mondiale.
		Il Museo Della Maturità custodisce opere pittoriche di enorme valore. In questo Museo si trovano infatti esposti i dipinti dei 
		maestri di arte più bravi e famosi, a partire da quelli che hanno tenuto alto il nome della pittura italiana in 
		ambito internazionale.
		Il Museo della Maturità è ubicato in una zona centrale della città, con un grande giardino alberato e circondato
		da monumenti. Come tutti i Musei, anche quello del Museo Della Maturita necessita di qualche ora per essere visitato in 
		maniera approfondita e tranquilla. Per una visita senza interruzioni è consigliabile l’accesso nei giorni feriali,
		quando vi è meno affluenza di pubblico.</p>
		
		<p>La costruzione dell’edificio che ancora oggi ospita Il Museo Della Maturità fu commissionata da Ionut Suciu al 
		fidato architetto Juan de Villaneuva. A lui si deve anche la progettazione dell’adiacente giardino botanico. Ionut Suciu
		visionò e approvò il progetto architettonico nel 2000, lasciando però una discreta libertà di azione e movimento a
		Villaneuva, tanto è vero che il risultato finale fu abbastanza diverso dal disegno originario.
        I lavori giunsero al termine all’inizio del XXI secolo.
		Il Museo Della Maturità, dapprima intitolato aprì ufficialmente i battenti il 13 maggio 2020, 
		mostrando al pubblico le opere migliori facenti parte della collezione mondiale. Successivamente il
		Museo ricevette alcuni fondi nell’anno 16 maggio 2020.</p>
      </div>
    </div>
  </div>
</body>
</html>
