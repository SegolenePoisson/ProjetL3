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
  ?>

<div class="container">
  <div class="row justify-content-md-center">
 
       <?php
       if(isset($_GET['id'])) {
       $bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');
       echo '<form action="/action_page.php">';
       $reponse = $bdd->query('SELECT * FROM polls WHERE polls.id =' . $_GET['id']);
       $donnees = $reponse->fetch();
       echo 'Question :'. $donnees['question'] .'<br>';

          
          
            $reponse = $bdd->query('SELECT * FROM answers WHERE answers.pollId =' . $_GET['id']);
            while ($donnees = $reponse->fetch()) {

              echo '<input type="checkbox">'. $donnees['answer'] .'<br>';
            } 
          }
        ?>
        <input type="submit" value="Submit">
      </form>

      
    </div>
  </div>

</body>
</html>
