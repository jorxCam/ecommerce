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
    <a href="" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href=""  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div>

<br>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

try

{
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}      

// On récupère tout le contenu de la table 
$reponse = $conn->query('SELECT * FROM article');
// On affiche chaque entrée une à une
$res=0;
while ($donnees = $reponse->fetch())
{

?>
    <strong>     image </strong> :    <?php echo '<img src=images/'.$donnees['image'].' width="100" height="100" >'; ?>
    <strong>    id_article </strong> :      <?php echo $donnees['id_article']; ?><br>
    <strong>     nom_article  </strong> :     <?php echo $donnees['nom_article']; ?>,<br> 
    <strong>     prix_article   </strong> :    <?php echo $donnees['prix_article']; ?> <br>
    <strong>     description_article  </strong> :    <?php echo $donnees['description_article']; ?> <br> 
    <strong>     categorie   </strong> :    <?php echo $donnees['categorie']; ?>  <br>
    <strong>     annee  </strong> :    <?php echo $donnees['annee']; ?> <br> 
    <strong>     stockage  </strong> :    <?php echo $donnees['stockage']; ?> <br>
    <strong>     disponible </strong> :    <?php echo $donnees['disponible']; ?><br>
    

   </p>

<?php

}
$reponse->closeCursor(); // Termine le traitement de la requête
?>

</body>
</html>