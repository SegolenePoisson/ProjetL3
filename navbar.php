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
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li <?php if ($_SESSION["current_page"] == "home"){ echo 'class="active"';}?> ><a href="index.php">Home</a></li>
        <li <?php if ($_SESSION["current_page"] == "poll"){ echo 'class="active"';}?> ><a href="POLL.php">StrawPoll</a></li>
        <li <?php if ($_SESSION["current_page"] == "about"){ echo 'class="active"';}?> ><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <!---------- GESTION LOG IN / LOG OUT / SIGN UP ----------->
        <li>
  	      <a <?php
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && isset($_SESSION['pseudo'])) {
            echo 'href="profil.php" >';
            echo '<span class="glyphicon glyphicon-user"></span>';
            echo $_SESSION['pseudo'];
          }
          else {
            echo'href="SignUp.php">';
            echo '<span class="glyphicon glyphicon-user"></span>';
            echo 'Sign Up' ;
          }
          ?>
          </a>
        </li> 

        <li>
          <a href="logIn.php"><?php
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && isset($_SESSION['pseudo'])) {
            echo '<span class="glyphicon glyphicon-log-out"></span> Log Out';
          }
          else {
            echo '<span class="glyphicon glyphicon-log-in">  </span> Log in';
          }
          ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</body>
</html>
