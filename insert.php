<?php
require 'bdd.php';

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$pseudo= $_POST['pseudo'];
$email= $_POST['email'];
$pwd= $_POST['pwd'];

/*
echo 'login : ' .$pseudo.'<br>';
echo 'passwd : ' .$pwd.'<br>';
echo 'email : ' .$email.'<br>';
echo 'nom   : ' .$lname.'<br>';
echo 'prenom : ' .$fname.'<br>';
*/

try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname; charset=UTF8", $username, $password);

    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  //$sql = "INSERT INTO `user`(`id_user`, `login`, `password`, `email`, `nom`, `prenom`) VALUES ('2','pepe','passwd1','a@mail.com','nom1','prenom1')";
    $sql = "INSERT INTO user(login, password, email,nom, prenom) VALUES ('$pseudo','$pwd','$email','$lname','$fname')";
    
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "New record created successfully";

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

//$conn = null;





