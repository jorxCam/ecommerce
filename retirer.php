<?php
session_start();
$usuario=$_SESSION['username'];
$panierarray=$_SESSION['panier'];


$id_article=$_POST['retirer'];




 
echo "Borrando la palabra ".$id_article." dentro del array:<br>";
if (($clave = array_search($id_article, $panierarray)) !== false) {
    unset($panierarray[$clave]);
    //print_r($panierarray);
}






//$panierarray[0]=$id_article;
$_SESSION['panier']=$panierarray;

//echo $panierarray[0];
header("Location: article.php");

?>