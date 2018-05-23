<?php

$bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');
$sql = "CREATE TABLE `user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(25) NOT NULL,
 `password` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

 $bdd->exec($sql);

$sql = "CREATE TABLE `polls` (
 `id` int(11) NOT NULL,
 `creatorId` int(25) NOT NULL,
 `question` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$bdd->exec($sql);

$sql = "CREATE TABLE `answers` (
 `id` int(11) NOT NULL,
 `pollId` int(25) NOT NULL,
 `reponse` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$bdd->exec($sql);

$sql = "CREATE TABLE `votes` (
 `id` int(11) NOT NULL,
 `userId` int(25) NOT NULL,
 `answerId` int(25) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$bdd->exec($sql);

?>
