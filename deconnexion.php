<?php
session_start();
unset($_SESSION['findUserAdmin']);
header("Location: http://localhost/homepage.php");
exit;
