<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- For proper scaling on mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- JQuery form google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- BOOTSTRAP -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Classe css -->
	<link rel="stylesheet" href="class1.css" />

	<title>WOUI</title>
</head>
<body>

  <?php

  include 'navbar.php';
  include 'db_connect.php';

  
  /* Check if user put a name, an email and an username during SignUp */
	if(isset($_POST["name"], $_POST["email"], $_POST["username"])){
		$email = $_POST["email"];
		$username = $_POST["username"];
		$name = $_POST["name"];

    include 'encryption.php';
	
	/* Check if username isn't use */
    $password = encrypt($_POST["password"]);
		$verif = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS `username` FROM `user` WHERE `username` = ?");
		$verif->execute([$username]);

		
		if($verif ->rowCount() == 0){
			$ajout = $bdd->prepare("INSERT INTO `user` (`id`, `username`, `name`, `password`, `email`) VALUES (NULL ,?,?,?,?)");
			$ajout->execute([$username ,$name, $password ,$email]);
		}
	}

  ?>
  <h1>Bienvenue sur WOUI<br> votre sondage personnalisé</h1>
  <p>Votre compte a été créé avec succès.</p>
  <?php header("refresh:5;url=login.php");?> 
</body>
</html>
