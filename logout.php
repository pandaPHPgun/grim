<?php 
session_start();

$old_user = $_SESSION['log'];
unset($_SESSION['log']);
session_destroy();

header('location:home.php');


 ?>


