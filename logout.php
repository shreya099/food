<?php
 session_start();
 include 'database.php';
include 'fun.php';
 unset($_SESSION['is_login']);
 redirect('login.php');
?>