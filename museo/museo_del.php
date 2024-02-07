<?php
session_start();
?>
<?php

$idOpera = "";
if (isset($_GET['idOpera']) && $_SESSION['admin']==1) {
    $idOpera = $_GET['idOpera'];

} else {
    echo "<script type='text/javascript'>window.top.location='opere.php?errore=noneliminato';</script>";
    exit;
}

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

$sql = "DELETE from pittura WHERE idOpera = '" . $idOpera . "' ";
//echo "<pre>sql: " . $sql . "</pre>";
$result = $mysqli->query($sql);
$sql = "DELETE from scultura WHERE idOpera = '" . $idOpera . "' ";
//echo "<pre>sql: " . $sql . "</pre>";
$result = $mysqli->query($sql);
$sql = "DELETE from opera WHERE idOpera = '" . $idOpera . "' ";
//echo "<pre>sql: " . $sql . "</pre>";
$result = $mysqli->query($sql);
if ($mysqli->affected_rows > 0) {
    //echo "opera eliminata (" . $mysqli->affected_rows . ")";
} else {
    //echo "ERRORE in Elimina";
}
echo "<script type='text/javascript'>window.top.location='opere.php?errore=eliminato';</script>";
?>
