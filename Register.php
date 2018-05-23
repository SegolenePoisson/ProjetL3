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
  $bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', 'root');

  if(isset($_POST["name"], $_POST["password"], $_POST["username"], $_POST["email"], $_POST["confirm"]) && $_POST["password"] == $_POST["confirm"])
  {     
  	$email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

  	$result_register = $bdd->exec('SELECT username FROM `user` WHERE username = "'.$username.'"');

  	if($result_register){
  		echo "Erreur pseudo déjà utilisé";
  	}
  	else {
  		$bdd->exec('INSERT INTO `user` (username, password, email) VALUES ("'.$username. '","' .$password. '","' .$email.'")') OR die(print_r($bdd->errorInfo()));
  	}
  }

  ?>
  <h1>Bienvenue sur WOUI<br> votre sondage personnalisé</h1>
  <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
</body>
</html>

