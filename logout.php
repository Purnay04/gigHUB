<?php
session_start();
$_SESSION['U_TYPE']='';
session_destroy();
header('location:index.php');
?>