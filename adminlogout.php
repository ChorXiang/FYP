<?php
session_start();

session_destroy();

unset($_SESSION['admin_id']);

header("Location: adminlogin.php");

exit();
?>