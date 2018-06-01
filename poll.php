<?php
session_start();
$_SESSION["current_page"] = "poll";
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
  ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="poll">
      <?php
        if(isset($_GET['id'])) {
          include 'db_connect.php';
          echo '<form action="add_vote.php" method = "post">';

          $sql = 'SELECT * FROM polls WHERE polls.id =?';
          $reponse = $bdd->prepare($sql);
          $reponse->execute([$_GET['id']]);
          $donnees = $reponse->fetch();
          if ( $reponse->rowCount()>0){

            echo '<div class="question">'.'Question : '. $donnees['question'] .'</div>'.'<br>';


            $sql ='SELECT * FROM answers WHERE answers.pollId =?';
            $reponse = $bdd->prepare($sql);
            $reponse->execute([$_GET['id']]);
            $nb = 1;
            while ($donnees = $reponse->fetch()) {
              echo '<input type="checkbox" name = "selected[]" value = "'.$donnees['id'].'"/>'. $donnees['answer'] .'<br>';
              $nb++;
            }
            echo "<input type='submit' name = 'submit' value='Submit'/>";
            echo "</form>";
          }else{
            echo "This poll doesn't exist, please check the provided Id.";
          }
        }
      ?>



    </div>
  </div>
</div>

</body>
</html>
