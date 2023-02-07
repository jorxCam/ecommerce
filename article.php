<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>e-commerce</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" type='text/css'>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

  <!-- navbar -->
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

    <!-- Code -->

    <?php

session_start();
$usuario=$_SESSION['username'];


if (!isset($usuario)){
  header( "location: index.php" );
}else{
    echo "bienvenue  <h2>".$usuario  ."</h2>";
    echo "<a href='logout.php'> se deconnecter </a> ";
}

?>
<br>
<div class="articles">
<br>
<?php
require 'bdd.php';  


if (!$_GET["id"] ){
    header("location: liste.php");
}else{
    $id= $_GET["id"];
}

// On récupère tout le contenu de la table   echo $donnees['id_article'];          
$reponse = $conn->query("SELECT * FROM article where id_article='$id' ");
// On affiche chaque entrée une à une
$res=0;
while ($donnees = $reponse->fetch())
{

?>

    <div style="margin-left: 10px;">
    <?php echo '<img src=images/'.$donnees['image'].' alt="image" width="200" height="200" >'; ?><br>
    <?php echo $donnees['description_article']; ?> <br> <br>


    </div>
    <div style="margin-left: 10px;">
    <strong>     id_article___:  </strong>     <?php echo $donnees['id_article'];          ?> <br>
    <strong>     nom_article__:  </strong>     <?php echo $donnees['nom_article'];         ?> <br> 
    <strong>     prix_article_:  </strong>     <?php echo $donnees['prix_article'];        ?> <br>
    
    <strong>     categorie____:  </strong>     <?php echo $donnees['categorie'];           ?> <br>
    <strong>     annee________:  </strong>     <?php echo $donnees['annee'];               ?> <br> 
    <strong>     stockage_____:  </strong>     <?php echo $donnees['stockage'];            ?> <br>
    <strong>     disponible___:  </strong>     <?php echo $donnees['disponible'];          ?> <br>
    </div>
   <p>

<?php

}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
</div>

<input type="button" value="ajouter"> 
<input type="button" value="retirer">
</body>
</html>