<?php
  session_start();
  $bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

  $answers = $_POST['selected'];
  echo count($answers);
















?>
