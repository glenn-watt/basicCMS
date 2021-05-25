<?php
    session_start();

$_SESSION['user_name'] = null;
$_SESSION['user_firstname'] = null;
$_SESSION['user_lastname'] =null;
$_SESSION['user_roll'] = null;

header("Location: ../index.php");

?>
