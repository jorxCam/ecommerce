<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname; charset=UTF8", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$sql = "INSERT INTO `user`(`id_user`, `login`, `password`, `email`, `nom`, `prenom`) VALUES ('2','pepe','passwd1','a@mail.com','nom1','prenom1')";
        
        // use exec() because no results are returned
        //$conn->exec($sql);
        //echo "New record created successfully";

    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

//$conn = null;
?>