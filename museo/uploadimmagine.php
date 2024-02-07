<?php
@$name = $_FILES['file']['name'];
@$size = $_FILES['file']['size'];
@$type = $_FILES['file']['type'];
@$tmp_name = $_FILES['file']['tmp_name'];
if (isset($name)) {
    if (!empty($name)) 
    {
    $location = 'immagini/immaginiopere/';
    if (move_uploaded_file($tmp_name, $location. $name));
    echo "<script type='text/javascript'>window.top.location='opere.php?errore=immagineinserita';</script>";
    }
    else 
    {
        echo "<script type='text/javascript'>window.top.location='opere.php?errore=erroreimmagine';</script>";
    }
}
echo "<script type='text/javascript'>window.top.location='opere.php';</script>";
?>