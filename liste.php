<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>e-commerce</title>
    
</head>
<body>

<div class="navbar">
  <div class="left">
    <img src="logo.png" style="padding: 1px;width: 50px;">
  </div>

  <div class="main">
    <a href="accueil.php" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href="article.php"  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div><br>

<?php
//session handling
session_start();
$usuario=$_SESSION['username'];
$panierarray=$_SESSION['panier'];
//echo 'after refresh 1 time : '.$panierarray[0];

if (!isset($usuario)){
  header( "location: index.php" );
}else{
    echo 'connecté :  <strong>'.$usuario  .'</strong>';
    echo "<br><a href='logout.php'> se deconnecter </a> ";
    //montrer panier
    //echo 'not for : '.$panierarray[0];
//var_dump($panierarray);

/*
echo '<br>panier : ';
    for ($x=0;$x<count($panierarray); $x++) { 
      if ($panierarray[$x]!=NULL){
        echo '<br><a href="article.php?id='.$panierarray[$x].'">  article '.$panierarray[$x].'</a>';
      }
     // echo '<br>panier : '.$panierarray[$x];
     }
  */
//print_r($panierarray);


echo '<br>panier : ';
    foreach( $panierarray as $p){
      //var_dump( $p );
      if ($p!=NULL){
        echo '<br><a href="article.php?id='.$p.'">  article '.$p.'</a>';
      }
    }
    
}

?>



<br><br>

<?php
/* filtre recherche */
require 'bdd.php';
include ('funciones.php');
//ici demarre la recherche vide pour montre tous les articles
$articulos =buscarbd();
//var_dump($articulos);
//var_dump($articulos[0]['nom_article']);
//die();

?>
<br> <input type="text" name="buscar"> <br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="buscar.js"></script>
<p>Keypresses: <span>0</span></p>

<br>
<div class="articles" id="publicaciones">
  <br>
<?php 
//montrer les articles recherches

foreach ($articulos as $u){
//var_dump($u);
  foreach ($u as $t ){
         
    ?>
    <div style="margin-left: 10px;">
    <?php echo '<a href="article.php?id='.$t['id_article'].'"><img src=images/'.$t['image'].' alt="image" width="200" height="200" ></a>'; ?><br>
    <?php echo $t['description_article']; ?> <br> <br>
  
    <strong>     nom_article__:  </strong>     <?php echo $t['nom_article'];         ?> <br> 
    <strong>     prix_article_:  </strong>     <?php echo $t['prix_article'];        ?> <br>
    <strong>     categorie____:  </strong>     <?php echo $t['categorie'];           ?> <br>
  </div>
  <p>
  
  <?php

  }

}
?>
</div>
</body>
</html>