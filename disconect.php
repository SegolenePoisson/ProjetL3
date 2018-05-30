<?php
session_start();
session_destroy();
$_SESSION["current_page"] == "home";
include 'index.php';
?>