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
      <br><br>
      <h5 class="header center teal-text text-lighten-2">Nouveau sondage</h5>
      <div class="input-field inline">
        <input id="title" type="text" class="validate" placeholder="Title">
      </div>

        <div class = "row">
            <div id = "left_area" class="col s2">
              <div id = "list_area">
                <div class="divider"></div>
                <div class="section">
                  <p>question1</p><br>
                  <input type="button" class="waves-effect waves-light btn" value="Delete" />
                </div>
                <div class="divider"></div>
                  <div class="section">
                  <p>question2</p><br>
                  <input type="button" class="waves-effect waves-light btn" value="Delete" />
                </div>
                <div class="divider"></div>
              </div>
              <div id = "cmd_area">
                <input type="button" class="waves-effect waves-light btn" value="Add question" /><br>
                <input type="button" class="waves-effect waves-light btn" value="Preview" /><br>
                <input type="button" class="waves-effect waves-light btn" value="Create poll" />
              </div>
            </div>
            <div id = "main_area">
              <div id = "option_area" class="col s3">
                <h5>Options</h5>
                <p>truc</p>
              </div>
              <div id = "right_area" class="col s7">
                <h5>Question</h5>
                <p>truc</p>
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
