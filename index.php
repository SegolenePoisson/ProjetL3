<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'db_connect.php';


if(isset($_POST["username"], $_POST["password"]))
{
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = $bdd->prepare('SELECT username, password FROM user WHERE username = ?');
  $result->execute([$username]);

  if ($result->rowCount() > 0)
  {

    include 'encryption.php';
    $data = $result->fetch();

    if(check($data['password'], $password)) {
      $_SESSION["logged_in"] = true;
      $_SESSION["username"] = $username;
    }
  }
}

echo'<head>
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">';

  include 'header.php';

echo '</head>';


include "navbar.php";
?>

<body style = "background-color: #e3f2fd;">
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text text-lighten-1" style="font-family: 'Galada', cursive;">LP Surveys</h1>
      <div class="row center">
        <h5 class="header col s12 light"Une approche personalisée pour répondre à vos questions.</h5>
        </div>
        <div class="row center">
          <a href="SignUp.php" id="create_button" class="btn-large waves-effect waves-light teal lighten-1">Create Account</a>
        </div>
        <br><br>

      </div>
    </div>
    
  </div>


  <div class="container">
    <div class = "customcont">
      <div class="section">

        <!--   Icon Section   -->
        <div class="row">


          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">edit</i></h2>
              <h5 class="center">Personalized Surveys</h5>

              <p class="center light"> We provide, easy to set up, highly customizable surveys to suit 

              Nous mettons à votre disposition un outill modulaire de création de sondage à questions multiple. Choisissez entre les différents types de questions et les modes de votes pour concocter le sondage parfait.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
              <h5 class="center">Fast and Easy</h5>

              <p class="center light">Need a quick and easy way to organise an event ? 
               This tool is perfect for you !</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
              <h5 class="center">Export des resultats</h5>

              <p class="center light">Une fois votre enquête finie, nous vous proposons la possibilité d'exporter les résultats pour une meilleure présentation.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="page-footer teal lighten-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About</h5>
          <p class="grey-text text-lighten-4"> Luc Powell</p>

          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <!--    Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>-->
        </div>
      </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
  </html>
