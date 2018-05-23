<?php
$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

$id_poll=rand(10000000, 99999999);
$sql = 'SELECT * FROM polls WHERE id='.$id_poll;
$result = $bdd->query($sql);

while ($result->rowCount() > 0) {
	$id_poll=rand(10000000, 99999999);
	$sql = 'SELECT * FROM polls WHERE id='.$id_poll;
	$result = $bdd->query($sql);
}

$creator_Id = NULL;
while($row = $result->fetchColumn()) {
      $creator_Id=$row['id'];
}

$sql = 'SELECT id FROM user WHERE username='.$_SESSION['pseudo'];
$result = $bdd->query($sql);

$sql = 'INSERT INTO polls(id, creatorId, question) VALUES ('.$id_poll.', '.$creator_Id.', '.$_POST['question'].')';
$bdd->exec($sql);

$sql = 'INSERT INTO answers(pollId, answer) VALUES ('.$creator_Id.', '.$_POST['choice1'].')';
$bdd->exec($sql);

$sql = 'INSERT INTO answers(pollId, answer) VALUES ('.$creator_Id.', '.$_POST['choice2'].')';
$bdd->exec($sql);

if(isset($_POST['choice3']){
	$sql = 'INSERT INTO answers(pollId, answer) VALUES ('.$creator_Id.', '.$_POST['choice3'].')';
	$bdd->exec($sql);
}

?>