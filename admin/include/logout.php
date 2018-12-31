<?php 
session_start();

$_SESSION['username'] = null;
$_SESSION['Firstname'] = null;
$_SESSION['Lastname'] = null;
$_SESSION['user_role'] =null;

header("Location: ../../index.php");
?>