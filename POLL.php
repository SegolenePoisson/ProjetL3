<?php
session_start();
?>
<?php 
$_SESSION["current_page"] = "poll"
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
    <form method="post" action="create_poll.php">
 
      <fieldset>
       <legend>Nouveau sondage</legend> <!-- Titre du fieldset -->

       <label for="question">Question : </label>
       <input type="text" name="question" id="question" placeholder="Ex : Où voulez vous manger demain soir ?" /><br/>

       <label for="choice1">Réponse 1 : </label>
       <input type="text" name="choice1" id="choice1" placeholder="Ex : Au restaurant." required /><br/>
 
       <label for="choice2">Réponse 2 : </label>
       <input type="text" name="choice2" id="choice2" placeholder="Ex : A la maison." required /><br/>

       <label for="choice3">Réponse 3 (champ facultatif) : </label>
       <input type="text" name="choice3" id="choice3" placeholder="Ex : Chez mamie." required /><br/>

      </fieldset>
      <input type="submit" value="Envoyer" />
    </form>
    <style>
      label, legend
      {
        color: white;
      }

    </style>
  </body>
</html>
