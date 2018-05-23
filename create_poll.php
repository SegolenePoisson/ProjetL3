<?php
$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

id_poll=rand(10000000, 99999999);
$sql = "SELECT * FROM machin WHERE id=".$id_poll;
$result = $bdd->query($sql);

creatorId = NULL;
while($row = $result->fetch_assoc()) {
      creatorId=$row["id"];
}

while ($result->num_rows > 0) {
	id_poll=rand(10000000, 99999999);
	$sql = "SELECT * FROM machin WHERE id=".$id_poll;
	$result = $bdd->query($sql);
}

$sql = "SELECT id FROM user WHERE username=".$_POST["pseudo"];
$result = $bdd->query($sql);

$sql = INSERT INTO polls(id_poll, creatorId, question) VALUES ([value-1],[value-2],[value-3]);

 $bdd->exec($sql);
 $bdd->close();
?>