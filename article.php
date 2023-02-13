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
</div>

    <!-- Code -->

    <br>
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

    //print_r($panierarray);
    /*
    echo '<br>panier : ';
    for ($x=0;$x<count($panierarray); $x++) { 
      echo '<br> article '.$panierarray[$x];
     }
*/


echo '<br>panier : ';
    foreach( $panierarray as $p){
      //var_dump( $p );
      if ($p!=NULL){
        echo '<br><a href="article.php?id='.$p.'">  article '.$p.'</a>';
      }
    }
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
    <strong>    id_article____:  </strong>     <?php echo $donnees['id_article'];          ?> <br>
    <strong>     nom_article__:  </strong>     <?php echo $donnees['nom_article'];         ?> <br> 
    <strong>    prix_article__:  </strong>     <?php echo $donnees['prix_article'];        ?> <br>
    
    <strong>     categorie____:  </strong>     <?php echo $donnees['categorie'];           ?> <br>
    <strong>     annee________:  </strong>     <?php echo $donnees['annee'];               ?> <br> 
    <strong>     stockage_____:  </strong>     <?php echo $donnees['stockage'];            ?> <br>
    <strong>     disponible___:  </strong>     <?php echo $donnees['disponible'];          ?> <br>
    </div>
   <p>

   

<?php
$artajouter=$donnees['id_article'];

}
$reponse->closeCursor(); // Termine le traitement de la requête

?>
</div>





<form action="ajouter.php" method="post" id="myForm">
<input type="hidden" id="ajouter" name="ajouter" value=<?php echo $artajouter; ?> >
</form>
<div class="submit">
<input type="button" value="ajouter">
</div>
<p>
<form action="retirer.php" method="post" id="myForm2">
<input type="hidden" id="retirer" name="retirer" value=<?php echo $artajouter; ?> >
</form>
<div class="submit2">
<input type="button" value="retirer">
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