<?php
session_start();
?>
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
    <div class="row main">
      <div class="panel-heading">
        <div class="panel-title text-center">
          <h1 class="title">Account WOUI</h1>
          <hr />
        </div>
      </div> 
      <div class="main-login main-center">
        <form class="form-horizontal" method="post" action="Register.php">
          
          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Your Name</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your Name"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Your Email</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span id="checkemail" class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                <input type="email" class="form-control" name="email" id="email" required placeholder="Enter your Email"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="username" class="cols-sm-2 control-label">Username</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="username" id="username" required placeholder="Enter your Username"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="cols-sm-2 control-label">Password</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password" id="password" required placeholder="Enter your Password"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span id="confirmpassword" class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="confirm" id="confirm" required placeholder="Confirm your Password"/>
              </div>
            </div>
          </div>

          <br>

          <div class="form-group ">
            <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register"></input>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
    // Contrôle du courriel en fin de saisie
document.getElementById("email").addEventListener("blur", function (e) {
    // Correspond à une chaîne de la forme xxx@yyy.zzz
    var regexEmail = /.+@.+\..+/;
    var validEmail = "";
    if (!regexEmail.test(e.target.value)) {
        validEmail = "Invalid email address";
    }
    document.getElementById("checkemail").textContent = validEmail;
});
document.getElementById("confirm").addEventListener("blur", function (e) {
    var samepasswords = "";
    if(e.target.value !== document.querySelector("form").password.value){
      samePasswords = "Not the same passwords"
    }
    document.getElementById("confirmpassword").textContent = samePasswords;
});
document.querySelector("form").addEventListener("submit", function (e) {
  if(document.getElementById("confirmpassword").textContent !== document.getElementById("checkemail").textContent){
    e.preventDefault();
  }
});
  </script>
  <p>Already an account ? <a href="logIn.php">Log in !</a></p>
</body>
</html>
