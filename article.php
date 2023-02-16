<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-commerce</title>

    <link rel="stylesheet" href="style.css" type='text/css'>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

  <!-- navbar -->
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

   <div class="right">
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
  </div>
  </div>

    <!-- Code -->

    <br>
<?php

$panierarray=$_SESSION['panier'];
$total=$_SESSION['total'];

if (!isset($usuario)){
  header( "location: index.php" );
}else{

echo '<p>panier : ';
//recorre el array de strings con el id del articulo
    foreach( $panierarray as $p){
      //var_dump( $p );
      //die;
      if ($p!=NULL){
        echo '<br><a href="article.php?id='.$p.'">  article '.$p.'</a>';
      
      }
    }
    echo '<p class="text-right">Total: <span id=> '.$total.'  </span>&euro;</p>';

    //var_dump($total);die;
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

    <div style="margin-left: 10px;margin-top: 10px;">
    <?php echo '<img src=images/'.$donnees['image'].' alt="image" width="200" height="200" >'; ?><br>
    <?php echo $donnees['description_article']; ?> <br> <br>


    </div>
    <div class="text-description" style="margin-left: 10px;">
    <div id="texto"> <strong>    Id article    :  </strong>     <?php echo $donnees['id_article'];          ?></div> <br>
    <div id="texto"> <strong>     Nom article  :  </strong>     <?php echo $donnees['nom_article'];         ?></div> <br> 
    <div id="texto"> <strong>    Prix article  :  </strong>     <?php echo $donnees['prix_article'];        ?></div> <br>
    
    <div id="texto"> <strong>     Categorie    :  </strong>     <?php echo $donnees['categorie'];           ?></div> <br>
    <div id="texto"> <strong>     Annee        :  </strong>     <?php echo $donnees['annee'];               ?></div> <br> 
    <div id="texto"> <strong>     Stockage     :  </strong>     <?php echo $donnees['stockage'];            ?></div> <br>
    <div id="texto"> <strong>     Disponible   :  </strong>     <?php echo $donnees['disponible'];          ?></div> <br>
    </div>
   <p>

<?php
$artajouter=$donnees['id_article'];
$prixajouter=$donnees['prix_article'];


}
$reponse->closeCursor(); // Termine le traitement de la requête

?>



</div>

<br>
<div class="buttons">
  <form action="ajouter.php" method="post" id="myForm">
    <input type="hidden" id="ajouter" name="ajouter" value=<?php echo $artajouter; ?> >
    <input type="hidden" id="prix" name="prix" value=<?php echo $prixajouter; ?> >
  </form>

  <div class="submit">
    <input type="button" value="ajouter" style="width:90px; margin-right: 20px;">
  </div>

  <form action="retirer.php" method="post" id="myForm2">
    <input type="hidden" id="retirer" name="retirer" value=<?php echo $artajouter; ?> >
    <input type="hidden" id="prix" name="prix" value=<?php echo $prixajouter; ?> >
  </form>

  <div class="submit2">
    <input type="button" value="retirer" style="width:90px; margin-right: 20px;">
  </div>
</div>

<script>
const myForm = document.getElementById("myForm");
document.querySelector(".submit").addEventListener("click", function(){
  myForm.submit();
});
</script>

<script>
  const myForm2 = document.getElementById("myForm2");
document.querySelector(".submit2").addEventListener("click", function(){
  myForm2.submit();
});
</script>

</body>
</html>