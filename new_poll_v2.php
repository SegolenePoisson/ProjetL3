<?php
session_start();
$_SESSION["current_page"] = "poll";
?>
<!DOCTYPE html>
<html lang="en">


<?php
include 'header.php';
echo "<body>";
include 'navbar.php';
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

<div class="container">
  <div class = "customcont">
    <br><br>
    <div class="row center">
      <?php
      if(isset($_SESSION["username"])){
        ?>


        <div class = "container">
          <br><br>
          <h5 class="header center teal-text text-lighten-2">Nouveau sondage</h5>
          
            <div id= "left_area">
              
            </div>
            <div id = "main_area">
              <div id = "option_area">
                
              </div>
              <div id = "right_area">
                
              </div>
            </div>

        </div>

      <?php
    }
    else{
      ?>

      <h5 class="header center teal-text text-lighten-2">Nouveau sondage</h5>
      <p>Pour créer un sondage, <a href="logIn.php" class="waves-effect waves-light btn">Connectez vous</a>
        Pas de compte ? <a href="SignUp.php" class="waves-effect waves-light btn">inscrivez vous</a><br/></p>
      </div>
      <br><br>
    </div>
  </div>



<?php
}
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>
</html>
