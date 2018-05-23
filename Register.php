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
<<<<<<< HEAD
  
$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', 'root');
=======
$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');
>>>>>>> 43fecf7d574f3b8e4e8551bb961bc97a3080b131

if(isset($_POST["name"], $_POST["password"], $_POST["pseudo"], $_POST["email"], $_POST["confirm"]) && $_POST["password"] == $_POST["confirm"])
{     
		$email = $_POST["email"];
        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];

<<<<<<< HEAD
	$result_register = $bdd->mysql_query("SELECT username FROM `poll`.`user` WHERE username = '.$pseudo.' ");
=======
	$result_register = $bdd->query('SELECT username FROM `poll`.`user` WHERE username = `$pseudo` ');
>>>>>>> 43fecf7d574f3b8e4e8551bb961bc97a3080b131

	if($result_register->rowCount() > 0 ){
		echo "Erreur pseudo déjà utilisé";
	}
	else {
<<<<<<< HEAD
		$bdd->exec("INSERT INTO `poll`.`user` (username, password, email) VALUES ('.$pseudo. ',' .$password. ',' .$email.')") OR die(mysql_error());
=======
		$bdd->query('INSERT INTO `poll`.`user` (username, password, email) VALUES (`$pseudo`, `$password`, `$email`)');
>>>>>>> 43fecf7d574f3b8e4e8551bb961bc97a3080b131
	}
}

?>
           <h1> Bienvenue sur WOUI<br/> votre sondage personnalisé
           </h1>
             <form>
               <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
             </form>;
	</body>
</html>

