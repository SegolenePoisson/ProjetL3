<?php
  //  echo $_POST["module1"];
  include 'db_connect.php';
  session_start();
  $mod = unserialize(base64_decode($_POST["modules"]));
if(isset($_SESSION["username"])){
echo "module# : type : Data <br>";

$idUser=null;
$sql = 'SELECT id FROM user WHERE username=?';
$result = $bdd->prepare($sql);
$result->execute([$_SESSION['username']]);
while($row = $result->fetchColumn()) {
  $idUser=$row;
}

  foreach ($mod as $key => &$value) {
    $answer = $_POST["module".$key];

      echo $key." : ".$value." : ";
      switch($value){
        case "text":
        echo $_POST["module".$key];

        $sql = "INSERT INTO answers (moduleId, data) VALUES (?,?)";
        $result = $bdd->prepare($sql);
        $result->execute([(int)$idUser,$_POST["module".$key]]);

        $sql = 'SELECT id FROM answers WHERE data=?';
        $result = $bdd->prepare($sql);
        $result->execute([$_POST["module".$key]]);
        while($row = $result->fetchColumn()) {
          echo $row;
          $textId=$row;
        }

        $sql = "INSERT INTO votes (userID, answerId) VALUES (?,?)";
        $result = $bdd->prepare($sql);
        $result->execute([$idUser,$textId]);

        break;
        case "check":
        case "radio":
        $N = count($answer);
        for($i=0; $i < $N; $i++){
          echo $answer[$i]." ";
          $sql = "INSERT INTO votes (userID, answerId) VALUES (?,?)";
          $result = $bdd->prepare($sql);
          $result->execute([$idUser,$answer[$i]]);
        }
        break;
        default :
        //TODO check timepicker
        echo "default<br>";
        break;
      }
      echo "<br>";
  }
  $sql = "INSERT INTO avote (userId, pollId) VALUES (?,?)";
  $result = $bdd->prepare($sql);
  $result->execute([$idUser,$_POST["pollid"]]);

}
?>
