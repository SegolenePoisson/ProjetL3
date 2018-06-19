<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  $_SESSION["current_page"] = "profile";

  include "header.php";
  echo "<body>";
  include "navbar.php";
  include 'db_connect.php';
?>

<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text text-lighten-2">Woui</h1>
    </div>
  </div>
  <div class="parallax"><img src="img/background1.jpg"></div>
</div>

<?php
  $sql = 'SELECT id FROM user WHERE username=?';
  $result = $bdd->prepare($sql);
  $result->execute([$_SESSION['username']]);
  $creator_Id = $result->fetchColumn();

  $sql = 'SELECT * FROM polls WHERE creatorId=?';
  $result = $bdd->prepare($sql);
  $result->execute([$creator_Id]);
    while ($donnees = $result->fetch()) {
      echo "<div class='poll'>";
    	echo  $donnees["title"];
        // $sql = 'SELECT answers.answer,answers.id FROM answers WHERE  pollid = ?';
        // $res = $bdd->prepare($sql);
        // $res->execute([$donnees["id"]]);
        // echo "<ul>";
        // while ($answers = $res->fetch()) {
        //   echo "<li>".$answers["answer"];
        //   $sql = 'SELECT count(*) as nb FROM votes WHERE answerId = ?';
        //   $count = $bdd->prepare($sql);
        //   $count->execute([$answers["id"]]);
        //   $cpt = $count->fetch();
        //   echo " (".$cpt["nb"].")";
        //   echo "</li>";
        // }
        // echo "</ul>";
    	echo "</div><br/>";
    }
  //echo $creator_Id;
  // echo "<p>";
	// echo   "Ici, sont disponibles les infos de chaque personne";
	// echo "</p>";
?>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
