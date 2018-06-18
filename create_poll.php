<?php
session_start();
include 'db_connect.php';

$id_poll = uniqid('');
$creator_Id = NULL;

$sql = 'SELECT id FROM user WHERE username=:user';
$result = $bdd->prepare($sql);

$result->bindParam(':user', $_SESSION['username']);
$result->execute();

while($row = $result->fetchColumn()) {
  $creator_Id=$row;
}

$sql = 'INSERT INTO polls(id, creatorId, question) VALUES (:id_poll, :creator_id, :question)';

$result = $bdd->prepare($sql);
$result->bindParam(':id_poll', $id_poll);
$result->bindParam(':creator_id', $creator_Id);
$result->bindParam(':question', $_POST['question']);
$result->execute();


$sql = 'INSERT INTO answers(pollId, answer) VALUES (:poll, :choix)';

$result = $bdd->prepare($sql);
$result->bindParam(':poll', $id_poll);
$result->bindParam(':choix', $_POST['choice1']);
$result->execute();


$sql = 'INSERT INTO answers(pollId, answer) VALUES (:poll, :choix)';

$result = $bdd->prepare($sql);
$result->bindParam(':poll', $id_poll);
$result->bindParam(':choix', $_POST['choice2']);
$result->execute();


if(isset($_POST['choice3']) && $_POST['choice3'] <> "") {
	
  $sql = 'INSERT INTO answers(pollId, answer) VALUES (:poll, :choix)';
  
  $result = $bdd->prepare($sql);
  $result->bindParam(':poll', $id_poll);
  $result->bindParam(':choix', $_POST['choice3']);
  $result->execute();
}

	// Redirection direct après création du poll Vers la page de vote

  header('Location: poll.php?id='.$id_poll);
  exit();

?>
