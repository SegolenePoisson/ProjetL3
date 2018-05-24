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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- Classe css -->
	<link rel="stylesheet" href="class1.css" />
	<title>WOUI</title>
</head>
<body>
  <?php
  include 'navbar.php';
  ?>

  <div class="container" >
    <div class="row" id="pwd-container">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <section class="login-form">
          <form method="post" action="index.php" role="login">
            <input type="text" name="pseudo" required class="form-control input-lg" name="Email" placeholder="Email Address" 
  required="" />
            <br>
            <input type="password" class="form-control input-lg" name="password" placeholder="Password" 
  required="" />
            <div class="pwstrength_viewport_progress"></div>
            <br>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
          </form>
        </section>  
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
  <p>No account yet ? <a href="SignUp.php">Sign up !</a>
</body>
</html>