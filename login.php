<?php
require 'bdd.php';


session_start();
$panier=array();;


$login= $_POST["login"];
$pwd= $_POST["pwd"];



class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {     parent::__construct($it, self::LEAVES_ONLY);   }
  function current() {     return "" . parent::current(). "";   }
  function beginChildren() {     echo "";   }
  function endChildren() {     echo "" . "\n";   }
}

try {

    //$stmt = $conn->prepare("SELECT * FROM user  ");
    $stmt = $conn->prepare("SELECT login FROM user WHERE email = '$login' and password ='$pwd' ");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $v='';
    //$pseudo='';
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
      //echo $v;
      
    }
    $pseudo=$v;
    //echo $v;

    if ($v==true){
        //echo ' bienvenue ' ;
        $_SESSION['username']= $pseudo;
        $_SESSION['panier']= $panier;
        header("Location: accueil.php");
        exit();
    }else{
        //if ($v==)
        echo 'invalid login';
        header("Location: index.php");
        exit();
       
    }


} catch(PDOException $e) {
    echo $conn . "<br>erreur conection bdd <br>" . $e->getMessage();
}

//$conn = null;