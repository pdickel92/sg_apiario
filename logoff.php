<?php
session_start();
unset($_SESSION['USUARIO_LOGIN']);
session_destroy();
header("location:index.php");
?>