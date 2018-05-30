<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

$id_poll=rand(10000000, 99999999);
echo $id_poll;
$sql = 'SELECT * FROM polls WHERE id=?';
$result = $bdd->prepare($sql);
$result->execute([$id_poll]);

while ($result->rowCount() > 0) {
  $id_poll=rand(10000000, 99999999);
  echo $id_poll;
  $sql = 'SELECT * FROM polls WHERE id=?';
  $result = $bdd->prepare($sql);
  $result->execute([$id_poll]);
}

$creator_Id = NULL;

while($row = $result->fetchColumn()) {
  $creator_Id=$row['id'];
}

$sql = 'SELECT id FROM user WHERE username=?';
$result = $bdd->prepare($sql);
$result->execute([$_SESSION['pseudo']]);
while($row = $result->fetchColumn()) {
  $creator_Id=$row;
}

$sql = 'INSERT INTO polls(id, creatorId, question) VALUES (?, ?, ?)';
$result = $bdd->prepare($sql);
$result->execute([$id_poll, $creator_Id, $_POST['question']]);


$sql = 'INSERT INTO answers(pollId, answer) VALUES (?, ?)';
$result = $bdd->prepare($sql);
$result->execute([$id_poll, $_POST['choice1']]);

$sql = 'INSERT INTO answers(pollId, answer) VALUES (?, ?)';
$result = $bdd->prepare($sql);
$result->execute([$id_poll, $_POST['choice2']]);

if(isset($_POST['choice3'])) {
  $sql = 'INSERT INTO answers(pollId, answer) VALUES (?, ?)';
  $result = $bdd->prepare($sql);
  $result->execute([$id_poll, $_POST['choice3']]);
}

?>
