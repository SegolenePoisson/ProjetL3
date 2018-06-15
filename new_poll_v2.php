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
               <div class = "container">
          <br><br>
          <h5 class="header center teal-text text-lighten-2">Nouveau sondage</h5>
          <form method="post" action="create_poll.php">

            <label for="question">Question* : </label>
            <input type="text" name="question" id="question" size="35" placeholder="Ex : What's you favorite color ?" required /><br/>

            <label for="choice1">Answer 1* : </label>
            <input type="text" name="choice1" id="choice1" size="35" placeholder="Ex : Blue." required /><br/>

            <label for="choice2">Answer 2* : </label>
            <input type="text" name="choice2" id="choice2" size="35" placeholder="Ex : Red." required /><br/>

            <label for="choice3">Answer 3 : </label>
            <input type="text" name="choice3" id="choice3" size="35" placeholder="Ex : Green."/><br/>

            <input type="submit" class="waves-effect waves-light btn" value="Create poll" />


          </form>
          <p>* champ requis.<br/></p>
        </div>
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
