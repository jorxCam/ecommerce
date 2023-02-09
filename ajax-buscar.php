<?php
include ('funciones.php');
$nombre = $_POST['nombre'];

$respuesta = buscar ( $nombre);
//echo json_encode($respuesta);
echo json_encode($_POST);

?>
