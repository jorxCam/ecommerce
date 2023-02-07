<?php
require 'bdd.php';


session_start();


//$login= $_POST['login'];
//$pwd= $_POST['pwd'];

$login= $_GET["login"];
$pwd= $_GET["pwd"];

//echo 'login : ' .$login.'<br>';
//echo 'passwd : ' .$pwd.'<br>';


class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {     parent::__construct($it, self::LEAVES_ONLY);   }
  function current() {     return "" . parent::current(). "";   }
  function beginChildren() {     echo "";   }
  function endChildren() {     echo "" . "\n";   }
}

try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname; charset=UTF8", $username, $password);

    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "INSERT INTO `user`(`id_user`, `login`, `password`, `email`, `nom`, `prenom`) VALUES ('2','pepe','passwd1','a@mail.com','nom1','prenom1')";
    //$sql = "INSERT INTO user(login, password, email,nom, prenom) VALUES ('$pseudo','$pwd','$email','$lname','$fname')";
    //$sql = "SELECT * from user where email==$login";
    // use exec() because no results are returned
    //$conn->exec($sql);
    //echo "New record created successfully";


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
        header("Location: accueil.php");
        exit();
    }else{
        //if ($v==)
        echo 'invalid login';
        header("Location: index.php");
        exit();
       
    }


} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

//$conn = null;