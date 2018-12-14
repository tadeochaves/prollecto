<?php header ('Content-type: application/json'); 

require "config.php";


$sentenciaSQL="SELECT * FROM `eventos`";



$resultado = mysqli_query($connection, $sentenciaSQL);

while ($fila=mysqli_fetch_assoc($resultado)){
    $eventos[]=$fila;
}

echo json_encode($eventos);

?>