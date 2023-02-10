<?php
include ('funciones.php');
//$nombre = $_POST['nombre'];
$text = $_POST['text'];

$respuesta = buscarbd ( $text);
echo json_encode($respuesta); //ici il chreche dans la bdd et return les values trouves
//echo json_encode($_POST); //pur tester ce quon a reçu

?>
