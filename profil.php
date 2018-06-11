<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  $_SESSION["current_page"] = "profile";

  include "header.php";
  echo "<body>";
  include "navbar.php";
  include 'db_connect.php';

  $sql = 'SELECT id FROM user WHERE username=?';
  $result = $bdd->prepare($sql);
  $result->execute([$_SESSION['username']]);
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
          $sql = 'SELECT count(*) as nb FROM votes WHERE answerId = ?';
          $count = $bdd->prepare($sql);
          $count->execute([$answers["id"]]);
          $cpt = $count->fetch();
          echo " (".$cpt["nb"].")";
          echo "</li>";
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
