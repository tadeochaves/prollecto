<?php header ('Content-type: application/json'); 

require "config.php";


$sentenciaSQL="SELECT * FROM `eventos`";



$resultado = mysqli_query($connection, $sentenciaSQL);

$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

switch($accion){
    case 'agregar':
    //Instruccion para agregar.

        if(isset($_POST['title'])){
            
            $title = $_POST['title'];
            $descripcion = $_POST['descripcion'];
            $color = "#".$_POST['color'];
            $textColor = $_POST['textColor'];
            $start = $_POST['start']; //'2018-03-21 10:30:00';
            $end = $_POST['end'];

            //$start = $_POST['start'];
            //$end = $_POST['end'].'<br>';
            $sentenciaSQL = "INSERT INTO `eventos` (`title`,`descripcion`,`color`,`textColor`,`start`,`end`) values ('$title','$descripcion','$color','$textColor','$start','$end')";
        
            $respuesta = mysqli_query($connection, $sentenciaSQL);
            
            echo json_encode($respuesta);
        }    

    break;

    case 'eliminar':
    //Instruccion para eliminar.

        $respuesta=false;
        
        if(isset($_POST['id'])){
            
            $id=$_POST['id'];

            $sentenciaSQL = "DELETE FROM eventos WHERE id= '$id' ";


            $respuesta = mysqli_query($connection, $sentenciaSQL);
            
            echo json_encode($respuesta);

        }

    
    break;

    case 'modificar':
    //Instruccion para modificar.

    $id = $_POST['id'];
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];
    $color = $_POST['color'];
    $textColor = $_POST['textColor'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sentenciaSQL = "UPDATE eventos SET 
        `title`='$title',
        `descripcion`='$descripcion',
        `color`='$color',
        `textColor`='$textColor',
        `start`='$start',
        `end`='$end'
        WHERE id='$id';";

    

    $respuesta = mysqli_query($connection, $sentenciaSQL);
                
    echo json_encode($respuesta);        

    
    break;

}  
    


?>