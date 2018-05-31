
<?php
  session_start();
  include 'db_connect.php';

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
      //Verification du double vote (pour chaque option cochée)
      $sql = "SELECT * FROM votes WHERE userID = ? AND answerId = ?"
      $result = $bdd->prepare($sql);
      $result->execute([$idUser,$answers[$i]]);

      if ($result->rowCount() == 0){
        $sql = "INSERT INTO votes (userID, answerId) VALUES (?,?)";
        $result = $bdd->prepare($sql);
        $result->execute([$idUser,$answers[$i]]);
      }
    }

    echo("Your vote have been submited.");
  }
?>
