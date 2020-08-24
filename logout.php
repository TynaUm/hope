<?php
session_start();
session_destroy();

setcookie("loggedin", "", time() - 3600);
//echo "Logout erfolgreich";
header("Location: " . "index.php");
?>

