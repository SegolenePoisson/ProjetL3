<?php
session_start();

/* Disconnect from the session */
session_destroy();
$_SESSION["current_page"] == "home";
include 'index.php';
?>