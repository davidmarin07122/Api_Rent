<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
// Importar la conexion
include 'DBConfig.php';
 
// Conectar a la base de datos
 $conexion = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Obteniendo los datos en la variable $json.
 $json = file_get_contents('php://input');
 
 // Decodificando los datos en formato JSON en la variables $obj.
 $obj = json_decode($json,true);
 
 // Crear variables por cada campo.
 $S_Id_Book = $obj['libro_id'];

 $S_Id_User = $obj['usuario_id'];

 $S_Renta = $obj['rendate'];


 // Instrucción SQL para agregar la renta.
 $Sql_Query = "insert into renta (libro_id, usuario_id, rendate) values ( '$S_Id_Book', '$S_Id_User','$S_Renta')";
 
 
 if(mysqli_query($conexion,$Sql_Query)){
 
$MSG = 'Libro rentado correctamente...' ;
 
//$json = json_encode($MSG);
//echo $json ;
 
 }
 else{
 
 $MSG = 'Inténtelo de nuevo...';
 
 }
 $json = json_encode($MSG);
 echo $json;
 mysqli_close($conexion);
?>