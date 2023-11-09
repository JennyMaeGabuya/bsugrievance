<?php
session_start();
include("includes/config.php");

$_SESSION['login']=="";
date_default_timezone_set('Asia/Manila');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($bd, "UPDATE login_tbl  SET logout = '$ldate' WHERE Sr-code = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();

?>
<script language="javascript">
document.location="index.php";
</script>
