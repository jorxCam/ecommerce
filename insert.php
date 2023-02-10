<?php
require 'bdd.php';

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$pseudo= $_POST['pseudo'];
$email= $_POST['email'];
$pwd= $_POST['pwd'];

try {

    $sql = "INSERT INTO user(login, password, email,nom, prenom) VALUES ('$pseudo','$pwd','$email','$lname','$fname')";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "New record created successfully";

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}






