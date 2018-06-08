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
  <style>
  label{
    color: white;
  }
  form{
    width: 50%; /* On a indiqué une largeur (obligatoire) */
    margin: auto;
    padding-top: 50px;
    text-align: center;
    line-height: 1.5;
  }
  p{
    font-size: 12px;
  }
  ;
  </style>
  <title>WOUI</title>
</head>


<?php
if(isset($_SESSION["pseudo"])){

  echo "<body>";


  include 'navbar.php';
  ?>
  
  <h1>New poll</h1>
  <form method="post" action="create_poll.php">

    <label for="question">Question* : </label>
    <input type="text" name="question" id="question" size="35" placeholder="Ex : What's you favorite color ?" required /><br/>

    <label for="choice1">Answer 1* : </label>
    <input type="text" name="choice1" id="choice1" size="35" placeholder="Ex : Blue." required /><br/>

    <label for="choice2">Answer 2* : </label>
    <input type="text" name="choice2" id="choice2" size="35" placeholder="Ex : Red." required /><br/>

    <label for="choice3">Answer 3 : </label>
    <input type="text" name="choice3" id="choice3" size="35" placeholder="Ex : Green."/><br/>

    <input type="submit" value="Create poll" />


  </form>
  <p>* this field is required.<br/></p>
</body>
</html>

<?php
}
else{
  echo "<body>";
  include 'navbar.php';
  ?>

  <h1>New poll</h1>
  <p>To create a new poll, please <a href="logIn.php">log in</a>. If you don't have an account, you can <a href="SignUp.php">create one</a> !<br/></p>
</body>
</html>
<?php
}
?>
