<?php
session_start();
include("includes/config.php");

date_default_timezone_set('Asia/Manila');
$ldate = date('Y-m-d h:i:s A');
mysqli_query($bd, "UPDATE login_tbl SET logout = '$ldate' WHERE Sr-code = '" . $_SESSION['login'] . "' ORDER BY id DESC LIMIT 1");

$_SESSION = array();
session_unset();
session_destroy();

header("Location: student/index.php");
exit();
?>
