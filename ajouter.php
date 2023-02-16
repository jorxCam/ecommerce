<?php
session_start();
$usuario=$_SESSION['username'];
$panierarray=$_SESSION['panier'];
$total=$_SESSION['total'];


$id_article=$_POST['ajouter'];
$prix_article=$_POST['prix'];

$nombreElementsAvant=count($panierarray);

$nombreElementsApres=array_push($panierarray, $id_article);
//$panierarray[]=$id_article;
$_SESSION['panier']=$panierarray;

//validation pour changer le total de l'achete seulement si on a ajouté une article au panier
if($nombreElementsApres==$nombreElementsAvant+1){
    $total=$total+$prix_article;
    $_SESSION['total']=$total;
}


//print_r($panierarray);
//die;

//echo $panierarray[0];
header("Location: article.php?id=".$id_article);


/*
$pila = array();
array_push($pila, "manzana", "arándano");
$pila[0].
print_r($pila);
*/


?>