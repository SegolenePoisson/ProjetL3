  <?php

  session_start();

  include 'navbar.php';
  include 'db_connect.php';


    if(isset($_POST["username"],$_SESSION["username"])){

    $username_friend = $_POST["username"];
    $username = $_SESSION["username"];

    $verif1 = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS `username` FROM `user` WHERE `username` = ?");
    $verif1->execute([$username]);

    $verif2 = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS `username` FROM `user` WHERE `username` = ?");
    $verif2->execute([$username_friend]);






echo'test1';
    if($verif1 ->rowCount() == 1 && $verif2 ->rowCount() == 1){

echo'test2';
    $result = $bdd->prepare('SELECT id FROM user WHERE username = ?');
    $result->execute([$username]);
    $friend1 = $result->fetch();

    $result = $bdd->prepare('SELECT id FROM user WHERE username = ?');
    $result->execute([$username_friend]);
    $friend2 = $result->fetch();


      $ajout = $bdd->prepare("INSERT INTO `friends` (`id`, `friend1`, `friend2`) VALUES (NULL ,?,?)");
      $ajout->execute([$friend1['id'] ,$friend2['id']]);
    }
  }

  ?>

  <?php header("url=friend.php");?> 