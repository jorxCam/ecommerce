<?php
require 'bdd.php';

session_start();
$panier=array();
$total=0;


$login= $_POST["login"];
$pass= $_POST["pwd"];
$pseudo='';

//$pwd=password_hash($pass, PASSWORD_DEFAULT);
$contrasenapost = $_POST['pwd'] ?: '';    

//Sentencia SQL
$stmt = $conn->prepare("SELECT * FROM user WHERE email = '$login'");
$stmt->execute();  


// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$v='';
//$pseudo='';
foreach(($stmt->fetchAll()) as $k=>$v) {
  $contrasenaDB=$v['password'];
  $pseudo=$v['login'];
  
}

if (password_verify($contrasenapost,$contrasenaDB)) {
  $_SESSION['username']= $pseudo;
  $_SESSION['panier']= $panier;
  $_SESSION['total']=$total;
  header("Location: accueil.php");
  exit();   
} else { 
  echo 'invalid login';
  header("Location: index.php");
  exit();
}
