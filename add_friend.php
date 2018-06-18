  <?php

  session_start();

  include 'navbar.php';
  include 'db_connect.php';


    if(isset($_POST["username"],$_SESSION["username"])){

    $username_friend = $_POST["username"];
    $username = $_SESSION["username"];

    $verif1 = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS `username` FROM `user` WHERE `username` = :user");
	$verif1->bindParam(':user', $username);
    $verif1->execute();

    $verif2 = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS `username` FROM `user` WHERE `username` = :user_friend");
	$verif2->BindParam(':user_friend', $username_friend);
    $verif2->execute();






    if($verif1 ->rowCount() == 1 && $verif2 ->rowCount() == 1){

    $result = $bdd->prepare('SELECT id FROM user WHERE username = :user');
	$result->bindParam(':user', $username);
    $result->execute();
    $friend1 = $result->fetch();

    $result = $bdd->prepare('SELECT id FROM user WHERE username = :user_friend');
	$result->bindParam(':user_friend', $username_friend);
    $result->execute();
    $friend2 = $result->fetch();

    $test = $bdd->prepare('SELECT id FROM friends WHERE friend1 = :friend1 AND friend2 = :friend2');
	$test->bindParam(':friend1', $friend1['id']);
	$test->bindParam(':friend2', $friend2['id']);
    $test->execute();


    if($test ->rowCount() < 1){


      $ajout = $bdd->prepare("INSERT INTO `friends` (`id`, `friend1`, `friend2`) VALUES (NULL ,:friend1,:friend2)");
	  $ajout->bindParam(':friend1', $friend1['id']);
	  $ajout->bindParam(':friend2', $friend2['id']);
      $ajout->execute();
    }
  }
}
  header("refresh:0;url=friend.php");
  ?>