<?php
$connection = mysqli_connect('localhost','root','','calendario');
if(!$connection){ die ("Conection Failed");}
mysqli_set_charset($connection,"utf8");
date_default_timezone_set("America/Argentina/Buenos_Aires");

?>