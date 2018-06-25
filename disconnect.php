<?php
session_start();

/* Disconnect from the session */
session_destroy();
$_SESSION["current_page"] == "home";
header("refresh:0;url=index.php");
?>
