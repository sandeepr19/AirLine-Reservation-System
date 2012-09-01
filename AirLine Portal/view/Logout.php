<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION['password']);
header("Location: ../view/Login.php");
?>