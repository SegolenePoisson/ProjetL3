<?php
$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

$id_poll=rand(10000000, 99999999);
$sql = "SELECT * FROM polls WHERE id=".$id_poll;
$result = $bdd->query($sql);

while ($result->num_rows > 0) {
	$id_poll=rand(10000000, 99999999);
	$sql = "SELECT * FROM polls WHERE id=".$id_poll;
	$result = $bdd->query($sql);
}

$creator_Id = NULL;
while($row = $result->fetch_assoc()) {
      $creator_Id=$row["id"];
}

$sql = "SELECT id FROM user WHERE username=".$_POST["pseudo"];
$result = $bdd->query($sql);

$question_poll=$_POST["question"];
$sql = INSERT INTO polls(id, creatorId, question) VALUES ($id_poll, $creator_Id, $question_poll);

$answer1_poll=$_POST["choice1"];
$sql = INSERT INTO answers(pollId, answer) VALUES ($creator_Id, $answer1_poll);

$answer2_poll=$_POST["choice2"];
$sql = INSERT INTO answers(pollId, answer) VALUES ($creator_Id, $answer2_poll);

$answer3_poll=$_POST["choice3"];
$sql = INSERT INTO answers(pollId, answer) VALUES ($creator_Id, $answer3_poll);

 $bdd->exec($sql);
 $bdd->close();
?>