<?php
  session_start();
  $bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

  $answers = $_POST['selected'];
  if(empty($answers)){
    echo("You didn't select any choice.");
  }else{
    $idUser=null;
    $sql = 'SELECT id FROM user WHERE username=?';
    $result = $bdd->prepare($sql);
    $result->execute([$_SESSION['pseudo']]);
    while($row = $result->fetchColumn()) {
      $idUser=$row;
    }

    $N = count($answers);
       for($i=0; $i < $N; $i++){
         $sql = "INSERT INTO votes (userID, answerId) VALUES (?,?)";
         $result = $bdd->prepare($sql);
         $result->execute([$idUser,$answers[$i]]);
       }

    echo("Your vote have been submited.");



  }


















?>
