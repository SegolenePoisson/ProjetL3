<?php
session_start();
$_SESSION["current_page"] = "profile";
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
  $sql = 'SELECT id FROM user WHERE username=?';
  $result = $bdd->prepare($sql);
  $result->execute([$_SESSION['pseudo']]);
  $creator_Id = $result->fetchColumn();

  $sql = 'SELECT * FROM polls WHERE creatorId=?';
  $result = $bdd->prepare($sql);
  $result->execute([$creator_Id]);
    while ($donnees = $result->fetch()) {
      echo "<div class='poll'>";
    	echo  $donnees["question"];
        $sql = 'SELECT answers.answer,answers.id FROM answers WHERE  pollid = ?';
        $res = $bdd->prepare($sql);
        $res->execute([$donnees["id"]]);
        echo "<ul>";
        while ($answers = $res->fetch()) {
          echo "<li>".$answers["answer"];

          echo"</li>";
        }
        echo "</ul>";
    	echo "</div><br/>";
    }
  //echo $creator_Id;
  echo "<p>";
	echo   "Ici, sont disponibles les infos de chaque personne";
	echo "</p>";
  ?>

</body>
</html>
