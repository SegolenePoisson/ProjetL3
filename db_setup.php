<?php

$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');
$sql = "CREATE TABLE random (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(30) NOT NULL,
   lastname VARCHAR(30) NOT NULL,
   email VARCHAR(50),
   reg_date TIMESTAMP
   )";

   // use exec() because no results are returned
   $bdd->exec($sql);
?>
