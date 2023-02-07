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
    <img src="logo.png" style="padding: 1px;width: 150px;">
  </div>

  <div class="main">
    <a href="accueil.php" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href="article.php"  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div>

<br>
<?php
//session handling
session_start();
$usuario=$_SESSION['username'];

if (!isset($usuario)){
  header( "location: index.php" );
}else{
    echo 'connecté :  <strong>'.$usuario  .'</strong>';
    echo "<br><a href='logout.php'> se deconnecter </a> ";
}

?>

<br>
<div class="articles">
<br>

<?php
require 'bdd.php';  

// On récupère tout le contenu de la table 
$reponse = $conn->query('SELECT * FROM article');
// On affiche chaque entrée une à une
$res=0;
while ($donnees = $reponse->fetch())
{

?>

    <div style="margin-left: 10px;">
    <?php echo '<a href="article.php?id='.$donnees['id_article'].'"><img src=images/'.$donnees['image'].' alt="image" width="200" height="200" ></a>'; ?><br>
    <?php echo $donnees['description_article']; ?> <br> <br>

    <strong>     nom_article__:  </strong>     <?php echo $donnees['nom_article'];         ?> <br> 
    <strong>     prix_article_:  </strong>     <?php echo $donnees['prix_article'];        ?> <br>
    <strong>     categorie____:  </strong>     <?php echo $donnees['categorie'];           ?> <br>

    </div>

   <p>

<?php

}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
</div>
</body>
</html>