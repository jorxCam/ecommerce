<?php
session_start();
$usuario=$_SESSION['username'];
$panierarray=$_SESSION['panier'];


$id_article=$_POST['ajouter'];

array_push($panierarray, $id_article);
//$panierarray[]=$id_article;
$_SESSION['panier']=$panierarray;
//print_r($panierarray);
//die;

//echo $panierarray[0];
header("Location: article.php");


/*
$pila = array();
array_push($pila, "manzana", "arándano");
$pila[0].
print_r($pila);
*/


?>